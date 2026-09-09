@extends('layouts.admin')

@section('title', 'Tambah Kucing')

@section('content')
<form action="{{ route('admin.adoptions.cats.store') }}" method="POST" enctype="multipart/form-data"
    class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-lg grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-8">
    @csrf

    {{-- Kolom Kiri --}}
    <div class="space-y-8">
        {{-- Judul form (pindah ke sini) --}}
        <h2 class="text-3xl font-semibold mb-6 text-[#578E7E]">Tambah Kucing</h2>

        {{-- Nama --}}
        <div>
            <label for="name" class="block mb-2 font-semibold text-gray-800">Nama Kucing <span class="text-red-600">*</span></label>
            <input type="text" id="name" name="name" value="{{ old('name') }}"
                class="w-full border border-gray-300 rounded-lg px-5 py-3 text-gray-700 placeholder-gray-400 focus:outline-none focus:border-[#578E7E] focus:ring-2 focus:ring-[#578E7E]/50 transition"
                placeholder="Masukkan nama kucing">
            @error('name')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Jenis Kelamin --}}
        <div>
            <label for="gender" class="block mb-2 font-semibold text-gray-800">Jenis Kelamin <span class="text-red-600">*</span></label>
            <select id="gender" name="gender"
                class="w-full border border-gray-300 rounded-lg px-4 py-3 text-gray-700 focus:outline-none focus:border-[#578E7E] focus:ring-2 focus:ring-[#578E7E]/50 transition">
                <option value="" disabled {{ old('gender') ? '' : 'selected' }}>-- Pilih --</option>
                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Jantan</option>
                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Betina</option>
            </select>
            @error('gender')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Ras --}}
        <div>
            <label for="breed" class="block mb-2 font-semibold text-gray-800">Ras <span class="text-red-600">*</span></label>
            <input type="text" id="breed" name="breed" value="{{ old('breed') }}"
                class="w-full border border-gray-300 rounded-lg px-5 py-3 text-gray-700 placeholder-gray-400 focus:outline-none focus:border-[#578E7E] focus:ring-2 focus:ring-[#578E7E]/50 transition"
                placeholder="Masukkan ras kucing">
            @error('breed')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Usia --}}
        <div>
            <label for="age" class="block mb-2 font-semibold text-gray-800">Usia (dalam bulan) <span class="text-red-600">*</span></label>
            <input type="number" id="age" name="age" value="{{ old('age') }}"
                class="w-full border border-gray-300 rounded-lg px-5 py-3 text-gray-700 placeholder-gray-400 focus:outline-none focus:border-[#578E7E] focus:ring-2 focus:ring-[#578E7E]/50 transition"
                placeholder="Contoh: 12">
            @error('age')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>

    {{-- Kolom Kanan --}}
    <div class="space-y-8 flex flex-col">
        {{-- Deskripsi --}}
        <div class="flex-grow">
            <label for="description" class="block mb-2 font-semibold text-gray-800">Deskripsi <span class="text-red-600">*</span></label>
            <textarea id="description" name="description" rows="7"
                class="w-full h-full border border-gray-300 rounded-lg px-5 py-3 text-gray-700 placeholder-gray-400 resize-y focus:outline-none focus:border-[#578E7E] focus:ring-2 focus:ring-[#578E7E]/50 transition"
                placeholder="Deskripsikan kucing ini">{{ old('description') }}</textarea>
            @error('description')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Upload Foto dengan Preview --}}
        <div>
            <label for="photo" class="block mb-2 mt-7 font-semibold text-gray-800">Foto <span class="text-red-600">*</span></label>
            <div class="border border-dashed border-gray-400 rounded-lg p-4 cursor-pointer hover:border-[#578E7E] transition"
                onclick="document.getElementById('photo').click()">
                <input type="file" id="photo" name="photo" accept="image/*" class="hidden" onchange="previewImage(event)">
                <p class="text-gray-500 text-center">Klik untuk memilih foto atau drag and drop di sini</p>
                <img id="photo-preview" src="#" alt="Preview Foto" class="mx-auto mt-4 rounded-lg max-h-60 hidden object-cover">
            </div>
            @error('photo')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Checkbox --}}
        <div class="flex items-center space-x-3 mt-2">
            <input type="checkbox" id="is_available_for_adoption" name="is_available_for_adoption"
                class="w-6 h-6 text-[#578E7E] border-gray-300 rounded focus:ring-[#578E7E]"
                {{ old('is_available_for_adoption', $cat->is_available_for_adoption ?? false) ? 'checked' : '' }}>
            <label for="is_available_for_adoption" class="select-none text-gray-800 font-medium">Tersedia untuk Adopsi</label>
        </div>

        {{-- Submit Button --}}
        <button type="submit"
            class="mt-auto bg-[#578E7E] text-white font-bold py-4 rounded-lg shadow-lg hover:bg-[#3f6e65] transition duration-300">
            Simpan
        </button>
    </div>
</form>

<script>
    const dropArea = document.querySelector('div[onclick]');
    const fileInput = document.getElementById('photo');
    const preview = document.getElementById('photo-preview');

    // Preview gambar setelah pilih file (via klik atau drag-drop)
    function previewImage(event) {
        const file = event.target.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
        };
        reader.readAsDataURL(file);
    }

    // Drag over - prevent default untuk enable drop
    dropArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropArea.classList.add('border-[#578E7E]', 'bg-[#f0fdf9]');
    });

    // Drag leave - hapus efek hover
    dropArea.addEventListener('dragleave', (e) => {
        e.preventDefault();
        dropArea.classList.remove('border-[#578E7E]', 'bg-[#f0fdf9]');
    });

    // Drop event - set file ke input dan preview
    dropArea.addEventListener('drop', (e) => {
        e.preventDefault();
        dropArea.classList.remove('border-[#578E7E]', 'bg-[#f0fdf9]');

        if (e.dataTransfer.files.length) {
            const file = e.dataTransfer.files[0];
            if (file.type.startsWith('image/')) {
                fileInput.files = e.dataTransfer.files;
                previewImage({
                    target: {
                        files: e.dataTransfer.files
                    }
                });
            } else {
                alert('Mohon upload file gambar saja!');
            }
        }
    });
</script>
@endsection