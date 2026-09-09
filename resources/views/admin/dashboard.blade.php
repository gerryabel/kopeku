@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<div class="space-y-8">
    <div>
        <h1 class="text-3xl font-bold text-[#578E7E]">Dashboard Admin</h1>
        <p class="text-sm text-gray-600 mt-1">Selamat datang, {{ auth()->user()->name }}!</p>
    </div>

    <!-- Grid Statistik -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        <!-- Member -->
        <x-admin.stat-card icon="👥" label="Jumlah Member" :value="$memberCount" color="bg-sage" />

        <!-- Galeri -->
        <x-admin.stat-card icon="🖼️" label="Galeri" :value="$galleryCount" color="bg-blush" />

        <!-- Forum -->
        <x-admin.stat-card icon="💬" label="Forum" :value="$forumCount" color="bg-[#D9E4DD]" />

        <!-- Artikel -->
        <x-admin.stat-card icon="📚" label="Artikel" :value="$articleCount" color="bg-[#578E7E] text-white" labelClass="text-white" />

        <!-- Kategori Artikel -->
        <x-admin.stat-card icon="🗂️" label="Kategori Artikel" :value="$categoryCount" color="bg-[#FFD6A5]" />

        <!-- Kucing Adopsi -->
        <x-admin.stat-card icon="🐱" label="Jumlah Kucing" :value="$catCount" color="bg-[#E0BBE4]" />

        <!-- Kota Kucing -->
        <x-admin.stat-card icon="📍" label="Jumlah Alamat Kota" :value="$locationCount" color="bg-[#A0CED9]" />

        <!-- Jenis Kucing -->
        <x-admin.stat-card icon="🧬" label="Jenis Kucing" :value="$breedCount" color="bg-[#F4A261] text-white" />
    </div>

    <!-- Section Status Kucing -->
    <div class="mt-10">
        <h2 class="text-lg font-semibold text-softgray mb-4">📦 Status Pengajuan Kucing</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <x-admin.stat-card icon="⏳" label="Pending" :value="$pendingCatSubmissions" color="bg-gray-100" />
            <x-admin.stat-card icon="✅" label="Disetujui" :value="$approvedCatSubmissions" color="bg-green-100" />
            <x-admin.stat-card icon="❌" label="Ditolak" :value="$rejectedCatSubmissions" color="bg-red-100" />
        </div>
    </div>

    <!-- Section Status Adopsi -->
    <div class="mt-10">
        <h2 class="text-lg font-semibold text-softgray mb-4">📝 Status Pengajuan Adopsi</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <x-admin.stat-card icon="⏳" label="Pending" :value="$pendingAdoptions" color="bg-yellow-100" />
            <x-admin.stat-card icon="✅" label="Disetujui" :value="$approvedAdoptions" color="bg-green-100" />
            <x-admin.stat-card icon="❌" label="Ditolak" :value="$rejectedAdoptions" color="bg-red-100" />
        </div>
    </div>
</div>
@endsection
