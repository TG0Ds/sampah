<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataTagihan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DataTagihanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = DataTagihan::with(['user']);

        if (Auth::user()->role === 'warga') {
            $query->where('user_id', Auth::id());
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            });
        }

        $dataTagihan = $query->latest()->paginate(10)->withQueryString();
        return view('dataTagihan.index', compact('dataTagihan'));
    }

    public function create()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }
        $warga = User::where('role', 'warga')->orderBy('name')->get();
        return view('dataTagihan.create', compact('warga'));
    }

    public function store(Request $request)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }
        $validated = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'billing_start_date' => ['required', 'date'],
            'due_date' => ['required', 'date', 'after_or_equal:billing_start_date'],
            'total_amount' => ['required', 'numeric', 'min:0'],
        ]);
        DataTagihan::create($validated);
        return redirect()->route('dataTagihan.index')->with('success', 'Data tagihan berhasil ditambah.');
    }

    public function show(string $id)
    {
        $dataTagihan = DataTagihan::with(['user'])->findOrFail($id);

        if (Auth::user()->role === 'warga' && $dataTagihan->user_id !== Auth::id()) {
            abort(403);
        }

        return view('dataTagihan.show', compact('dataTagihan'));
    }

    public function edit(string $id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }
        $dataTagihan = DataTagihan::findOrFail($id);
        $warga = User::where('role', 'warga')->orderBy('name')->get();
        return view('dataTagihan.edit', compact('dataTagihan', 'warga'));
    }

    public function update(Request $request, string $id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }
        $dataTagihan = DataTagihan::findOrFail($id);
        $validated = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'billing_start_date' => ['required', 'date'],
            'due_date' => ['required', 'date'],
            'total_amount' => ['required', 'numeric', 'min:0'],
            'paid_date' => ['nullable', 'date'],
        ]);
        $dataTagihan->update($validated);
        return redirect()->route('dataTagihan.index')->with('success', 'Data tagihan berhasil diubah.');
    }

    public function destroy(string $id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }
        $dataTagihan = DataTagihan::findOrFail($id);
        $dataTagihan->delete();
        return redirect()->route('dataTagihan.index')->with('success', 'Data tagihan berhasil dihapus.');
    }

    public function pay(Request $request, string $id)
    {
        $dataTagihan = DataTagihan::findOrFail($id);

        if (Auth::user()->role === 'warga') {
            if ($dataTagihan->user_id !== Auth::id()) {
                abort(403);
            }
        }

        if ($dataTagihan->paid_date) {
            return redirect()->route('dataTagihan.show', $id)->with('error', 'Tagihan ini sudah dibayar.');
        }

        $dataTagihan->update(['paid_date' => now()]);
        $message = Auth::user()->role === 'admin'
            ? 'Tagihan ditandai sudah dibayar.'
            : 'Pembayaran berhasil dicatat.';

        return redirect()->route('dataTagihan.show', $id)->with('success', $message);
    }
}
