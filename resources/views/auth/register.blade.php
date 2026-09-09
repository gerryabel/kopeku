@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="max-w-md mx-auto bg-white p-8 rounded-2xl shadow-lg mt-10">
    <h2 class="text-2xl text-center font-semibold mb-6 text-[#578E7E]">Daftar Akun Baru</h2>

    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        {{-- Avatar (optional) --}}
        <div class="mb-6 text-center">
            <label for="avatar" class="cursor-pointer relative group inline-block">
                <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-[#578E7E] shadow-md mx-auto">
                    <img id="avatarPreview" src="{{ asset('default-avatar.png') }}"
                        alt="Profil"
                        class="w-full h-full object-cover transition-opacity group-hover:opacity-70" />
                </div>
                <div class="absolute top-0 left-1/2 -translate-x-1/2 w-24 h-24 flex items-center justify-center rounded-full bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition">
                    <span class="text-white text-sm">Ganti</span>
                </div>
                <p class="text-sm text-gray-500 mt-2">Klik untuk pilih gambar (opsional)</p>
            </label>
            <input type="file" name="avatar" id="avatar" accept="image/*" class="hidden" onchange="previewAvatar(event)">
            @error('avatar')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Name --}}
        <div class="mb-5">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                   class="block w-full border border-gray-300 rounded-xl shadow-sm px-4 py-3 focus:ring focus:ring-[#578E7E]" required>
            @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Email --}}
        <div class="mb-5">
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}"
                   class="block w-full border border-gray-300 rounded-xl shadow-sm px-4 py-3 focus:ring focus:ring-[#578E7E]" required>
            @error('email')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Password --}}
        <div class="mb-5">
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <input type="password" name="password" id="password"
                   class="block w-full border border-gray-300 rounded-xl shadow-sm px-4 py-3 focus:ring focus:ring-[#578E7E]" required>
            @error('password')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Password Confirmation --}}
        <div class="mb-6">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                   class="block w-full border border-gray-300 rounded-xl shadow-sm px-4 py-3 focus:ring focus:ring-[#578E7E]" required>
        </div>

        <div class="mt-6">
            <button type="submit"
                    class="w-full bg-[#578E7E] text-white py-3 px-4 rounded-xl hover:bg-[#46776A] transition font-semibold">
                Daftar
            </button>
        </div>

        <div class="text-center mt-5 text-sm">
            Sudah punya akun? <a href="{{ route('login') }}" class="text-[#578E7E] hover:underline">Login di sini</a>
        </div>
    </form>
</div>

<script>
  function previewAvatar(event) {
    const reader = new FileReader();
    reader.onload = function(){
      document.getElementById('avatarPreview').src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  }
</script>
@endsection
