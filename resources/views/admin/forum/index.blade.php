@extends('layouts.admin')

@section('title', 'Kelola Forum')

@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white rounded-xl shadow-md">
    <div class="flex items-center justify-between mb-4 gap-4">
        <!-- Kiri: Judul -->
        <h1 class="text-2xl font-semibold text-[#578E7E] flex-1 text-left">
            Kelola Forum
        </h1>

        {{-- Search form tengah --}}
        <form action="{{ route('admin.forum.index') }}" method="GET" class="flex-grow max-w-lg">
            <label for="search" class="sr-only">Cari forum</label>
            <div class="relative text-gray-600 focus-within:text-[#578E7E]">
                <input
                    type="search"
                    name="search"
                    id="search"
                    placeholder="Cari forum...."
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

        <!-- Kanan: Tombol tambah forum -->
        <div class="flex-1 text-right">
            <a href="{{ route('admin.forum.create') }}"
                class="inline-block bg-[#578E7E] text-white px-4 py-2 rounded hover:bg-[#466f6a]">
                + Tambah Forum
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
                    <th class="p-3 text-left">Gambar</th>
                    <th class="p-3 text-left">Judul</th>
                    <th class="p-3 text-left">Penulis</th>
                    <th class="p-3 text-left">Tanggal</th>
                    <th class="p-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($forums as $forum)
                <tr class="border-t">
                    <td class="p-3">
                        @if($forum->images->isNotEmpty())
                        <img src="{{ asset('storage/' . $forum->images->first()->image_path) }}" alt="Gambar Forum" class="w-16 h-10 object-cover rounded">
                        @else
                        <span class="text-gray-400 italic">Tidak ada gambar</span>
                        @endif
                    </td>
                    <td class="p-3">{{ Str::limit($forum->title, 50) }}</td>
                    <td class="p-3">{{ $forum->user->name ?? '-' }}</td>
                    <td class="p-3">{{ $forum->created_at->format('d M Y') }}</td>
                    <td class="p-3">
                        <a href="{{ route('admin.forum.show', $forum) }}" class="text-green-600 hover:underline mr-2">Lihat</a>
                        <a href="{{ route('admin.forum.edit', $forum) }}" class="text-yellow-600 hover:underline mr-2">Edit</a>
                        <form action="{{ route('admin.forum.destroy', $forum) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus forum ini?')" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center p-4">Belum ada forum.</td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>

    <div class="mt-4">
        {{ $forums->links() }}
    </div>
</div>
@endsection