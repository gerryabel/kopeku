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

        {{-- Jenis Kucing --}}
        <div>
            <label for="breed_id" class="block mb-2 font-medium text-gray-800">Jenis Kucing <span class="text-red-600">*</span></label>
            <select name="breed_id" id="breed_id" required
                class="w-full border border-gray-300 rounded-lg px-5 py-3 text-gray-700 focus:outline-none focus:border-[#578E7E] focus:ring-2 focus:ring-[#578E7E]/50 transition">
                <option value="">-- Pilih Jenis --</option>
                @foreach ($breeds as $breed)
                <option value="{{ $breed->id }}" {{ old('breed_id', $cat->breed_id) == $breed->id ? 'selected' : '' }}>
                    {{ $breed->name }}
                </option>
                @endforeach
            </select>
            @error('breed_id')
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
    </div>

    {{-- Kolom Kanan --}}
    <div class="space-y-8 flex flex-col">
        {{-- Nama Pemilik --}}
        <div>
            <label for="owner_name" class="block mb-2 font-semibold text-gray-800">Nama Pemilik <span class="text-red-600">*</span></label>
            <input type="text" id="owner_name" name="owner_name" value="{{ old('owner_name', $cat->owner_name) }}" required
                class="w-full border border-gray-300 rounded-lg px-5 py-3 text-gray-700 placeholder-gray-400 focus:outline-none focus:border-[#578E7E] focus:ring-2 focus:ring-[#578E7E]/50 transition"
                placeholder="Masukkan nama pemilik kucing">
            @error('owner_name')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Kontak Pemilik --}}
        <div>
            <label for="owner_contact" class="block mb-2 font-semibold text-gray-800">Kontak Pemilik <span class="text-red-600">*</span></label>
            <input type="text" id="owner_contact" name="owner_contact" value="{{ old('owner_contact', $cat->owner_contact) }}" required
                class="w-full border border-gray-300 rounded-lg px-5 py-3 text-gray-700 placeholder-gray-400 focus:outline-none focus:border-[#578E7E] focus:ring-2 focus:ring-[#578E7E]/50 transition"
                placeholder="Nomor telepon, email, atau lainnya">
            @error('owner_contact')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Kota --}}
        <div>
            <label for="address_id" class="block mb-2 font-semibold text-gray-800">Alamat Kota <span class="text-red-600">*</span></label>
            <select name="address_id" id="address_id" required
                class="w-full border border-gray-300 rounded-lg px-5 py-3 text-gray-700 focus:outline-none focus:border-[#578E7E] focus:ring-2 focus:ring-[#578E7E]/50 transition">
                <option value="">-- Pilih Kota --</option>
                @foreach ($addresses as $address)
                <option value="{{ $address->id }}" {{ old('address_id', $cat->address_id) == $address->id ? 'selected' : '' }}>
                    {{ $address->address }}
                </option>
                @endforeach
            </select>
            @error('address_id')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="google_maps_link" class="block mb-2 font-semibold text-gray-800">Link Google Maps</label>
            <input type="url" name="google_maps_link" id="google_maps_link" value="{{ old('google_maps_link', $cat->google_maps_link) }}"
                class="w-full border border-gray-300 rounded-lg px-5 py-3 text-gray-700 placeholder-gray-400 resize-y focus:outline-none focus:border-[#578E7E] focus:ring-2 focus:ring-[#578E7E]/50 transition"
                placeholder="https://maps.google.com/..." class="w-full rounded border px-3 py-2" />
            @error('google_maps_link') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Upload & Ganti Foto --}}
        <div>
            <label for="images" class="block mb-2 font-semibold text-gray-800">Foto Kucing <span class="text-red-600">*</span></label>
            <div id="drop-area"
                class="border border-dashed border-gray-400 rounded-lg p-4 cursor-pointer hover:border-[#578E7E] transition text-center"
                onclick="document.getElementById('images').click()">
                <input type="file" id="images" name="images[]" accept="image/*" multiple class="hidden" onchange="previewImages(event)">
                <p class="text-gray-500">Klik untuk memilih foto atau drag and drop di sini (boleh lebih dari satu)</p>
                <div id="preview-container" class="mt-4 grid grid-cols-3 gap-3"></div>
            </div>
            @error('images')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
            @error('images.*')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror

            @if ($cat->images->count())
            <p class="mt-4 mb-2 font-semibold text-gray-700">Foto saat ini:</p>
            <div class="flex flex-wrap gap-2">
                @foreach ($cat->images as $image)
                <img src="{{ asset('storage/' . $image->image_path) }}" alt="Foto {{ $cat->name }}"
                    class="w-24 max-h-24 rounded-lg object-cover border border-gray-300 shadow-sm">
                @endforeach
            </div>
            @else
            <p class="mt-4 mb-2 font-semibold text-gray-700">Belum ada foto</p>
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
    const fileInput = document.getElementById('images');
    const previewContainer = document.getElementById('preview-container');

    function previewImages(event) {
        previewContainer.innerHTML = ''; // Bersihkan preview lama
        const files = event.target.files;

        if (!files.length) return;

        Array.from(files).forEach(file => {
            if (!file.type.startsWith('image/')) return;

            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('rounded-lg', 'object-cover', 'w-full', 'h-32');
                previewContainer.appendChild(img);
            };
            reader.readAsDataURL(file);
        });
    }

    dropArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropArea.classList.add('border-[#578E7E]', 'bg-[#f0fdf9]');
    });

    dropArea.addEventListener('dragleave', (e) => {
        e.preventDefault();
        dropArea.classList.remove('border-[#578E7E]', 'bg-[#f0fdf9]');
    });

    dropArea.addEventListener('drop', (e) => {
        e.preventDefault();
        dropArea.classList.remove('border-[#578E7E]', 'bg-[#f0fdf9]');

        const dtFiles = e.dataTransfer.files;
        const imageFiles = Array.from(dtFiles).filter(file => file.type.startsWith('image/'));

        if (!imageFiles.length) {
            alert('Mohon upload file gambar saja!');
            return;
        }

        const dataTransfer = new DataTransfer();
        imageFiles.forEach(file => dataTransfer.items.add(file));
        fileInput.files = dataTransfer.files;

        previewImages({
            target: {
                files: dataTransfer.files
            }
        });
    });
</script>
@endsection