@extends('layouts.catsubmission')

@section('title', 'Edit Pengajuan Adopsi')

@section('catsubmission-content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded-xl shadow">
    <h2 class="text-xl font-semibold text-[#578E7E] mb-4">Edit Pengajuan Adopsi</h2>

    <div class="mb-4">
        <p><strong>Nama Kucing:</strong> {{ $cat->name }}</p>
        <p><strong>Umur:</strong> {{ $cat->age }} bulan</p>
    </div>

    <form action="{{ route('adoptions.update', $adoption->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="message" class="block text-sm font-medium text-gray-700 mb-1">
                Alasan Mengadopsi
            </label>
            <textarea name="message" id="message" rows="5"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#A8C3A5] focus:border-transparent resize-none"
                placeholder="Contoh: Saya ingin mengadopsi kucing ini karena saya pecinta hewan dan ingin memberi rumah yang aman dan penuh kasih."
                required>{{ old('message', $adoption->message) }}</textarea>

            {{-- Contoh alasan --}}
            <p class="mt-2 text-sm text-gray-500">
                Contoh alasan:
                <br>
                <em>
                    “Saya sudah lama ingin memelihara kucing dan kini saya sudah siap secara waktu, finansial, dan lingkungan.
                    Saya ingin memberikan rumah yang aman dan penuh kasih untuk kucing ini karena saya percaya semua makhluk hidup pantas mendapatkan perhatian.”
                </em>
            </p>
        </div>

        <div class="flex justify-between items-center">
            <a href="{{ route('adoptions.index') }}" class="text-sm text-gray-600 hover:underline">
                ← Kembali
            </a>

            <button type="submit"
                class="bg-[#578E7E] text-white px-5 py-2 rounded hover:bg-[#3D3D3D] transition">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
