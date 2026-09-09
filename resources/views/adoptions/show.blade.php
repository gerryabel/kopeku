@extends('layouts.catdetail')

@section('title', 'Detail Kucing')

@section('catdetail-content')
<div class="max-w-5xl mx-auto px-4 py-8">
    <div class="bg-white rounded-xl shadow-md overflow-hidden grid grid-cols-1 md:grid-cols-2 gap-6">
        {{-- Slider Gambar Kucing (kiri) --}}
        @if ($cat->images->isNotEmpty())
        <div id="cat-slider" class="relative bg-gray-900 rounded-tl-xl rounded-bl-xl overflow-hidden select-none max-h-[500px]">
            <div class="overflow-hidden h-full">
                @foreach ($cat->images as $index => $img)
                <img
                    src="{{ asset('storage/' . $img->image_path) }}"
                    alt="Foto {{ $cat->name }}"
                    class="w-full h-[500px] bg-gray-100 object-contain mx-auto"
                    style="{{ $index === 0 ? '' : 'display:none;' }}"
                    data-index="{{ $index }}">
                @endforeach
            </div>

            {{-- Panah Kiri --}}
            <button
                id="prev-btn"
                class="absolute top-1/2 left-2 transform -translate-y-1/2 bg-black bg-opacity-40 rounded-full p-2 hover:bg-opacity-70 transition text-white"
                aria-label="Gambar sebelumnya">
                &#10094;
            </button>

            {{-- Panah Kanan --}}
            <button
                id="next-btn"
                class="absolute top-1/2 right-2 transform -translate-y-1/2 bg-black bg-opacity-40 rounded-full p-2 hover:bg-opacity-70 transition text-white"
                aria-label="Gambar selanjutnya">
                &#10095;
            </button>

            {{-- Indikator Dot --}}
            <div id="dots" class="absolute bottom-3 left-1/2 transform -translate-x-1/2 flex space-x-2">
                @foreach ($cat->images as $index => $img)
                <button
                    class="w-3 h-3 rounded-full focus:outline-none {{ $index === 0 ? 'bg-[#578E7E]' : 'bg-gray-400' }}"
                    aria-label="Gambar ke-{{ $index + 1 }}"
                    data-index="{{ $index }}"
                    type="button"></button>
                @endforeach
            </div>
        </div>
        @else
        <div class="w-full h-[500px] bg-gray-200 flex items-center justify-center text-gray-400 text-sm rounded-tl-xl rounded-bl-xl">
            Tidak ada foto
        </div>
        @endif

        {{-- Informasi Kucing (kanan) --}}
        <div class="p-6 flex flex-col justify-between h-full min-h-[500px]"> {{-- Atur min-height sesuai kebutuhan --}}
            {{-- Bagian atas: Tombol kembali + info kucing --}}
            <div>
                <div class="flex justify-between items-center mb-4">
                    <a href="{{ route('adoptions.index') }}" class="text-sm text-gray-600 hover:underline">← Kembali</a>
                </div>

                <h1 class="text-3xl font-bold text-[#578E7E] mb-4">{{ $cat->name }}</h1>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-gray-700 text-sm sm:text-base">
                    <div class="space-y-2">
                        <p><strong>🐾 Umur:</strong> {{ $cat->age }} bulan</p>
                        {{-- Gender --}}
                        @if ($cat->gender === 'male')
                        <span class="flex items-center gap-1"><span class="text-blue-600">⚥ </span><strong>Jenis Kelamin:</strong> Jantan</span>
                        @elseif ($cat->gender === 'female')
                        <span class="flex items-center gap-1"><span class="text-pink-500">⚥ </span><strong>Jenis Kelamin:</strong> Betina</span>
                        @else
                        <span>{{ ucfirst($cat->gender) }}</span>
                        @endif
                        <p><strong>🐱 Ras:</strong> {{ $cat->breed->name ?? '-' }}</p>
                    </div>
                    <div class="space-y-2">
                        <p><strong>👤 Pemilik:</strong> {{ $cat->owner_name ?? '-' }}</p>
                        <p><strong>📍 Lokasi:</strong>
                            @php
                            $location = $cat->address ? \Illuminate\Support\Str::words(strip_tags($cat->address->address), 3, '...') : '-';
                            @endphp
                            {{ $location }}
                        </p>
                        <p><strong>📋 Status Adopsi:</strong>
                            @if (!$cat->is_available_for_adoption)
                            <span class="text-yellow-700 font-semibold">Tidak Tersedia</span>
                            @else
                            <span class="text-green-700 font-semibold">Tersedia</span>
                            @endif
                        </p>
                    </div>
                </div>

                @if (!empty($cat->description))
                <div class="mt-6 text-gray-800 text-sm sm:text-base leading-relaxed">
                    <h2 class="text-lg font-semibold mb-2 border-b border-gray-300 pb-1">Deskripsi</h2>
                    <p>{{ $cat->description }}</p>
                </div>
                @endif
            </div>

            {{-- Bagian bawah: Tombol ajukan adopsi / info status --}}
            <div class="mt-8">
                @auth
                @if (auth()->user()->role !== 'admin')
                @php
                $approvedAdoption = $cat->adoptions()->where('status', 'approved')->first();
                @endphp

                @if ($isUserCat)
                <p class="text-center text-red-700 bg-red-100 p-3 rounded font-semibold text-sm sm:text-base">
                    🚫 Ini kucing yang kamu sendiri. Kamu tidak bisa mengadopsi kucing milikmu.
                </p>
                @elseif ($approvedAdoption)
                <p class="text-center text-yellow-800 bg-yellow-100 p-3 rounded font-semibold text-sm sm:text-base">
                    🐾 Kucing ini sudah diadopsi.
                </p>
                @elseif (!$cat->is_available_for_adoption)
                <p class="text-center text-yellow-700 bg-yellow-100 p-3 rounded font-semibold text-sm sm:text-base">
                    ⚠️ Kucing ini tidak tersedia untuk diadopsi.
                </p>
                @elseif ($hasApplied)
                <div class="text-center">
                    <a href="{{ route('adoptions.create', $cat->id) }}"
                        class="inline-block bg-[#578E7E] text-white px-5 py-2 rounded hover:bg-[#476e63] transition text-sm sm:text-base">
                        Ajukan Adopsi Lagi
                    </a>
                    <p class="text-yellow-700 mb-1 m-5 text-sm sm:text-base">
                        Kamu sudah mengajukan adopsi untuk kucing ini.<br>
                        Mohon tunggu konfirmasi dari admin.
                    </p>
                </div>
                @else
                <form action="{{ route('adoptions.create', $cat->id) }}" method="GET" class="text-center">
                    @csrf
                    <button type="submit"
                        class="bg-[#578E7E] text-white px-8 py-2 rounded-lg hover:bg-[#476e63] transition text-sm sm:text-base">
                        Ajukan Adopsi
                    </button>
                </form>
                @endif
                @endif
                @else
                <p class="text-center text-gray-600 text-sm sm:text-base">
                    <a href="{{ route('login') }}" class="text-[#578E7E] font-semibold hover:underline">
                        Login
                    </a>
                    untuk mengajukan adopsi.
                </p>
                @endauth
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const slider = document.getElementById('cat-slider');
        const images = slider.querySelectorAll('img[data-index]');
        const prevBtn = document.getElementById('prev-btn');
        const nextBtn = document.getElementById('next-btn');
        const dots = slider.querySelectorAll('#dots button');
        let current = 0;

        function showImage(index) {
            images.forEach((img, i) => {
                img.style.display = (i === index) ? 'block' : 'none';
            });
            dots.forEach((dot, i) => {
                if (i === index) {
                    dot.classList.add('bg-[#578E7E]');
                    dot.classList.remove('bg-gray-400');
                } else {
                    dot.classList.remove('bg-[#578E7E]');
                    dot.classList.add('bg-gray-400');
                }
            });
            current = index;
        }

        prevBtn.addEventListener('click', () => {
            let nextIndex = (current === 0) ? images.length - 1 : current - 1;
            showImage(nextIndex);
        });

        nextBtn.addEventListener('click', () => {
            let nextIndex = (current === images.length - 1) ? 0 : current + 1;
            showImage(nextIndex);
        });

        dots.forEach(dot => {
            dot.addEventListener('click', (e) => {
                const index = parseInt(e.target.getAttribute('data-index'));
                showImage(index);
            });
        });
    });
</script>
@endsection