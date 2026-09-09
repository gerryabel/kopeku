@extends('layouts.admin')

@section('title', 'Edit Artikel')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white rounded-xl shadow-md mt-10">
    <h1 class="text-2xl font-semibold text-[#578E7E] mb-4">Edit Artikel</h1>

    <form action="{{ route('admin.articles.update', $article) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold mb-1">Judul</label>
            <input type="text" name="title" class="w-full border rounded px-3 py-2" value="{{ old('title', $article->title) }}">
            @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Kategori</label>
            <select name="category_id" class="w-full border rounded px-3 py-2">
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $article->category_id ?? '') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
            @error('category_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Konten</label>
            <textarea name="content" rows="6" class="w-full border rounded px-3 py-2">{{ old('content', $article->content) }}</textarea>
            @error('content') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-6">
            <label class="block font-semibold mb-2">Gambar Saat Ini</label>
            @if($article->image)
            <div class="w-full max-w-sm rounded-lg overflow-hidden shadow border border-gray-200">
                <img src="{{ asset('storage/' . $article->image) }}" alt="Gambar Artikel"
                    class="w-full object-contain max-h-48 bg-gray-50" />
            </div>
            @else
            <p class="text-sm text-gray-500 italic">Tidak ada gambar</p>
            @endif
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Pilih Gambar</label>

            <label for="image"
                class="relative flex flex-col items-center justify-center w-full h-40 border-2 border-dashed border-[#578E7E] rounded-lg cursor-pointer
           bg-[#FFFAEC] text-[#578E7E] hover:bg-[#F5ECD5] transition-colors overflow-hidden shadow-sm">

                {{-- Placeholder ikon + teks --}}
                <div id="placeholder" class="flex flex-col items-center justify-center pointer-events-none select-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 15a4 4 0 004 4h10a4 4 0 004-4v-6a4 4 0 00-4-4H7a4 4 0 00-4 4v6z" />
                    </svg>
                    <span class="text-base text-center font-medium">Klik atau seret file<br>gambar di sini</span>
                </div>

                {{-- Preview gambar --}}
                <img id="previewImage" src="#" alt="Preview Gambar"
                    class="absolute top-0 left-0 w-full h-full object-contain rounded-lg shadow-md hidden transition-opacity duration-300" />

                <input id="image" type="file" name="image" class="hidden" accept="image/*" />
            </label>

            @error('image')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-[#578E7E] text-white px-4 py-2 rounded hover:bg-[#476e63]">Update</button>
        <a href="{{ route('admin.articles.index') }}" class="ml-2 text-gray-600 hover:underline">Batal</a>
    </form>
</div>

<script>
    const dropArea = document.querySelector('label[for="image"]');
    const imageInput = document.getElementById('image');
    const previewImage = document.getElementById('previewImage');
    const placeholder = document.getElementById('placeholder');

    function updatePreview(file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImage.src = e.target.result;
            previewImage.classList.remove('hidden');
            placeholder.style.display = 'none';
        }
        reader.readAsDataURL(file);
    }

    imageInput.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            updatePreview(this.files[0]);
        } else {
            previewImage.src = '#';
            previewImage.classList.add('hidden');
            placeholder.style.display = 'flex';
        }
    });

    // Drag & Drop events
    dropArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropArea.classList.add('border-green-500', 'bg-[#e0f2f1]');
    });

    dropArea.addEventListener('dragleave', (e) => {
        e.preventDefault();
        dropArea.classList.remove('border-green-500', 'bg-[#e0f2f1]');
    });

    dropArea.addEventListener('drop', (e) => {
        e.preventDefault();
        dropArea.classList.remove('border-green-500', 'bg-[#e0f2f1]');

        if (e.dataTransfer.files && e.dataTransfer.files.length > 0) {
            const file = e.dataTransfer.files[0];
            imageInput.files = e.dataTransfer.files; // set file ke input supaya bisa di-submit
            updatePreview(file);
            e.dataTransfer.clearData();
        }
    });
</script>
@endsection