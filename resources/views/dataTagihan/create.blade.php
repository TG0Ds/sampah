@extends('layouts.app')

@section('title', 'Tambah Data Tagihan')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h1 class="text-3xl font-bold text-gray-800">Tambah Data Tagihan</h1>
    <a href="{{ route('dataTagihan.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">
        <i class="fas fa-arrow-left mr-2"></i>Back
    </a>
</div>

<div class="bg-white rounded-lg shadow p-8">
    <form action="{{ route('dataTagihan.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label for="user_id" class="block text-sm font-medium text-gray-700">Warga</label>
            <select id="user_id" name="user_id" required
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <option value="">Pilih warga</option>
                @foreach($warga as $u)
                    <option value="{{ $u->id }}" {{ old('user_id') == $u->id ? 'selected' : '' }}>{{ $u->name }} ({{ $u->email }})</option>
                @endforeach
            </select>
            @error('user_id')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="billing_start_date" class="block text-sm font-medium text-gray-700">Billing Start Date</label>
            <input id="billing_start_date" name="billing_start_date" type="date" value="{{ old('billing_start_date') }}" required
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @error('billing_start_date')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="due_date" class="block text-sm font-medium text-gray-700">Due Date</label>
            <input id="due_date" name="due_date" type="date" value="{{ old('due_date') }}" required
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @error('due_date')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="total_amount" class="block text-sm font-medium text-gray-700">Total Amount</label>
            <input id="total_amount" name="total_amount" type="number" step="0.01" min="0" value="{{ old('total_amount', '100000') }}" required unit="Rp" readonly
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 placeholder-black"
                placeholder="100000"/>
            @error('total_amount')
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
