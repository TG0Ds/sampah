@extends('layouts.app')

@section('title', 'Detail Data Tagihan')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h1 class="text-3xl font-bold text-gray-800">Detail Data Tagihan</h1>
    <div class="flex items-center gap-2">
        <a href="{{ route('dataTagihan.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">
            <i class="fas fa-arrow-left mr-2"></i>Back
        </a>
        @if(!$dataTagihan->paid_date)
            @if(auth()->user()->role === 'warga')
                <a href="{{ route('dataTagihan.showPay', $dataTagihan->id) }}" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">
                    <i class="fas fa-credit-card mr-2"></i>Bayar
                </a>
            @elseif(auth()->user()->role === 'admin')
                <a href="{{ route('dataTagihan.showPay', $dataTagihan->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                    <i class="fas fa-edit mr-2"></i>Tandai sebagai Sudah Dibayar
                </a>
            @endif
        @endif
    </div>
</div>

<div class="bg-white rounded-lg shadow p-8">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="border-b md:border-b-0 md:border-r pb-6 md:pb-0 md:pr-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Info Tagihan</h2>
            <div class="space-y-3">
                <div>
                    <label class="text-sm font-medium text-gray-600">Warga name</label>
                    <p class="text-lg font-semibold text-gray-900">{{ $dataTagihan->user->name ?? '-' }}</p>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-600">Total Amount</label>
                    <p class="text-lg text-gray-900">Rp {{ number_format($dataTagihan->total_amount, 0, ',', '.') }}</p>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-600">Sudah dibayar</label>
                    <p class="text-lg text-gray-900">Rp {{ number_format($dataTagihan->paid_amount ?? 0, 0, ',', '.') }}</p>
                </div>
                @if(!$dataTagihan->paid_date)
                <div>
                    <label class="text-sm font-medium text-gray-600">Sisa</label>
                    <p class="text-lg font-semibold text-orange-600">Rp {{ number_format(max(0, (float)$dataTagihan->total_amount - (float)($dataTagihan->paid_amount ?? 0)), 0, ',', '.') }}</p>
                </div>
                @endif
                <div>
                    <label class="text-sm font-medium text-gray-600">Billing Start Date</label>
                    <p class="text-lg text-gray-900">{{ $dataTagihan->billing_start_date->format('d/m/Y') }}</p>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-600">Due Date</label>
                    <p class="text-gray-900">{{ $dataTagihan->due_date->format('d/m/Y') }}</p>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-600">paid date</label>
                    @if($dataTagihan->paid_date)
                        <div class="font-medium text-gray-900">{{ $dataTagihan->paid_date->format('d/m/Y') }}</div>
                    @else
                        <div class="text-gray-900">-</div>
                    @endif
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-600">Status</label>
                    <p class="{{ $dataTagihan->status_color }}">{{ ucfirst(str_replace('_', ' ', $dataTagihan->status)) }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-8 pt-6 border-t flex justify-end space-x-3">
        @auth
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('dataTagihan.edit', $dataTagihan->id) }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                    <i class="fas fa-edit mr-2"></i>Edit
                </a>
            @endif
        @endauth
    </div>
</div>
@endsection
