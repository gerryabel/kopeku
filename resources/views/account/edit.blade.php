@extends('layouts.profil')

@section('title', 'Edit Profil')

@section('profil-content')
<div class="max-w-xl mx-auto bg-white p-6 rounded-2xl shadow-lg mt-10">
    <h1 class="text-2xl font-semibold text-center text-[#3D3D3D] mb-6">Edit Akun</h1>

    @if (session('success'))
    <div class="mb-4 bg-green-100 border border-green-300 text-green-800 px-4 py-2 rounded">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('account.update') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        {{-- Avatar --}}
        <div class="flex justify-center mb-4">
            <label for="avatarInput" class="cursor-pointer relative group">
                <img
                    src="{{ $user->avatar ? asset('storage/' . $user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) }}"
                    class="w-24 h-24 rounded-full object-cover border-4 border-[#578E7E] group-hover:opacity-75 transition"
                    alt="Avatar">
                <input type="file" name="avatar" id="avatarInput" class="hidden">
                <div class="absolute inset-0 flex items-center justify-center rounded-full bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition">
                    <span class="text-white text-sm">Ganti</span>
                </div>
            </label>
        </div>
        @error('avatar')
        <p class="text-red-600 text-sm text-center">{{ $message }}</p>
        @enderror

        {{-- Name --}}
        <div>
            <label for="name" class="block font-medium text-[#3D3D3D] mb-1">Nama</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-[#578E7E] focus:border-[#578E7E]">
            @error('name')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Email --}}
        <div>
            <label for="email" class="block font-medium text-[#3D3D3D] mb-1">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-[#578E7E] focus:border-[#578E7E]">
            @error('email')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Password --}}
        <div>
            <label for="password" class="block font-medium text-[#3D3D3D] mb-1">Password Baru (kosongkan jika tidak ingin ganti)</label>
            <input type="password" name="password" id="password"
                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-[#578E7E] focus:border-[#578E7E]">
            @error('password')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Confirm Password --}}
        <div>
            <label for="password_confirmation" class="block font-medium text-[#3D3D3D] mb-1">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-[#578E7E] focus:border-[#578E7E]">
        </div>

        {{-- Submit --}}
        <div class="pt-2">
            <button type="submit"
                class="w-full bg-[#578E7E] hover:bg-[#466f65] text-white font-semibold py-2 px-4 rounded-md transition">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>

<script>
    const avatarInput = document.getElementById('avatarInput');
    const avatarImg = avatarInput.previousElementSibling;

    avatarInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                avatarImg.src = event.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
