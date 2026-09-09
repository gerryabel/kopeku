{{-- resources/views/layouts/adoptions.blade.php --}}
@extends('layouts.app')

@section('content')
<div>
    {{-- Navbar khusus adopsi, disamakan dengan forum --}}
    <nav class="bg-white shadow-md px-4 rounded-xl py-3 flex justify-between items-center">
        <div class="font-bold text-xl text-[#578E7E]">KOPEKU Adopsi Kucing</div>

        <form action="{{ route('adoptions.index') }}" method="GET" class="relative max-w-lg w-full mx-4" x-data="{ open: false }">
            <div class="flex items-center space-x-2">
                <input
                    type="text"
                    name="search"
                    placeholder="Cari nama kucing..."
                    value="{{ request('search') }}"
                    class="flex-grow px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#578E7E] transition"
                    autocomplete="off" />

                <button type="button"
                    @click="open = !open"
                    class="px-4 py-2 rounded-md bg-[#578E7E] text-white hover:bg-[#3d6e67] transition flex items-center justify-center"
                    aria-label="Toggle filter">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L15 13.414V19a1 1 0 01-2 0v-5.586L3.293 6.707A1 1 0 013 6V4z" />
                    </svg>
                </button>
            </div>

            {{-- Filter dropdown --}}
            <div
                x-show="open"
                @click.away="open = false"
                x-transition
                style="display: none"
                class="absolute z-50 mt-2 w-full bg-white rounded-md shadow-lg border border-gray-300 p-4 space-y-3">
                <div class="flex flex-wrap gap-4">
                    <select name="status" class="flex-1 min-w-[120px] border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#578E7E]">
                        <option value="" {{ request('status') == '' ? 'selected' : '' }}>Semua Status</option>
                        <option value="tersedia" {{ request('status') == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="tidak tersedia" {{ request('status') == 'tidak tersedia' ? 'selected' : '' }}>Tidak Tersedia</option>
                    </select>

                    <select name="breed"
                        class="flex-1 min-w-[120px] border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#578E7E]">
                        <option value="">Semua Jenis Kucing</option>
                        @foreach ($breeds as $breed)
                        <option value="{{ $breed }}" {{ request('breed') == $breed ? 'selected' : '' }}>
                            {{ $breed }}
                        </option>
                        @endforeach
                    </select>

                    <select name="gender" class="flex-1 min-w-[120px] border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#578E7E]">
                        <option value="" {{ request('gender') == '' ? 'selected' : '' }}>Semua Jenis Kelamin</option>
                        <option value="male" {{ request('gender') == 'male' ? 'selected' : '' }}>Jantan</option>
                        <option value="female" {{ request('gender') == 'female' ? 'selected' : '' }}>Betina</option>
                    </select>

                    <input type="number" min="0" name="age" placeholder="Umur (Bulan)" value="{{ request('age') }}"
                        class="flex-1 min-w-[90px] border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#578E7E]" />

                    <select name="location"
                        class="flex-1 min-w-[120px] border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#578E7E]">
                        <option value="">Semua Lokasi</option>
                        @foreach ($locations as $location)
                        <option value="{{ $location }}" {{ request('location') == $location ? 'selected' : '' }}>
                            {{ $location }}
                        </option>
                        @endforeach
                    </select>
                </div>

                {{-- Tombol submit --}}
                <div class="text-right">
                    <button type="submit" class="bg-[#578E7E] text-white px-6 py-2 rounded hover:bg-[#3d6e67] transition">
                        Terapkan Filter
                    </button>
                </div>
            </div>
        </form>

        <div class="flex items-center gap-4">
            @auth
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

            {{-- Dropdown profil --}}
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open"
                    class="flex items-center space-x-2 focus:outline-none hover:bg-gray-100 px-2 py-1 rounded-md transition"
                    style="line-height: 1;">
                    @if(auth()->user()->avatar)
                    <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="Avatar"
                        class="w-8 h-8 rounded-full object-cover border-2 border-[#578E7E] shadow-sm" />
                    @else
                    <div
                        class="w-8 h-8 rounded-full bg-gray-200 border-2 border-[#578E7E] flex items-center justify-center text-gray-600 font-semibold uppercase shadow-sm">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                    @endif
                    <span class="text-[#3D3D3D] font-medium">{{ auth()->user()->name }}</span>
                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div x-show="open" @click.away="open = false" x-cloak
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
            @endauth

            @guest
            <div class="space-x-4 flex items-center">
                {{-- Notifikasi tidak ditampilkan untuk guest --}}
                <a href="{{ route('login') }}" class="text-[#578E7E] hover:underline">Login</a>
                <a href="{{ route('register') }}" class="text-[#578E7E] hover:underline">Register</a>
            </div>
            @endguest
        </div>
    </nav>

    {{-- Konten utama adopsi --}}
    <main class="mt-6 px-4">
        @yield('adoptions-content')
    </main>
</div>

{{-- Alpine.js untuk dropdown --}}
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endsection