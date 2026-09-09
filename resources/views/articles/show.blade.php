@extends('layouts.article')

@section('title', $article->title)

@section('article-content')
<div class="max-w-3xl mx-auto px-4 py-12 text-gray-800 bg-white rounded-xl py-8 px-8 shadow-lg">

    {{-- Gambar di atas judul --}}
    @if($article->image)
    <div class="mb-8 overflow-hidden">
        <img src="{{ asset('storage/' . $article->image) }}"
            alt="{{ $article->title }}"
            class="w-full max-h-[400px] object-contain">
    </div>
    @endif

    {{-- Judul Artikel --}}
    <h1 class="text-5xl font-bold mb-6 text-[#3D3D3D] leading-tight">
        {{ $article->title }}
    </h1>

    {{-- Kategori --}}
    @if($article->category)
    <div class="text-sm text-[#578E7E] font-medium mb-6">
        Kategori: <span class="italic">{{ $article->category->name }}</span>
    </div>
    @endif

    {{-- Info Penulis dan Waktu --}}
    <div class="flex items-center gap-4 mb-8">
        {{-- Avatar --}}
        @if($article->admin && $article->admin->avatar)
        <img src="{{ asset('storage/' . $article->admin->avatar) }}"
            alt="{{ $article->admin->name }}"
            class="w-14 h-14 rounded-full object-cover shadow-sm border border-gray-300" />
        @else
        <div
            class="w-14 h-14 rounded-full bg-gray-200 border border-gray-300 flex items-center justify-center text-gray-600 font-semibold uppercase shadow-sm">
            {{ strtoupper(substr($article->admin->name ?? 'U', 0, 1)) }}
        </div>
        @endif

        {{-- Nama dan Waktu Posting --}}
        <div class="flex flex-col">
            <span class="font-semibold text-[#578E7E] text-lg">{{ $article->admin->name ?? 'Unknown' }}</span>
            <span class="text-xs text-gray-500">Diposting {{ $article->created_at->translatedFormat('d F Y') }}</span>
        </div>
    </div>

    {{-- Konten --}}
    <article class="prose prose-lg prose-gray max-w-none text-justify leading-relaxed">
        {!! nl2br(e($article->content)) !!}
    </article>

    {{-- Tombol kembali --}}
    <div class="mt-12">
        <a href="{{ route('articles.index') }}"
            class="inline-block text-[#578E7E] font-semibold hover:underline transition">
            &larr; Kembali ke daftar artikel
        </a>
    </div>
</div>
@endsection