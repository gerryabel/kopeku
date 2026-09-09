@extends('layouts.admin')

@section('title', 'Kelola Galeri')

@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white rounded-xl shadow-md">
    <div class="flex items-center justify-between mb-4 gap-4">
        {{-- Judul --}}
        <h1 class="text-2xl font-semibold text-[#578E7E] flex-1 text-left">
            Kelola Galeri
        </h1>

        {{-- Form Pencarian --}}
        <form action="{{ route('admin.photos.index') }}" method="GET" class="flex-grow max-w-lg">
            <label for="search" class="sr-only">Cari galeri</label>
            <div class="relative text-gray-600 focus-within:text-[#578E7E]">
                <input
                    type="search"
                    name="search"
                    id="search"
                    placeholder="Cari galeri..."
                    value="{{ request('search') }}"
                    class="block w-full py-2 pl-10 pr-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#578E7E] focus:border-transparent transition" />
                <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="7" stroke-linecap="round" stroke-linejoin="round" />
                        <line x1="21" y1="21" x2="16.65" y2="16.65" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
            </div>
        </form>

        {{-- Tombol Tambah --}}
        <div class="flex-1 text-right">
            <a href="{{ route('admin.photos.create') }}" 
               class="inline-block bg-[#578E7E] text-white px-4 py-2 rounded hover:bg-[#466f6a]">
                + Tambah Galeri
            </a>
        </div>
    </div>

    {{-- Pesan sukses --}}
    @if(session('success'))
    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    @if($photos->count())
    <div class="overflow-x-auto">
        <table class="w-full table-auto border">
            <thead class="bg-[#F5ECD5] text-[#3D3D3D]">
                <tr>
                    <th scope="col" class="p-3 text-left">Gambar</th>
                    <th scope="col" class="p-3 text-left">Judul</th>
                    <th scope="col" class="p-3 text-left">Pengupload</th>
                    <th scope="col" class="p-3 text-left">Deskripsi</th>
                    <th scope="col" class="p-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($photos as $photo)
                <tr class="border-t">
                    <td class="py-3">
                        <img src="{{ asset('storage/' . $photo->filename) }}" alt="{{ $photo->title ?? 'Foto' }}" class="w-24 h-16 object-cover rounded" />
                    </td>
                    <td class="py-3" title="{{ $photo->title ?? '-' }}">
                        {{ $photo->title ?? '-' }}
                    </td>
                    <td class="py-3" title="{{ $photo->user->name ?? '-' }}">
                        {{ $photo->user->name ?? '-' }}
                    </td>
                    <td class="py-3" title="{{ $photo->description ?? '-' }}">
                        {{ $photo->description ?? '-' }}
                    </td>
                    <td class="py-3">
                        <a href="{{ route('admin.photos.edit', $photo) }}" 
                           class="inline-block bg-yellow-400 hover:bg-yellow-500 text-white font-semibold py-1 px-3 rounded transition">
                           Edit
                        </a>
                        <form action="{{ route('admin.photos.destroy', $photo) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus foto ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="bg-red-600 hover:bg-red-700 text-white font-semibold py-1 px-3 rounded transition">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-6">
        {{ $photos->links() }}
    </div>
    @else
    <p class="text-center text-gray-500 italic py-10 text-lg">Belum ada foto di galeri.</p>
    @endif
</div>
@endsection
