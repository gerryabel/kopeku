@extends('layouts.adoptions')

@section('title', 'Adopsi Kucing')

@section('adoptions-content')
<div class="max-w-6xl mx-auto px-4 py-8">
    @if (session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded shadow">
        {{ session('success') }}
    </div>
    @endif

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-3">
        <h1 class="text-3xl font-semibold text-[#578E7E]">Daftar Kucing untuk Diadopsi</h1>
        @auth
        @if (auth()->user()->role !== 'admin')
        <div class="flex flex-wrap gap-3">
            <a href="{{ route('adoptions.catsubmission.create') }}"
                class="bg-green-700 text-white px-4 py-2 rounded-lg shadow hover:bg-green-600 transition">
                + Ajukan Kucing Baru
            </a>
            <a href="{{ route('adoptions.catsubmission.index') }}"
                class="bg-[#578E7E] text-white px-4 py-2 rounded-lg shadow hover:bg-[#476e63] transition">
                Lihat Pengajuan
            </a>
        </div>
        @endif
        @endauth
    </div>

    @if ($cats->count() > 0)
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($cats as $cat)
        <div onclick="window.location='{{ route('adoptions.show', $cat->id) }}'"
            class="group cursor-pointer bg-white border border-gray-200 rounded-xl overflow-hidden shadow hover:shadow-xl hover:scale-105 transform transition duration-300">

            {{-- Gambar --}}
            <div class="relative w-full h-48 bg-gray-100 flex items-center justify-center overflow-hidden">
                @if ($cat->images->isNotEmpty())
                <img src="{{ asset('storage/' . $cat->images->first()->image_path) }}"
                    class="w-full h-48 object-contain transition-transform duration-300 group-hover:scale-110">
                @php $extraImages = $cat->images->count() - 1; @endphp
                @if ($extraImages > 0)
                <div class="absolute top-2 right-2 bg-[#578E7E] text-white text-xs font-semibold px-2 py-0.5 rounded-full shadow-lg select-none">
                    +{{ $extraImages }}
                </div>
                @endif
                @else
                <div class="w-full h-48 flex items-center justify-center text-gray-400 text-sm">
                    Tidak Ada Gambar
                </div>
                @endif
            </div>

            {{-- Konten --}}
            <div class="p-4">
                <div class="flex justify-between items-center mb-1">
                    <h2 class="text-lg font-bold text-[#3D3D3D] group-hover:text-[#578E7E] transition-colors duration-300">
                        {{ $cat->name }}
                    </h2>
                    @if (!$cat->is_available_for_adoption)
                    <span class="text-xs bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full">Tidak Tersedia</span>
                    @else
                    <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded-full">Tersedia</span>
                    @endif
                </div>

                @if ($cat->breed)
                <span class="inline-block text-xs bg-purple-100 text-purple-800 px-2 py-1 rounded-full mb-2">
                    🐱 {{ $cat->breed->name }}
                </span>
                @endif

                <p class="text-sm text-gray-600 mb-2 flex flex-wrap gap-x-2 items-center">
                    @if ($cat->gender === 'male')
                    <span class="flex items-center gap-1"><span class="text-blue-600">♂</span> Jantan</span>
                    @elseif ($cat->gender === 'female')
                    <span class="flex items-center gap-1"><span class="text-pink-500">♀</span> Betina</span>
                    @else
                    <span>{{ ucfirst($cat->gender) }}</span>
                    @endif

                    • <span class="flex items-center gap-1"><span>🐾</span>{{ $cat->age }} Bulan</span>

                    @if ($cat->address)
                    • <span class="flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1 1 0 01-1.414 0L6.343 16.657a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg> {{ $cat->address->address }}
                    </span>
                    @endif
                </p>

                <hr>

                @if (!empty($cat->description))
                <p class="text-md text-gray-700 mt-2 mb-4 line-clamp-3">
                    {{ Str::limit($cat->description, 100) }}
                </p>
                @endif

                {{-- Tombol di dalam card --}}
                @auth
                @if (auth()->user()->role === 'admin')
                <p class="text-sm text-yellow-700 text-center">Akun admin tidak bisa mengajukan adopsi.</p>
                @elseif (in_array($cat->id, $userCats))
                <p class="text-sm text-yellow-700 text-center">Ini adalah kucingmu sendiri, kamu tidak bisa mengajukan adopsi untuk kucing ini.</p>
                @elseif (!$cat->is_available_for_adoption)
                <p class="text-sm text-yellow-700 text-center">Kucing ini tidak tersedia.</p>
                @else
                <a href="{{ route('adoptions.create', $cat->id) }}"
                    onclick="event.stopPropagation()" {{-- agar tidak ikut klik card --}}
                    class="block bg-[#578E7E] text-white text-sm px-4 py-2 rounded hover:bg-[#476e63] text-center mt-2">
                    {{ in_array($cat->id, $adoptionStatus) ? 'Ajukan Adopsi Lagi' : 'Ajukan Adopsi' }}
                </a>
                @if(in_array($cat->id, $adoptionStatus))
                <p class="text-xs text-yellow-700 text-center">Kamu sudah mengajukan permintaan adopsi sebelumnya. Jika kamu ingin memperbarui atau mengajukan ulang, kamu bisa klik tombol di atas.</p>
                @endif
                @endif
                @else
                <a href="{{ route('login') }}"
                    onclick="event.stopPropagation()"
                    class="block bg-[#578E7E] text-white text-sm px-4 py-2 rounded hover:bg-[#476e63] text-center mt-2">
                    Login untuk Ajukan Adopsi
                </a>
                @endauth
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-10">
        {{ $cats->links() }}
    </div>
    @else
    <div class="text-center text-gray-600 mt-10">
        <p class="text-lg">Belum ada kucing yang tersedia untuk diadopsi saat ini 😿</p>
    </div>
    @endif
</div>
@endsection