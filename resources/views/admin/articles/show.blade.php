@extends('layouts.admin') {{-- Ganti dengan layout kamu jika berbeda --}}

@section('title', 'Detail Artikel')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md">
    {{-- Tombol Kembali --}}
    <div class="mb-4">
        <a href="{{ route('admin.articles.index') }}"
            class="text-sm text-[#578E7E] hover:text-[#3D3D3D] underline">&larr; Kembali ke daftar artikel</a>
    </div>

    {{-- Judul --}}
    <h1 class="text-2xl font-bold text-[#3D3D3D] mb-2">{{ $article->title }}</h1>

    {{-- Info --}}
    <div class="text-sm text-gray-500 mb-4">
        <span>Kategori: {{ $article->category->name ?? '-' }}</span> •
        <span>Penulis: {{ $article->admin->name ?? 'Admin' }}</span> •
        <span>{{ $article->created_at->format('d M Y') }}</span>
    </div>

    {{-- Gambar --}}
    @if($article->image)
    <img src="{{ asset('storage/' . $article->image) }}" alt="Gambar Artikel"
        class="w-full max-h-[400px] object-cover rounded mb-6">
    @endif

    {{-- Konten --}}
    <div class="prose max-w-none text-gray-800">
        {!! nl2br(e($article->content)) !!}
    </div>
</div>
@endsection
