@extends('layouts.app')

@section('content')
<div>
    {{-- Navbar untuk Home --}}
    <nav class="bg-white shadow-md px-4 rounded-xl py-3 flex justify-between items-center">
        {{-- Judul / Logo --}}
        <div class="font-bold text-xl text-[#578E7E]">KOPEKU Home</div>

        {{-- User Menu --}}
        {{-- User Menu --}}
        @auth
        <div class="flex items-center space-x-4">
            {{-- Notifikasi --}}
            @if(auth()->user()->role !== 'admin')
            {{-- Notifikasi (hanya untuk non-admin) --}}
            <a href="{{ route('adoptions.notifications') }}" class="relative p-2 hover:bg-gray-100 rounded-full focus:outline-none" aria-label="Notifikasi">
                <svg class="w-6 h-6 text-[#578E7E]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                    stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M18 8a6 6 0 10-12 0c0 7-3 9-3 9h18s-3-2-3-9"></path>
                    <path d="M13.73 21a2 2 0 01-3.46 0"></path>
                </svg>
                @php
                $notifCount = auth()->user()->unreadNotifications()->count();
                @endphp
                @if ($notifCount > 0)
                <span
                    class="absolute -top-1 -right-1 flex items-center justify-center min-w-[18px] h-5 px-1.5 text-xs font-semibold text-white bg-red-600 rounded-full shadow-lg animate-pulse origin-center">
                    {{ $notifCount }}
                </span>
                @endif
            </a>
            @endif

            {{-- Profil Dropdown --}}
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center space-x-3 focus:outline-none hover:bg-gray-100 px-3 py-1 rounded-md transition">
                    @if(auth()->user()->avatar)
                    <img src="{{ asset('storage/' . auth()->user()->avatar) }}"
                        alt="Avatar"
                        class="w-8 h-8 rounded-full object-cover border-2 border-[#578E7E] shadow-sm" />
                    @else
                    <div class="w-8 h-8 rounded-full bg-gray-200 border-2 border-[#578E7E] flex items-center justify-center text-gray-600 font-semibold uppercase shadow-sm">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                    @endif
                    <span class="text-[#3D3D3D] font-semibold">{{ auth()->user()->name }}</span>
                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div
                    x-show="open"
                    @click.away="open = false"
                    x-cloak
                    class="absolute right-0 mt-2 w-48 bg-white border rounded shadow-md z-50">
                    <a href="{{ route('account.edit') }}" class="block px-4 py-2 hover:bg-gray-100">Pengaturan Profil</a>
                    @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 hover:bg-gray-100">Dashboard Admin</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100">Logout</button>
                    </form>
                </div>
            </div>
        </div>
        @endauth

        @guest
        <div class="space-x-4">
            <a href="{{ route('login') }}" class="text-[#578E7E] font-semibold hover:underline">Login</a>
            <a href="{{ route('register') }}" class="text-[#578E7E] font-semibold hover:underline">Register</a>
        </div>
        @endguest
    </nav>

    {{-- Konten Utama --}}
    <main class="mt-6 px-4">
        @yield('home-content')
    </main>
</div>

{{-- Alpine.js --}}
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endsection