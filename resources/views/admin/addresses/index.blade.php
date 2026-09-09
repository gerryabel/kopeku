@extends('layouts.admin')

@section('title', 'Kelola Kota Kucing')

@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white rounded-xl shadow-md">

    {{-- Header with 3 parts: left, center, right --}}
    <div class="flex flex-col md:flex-row items-center justify-between mb-6 gap-4">
        <div class="flex-1 text-left">
            <h1 class="text-2xl font-semibold">Kelola Kota Kucing</h1>
        </div>

        <div class="flex-1 max-w-md mx-auto">
            <form action="{{ route('admin.addresses.index') }}" method="GET" class="flex-grow max-w-lg">
                <label for="search" class="sr-only">Cari kota</label>
                <div class="relative text-gray-600 focus-within:text-[#578E7E]">
                    <input
                        type="search"
                        name="search"
                        id="search"
                        placeholder="Cari kota...."
                        value="{{ request('search') }}"
                        class="block w-full py-2 pl-10 pr-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#578E7E] focus:border-transparent transition" />
                    <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="11" cy="11" r="7" stroke-linecap="round" stroke-linejoin="round" />
                            <line x1="21" y1="21" x2="16.65" y2="16.65" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                </div>
            </form>
        </div>

        <div class="flex-1 text-right">
            <a href="{{ route('admin.addresses.create') }}"
                class="inline-block bg-sage text-white px-4 py-2 rounded hover:bg-green-700 transition">
                Tambah Kota Baru
            </a>
        </div>
    </div>

    {{-- Success message --}}
    @if(session('success'))
    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>
    @endif

    {{-- Table --}}
    <table class="w-full border border-gray-300 rounded overflow-hidden text-left">
        <thead class="bg-sage text-white">
            <tr>
                <th class="px-4 py-2">Nama Kota</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($addresses as $address)
            <tr class="border-t border-gray-200">
                <td class="px-4 py-2">{{ $address->address }}</td>
                <td class="px-4 py-2 flex gap-2">
                    <a href="{{ route('admin.addresses.edit', $address) }}" class="text-blue-600 hover:underline">Edit</a>
                    <form action="{{ route('admin.addresses.destroy', $address) }}" method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus kota ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="2" class="text-center py-4 text-gray-500">Tidak ada data kota.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    {{-- Pagination links --}}
    <div class="mt-4">
        {{ $addresses->links() }}
    </div>
</div>
@endsection