@extends('layouts.forum')

@section('title', $forum->title)

@section('forum-content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-[15px]">

  {{-- Postingan Forum --}}
  <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 mb-6">

    {{-- Dropdown tombol opsi --}}
    @auth
    @if(Auth::id() === $forum->user_id || auth()->user()->role === 'admin')
    <div class="relative float-right">
      <button onclick="toggleDropdown({{ $forum->id }})"
        class="text-gray-500 hover:text-gray-800 text-2xl focus:outline-none" aria-label="Menu opsi">
        ⋯
      </button>
      <div id="dropdown-{{ $forum->id }}"
        class="hidden absolute right-0 mt-2 w-44 bg-white border border-gray-300 rounded-md shadow-lg z-20 overflow-hidden">
        @if(Auth::id() === $forum->user_id)
        <a href="{{ route('forum.edit', $forum) }}"
          class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition">Edit</a>
        <form action="{{ route('forum.destroy', $forum) }}" method="POST"
          onsubmit="return confirm('Yakin ingin menghapus forum ini?')" class="m-0">
          @csrf
          @method('DELETE')
          <button type="submit"
            class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-100 transition">Hapus</button>
        </form>
        @endif

        @if(auth()->user()->role === 'admin')
        <form action="{{ route('forum.forceDelete', $forum) }}" method="POST"
          onsubmit="return confirm('Yakin ingin hapus paksa forum ini?')" class="m-0">
          @csrf
          @method('DELETE')
          <button type="submit"
            class="w-full text-left px-4 py-2 text-sm text-red-800 font-semibold hover:bg-red-200 transition">Hapus Paksa</button>
        </form>
        @endif
      </div>
    </div>
    @endif
    @endauth

    {{-- Info Pengguna --}}
    <div class="flex items-center mb-4">
      @if($forum->user->avatar)
      <img src="{{ asset('storage/' . $forum->user->avatar) }}"
        alt="Avatar"
        class="w-10 h-10 rounded-full object-cover border-2 border-[#578E7E] shadow-sm mr-3" />
      @else
      <div class="w-10 h-10 rounded-full bg-gray-200 border-2 border-[#578E7E] flex items-center justify-center text-gray-600 font-semibold uppercase shadow-sm mr-3">
        {{ substr($forum->user->name, 0, 1) }}
      </div>
      @endif
      <div>
        <p class="text-gray-700 font-semibold">{{ $forum->user->name }}</p>
        <p class="text-xs text-gray-500">{{ $forum->created_at->diffForHumans() }}</p>
      </div>
    </div>

    {{-- Judul --}}
    <h1 class="text-2xl font-semibold text-[#578E7E] mb-3">{{ $forum->title }}</h1>

    {{-- Konten --}}
    <div class="text-gray-800 whitespace-pre-line leading-relaxed mb-4">{{ $forum->content }}</div>

    {{-- Gambar --}}
    @if($forum->images->count())
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
      @foreach($forum->images as $image)
      <img src="{{ asset('storage/' . $image->image_path) }}" alt="Gambar Forum"
        class="rounded-xl shadow-md w-full h-auto object-contain max-h-[400px]" />
      @endforeach
    </div>
    @endif
  </div>

  {{-- Flash Message --}}
  @if(session('success'))
  <div class="mb-4 bg-green-50 border border-green-300 text-green-800 px-3 py-2 rounded-lg text-sm">
    {{ session('success') }}
  </div>
  @endif

  {{-- Komentar --}}
  <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-5">
    <h2 class="text-lg font-semibold text-[#578E7E] mb-4">Komentar</h2>

    {{-- Daftar Komentar --}}
    @if($forum->comments->count())
    <div class="space-y-5 mb-6">
      @foreach($forum->comments as $comment)
      <div class="flex items-start space-x-3 border-b pb-3"
        x-data="{ editing: false, editedContent: '{{ addslashes($comment->content) }}' }">

        {{-- Avatar --}}
        @if($comment->user->avatar)
        <img src="{{ asset('storage/' . $comment->user->avatar) }}"
          alt="{{ $comment->user->name }}"
          class="w-8 h-8 rounded-full object-cover border border-[#578E7E]" />
        @else
        <div class="w-8 h-8 rounded-full bg-gray-200 border border-[#578E7E] flex items-center justify-center text-xs font-bold text-gray-600 uppercase">
          {{ strtoupper(substr($comment->user->name, 0, 1)) }}
        </div>
        @endif

        <div class="flex-1">
          {{-- Mode edit --}}
          <form x-show="editing"
            method="POST"
            action="{{ route('comments.update', $comment->id) }}"
            class="space-y-2">
            @csrf
            @method('PUT')
            <textarea x-model="editedContent"
              name="content"
              class="w-full border border-gray-300 rounded-md p-2 text-sm focus:outline-none focus:ring-1 focus:ring-[#578E7E]"
              rows="2"></textarea>
            <div class="flex gap-2 text-sm">
              <button type="submit"
                class="bg-[#578E7E] text-white px-3 py-1 rounded hover:bg-[#3D3D3D]">
                Simpan
              </button>
              <button type="button"
                @click="editing = false"
                class="text-gray-600 hover:underline">
                Batal
              </button>
            </div>
          </form>

          {{-- Mode tampil --}}
          <div x-show="!editing" x-cloak>
            <p class="text-sm text-gray-800 whitespace-pre-line" x-text="editedContent"></p>
            <div class="text-xs text-gray-500 mt-1">
              {{ $comment->user->name }}
              @if($comment->user->banned)
              <span class="text-red-500 text-[10px] ml-1">(banned)</span>
              @endif
              • {{ $comment->created_at->diffForHumans() }}
              @if($comment->updated_at != $comment->created_at)
              <span class="italic text-gray-400">(diedit)</span>
              @endif
            </div>

            @auth
            @if(Auth::id() === $comment->user_id || auth()->user()->role === 'admin')
            <div class="flex items-center space-x-3 mt-1">
              {{-- Tombol Edit --}}
              <button @click="editing = true" class="text-xs text-[#578E7E] hover:underline">Edit</button>

              {{-- Tombol Hapus --}}
              <form action="{{ route('comments.destroy', $comment->id) }}"
                method="POST"
                onsubmit="return confirm('Yakin ingin menghapus komentar ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-xs text-red-600 hover:underline">Hapus</button>
              </form>

              {{-- Tombol Ban / Unban oleh Admin --}}
              @if(auth()->user()->role === 'admin' && Auth::id() !== $comment->user->id)
              @if(!$comment->user->banned)
              <form action="{{ route('admin.users.ban', $comment->user->id) }}"
                method="POST"
                onsubmit="return confirm('Yakin ingin ban user ini?')">
                @csrf
                <button type="submit" class="text-xs text-orange-600 hover:underline">Ban</button>
              </form>
              @else
              <form action="{{ route('admin.users.unban', $comment->user->id) }}"
                method="POST"
                onsubmit="return confirm('Yakin ingin unban user ini?')">
                @csrf
                @method('PATCH')
                <button type="submit" class="text-xs text-green-600 hover:underline">Unban</button>
              </form>
              @endif
              @endif

            </div>
            @endif
            @endauth
          </div>
        </div>
      </div>
      @endforeach
    </div>
    @else
    <p class="text-gray-500 italic mb-6">Belum ada komentar.</p>
    @endif

    {{-- Form Komentar --}}
    @auth
    <form action="{{ route('comments.store', $forum) }}" method="POST" class="space-y-3">
      @csrf
      <textarea name="comment" rows="3" class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:outline-none focus:ring-1 focus:ring-[#578E7E]" placeholder="Tambahkan komentar mu..." required>{{ old('comment') }}</textarea>
      @error('comment')
      <p class="text-red-600 text-sm">{{ $message }}</p>
      @enderror

      <div class="flex justify-between items-center">
        <a href="{{ route('forum.index') }}" class="text-sm text-gray-600 hover:underline">← Kembali</a>
        <button type="submit" class="bg-[#578E7E] text-white text-sm px-4 py-1.5 rounded hover:bg-[#3D3D3D] transition">
          Kirim
        </button>
      </div>
    </form>
    @else
    <p class="text-sm text-gray-600">
      Silakan <a href="{{ route('login') }}" class="text-[#578E7E] underline hover:text-[#3D3D3D] transition">login</a> untuk memberi komentar.
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
</script>
@endsection