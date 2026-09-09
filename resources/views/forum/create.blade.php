@extends('layouts.forum')

@section('title', 'Buat Forum Baru')

@section('forum-content')
<div class="max-w-2xl mx-auto bg-white border border-gray-200 rounded-xl shadow-md p-8">
  <h1 class="text-2xl font-bold text-[#578E7E] mb-6">Buat Forum Baru</h1>

  <form action="{{ route('forum.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf

    {{-- Judul --}}
    <div>
      <label for="title" class="block text-sm font-medium text-gray-700 mb-1">
        Judul Forum <span class="text-red-600">*</span>
      </label>
      <input
        type="text"
        name="title"
        id="title"
        value="{{ old('title') }}"
        required
        placeholder="Contoh: Bagaimana cara merawat anak kucing baru lahir?"
        class="w-full text-sm border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#578E7E] focus:border-transparent shadow-sm" />
      @error('title')
      <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
      @enderror
    </div>

    {{-- Konten --}}
    <div>
      <label for="content" class="block text-sm font-medium text-gray-700 mb-1">
        Isi Forum <span class="text-red-600">*</span>
      </label>
      <textarea
        name="content"
        id="content"
        rows="6"
        required
        placeholder="Tulis isi forum secara lengkap agar mudah dipahami anggota lain..."
        class="w-full text-sm border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#578E7E] focus:border-transparent shadow-sm resize-y">{{ old('content') }}</textarea>
      @error('content')
      <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
      @enderror
    </div>

    {{-- Upload Gambar --}}
    <div>
      <label for="images" class="block text-sm font-medium text-gray-700 mb-1">
        Upload Gambar (opsional)
      </label>
      <p class="text-xs text-gray-500 mb-2">Kamu bisa memilih beberapa gambar sekaligus (maksimal 2MB per gambar).</p>

      <label
        for="images"
        class="flex items-center justify-center w-full px-4 py-10 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer hover:border-[#578E7E] transition text-center">
        <div>
          <svg class="mx-auto h-10 w-10 text-[#578E7E]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M3 15a4 4 0 014-4h.28a2 2 0 011.416.586l2.828 2.828a2 2 0 002.828 0l3.536-3.536a2 2 0 012.828 0L21 13M16 16v6M8 16v6M12 4v4m0 0a4 4 0 014 4H8a4 4 0 014-4z" />
          </svg>
          <p class="mt-2 text-sm text-gray-600">
            <span class="font-medium text-[#578E7E]">Klik untuk unggah gambar.</span>
          </p>
          <p class="text-xs text-gray-400">Format: JPG, PNG, JPEG</p>
        </div>
      </label>
      <input
        type="file"
        name="images[]"
        id="images"
        accept="image/*"
        multiple
        class="hidden" />
      @error('images.*')
      <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
      @enderror

      {{-- Preview (optional, aktifkan dengan JS di bawah) --}}
      <div id="preview-images" class="grid grid-cols-2 sm:grid-cols-3 gap-3 mt-4 hidden"></div>
    </div>

    {{-- Tombol --}}
    <div class="flex justify-between items-center pt-2">
      <a href="{{ route('forum.index') }}" class="text-sm text-gray-600 hover:underline">
        ← Kembali
      </a>
      <button
        type="submit"
        class="bg-[#578E7E] hover:bg-[#3D3D3D] text-white text-sm font-medium px-6 py-2 rounded-lg transition shadow-sm">
        Buat Forum
      </button>
    </div>
  </form>
</div>

<script>
  document.getElementById('images').addEventListener('change', function(event) {
    const container = document.getElementById('preview-images');
    container.innerHTML = '';
    container.classList.toggle('hidden', this.files.length === 0);

    Array.from(this.files).forEach(file => {
      if (file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function(e) {
          const img = document.createElement('img');
          img.src = e.target.result;
          img.className = 'w-full h-32 object-cover rounded border shadow-sm';
          container.appendChild(img);
        };
        reader.readAsDataURL(file);
      }
    });
  });
</script>
@endsection