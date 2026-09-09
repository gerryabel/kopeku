@extends('layouts.admin')

@section('title', 'Tambah Kategori')

@section('content')
<div class="max-w-xl mx-auto p-6 bg-white rounded-xl shadow-md">
    <h1 class="text-2xl font-semibold text-[#578E7E] mb-6">Tambah Kategori</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-[#3D3D3D] font-semibold mb-2">Nama Kategori</label>
            <input type="text" name="name" id="name" class="w-full border rounded px-3 py-2" value="{{ old('name') }}" required>
        </div>
        <div class="flex justify-end space-x-2">
            <a href="{{ route('admin.categories.index') }}" class="px-4 py-2 rounded bg-gray-200 text-gray-700 hover:bg-gray-300">Batal</a>
            <button type="submit" class="px-4 py-2 rounded bg-[#578E7E] text-white hover:bg-[#476e63]">Simpan</button>
        </div>
    </form>
</div>
@endsection
