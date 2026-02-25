@extends('layouts.app')

@php
    $statusColors = [
        'unpaid' => 'bg-gray-100 text-gray-800',
        'overdue' => 'bg-red-100 text-red-800',
        'paid_late' => 'bg-yellow-100 text-yellow-800',
        'paid' => 'bg-green-100 text-green-800',
    ];
@endphp

@section('title', 'DataTagihan')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h1 class="text-3xl font-bold text-gray-800">Data Tagihan</h1>
    @auth
        @if(auth()->user()->role === 'admin')
            <a href="{{ route('dataTagihan.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                <i class="fas fa-plus mr-2"></i>Tambah Tagihan
            </a>
        @endif
    @endauth
</div>

<form method="GET" action="{{ route('dataTagihan.index') }}" class="mb-4">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama warga..." class="border rounded px-4 py-2 w-64">
    <button type="submit" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">Cari</button>
</form>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                @auth
                    @if(auth()->user()->role === 'admin')
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Warga name</th>
                    @endif
                @endauth
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Amount</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Billing Start Date</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">due date</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">paid date</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">paid amount</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse($dataTagihan as $item)
            <tr>
                @auth
                    @if(auth()->user()->role === 'admin')
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->user->name ?? '-' }}</td>
                    @endif
                @endauth
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->total_amount }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->billing_start_date->format('d/m/Y') }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->due_date->format('d/m/Y') }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    @if($item->paid_date)
                        <div class="font-medium">{{ $item->paid_date->format('d/m/Y') }}</div>
                    @else
                        <div class="text-gray-500">-</div>
                    @endif
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->paid_amount }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $item->status_color }}">
                        {{ ucfirst(str_replace('_', ' ', $item->status)) }}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center space-x-2">
                        <a href="{{ route('dataTagihan.show', $item->id) }}" class="bg-purple-500 text-white px-3 py-1.5 rounded hover:bg-purple-600 transition text-sm" title="Detail">
                            <i class="fas fa-eye mr-1"></i>Detail
                        </a>
                        @if(auth()->user()->role === 'admin')
                            <a href="{{ route('dataTagihan.edit', $item->id) }}" class="bg-blue-500 text-white px-3 py-1.5 rounded hover:bg-blue-600 transition text-sm" title="Edit">
                                <i class="fas fa-edit mr-1"></i>Edit
                            </a>
                            <form action="{{ route('dataTagihan.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus data tagihan ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1.5 rounded hover:bg-red-600 transition text-sm" title="Delete">
                                    <i class="fas fa-trash mr-1"></i>Delete
                                </button>
                            </form>
                        @endif
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="{{ auth()->user()->role === 'admin' ? 7 : 6 }}" class="px-6 py-4 text-center text-gray-500">No data tagihan found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection

