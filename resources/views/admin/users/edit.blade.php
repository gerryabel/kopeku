@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')
<div class="p-6 bg-white rounded-xl shadow-md max-w-lg mx-auto mt-10">
    <h1 class="text-3xl font-semibold text-[#578E7E] mb-6">Edit User</h1>

    <form action="{{ route('admin.users.update', $user) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

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

        <div class="mb-4">
            <label for="name" class="block font-semibold mb-1">Nama</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#578E7E]" required>
            @error('name')
            <p class="text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block font-semibold mb-1">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#578E7E]" required>
            @error('email')
            <p class="text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="role" class="block font-semibold mb-1">Peran</label>
            <select name="role" id="role"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#578E7E]">
                <option value="member" {{ old('role', $user->role) === 'member' ? 'selected' : '' }}>Member</option>
                <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
            @error('role')
            <p class="text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block font-semibold mb-1">Password (kosongkan jika tidak ingin ganti)</label>
            <input type="password" name="password" id="password"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#578E7E]">
            @error('password')
            <p class="text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password_confirmation" class="block font-semibold mb-1">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#578E7E]">
        </div>

        <button type="submit" class="bg-[#578E7E] text-white px-5 py-2 rounded hover:bg-[#3f6b63] transition">Update</button>
        <a href="{{ route('admin.users.index') }}" class="ml-3 text-[#578E7E] hover:underline">Batal</a>
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