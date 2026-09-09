@extends('layouts.admin')

@section('title', 'Kelola User')

@section('content')
<div class="p-6 bg-white rounded-xl shadow-md max-w-7xl mx-auto mt-1">
    <div class="flex items-center justify-between mb-4 gap-4">
        <!-- Kiri: Judul -->
        <h1 class="text-2xl font-semibold text-[#578E7E] flex-1 text-left">
            Kelola User
        </h1>

        {{-- Form search + filter --}}
        <form action="{{ route('admin.users.index') }}" method="GET" class="flex flex-grow max-w-lg gap-3 items-center">
            <label for="search" class="sr-only">Cari user</label>
            <div class="relative text-gray-600 focus-within:text-[#578E7E] flex-grow">
                <input
                    type="search"
                    name="search"
                    id="search"
                    placeholder="Cari user berdasarkan nama..."
                    value="{{ request('search') }}"
                    class="block w-full py-2 pl-10 pr-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#578E7E] focus:border-transparent transition" />
                <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="7" stroke-linecap="round" stroke-linejoin="round" />
                        <line x1="21" y1="21" x2="16.65" y2="16.65" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
            </div>

            <label for="banned" class="sr-only">Filter banned</label>
            <select
                name="banned"
                id="banned"
                class="py-2 px-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#578E7E] focus:border-transparent transition">
                <option value="" {{ request('banned') === null ? 'selected' : '' }}>Semua status</option>
                <option value="0" {{ request('banned') === '0' ? 'selected' : '' }}>Aktif</option>
                <option value="1" {{ request('banned') === '1' ? 'selected' : '' }}>Banned</option>
            </select>

            <label for="role" class="sr-only">Filter role</label>
            <select
                name="role"
                id="role"
                class="py-2 px-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#578E7E] focus:border-transparent transition">
                <option value="">Semua Role</option>
                <option value="admin" {{ request('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="member" {{ request('role') === 'member' ? 'selected' : '' }}>Member</option>
            </select>

            <button type="submit" class="bg-[#578E7E] text-white px-4 py-2 rounded hover:bg-[#466f6a]">
                Filter
            </button>
        </form>

        <div class="flex-1 text-right">
            <a href="{{ route('admin.users.create') }}"
                class="inline-block bg-[#578E7E] text-white px-4 py-2 rounded hover:bg-[#466f6a]">
                + Tambah User
            </a>
        </div>
    </div>

    @if(session('success'))
    <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <div class="overflow-x-auto border border-gray-300">
        <table class="min-w-full bg-white text-sm">
            <thead class="bg-[#F5ECD5] text-[#3D3D3D]">
                <tr>
                    <th class="px-6 py-3 text-left">Avatar</th>
                    <th class="px-6 py-3 text-left">Nama</th>
                    <th class="px-6 py-3 text-left">Email</th>
                    <th class="px-6 py-3 text-left">Status</th>
                    <th class="px-6 py-3 text-left">Peran</th>
                    <th class="px-6 py-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr class="border-b border-gray-200 hover:bg-[#F0F6F4] transition-colors duration-150">
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($user->avatar)
                        <img src="{{ asset('storage/' . $user->avatar) }}"
                            alt="Avatar {{ $user->name }}"
                            class="w-10 h-10 rounded-full object-cover border-2 border-[#578E7E] shadow-sm" />
                        @else
                        <div class="w-10 h-10 rounded-full bg-gray-200 border-2 border-[#578E7E] flex items-center justify-center text-gray-600 font-semibold uppercase shadow-sm">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        @endif
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-800">{{ $user->name }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ $user->email }}</td>
                    <td class="px-6 py-4">
                        @if($user->banned)
                        <span class="inline-block px-3 py-1 text-sm font-semibold text-red-700 bg-red-100 rounded-full">Banned</span>
                        @else
                        <span class="inline-block px-3 py-1 text-sm font-semibold text-green-700 bg-green-100 rounded-full">Aktif</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-gray-700 capitalize">{{ $user->role }}</td>
                    <td class="px-6 py-4 whitespace-nowrap flex items-center space-x-2">
                        @if($user->role !== 'admin')
                        @if(!$user->banned)
                        <form method="POST" action="{{ route('admin.users.ban', $user) }}" onsubmit="return confirm('Yakin ingin ban user ini?');">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="bg-gray-800 text-white px-3 py-1 rounded hover:bg-gray-900 transition">
                                Ban
                            </button>
                        </form>
                        @else
                        <form method="POST" action="{{ route('admin.users.unban', $user) }}" onsubmit="return confirm('Yakin ingin unban user ini?');">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700 transition">
                                Unban
                            </button>
                        </form>
                        @endif
                        @else
                        <span class="text-gray-500 italic select-none">Akun Admin</span>
                        @endif

                        <a href="{{ route('admin.users.edit', $user) }}"
                            class="bg-yellow-400 px-3 py-1 rounded hover:bg-yellow-500 text-white transition">
                            Edit
                        </a>

                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus user ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 px-3 py-1 rounded hover:bg-red-700 text-white transition">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-8 text-gray-500 italic">Tidak ada user ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection