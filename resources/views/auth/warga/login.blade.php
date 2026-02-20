@extends('auth.layout')

@section('title', 'Warga Login')

@section('content')
<div class="text-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Login Warga</h1>
    <a href="{{ route('login') }}" class="text-sm text-gray-500 hover:text-blue-600 mt-2 inline-block">
        <i class="fas fa-arrow-left mr-1"></i> Back
    </a>
</div>

<div class="bg-white rounded-lg shadow-lg p-8">
    <form action="{{ route('warga.login.submit') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                   placeholder="petugas@example.com">
        </div>
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input id="password" name="password" type="password" required
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                   placeholder="••••••••">
        </div>
        <div class="flex items-center">
            <input id="remember" name="remember" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
            <label for="remember" class="ml-2 block text-sm text-gray-700">Remember me</label>
        </div>
        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            <i class="fas fa-lock mr-2"></i> Login
        </button>
        <p class="text-center text-sm text-gray-600 mt-4">
            Don't have an account?
            <a href="{{ route('register') }}" class="font-medium text-green-600 hover:text-green-700">Register here</a>
        </p>
    </form>
</div>
@endsection
