@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Dashboard</h1>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm">Total Tagihan</p>
                {{-- <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalBooks }}</p> --}}
            </div>
            <div class="bg-blue-100 rounded-full p-4">
                <i class="fas fa-book text-blue-600 text-2xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm">Total Members</p>
                {{-- <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalMembers }}</p> --}}
            </div>
            <div class="bg-green-100 rounded-full p-4">
                <i class="fas fa-users text-green-600 text-2xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm">Total Transactions</p>
                {{-- <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalTransactions }}</p> --}}
            </div>
            <div class="bg-yellow-100 rounded-full p-4">
                <i class="fas fa-file-alt text-yellow-600 text-2xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm">Books Borrowed</p>
                {{-- <p class="text-3xl font-bold text-gray-800 mt-2">{{ $booksBorrowed }}</p> --}}
            </div>
            <div class="bg-red-100 rounded-full p-4">
                <i class="fas fa-book-open text-red-600 text-2xl"></i>
            </div>
        </div>
    </div>
</div>
@endsection

