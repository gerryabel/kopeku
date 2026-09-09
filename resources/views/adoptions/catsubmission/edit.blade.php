@extends('layouts.catsubmission')

@section('title', 'Edit Pengajuan Kucing')

@section('catsubmission-content')
<div class="container max-w-5xl mx-auto p-6 bg-white rounded-xl shadow-lg">
    <h2 class="text-2xl font-bold text-[#578E7E] mb-6">Edit Pengajuan Kucing</h2>

    @if (session('error'))
    <div class="mb-4 p-4 bg-red-100 text-red-800 rounded shadow">
        {{ session('error') }}
    </div>
    @endif

    <form action="{{ route('adoptions.catsubmission.update', $submission->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid md:grid-cols-2 gap-6">
            {{-- Kiri: Info Kucing --}}
            <div class="space-y-4">
                <div>
                    <label class="block text-sm">Nama Kucing</label>
                    <input type="text" name="name" value="{{ old('name', $submission->name) }}" required
                        class="w-full border rounded px-3 py-2 bg-white focus:ring-[#578E7E]">
                    @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm">Umur (bulan)</label>
                    <input type="number" name="age" value="{{ old('age', $submission->age) }}" min="0"
                        class="w-full border rounded px-3 py-2 bg-white focus:ring-[#578E7E]">
                    @error('age') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm">Jenis Kelamin</label>
                    <select name="gender" class="w-full border rounded px-3 py-2 bg-white focus:ring-[#578E7E]">
                        <option value="">Pilih</option>
                        <option value="male" @selected(old('gender', $submission->gender) == 'male')>Jantan</option>
                        <option value="female" @selected(old('gender', $submission->gender) == 'female')>Betina</option>
                    </select>
                    @error('gender') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm">Jenis Kucing</label>
                    <select name="breed_id" class="w-full border rounded px-3 py-2 bg-white focus:ring-[#578E7E]" required>
                        <option value="">Pilih Jenis Kucing</option>
                        @foreach ($breeds as $breed)
                        <option value="{{ $breed->id }}" @selected(old('breed_id', $submission->breed_id) == $breed->id)>
                            {{ $breed->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('breed_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm">Deskripsi</label>
                    <textarea name="description" rows="4"
                        class="w-full border rounded px-3 py-2 bg-white focus:ring-[#578E7E]">{{ old('description', $submission->description) }}</textarea>
                    @error('description') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            {{-- Kanan: Info Pemilik dan Upload --}}
            <div class="space-y-4">
                <div>
                    <label class="block text-sm">Nama Pemilik</label>
                    <input type="text" name="owner_name" value="{{ old('owner_name', $submission->owner_name) }}"
                        class="w-full border rounded px-3 py-2 bg-white focus:ring-[#578E7E]">
                    @error('owner_name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror

                    <label class="block text-sm mt-3">Kontak Pemilik</label>
                    <input type="text" name="owner_contact" value="{{ old('owner_contact', $submission->owner_contact) }}"
                        class="w-full border rounded px-3 py-2 bg-white focus:ring-[#578E7E]">
                    @error('owner_contact') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror

                    <label class="block text-sm mt-3">Kota Pemilik</label>
                    <select name="address_id" class="w-full border rounded px-3 py-2 bg-white focus:ring-[#578E7E]" required>
                        <option value="">Pilih Alamat</option>
                        @foreach ($addresses as $address)
                        <option value="{{ $address->id }}" @selected(old('address_id', $submission->address_id) == $address->id)>
                            {{ $address->address }}
                        </option>
                        @endforeach
                    </select>
                    @error('address_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror

                    <label for="google_maps_link" class="block text-sm mt-3">Link Google Maps</label>
                    <input type="url" name="google_maps_link" id="google_maps_link"
                        value="{{ old('google_maps_link', $submission->google_maps_link) }}"
                        class="w-full border rounded px-3 py-2 bg-white focus:ring-[#578E7E]"
                        placeholder="https://maps.google.com/...">
                    @error('google_maps_link') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-[#3D3D3D]">Upload Gambar Baru (opsional)</label>
                    <div id="drop-area"
                        ondrop="handleDrop(event)"
                        ondragover="handleDragOver(event)"
                        onclick="document.getElementById('images').click()"
                        class="border-dashed border-2 border-[#578E7E] p-6 rounded text-center bg-[#F5ECD5] cursor-pointer">
                        <p class="mb-2">Drag & drop gambar di sini, atau klik untuk memilih</p>
                        <label for="images"
                            class="inline-block bg-[#578E7E] text-white px-4 py-2 rounded cursor-pointer hover:bg-[#3D3D3D]">
                            Pilih Gambar
                        </label>
                        <input type="file" id="images" name="images[]" multiple accept="image/*"
                            onchange="previewImages(this.files)" class="hidden">
                        <div id="fileLabel" class="text-sm mt-2 text-gray-700"></div>
                    </div>

                    {{-- Preview --}}
                    <div id="preview" class="mt-4 grid grid-cols-2 md:grid-cols-3 gap-4"></div>

                    @error('images') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    @error('images.*') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror

                    @if ($submission->images && count($submission->images))
                        <p class="text-sm mt-4 text-gray-700">Gambar Lama:</p>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-2">
                            @foreach ($submission->images as $image)
                            <img src="{{ asset('storage/' . $image->image_path) }}" class="w-full h-32 object-cover rounded shadow">
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="flex justify-between items-center mt-10">
            <a href="{{ route('adoptions.catsubmission.index') }}" class="text-sm text-gray-600 hover:underline">
                ← Batal
            </a>

            <button type="submit"
                class="bg-[#578E7E] text-white px-6 py-2 rounded hover:bg-[#3D3D3D] transition">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>

<script>
    function handleDragOver(e) {
        e.preventDefault();
        e.stopPropagation();
        e.dataTransfer.dropEffect = 'copy';
    }

    function handleDrop(e) {
        e.preventDefault();
        e.stopPropagation();
        const files = e.dataTransfer.files;
        document.getElementById('images').files = files;
        previewImages(files);
    }

    function previewImages(files) {
        const preview = document.getElementById('preview');
        preview.innerHTML = '';
        const fileLabel = document.getElementById('fileLabel');
        let names = [];

        Array.from(files).forEach(file => {
            if (!file.type.startsWith('image/')) return;

            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'w-full h-32 object-cover rounded shadow';
                preview.appendChild(img);
            };
            reader.readAsDataURL(file);

            names.push(file.name);
        });

        fileLabel.textContent = names.length + ' file dipilih: ' + names.join(', ');
    }
</script>
@endsection
