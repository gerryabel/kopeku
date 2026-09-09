@extends('layouts.admin')

@section('title', 'Edit jenis Kucing')

@section('content')
    <h1 class="text-2xl font-semibold mb-6">Edit Breed Kucing</h1>

    <form method="POST" action="{{ route('admin.breeds.update', $breed) }}" class="bg-white rounded p-6 shadow max-w-xl">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block font-semibold mb-2">Nama Jenis</label>
            <input type="text" name="name" id="name"
                class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring focus:border-sage"
                value="{{ old('name', $breed->name) }}" required>
            @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-4">
            <button type="submit"
                class="bg-sage text-white px-4 py-2 rounded hover:bg-green-700 transition">Update</button>
            <a href="{{ route('admin.breeds.index') }}"
                class="text-gray-600 hover:underline">Batal</a>
        </div>
    </form>
@endsection
