@extends('layouts.admin')

@section('title', 'Detail Kucing')

@section('content')
<div class="max-w-5xl mx-auto p-6 bg-white rounded-2xl shadow-lg space-y-8">

    <h1 class="text-3xl font-bold text-gray-800">Detail Kucing</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <div class="bg-gray-50 rounded-xl p-5 shadow-inner space-y-3">
            <h2 class="text-xl font-semibold text-gray-700">Informasi Kucing</h2>
            <p><span class="font-medium">Nama:</span> {{ $cat->name }}</p>
            <p><span class="font-medium">Umur:</span> {{ $cat->age ?? '-' }} tahun</p>
            <p><span class="font-medium">Jenis Kelamin:</span>
                {{ $cat->gender === 'male' ? 'Jantan' : ($cat->gender === 'female' ? 'Betina' : '-') }}
            </p>
            <p><span class="font-medium">Jenis Kucing:</span> {{ $cat->breed->name ?? '-' }}</p>
            <p>
                <span class="font-medium">Status Adopsi:</span>
                <span class="inline-block px-2 py-1 text-sm rounded 
                    {{ $cat->is_available_for_adoption ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                    {{ $cat->is_available_for_adoption ? 'Tersedia' : 'Tidak Tersedia' }}
                </span>
            </p>
        </div>

        <div class="bg-gray-50 rounded-xl p-5 shadow-inner space-y-3">
            <h2 class="text-xl font-semibold text-gray-700">Informasi Pemilik</h2>
            <p><span class="font-medium">Nama Pemilik:</span> {{ $cat->owner_name ?? '-' }}</p>
            <p><span class="font-medium">Kontak Pemilik:</span> {{ $cat->owner_contact ?? '-' }}</p>
            <p><span class="font-medium">Alamat:</span> {{ $cat->address->address ?? '-' }}</p>
            @if ($cat->google_maps_link)
            <p>
                <span class="font-medium">Google Maps:</span>
                <a href="{{ $cat->google_maps_link }}" class="text-blue-600 underline" target="_blank">
                    Lihat Lokasi
                </a>
            </p>
            @endif
        </div>
    </div>

    <div class="bg-gray-50 rounded-xl p-5 shadow-inner">
        <h2 class="text-xl font-semibold text-gray-700 mb-2">Deskripsi</h2>
        <p class="text-gray-700 leading-relaxed">{{ $cat->description ?? '-' }}</p>
    </div>

    <div class="bg-gray-50 rounded-xl p-5 shadow-inner">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Gambar</h2>
        @if ($cat->images->isNotEmpty())
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach($cat->images as $image)
            <div class="overflow-hidden rounded-xl shadow">
                <img src="{{ asset('storage/' . $image->image_path) }}" alt="Gambar Kucing"
                    class="w-full h-40 object-cover">
            </div>
            @endforeach
        </div>
        @else
        <p class="italic text-gray-500">Tidak ada gambar tersedia.</p>
        @endif
    </div>

    <div class="flex justify-end gap-4 mt-6">
        <a href="{{ route('admin.adoptions.index', ['active_tab' => 'cat']) }}"
            class="inline-flex items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 text-sm font-medium rounded-lg transition">
            ← Kembali
        </a>
        <a href="{{ route('admin.adoptions.cats.edit', $cat->id) }}"
            class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition">
            ✏️ Edit
        </a>
    </div>

</div>
@endsection
