@extends('layouts.catsubmission')

@section('title', 'Ajukan Adopsi')

@section('catsubmission-content')
<div class="max-w-2xl mx-auto mt-10 p-6 bg-white rounded-2xl shadow-md border border-gray-200">
    {{-- Notifikasi Error --}}
    @if (session('error'))
    <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-800 rounded">
        {{ session('error') }}
    </div>
    @endif

    {{-- Judul --}}
    <h2 class="text-2xl font-bold text-[#578E7E] mb-6">🐾 Formulir Adopsi Kucing</h2>

    {{-- Formulir --}}
    <form method="POST" action="{{ route('adoptions.store', $cat->id) }}" class="space-y-5">
        @csrf

        {{-- Alasan Adopsi --}}
        <div>
            <label for="message" class="block text-sm font-medium text-gray-700 mb-1">
                Alasan Mengadopsi
            </label>
            <textarea name="message" id="message" rows="5"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#A8C3A5] focus:border-transparent resize-none"
                placeholder="Apa alasan mu ingin mengadopsi kucing ini...."
                required>{{ old('message') }}</textarea>

            {{-- Contoh alasan --}}
            <p class="mt-2 text-sm text-gray-500">
                Contoh alasan:
                <br>
                <em>
                    “Saya sudah lama ingin memelihara kucing dan kini saya sudah siap secara waktu, finansial, dan lingkungan.
                    Rumah saya memiliki area yang cukup luas dan aman untuk kucing bermain, serta tidak ada hewan peliharaan lain yang dapat membahayakan.
                    Saya juga memiliki kandang dan perlengkapan dasar seperti tempat makan, litter box, dan mainan.
                    Dengan kondisi ini, saya yakin bisa memberikan rumah yang nyaman dan penuh kasih sayang untuk kucing ini.”
                </em>
            </p>
        </div>

        {{-- Tombol Aksi --}}
        <div class="flex justify-between items-center pt-4 border-t border-gray-100">
            <a href="{{ route('adoptions.index') }}"
                class="text-sm text-gray-500 hover:underline transition">← Kembali</a>
            <button type="submit"
                class="bg-[#578E7E] text-white font-medium px-6 py-2 rounded hover:bg-[#3D3D3D] transition">
                Kirim Pengajuan
            </button>
        </div>
    </form>
</div>
@endsection