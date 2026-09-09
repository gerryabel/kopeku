@extends('layouts.article')

@section('title', 'Artikel')

@section('article-content')
<div class="max-w-6xl mx-auto px-6 py-10">
    <h1 class="text-3xl font-semibold mb-10 text-[#578E7E] tracking-wide">Daftar Artikel</h1>

    <div class="grid md:grid-cols-3 gap-8">
        @if ($articles->isEmpty())
        <p class="text-center text-gray-500 col-span-full mt-12 text-lg italic">Maaf, belum ada artikel yang tersedia.</p>
        @else
        @foreach ($articles as $article)
        <a href="{{ route('articles.show', $article->slug) }}"
            class="bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 ease-in-out overflow-hidden flex flex-col">
            @if($article->image)
            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}"
                class="w-full h-48 object-cover rounded-t-xl">
            @else
            <div class="w-full h-48 bg-gray-100 flex items-center justify-center text-gray-400 text-lg font-light rounded-t-xl">No Image</div>
            @endif
            <div class="p-5 flex-1 flex flex-col">
                <h2 class="text-[#3D3D3D] font-semibold text-2xl mb-3 leading-snug hover:text-[#467c70] transition-colors duration-200">
                    {{ $article->title }}
                </h2>
                {{-- Kategori --}}
                @if($article->category)
                <div class="text-sm text-[#578E7E] font-medium mb-3">
                    Kategori: <span class="italic">{{ $article->category->name }}</span>
                </div>
                @endif
                {{-- Waktu posting --}}
                <div class="text-xs text-gray-500 mb-3">
                    {{ $article->created_at->diffForHumans() }}
                </div>
                <p class="text-gray-600 text-sm line-clamp-4 flex-grow leading-relaxed">
                    {{ Str::limit(strip_tags($article->content), 180) }}
                </p>
                <div class="mt-4 text-right">
                    <span class="text-[#578E7E] font-medium text-sm hover:underline">Baca selengkapnya →</span>
                </div>
            </div>
        </a>
        @endforeach
        @endif
    </div>

    <div class="mt-12 flex justify-center">
        {{ $articles->links() }}
    </div>
</div>
@endsection