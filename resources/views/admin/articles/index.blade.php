@extends('layouts.admin')

@section('title', 'Kelola Artikel')

@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white rounded-xl shadow-md">
    <div class="flex items-center justify-between mb-4 gap-4">
        <!-- Kiri: Judul -->
        <h1 class="text-2xl font-semibold text-[#578E7E] flex-1 text-left">
            Kelola Artikel
        </h1>

        {{-- Form search + filter kategori --}}
        <form action="{{ route('admin.articles.index') }}" method="GET" class="flex flex-grow max-w-lg gap-3 items-center">
            <label for="search" class="sr-only">Cari artikel</label>
            <div class="relative text-gray-600 focus-within:text-[#578E7E] flex-grow">
                <input
                    type="search"
                    name="search"
                    id="search"
                    placeholder="Cari artikel...."
                    value="{{ request('search') }}"
                    class="block w-full py-2 pl-10 pr-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#578E7E] focus:border-transparent transition" />
                <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="7" stroke-linecap="round" stroke-linejoin="round" />
                        <line x1="21" y1="21" x2="16.65" y2="16.65" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
            </div>

            <label for="category_id" class="sr-only">Filter kategori</label>
            <select
                name="category_id"
                id="category_id"
                class="py-2 px-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#578E7E] focus:border-transparent transition">
                <option value="">Semua kategori</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>

            <button type="submit" class="bg-[#578E7E] text-white px-4 py-2 rounded hover:bg-[#466f6a]">
                Filter
            </button>
        </form>

        <!-- Kanan: Tombol tambah artikel -->
        <div class="flex-1 text-right">
            <a href="{{ route('admin.articles.create') }}"
                class="inline-block bg-[#578E7E] text-white px-4 py-2 rounded hover:bg-[#466f6a]">
                + Tambah Artikel
            </a>
        </div>
    </div>

    @if(session('success'))
    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full table-auto border">
            <thead class="bg-[#F5ECD5] text-[#3D3D3D]">
                <tr>
                    <th class="p-3 text-left">Gambar</th> {{-- Tambah kolom gambar --}}
                    <th class="p-3 text-left">Judul</th>
                    <th class="p-3 text-left">Kategori</th>
                    <th class="p-3 text-left">Penulis</th>
                    <th class="p-3 text-left">Tanggal</th>
                    <th class="p-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($articles as $article)
                <tr class="border-t">
                    <td class="p-3">
                        @if($article->image)
                        <img src="{{ asset('storage/' . $article->image) }}" alt="Gambar Artikel" class="w-16 h-10 object-cover rounded">
                        @else
                        <span class="text-gray-400 italic">Tidak ada gambar</span>
                        @endif
                    </td>
                    <td class="p-3">{{ $article->title }}</td>
                    <td class="p-3">{{ $article->category->name ?? '-' }}</td>
                    <td class="p-3">{{ $article->admin->name ?? 'Admin' }}</td>
                    <td class="p-3">{{ $article->created_at->format('d M Y') }}</td>
                    <td class="p-3 space-x-2">
                        <a href="{{ route('admin.articles.show', $article) }}"
                            class="text-green-600 hover:underline">Lihat</a>
                        <a href="{{ route('admin.articles.edit', $article) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus artikel ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="p-3 text-center">Belum ada artikel.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $articles->links() }}
    </div>
</div>
@endsection