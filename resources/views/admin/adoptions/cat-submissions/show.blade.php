@extends('layouts.admin')

@section('title', 'Detail Pengajuan Kucing')

@section('content')
<div class="max-w-5xl mx-auto p-6 bg-white rounded-2xl shadow-lg space-y-8">

    <h1 class="text-3xl font-bold text-gray-800">Detail Pengajuan Kucing</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <div class="bg-gray-50 rounded-xl p-5 shadow-inner space-y-3">
            <h2 class="text-xl font-semibold text-gray-700">Informasi Kucing</h2>
            <p><span class="font-medium">Nama:</span> {{ $submission->name }}</p>
            <p><span class="font-medium">Umur:</span> {{ $submission->age ?? '-' }} tahun</p>
            <p><span class="font-medium">Jenis Kelamin:</span>
                {{ $submission->gender === 'male' ? 'Jantan' : ($submission->gender === 'female' ? 'Betina' : '-') }}
            </p>
            <p><span class="font-medium">Jenis Kucing:</span> {{ $submission->breed->name ?? '-' }}</p>
            <p>
                <span class="font-medium">Status:</span>
                <span class="inline-block px-2 py-1 text-sm rounded 
                    {{ 
                        $submission->status === 'approved' ? 'bg-green-100 text-green-800' : 
                        ($submission->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') 
                    }}">
                    {{ ucfirst($submission->status) }}
                </span>
            </p>
        </div>

        <div class="bg-gray-50 rounded-xl p-5 shadow-inner space-y-3">
            <h2 class="text-xl font-semibold text-gray-700">Informasi Pengaju & Pemilik</h2>
            <p><span class="font-medium">Nama Pengaju:</span> {{ $submission->user->name }}</p>
            <p><span class="font-medium">Nama Pemilik:</span> {{ $submission->owner_name ?? '-' }}</p>
            <p><span class="font-medium">Kontak Pemilik:</span> {{ $submission->owner_contact ?? '-' }}</p>
            <p><span class="font-medium">Alamat:</span> {{ $submission->address->address ?? '-' }}</p>
            @if ($submission->google_maps_link)
            <p>
                <span class="font-medium">Google Maps:</span>
                <a href="{{ $submission->google_maps_link }}" class="text-blue-600 underline" target="_blank">
                    Lihat Lokasi
                </a>
            </p>
            @endif
        </div>
    </div>

    <div class="bg-gray-50 rounded-xl p-5 shadow-inner">
        <h2 class="text-xl font-semibold text-gray-700 mb-2">Deskripsi</h2>
        <p class="text-gray-700 leading-relaxed">{{ $submission->description ?? '-' }}</p>
    </div>

    <div class="bg-gray-50 rounded-xl p-5 shadow-inner">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Gambar</h2>
        @if ($submission->images->isNotEmpty())
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach($submission->images as $image)
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

    <div class="flex justify-end mt-6">
        <a href="{{ route('admin.adoptions.index', ['active_tab' => 'submission']) }}"
            class="inline-flex items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 text-sm font-medium rounded-lg transition">
            ← Kembali
        </a>
    </div>

</div>
@endsection