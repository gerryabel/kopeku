@extends('layouts.home')

@section('title', 'Beranda')

@section('home-content')

@if(session('success'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
  {{ session('success') }}
</div>
@endif

<!-- Hero Section -->
<section class="relative bg-cover bg-center h-[500px] rounded-lg overflow-hidden mb-16" style="background-image: url('https://cataas.com/cat/says/Hello');">
  <div class="absolute inset-0 bg-sage bg-opacity-70 flex flex-col justify-center items-center text-brown text-center px-4">
    <h2 class="text-5xl font-bold mb-4">Selamat Datang di KOPEKU</h2>
    <p class="text-xl max-w-2xl">Tempat berkumpulnya pecinta kucing. Berbagi, belajar, dan peduli bersama.</p>
    <a href="{{ route('login') }}" class="mt-6 bg-brown text-cream px-6 py-3 rounded-full font-semibold hover:bg-opacity-90 transition">
      Gabung Sekarang
    </a>
  </div>
</section>

<!-- Tentang Kami -->
<section class="py-16 px-6 md:px-16 bg-cream text-brown text-center rounded-lg mb-16 shadow-sm">
  <h3 class="text-3xl font-bold mb-6">Tentang Kami</h3>
  <p class="max-w-3xl mx-auto text-lg leading-relaxed">
    KOPEKU (Komunitas Pecinta Kucing) adalah tempat berkumpulnya para pencinta kucing. Kami hadir sebagai tempat untuk saling berbagi cerita, ilmu terhadap kucing.
    Dengan semangat kolaborasi dan cinta hewan, KOPEKU ingin menciptakan lingkungan yang ramah, edukatif, dan penuh kasih untuk semua kucing dan pecintanya.
  </p>
</section>

<!-- Why Join Section -->
<section class="py-16 px-4 md:px-16 bg-blush rounded-lg mb-16">
  <h3 class="text-3xl font-bold text-center mb-10 text-brown">Kenapa Gabung KOPEKU?</h3>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
    <div class="bg-cream p-6 rounded-xl shadow-md">
      <h4 class="text-xl font-semibold mb-2 text-brown">Teman Sejati</h4>
      <p>Bertemu sesama pecinta kucing dan bangun relasi baru.</p>
    </div>
    <div class="bg-cream p-6 rounded-xl shadow-md">
      <h4 class="text-xl font-semibold mb-2 text-brown">Berbagi Ilmu</h4>
      <p>Diskusi, tips, dan artikel menarik tentang dunia kucing.</p>
    </div>
    <div class="bg-cream p-6 rounded-xl shadow-md">
      <h4 class="text-xl font-semibold mb-2 text-brown">Bantu Adopsi</h4>
      <p>Saling bantu mencarikan rumah untuk kucing terlantar.</p>
    </div>
  </div>
</section>

<!-- Fitur Komunitas -->
<section class="py-16 px-6 bg-cream text-brown rounded-lg shadow-sm">
  <h3 class="text-3xl font-bold text-center mb-10">Fitur KOPEKU</h3>
  <div class="grid grid-cols-1 md:grid-cols-4 gap-6 text-center">
    <div class="bg-white p-6 rounded-xl shadow">
      <h4 class="text-xl font-semibold mb-2">Galeri Kucing</h4>
      <p>Unggah foto kucingmu dan lihat kucing-kucing lucu dari anggota lain.</p>
    </div>
    <div class="bg-white p-6 rounded-xl shadow">
      <h4 class="text-xl font-semibold mb-2">Forum Diskusi</h4>
      <p>Berbagi pengalaman, tanya jawab, dan berdiskusi dengan anggota lainnya.</p>
    </div>
    <div class="bg-white p-6 rounded-xl shadow">
      <h4 class="text-xl font-semibold mb-2">Artikel Edukatif</h4>
      <p>Baca artikel bermanfaat tentang perawatan, kesehatan, dan perilaku kucing.</p>
    </div>
    <div class="bg-white p-6 rounded-xl shadow">
      <h4 class="text-xl font-semibold mb-2">Fitur Adopsi</h4>
      <p>Cari atau tawarkan adopsi kucing untuk membantu mereka mendapatkan rumah baru.</p>
    </div>
  </div>
</section>

<!-- CTA Akhir -->
<section class="bg-sage text-brown py-12 text-center rounded-lg mt-16">
  <h3 class="text-2xl font-bold mb-4">Yuk, Jadi Bagian dari KOPEKU</h3>
  <p class="mb-6">Gabung sekarang dan tunjukkan cinta kamu pada kucing!</p>
  <a href="{{ route('register') }}" class="bg-brown text-cream px-6 py-3 rounded-full font-semibold hover:bg-opacity-90 transition">Daftar Sekarang</a>
</section>
@endsection