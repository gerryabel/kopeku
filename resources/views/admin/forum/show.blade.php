@extends('layouts.admin')

@section('title', 'Detail Forum')

@section('content')
<div class="max-w-7xl mx-auto mt-10 grid grid-cols-1 md:grid-cols-3 gap-6 px-4">

    {{-- KIRI: FORUM --}}
    <div class="md:col-span-2 bg-white rounded-xl shadow-md p-6 relative">
        {{-- Tombol titik 3 di kanan atas --}}
        <div class="relative float-right">
            <button onclick="toggleDropdown({{ $forum->id }})"
                class="text-gray-500 hover:text-gray-800 text-2xl focus:outline-none" aria-label="Menu opsi">
                ⋯
            </button>
            <div id="dropdown-{{ $forum->id }}"
                class="hidden absolute right-0 mt-2 w-44 bg-white border border-gray-300 rounded-md shadow-lg z-20 overflow-hidden">

                <a href="{{ route('admin.forum.edit', $forum) }}"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition">Edit</a>
                <form action="{{ route('admin.forum.destroy', $forum) }}" method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus forum ini?')" class="m-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-100 transition">Hapus</button>
                </form>

            </div>
        </div>

        {{-- Header user (avatar + nama + waktu) --}}
        <div class="mb-6 flex items-center space-x-4">
            @if($forum->user->avatar)
            <img src="{{ asset('storage/' . $forum->user->avatar) }}" alt="{{ $forum->user->name }}"
                class="w-14 h-14 rounded-full object-cover shadow-sm border border-gray-300" />
            @else
            <div
                class="w-14 h-14 rounded-full bg-gray-200 border border-gray-300 flex items-center justify-center text-gray-600 font-semibold uppercase shadow-sm">
                {{ substr($forum->user->name, 0, 1) }}
            </div>
            @endif

            <div>
                <p class="font-semibold text-lg text-[#578E7E]">{{ $forum->user->name ?? 'Pengguna' }}</p>
                <p class="text-gray-500 text-sm">{{ $forum->created_at->format('d M Y H:i') }}</p>
            </div>
        </div>

        {{-- Judul forum --}}
        <h1 class="text-2xl font-bold text-[#3D3D3D] mb-4">{{ $forum->title }}</h1>

        {{-- Konten --}}
        <p class="text-gray-700 text-sm whitespace-pre-wrap mb-5">{!! nl2br(e($forum->content)) !!}</p>

        {{-- Gambar forum --}}
        @if($forum->images->isNotEmpty())
        <div class="grid grid-cols-3 gap-4 mb-4">
            @foreach($forum->images as $image)
            <img src="{{ asset('storage/' . $image->image_path) }}" alt="Gambar Forum"
                class="rounded object-cover w-full h-32 shadow-md" />
            @endforeach
        </div>
        @endif
    </div>

    {{-- KANAN: KOMENTAR --}}
    <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-5">
        <h2 class="text-lg font-semibold text-[#578E7E] mb-3">Komentar</h2>

        {{-- Pencarian komentar --}}
        <form method="GET" action="{{ route('admin.forum.show', $forum) }}" class="mb-4">
            <input type="text" name="search" value="{{ $search }}" placeholder="Cari komentar..."
                class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring-[#578E7E] focus:outline-none" />
        </form>

        {{-- Daftar Komentar --}}
        @if($comments->count())
        <div class="space-y-4 mb-5 max-h-[400px] overflow-y-auto pr-1">
            @foreach($comments as $comment)
            <div class="flex items-start space-x-3 border-b pb-2">
                {{-- Avatar --}}
                @if($comment->user->avatar)
                <img src="{{ asset('storage/' . $comment->user->avatar) }}"
                    class="w-8 h-8 rounded-full object-cover border border-[#578E7E]" />
                @else
                <div
                    class="w-8 h-8 rounded-full bg-gray-200 border border-[#578E7E] flex items-center justify-center text-xs font-bold text-gray-600 uppercase">
                    {{ substr($comment->user->name, 0, 1) }}
                </div>
                @endif

                <div class="flex-1">
                    {{-- Tampilkan Komentar --}}
                    <div id="comment-display-{{ $comment->id }}">
                        <div class="mb-1 flex items-center space-x-2">
                            <p class="font-semibold text-sm text-[#578E7E]">{{ $comment->user->name }}</p>
                            @if($comment->user->banned)
                            <span class="text-xs text-red-500">(banned)</span>
                            @endif
                        </div>
                        <p class="text-sm text-gray-800">{{ $comment->content }}</p>
                        <div class="flex justify-between items-center mt-1 text-xs text-gray-500">
                            <span>{{ $comment->created_at->diffForHumans() }}
                                @if($comment->created_at != $comment->updated_at)
                                <span class="italic text-gray-400">(diedit)</span>
                                @endif
                            </span>

                            @if(auth()->check() && (auth()->id() === $comment->user_id || auth()->user()->role === 'admin'))
                            <div class="flex space-x-2">
                                <button onclick="toggleEdit({{ $comment->id }})"
                                    class="text-blue-600 hover:underline">Edit</button>
                                <form action="{{ route('admin.forum.comment.destroy', [$forum, $comment]) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus komentar ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </div>
                            @endif
                        </div>
                    </div>

                    {{-- Form Edit Komentar --}}
                    @if(auth()->check() && (auth()->id() === $comment->user_id || auth()->user()->role === 'admin'))
                    <form id="comment-form-{{ $comment->id }}" action="{{ route('admin.forum.comment.update', [$forum, $comment]) }}" method="POST"
                        class="space-y-2 mb-1 hidden">
                        @csrf
                        @method('PUT')
                        <textarea name="comment" rows="2"
                            class="w-full border border-gray-300 rounded p-2 text-sm focus:outline-none focus:ring-1 focus:ring-[#578E7E]">{{ old('comment', $comment->content) }}</textarea>
                        <div class="flex justify-between text-xs text-gray-500">
                            <button type="button" onclick="toggleEdit({{ $comment->id }})" class="hover:underline">Batal</button>
                            <button type="submit" class="text-[#578E7E] font-semibold hover:underline">Simpan</button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        @else
        <p class="text-gray-500 italic mb-6">Tidak ada komentar ditemukan.</p>
        @endif

        {{-- Form Komentar --}}
        @auth
        <form action="{{ route('admin.forum.comment.store', $forum) }}" method="POST" class="space-y-3">
            @csrf
            <textarea name="content" rows="3"
                class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:outline-none focus:ring-1 focus:ring-[#578E7E]"
                placeholder="Tambahkan komentar mu..." required>{{ old('content') }}</textarea>
            @error('content')
            <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror

            <button type="submit"
                class="bg-[#578E7E] text-white text-sm px-4 py-1.5 rounded hover:bg-[#3D3D3D] transition w-full">
                Kirim Komentar
            </button>
        </form>
        @else
        <p class="text-sm text-gray-600 mt-4">
            Silakan <a href="{{ route('login') }}"
                class="text-[#578E7E] underline hover:text-[#3D3D3D] transition">login</a> untuk memberi komentar.
        </p>
        @endauth
    </div>
</div>

<script>
    function toggleDropdown(id) {
        const dropdown = document.getElementById('dropdown-' + id);
        document.querySelectorAll('[id^="dropdown-"]').forEach(el => {
            if (el !== dropdown) el.classList.add('hidden');
        });
        dropdown.classList.toggle('hidden');
    }

    document.addEventListener('click', function(e) {
        if (!e.target.closest('[id^="dropdown-"]') && !e.target.closest('button[aria-label="Menu opsi"]')) {
            document.querySelectorAll('[id^="dropdown-"]').forEach(el => el.classList.add('hidden'));
        }
    });

    function toggleEdit(commentId) {
        const display = document.getElementById(`comment-display-${commentId}`);
        const form = document.getElementById(`comment-form-${commentId}`);

        if (display && form) {
            display.classList.toggle('hidden');
            form.classList.toggle('hidden');
        }
    }
</script>
@endsection