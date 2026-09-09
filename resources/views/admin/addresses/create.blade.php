@extends('layouts.admin')

@section('title', 'Tambah Kota Kucing')

@section('content')
    <h1 class="text-2xl font-semibold mb-6">Tambah Kota Kucing</h1>

    <form method="POST" action="{{ route('admin.addresses.store') }}" class="bg-white rounded p-6 shadow max-w-xl">
        @csrf

        <div class="mb-4">
            <label for="address" class="block font-semibold mb-2">Nama Kota</label>
            <input type="text" name="address" id="address"
                class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring focus:border-sage"
                value="{{ old('address') }}" required>
            @error('address')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-4">
            <button type="submit"
                class="bg-sage text-white px-4 py-2 rounded hover:bg-green-700 transition">Simpan</button>
            <a href="{{ route('admin.addresses.index') }}"
                class="text-gray-600 hover:underline">Batal</a>
        </div>
    </form>
@endsection
