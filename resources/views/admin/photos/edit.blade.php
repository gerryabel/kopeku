@extends('layouts.admin')

@section('title', 'Edit Foto Galeri')

@section('content')
<div class="p-6 bg-white rounded-xl shadow-md max-w-lg mx-auto mt-4">
    <h1 class="text-2xl font-semibold text-[#578E7E] mb-6">Edit Foto Galeri</h1>

    <form action="{{ route('admin.photos.update', $photo) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="title" class="block text-[#3D3D3D] font-semibold mb-1">Judul (opsional)</label>
            <input type="text" name="title" id="title" value="{{ old('title', $photo->title) }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#578E7E]" />
            @error('title')
            <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <p class="mb-2 text-gray-700 font-semibold">Gambar Saat Ini:</p>
            <img src="{{ asset('storage/' . $photo->filename) }}" alt="{{ $photo->title ?? 'Foto' }}" class="w-full h-48 object-contain rounded mb-3" />
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Pilih Gambar</label>

            <label for="filename"
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

                <input id="filename" type="file" name="filename" class="hidden" accept="image/*" />
            </label>

            @error('filename')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description" class="block text-[#3D3D3D] font-semibold mb-1">Deskripsi (opsional)</label>
            <textarea name="description" id="description" rows="4"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#578E7E]">{{ old('description', $photo->description) }}</textarea>
            @error('description')
            <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-between items-center">
            <a href="{{ route('admin.photos.index') }}" class="text-[#578E7E] hover:underline">Batal</a>
            <button type="submit" class="bg-[#578E7E] text-white px-6 py-2 rounded hover:bg-[#3D5B54] transition">Simpan Perubahan</button>
        </div>
    </form>
</div>

<script>
    const dropArea = document.querySelector('label[for="filename"]');
    const imageInput = document.getElementById('filename');
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