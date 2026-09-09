@extends('layouts.catsubmission')

@section('title', 'Riwayat Pengajuan')

@section('catsubmission-content')

@if (session('success'))
<div class="mb-4 p-4 bg-green-100 text-green-800 rounded shadow">
    {{ session('success') }}
</div>
@endif

<h2 class="text-2xl font-semibold text-[#578E7E] mb-6">Riwayat Pengajuan Saya</h2>

<div class="mb-6">
    <a href="{{ route('adoptions.index') }}" class="text-sm text-gray-600 hover:underline">← Kembali</a>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

    {{-- === CARD: PENGAJUAN KUCING === --}}
    <div class="bg-white rounded-2xl shadow p-6 border border-gray-100">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-semibold text-gray-800">Pengajuan Kucing</h3>
            <form method="GET" action="{{ route('adoptions.catsubmission.index') }}" class="flex items-center gap-2">
                <label for="cat_status" class="text-sm text-gray-600">Status:</label>
                <select name="cat_status" id="cat_status" onchange="this.form.submit()" class="border-gray-300 rounded px-2 py-1 text-sm">
                    <option value="">Semua</option>
                    <option value="pending" {{ request('cat_status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="approved" {{ request('cat_status') == 'approved' ? 'selected' : '' }}>Diterima</option>
                    <option value="rejected" {{ request('cat_status') == 'rejected' ? 'selected' : '' }}>Ditolak</option>
                </select>
                <input type="hidden" name="adoption_status" value="{{ request('adoption_status') }}">
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-[#F5ECD5] text-gray-700 font-medium">
                    <tr>
                        <th class="px-4 py-2">Nama Kucing</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Tanggal</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($catSubmissions as $submission)
                    <tr>
                        <td class="px-4 py-3">{{ $submission->name }}</td>
                        <td class="px-4 py-3">
                            @include('components.status-badge', ['status' => $submission->status])
                        </td>
                        <td class="px-4 py-3 text-gray-600">{{ $submission->created_at->format('d M Y') }}</td>
                        <td class="px-4 py-3 space-x-2">
                            <a href="{{ route('adoptions.catsubmission.show', ['type' => 'cat', 'id' => $submission->id]) }}"
                               class="text-blue-500 hover:underline">Detail</a>

                            @if($submission->status == 'pending')
                            <a href="{{ route('adoptions.catsubmission.edit', $submission->id) }}"
                               class="text-yellow-500 hover:underline">Edit</a>

                            <form action="{{ route('adoptions.catsubmission.destroy', $submission->id) }}" method="POST"
                                  class="inline" onsubmit="return confirm('Apakah kamu yakin ingin menghapus pengajuan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-4 text-gray-500">Belum ada pengajuan kucing.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- === CARD: PENGAJUAN ADOPSI === --}}
    <div class="bg-white rounded-2xl shadow p-6 border border-gray-100">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-semibold text-gray-800">Pengajuan Adopsi</h3>
            <form method="GET" action="{{ route('adoptions.catsubmission.index') }}" class="flex items-center gap-2">
                <label for="adoption_status" class="text-sm text-gray-600">Status:</label>
                <select name="adoption_status" id="adoption_status" onchange="this.form.submit()" class="border-gray-300 rounded px-2 py-1 text-sm">
                    <option value="">Semua</option>
                    <option value="pending" {{ request('adoption_status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="approved" {{ request('adoption_status') == 'approved' ? 'selected' : '' }}>Diterima</option>
                    <option value="rejected" {{ request('adoption_status') == 'rejected' ? 'selected' : '' }}>Ditolak</option>
                </select>
                <input type="hidden" name="cat_status" value="{{ request('cat_status') }}">
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-[#F5ECD5] text-gray-700 font-medium">
                    <tr>
                        <th class="px-4 py-2">Nama Kucing</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Tanggal</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($adoptionSubmissions as $submission)
                    <tr>
                        <td class="px-4 py-3">{{ $submission->cat->name }}</td>
                        <td class="px-4 py-3">
                            @include('components.status-badge', ['status' => $submission->status])
                        </td>
                        <td class="px-4 py-3 text-gray-600">{{ $submission->created_at->format('d M Y') }}</td>
                        <td class="px-4 py-3 space-x-2">
                            <a href="{{ route('adoptions.catsubmission.show', ['type' => 'adoption', 'id' => $submission->id]) }}"
                               class="text-blue-500 hover:underline">Detail</a>

                            @if($submission->status == 'pending')
                            <a href="{{ route('adoptions.edit', $submission->id) }}"
                               class="text-yellow-500 hover:underline">Edit</a>

                            <form action="{{ route('adoptions.destroy', $submission->id) }}" method="POST"
                                  class="inline" onsubmit="return confirm('Yakin ingin menghapus pengajuan adopsi ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-4 text-gray-500">Belum ada pengajuan adopsi.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection