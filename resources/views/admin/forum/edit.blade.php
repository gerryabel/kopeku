@extends('layouts.admin')

@section('title', 'Edit Forum')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white p-8 rounded-xl shadow-md">
    <h1 class="text-2xl font-bold mb-6 text-[#578E7E]">Edit Forum</h1>

    <form action="{{ route('admin.forum.update', $forum) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        {{-- Judul --}}
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul Forum <span class="text-red-600">*</span></label>
            <input
                type="text"
                name="title"
                id="title"
                value="{{ old('title', $forum->title) }}"
                required
                class="w-full text-sm border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#578E7E] focus:border-transparent"
                placeholder="Judul forum kamu..." />
            @error('title')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Konten --}}
        <div>
            <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Isi Forum <span class="text-red-600">*</span></label>
            <textarea
                name="content"
                id="content"
                rows="6"
                required
                class="w-full text-sm border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#578E7E] focus:border-transparent"
                placeholder="Tulis penjelasan atau pertanyaanmu di sini...">{{ old('content', $forum->content) }}</textarea>
            @error('content')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Gambar yang sudah ada --}}
        @if($forum->images && $forum->images->count())
        <div>
            <p class="block text-sm font-medium text-gray-700 mb-2">Gambar Saat Ini:</p>
            <div class="grid grid-cols-3 gap-4">
                @foreach($forum->images as $image)
                <div class="relative group bg-gray-50 rounded-lg overflow-hidden border">
                    <img src="{{ asset('storage/' . $image->image_path) }}"
                        alt="Forum Image"
                        class="w-full h-32 object-contain p-1" />
                    {{-- Checkbox hapus --}}
                    <label class="absolute top-1 right-1 bg-white bg-opacity-80 p-1 rounded shadow text-xs text-red-600 font-medium cursor-pointer">
                        <input type="checkbox" name="delete_images[]" value="{{ $image->id }}" class="mr-1"> Hapus
                    </label>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        {{-- Upload gambar baru --}}
        <div>
            <label for="images" class="block text-sm font-medium text-gray-700 mb-1 mt-5">
                Tambah Gambar Baru (opsional)
            </label>
            <p class="text-xs text-gray-500 mb-2">Kamu bisa memilih beberapa gambar sekaligus (maksimal 2MB per gambar).</p>

            <label
                for="images"
                class="flex items-center justify-center w-full px-4 py-10 mb-5 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer hover:border-[#578E7E] transition text-center">
                <div>
                    <svg class="mx-auto h-10 w-10 text-[#578E7E]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 15a4 4 0 014-4h.28a2 2 0 011.416.586l2.828 2.828a2 2 0 002.828 0l3.536-3.536a2 2 0 012.828 0L21 13M16 16v6M8 16v6M12 4v4m0 0a4 4 0 014 4H8a4 4 0 014-4z" />
                    </svg>
                    <p class="mt-2 text-sm text-gray-600">
                        <span class="font-medium text-[#578E7E]">Klik untuk unggah</span> atau seret gambar ke sini.
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

            {{-- Preview Gambar Baru --}}
            <div id="preview-images" class="grid grid-cols-2 sm:grid-cols-3 gap-3 mt-4 hidden"></div>
        </div>

        <div class="flex justify-between items-center">
            <a href="{{ route('admin.forum.show', $forum) }}" class="text-sm text-gray-600 hover:underline">← Batal</a>
            <button
                type="submit"
                class="bg-[#578E7E] text-white text-sm px-5 py-2 rounded hover:bg-[#3D3D3D] transition">
                Simpan Perubahan
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
