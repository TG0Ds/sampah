@extends('layouts.app')

@section('title', 'Bayar Tagihan')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h1 class="text-3xl font-bold text-gray-800">Bayar Tagihan</h1>
    <a href="{{ route('dataTagihan.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">
        <i class="fas fa-arrow-left mr-2"></i>Back
    </a>
</div>

@php
    $totalAmount = (float) $dataTagihan->total_amount;
    $alreadyPaid = (float) ($dataTagihan->paid_amount ?? 0);
    $remaining = max(0, $totalAmount - $alreadyPaid);
@endphp
<div class="bg-white rounded-lg shadow p-8">
    <div class="mb-6 p-4 bg-gray-50 rounded-lg space-y-2">
        <p class="text-sm text-gray-600">Total tagihan: <span class="font-semibold text-gray-900">Rp {{ number_format($totalAmount, 0, ',', '.') }}</span></p>
        <p class="text-sm text-gray-600">Sudah dibayar: <span class="font-semibold text-gray-900">Rp {{ number_format($alreadyPaid, 0, ',', '.') }}</span></p>
        <p class="text-sm text-gray-600">Sisa: <span class="font-semibold text-orange-600">Rp {{ number_format($remaining, 0, ',', '.') }}</span></p>
    </div>
    <form action="{{ route('dataTagihan.processPay', $dataTagihan->id) }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label for="pay_amount" class="block text-sm font-medium text-gray-700">Jumlah bayar sekarang</label>
            <input id="pay_amount" name="pay_amount" type="number" step="0.01" min="0.01" max="{{ $remaining }}" value="{{ old('pay_amount') }}" required
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                placeholder="Contoh: 40000">
            @error('pay_amount')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex justify-end gap-3 pt-4">
            <a href="{{ route('dataTagihan.index') }}" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">Batal</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:ring-2 focus:ring-blue-500">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection