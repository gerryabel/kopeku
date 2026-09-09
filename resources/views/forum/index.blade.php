@extends('layouts.forum')

@section('title', 'Daftar Forum')

@section('forum-content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
  {{-- Header --}}
  <div class="flex justify-between items-center mb-8">
    <h1 class="text-3xl font-semibold text-[#578E7E]">Forum Diskusi</h1>
    @auth
    <a href="{{ route('forum.create') }}"
      class="bg-[#578E7E] text-white px-5 py-2 rounded-md hover:bg-[#3D3D3D] transition text-sm shadow">
      + Tambah Forum
    </a>
    @endauth
  </div>

  {{-- Flash Message --}}
  @if(session('success'))
  <div class="mb-6 bg-green-50 border border-green-300 text-green-800 px-4 py-3 rounded-md text-sm">
    {{ session('success') }}
  </div>
  @endif

  {{-- Forum List --}}
  @if($forums->count())
  <div class="space-y-8">
    @foreach($forums as $forum)
    <div class="relative bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-lg transition p-6 group">
      <a href="{{ route('forum.show', $forum) }}">
        {{-- Header with Profile and Post Info --}}
        <div class="mb-6 flex items-center space-x-4">
          {{-- Avatar --}}
          @if($forum->user->avatar)
          <img src="{{ asset('storage/' . $forum->user->avatar) }}"
            alt="{{ $forum->user->name }}"
            class="w-14 h-14 rounded-full object-cover shadow-sm border border-gray-300" />
          @else
          <div
            class="w-14 h-14 rounded-full bg-gray-200 border border-gray-300 flex items-center justify-center text-gray-600 font-semibold uppercase shadow-sm">
            {{ substr($forum->user->name, 0, 1) }}
          </div>
          @endif

          {{-- Nama dan waktu post --}}
          <div class="flex flex-col">
            <span class="font-semibold text-[#578E7E] text-lg">{{ $forum->user->name }}</span>
            <span class="text-xs text-gray-500">{{ $forum->created_at->diffForHumans() }}</span>
          </div>
        </div>

        {{-- Title --}}
        <a href="{{ route('forum.show', $forum) }}"
          class="text-xl font-semibold text-[#3D3D3D] hover:text-[#578E7E] block truncate mb-2">
          {{ $forum->title }}
        </a>

        {{-- Content --}}
        <a href="{{ route('forum.show', $forum) }}">
          <p class="text-gray-700 text-sm line-clamp-4 mb-5">{!! nl2br(e($forum->content)) !!}</p>
        </a>

        {{-- Image (di bawah konten) --}}
        @if($forum->images && count($forum->images))
        <a href="{{ route('forum.show', $forum) }}">
          <div class="relative">
            <img src="{{ asset('storage/' . $forum->images[0]->image_path) }}"
              alt="Gambar forum"
              class="w-full max-h-[280px] object-contain rounded-md shadow-sm border border-gray-200">
            @if(count($forum->images) > 1)
            <div
              class="absolute top-4 right-6 bg-black/60 text-white text-xs px-3 py-1 rounded-full backdrop-blur-sm shadow">
              +{{ count($forum->images) - 1 }} gambar lain
            </div>
            @endif
          </div>
          @endif
        </a>

      </a>

      {{-- Dropdown tombol opsi --}}
      @auth
      @if(Auth::id() === $forum->user_id || auth()->user()->role === 'admin')
      <div class="absolute top-4 right-4">
        <button onclick="toggleDropdown({{ $forum->id }})"
          class="text-gray-500 hover:text-gray-800 text-xl focus:outline-none" aria-label="Menu opsi">
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
    </div>
    @endforeach
  </div>

  {{-- Pagination --}}
  <div class="mt-10">
    {{ $forums->links() }}
  </div>
  @else
  <div class="text-center text-gray-500 italic mt-20 text-lg">
    Belum ada forum yang diposting.
  </div>
  @endif
</div>

{{-- Dropdown Script --}}
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

{{-- Style Clamp --}}
<style>
  .line-clamp-4 {
    display: -webkit-box;
    -webkit-line-clamp: 4;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }
</style>
@endsection