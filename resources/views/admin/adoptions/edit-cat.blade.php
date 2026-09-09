@extends('layouts.admin')
@section('title', 'Edit Kucing')

@section('content')
<form action="{{ route('admin.adoptions.cats.update', $cat) }}" method="POST" enctype="multipart/form-data"
    class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-lg grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-8">
    @csrf
    @method('PUT')

    {{-- Kolom Kiri --}}
    <div class="space-y-8">
        <h2 class="text-3xl font-semibold mb-6 text-[#578E7E]">Edit Kucing</h2>

        {{-- Nama --}}
        <div>
            <label for="name" class="block mb-2 font-semibold text-gray-800">Nama Kucing <span class="text-red-600">*</span></label>
            <input type="text" id="name" name="name" value="{{ old('name', $cat->name) }}" required
                class="w-full border border-gray-300 rounded-lg px-5 py-3 text-gray-700 placeholder-gray-400 focus:outline-none focus:border-[#578E7E] focus:ring-2 focus:ring-[#578E7E]/50 transition"
                placeholder="Masukkan nama kucing">
            @error('name')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Jenis Kelamin --}}
        <div>
            <label for="gender" class="block mb-2 font-semibold text-gray-800">Jenis Kelamin <span class="text-red-600">*</span></label>
            <select id="gender" name="gender" required
                class="w-full border border-gray-300 rounded-lg px-4 py-3 text-gray-700 focus:outline-none focus:border-[#578E7E] focus:ring-2 focus:ring-[#578E7E]/50 transition">
                <option value="" disabled {{ old('gender', $cat->gender) ? '' : 'selected' }}>-- Pilih --</option>
                <option value="male" {{ old('gender', $cat->gender) == 'male' ? 'selected' : '' }}>Jantan</option>
                <option value="female" {{ old('gender', $cat->gender) == 'female' ? 'selected' : '' }}>Betina</option>
            </select>
            @error('gender')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Ras --}}
        <div>
            <label for="breed" class="block mb-2 font-semibold text-gray-800">Ras <span class="text-red-600">*</span></label>
            <input type="text" id="breed" name="breed" value="{{ old('breed', $cat->breed) }}" required
                class="w-full border border-gray-300 rounded-lg px-5 py-3 text-gray-700 placeholder-gray-400 focus:outline-none focus:border-[#578E7E] focus:ring-2 focus:ring-[#578E7E]/50 transition"
                placeholder="Masukkan ras kucing">
            @error('breed')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Usia --}}
        <div>
            <label for="age" class="block mb-2 font-semibold text-gray-800">Umur (dalam bulan) <span class="text-red-600">*</span></label>
            <input type="number" id="age" name="age" value="{{ old('age', $cat->age) }}" required
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
            <textarea id="description" name="description" rows="7" required
                class="w-full h-full border border-gray-300 rounded-lg px-5 py-3 text-gray-700 placeholder-gray-400 resize-y focus:outline-none focus:border-[#578E7E] focus:ring-2 focus:ring-[#578E7E]/50 transition"
                placeholder="Deskripsikan kucing ini">{{ old('description', $cat->description) }}</textarea>
            @error('description')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Drag & Drop Upload Foto --}}
        <div>
            <label class="block mb-2 mt-8 font-semibold text-gray-800">Ganti Foto (Opsional)</label>
            <div id="drop-area"
                class="border border-dashed border-gray-400 rounded-lg p-4 cursor-pointer hover:border-[#578E7E] transition">
                <p class="text-gray-500 text-center">Klik untuk memilih foto atau drag and drop di sini</p>
                <input type="file" id="photo" name="photo" accept="image/*" class="hidden" />
            </div>
            @error('photo')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror

            @if ($cat->photo)
            <p class="mt-4 mb-2 font-semibold text-gray-700">Foto saat ini:</p>
            <img id="photo-preview" src="{{ asset('storage/' . $cat->photo) }}" alt="{{ $cat->name }}"
                class="w-full max-h-60 rounded-lg object-contain border border-gray-300 shadow-sm">
            @else
            <img id="photo-preview" src="#" alt="Preview Foto" class="hidden">
            @endif
        </div>

        {{-- Checkbox --}}
        <div class="flex items-center space-x-3 mt-2">
            <input type="checkbox" id="is_available_for_adoption" name="is_available_for_adoption"
                class="w-6 h-6 text-[#578E7E] border-gray-300 rounded focus:ring-[#578E7E]"
                {{ old('is_available_for_adoption', $cat->is_available_for_adoption ?? false) ? 'checked' : '' }}>
            <label for="is_available_for_adoption" class="select-none text-gray-800 font-medium">Tersedia untuk
                Adopsi</label>
        </div>

        {{-- Tombol Submit dan Batal --}}
        <button type="submit"
            class="mt-auto bg-[#578E7E] text-white font-bold py-4 rounded-lg shadow-lg hover:bg-[#3f6e65] transition duration-300">
            Simpan
        </button>
    </div>
</form>

<script>
    const dropArea = document.getElementById('drop-area');
    const fileInput = document.getElementById('photo');
    const preview = document.getElementById('photo-preview');

    // Klik area drop untuk buka file selector
    dropArea.addEventListener('click', () => fileInput.click());

    // Dragover - prevent default untuk bisa drop
    dropArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropArea.classList.add('border-[#578E7E]', 'text-[#578E7E]', 'bg-[#E6F1EE]');
    });

    // Dragleave - hilangkan highlight
    dropArea.addEventListener('dragleave', (e) => {
        e.preventDefault();
        dropArea.classList.remove('border-[#578E7E]', 'text-[#578E7E]', 'bg-[#E6F1EE]');
    });

    // Drop event
    dropArea.addEventListener('drop', (e) => {
        e.preventDefault();
        dropArea.classList.remove('border-[#578E7E]', 'text-[#578E7E]', 'bg-[#E6F1EE]');

        if (e.dataTransfer.files && e.dataTransfer.files.length > 0) {
            fileInput.files = e.dataTransfer.files;
            showPreview(fileInput.files[0]);
        }
    });

    // Saat input file berubah (klik atau drag & drop)
    fileInput.addEventListener('change', () => {
        if (fileInput.files && fileInput.files[0]) {
            showPreview(fileInput.files[0]);
        }
    });

    // Fungsi preview gambar
    function showPreview(file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
        };
        reader.readAsDataURL(file);
    }
</script>
@endsection