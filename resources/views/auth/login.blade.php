@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-white shadow-md rounded-xl p-8">
  <h2 class="text-2xl text-center font-semibold mb-6 text-[#578E7E]">Login ke KOPEKU</h2>
  <form method="POST" action="{{ route('login') }}" novalidate>
    @csrf

    <div class="mb-5">
      <label for="email" class="block mb-1 font-medium text-gray-700">Email</label>
      <input
        type="email"
        name="email"
        id="email"
        value="{{ old('email') }}"
        required
        autofocus
        class="w-full rounded-xl border border-gray-300 px-5 py-3 focus:outline-none focus:ring-2 focus:ring-[#578E7E]"
      >
      @error('email')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-6">
      <label for="password" class="block mb-1 font-medium text-gray-700">Password</label>
      <input
        type="password"
        name="password"
        id="password"
        required
        class="w-full rounded-xl border border-gray-300 px-5 py-3 focus:outline-none focus:ring-2 focus:ring-[#578E7E]"
      >
      @error('password')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div class="flex items-center justify-between">
      <button
        type="submit"
        class="bg-[#578E7E] hover:bg-[#4a7a6b] text-white font-semibold rounded-xl px-6 py-3 transition-colors duration-200"
      >
        Login
      </button>
      <a href="{{ route('register') }}" class="text-[#578E7E] hover:underline font-medium text-sm">
        Daftar akun
      </a>
    </div>
  </form>
</div>
@endsection
