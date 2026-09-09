@extends('layouts.admin')

@section('title', 'Kelola Kucing dan Pengajuan')

@section('content')
<div class="max-w-full mx-auto p-4 bg-white rounded-md shadow-md font-sans text-[#3D3D3D]">
    <!-- Tabs -->
    <div class="flex border-b border-gray-300 mb-6">
        @php
        $activeTab = request('active_tab', 'cat');
        @endphp
        <button
            class="px-5 py-2 -mb-px font-semibold border-b-4 transition-colors duration-300
        {{ $activeTab === 'cat' ? 'border-green-700 text-green-700' : 'border-transparent text-gray-600 hover:text-green-600 hover:border-green-600' }}"
            onclick="changeTab('cat')"
            type="button">Daftar Kucing</button>

        <button
            class="px-5 py-2 -mb-px font-semibold border-b-4 transition-colors duration-300
        {{ $activeTab === 'submission' ? 'border-green-700 text-green-700' : 'border-transparent text-gray-600 hover:text-green-600 hover:border-green-600' }}"
            onclick="changeTab('submission')"
            type="button">Pengajuan Kucing</button>

        <button
            class="px-5 py-2 -mb-px font-semibold border-b-4 transition-colors duration-300
        {{ $activeTab === 'adoption' ? 'border-green-700 text-green-700' : 'border-transparent text-gray-600 hover:text-green-600 hover:border-green-600' }}"
            onclick="changeTab('adoption')"
            type="button">Pengajuan Adopsi</button>
    </div>

    <div class="flex-1 text-left mb-5">
        <a href="{{ route('admin.adoptions.cats.create') }}"
            class="inline-block bg-[#578E7E] text-white px-4 py-2 rounded hover:bg-[#466f6a]">
            + Tambah Kucing
        </a>
    </div>

    @if(session('success'))
    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
        {{ session('error') }}
    </div>
    @endif

    <!-- Tab Contents -->
    <div>
        <!-- Daftar Kucing -->
        <div class="{{ $activeTab === 'cat' ? 'block' : 'hidden' }}">
            <form method="GET" action="{{ route('admin.adoptions.index') }}" class="mb-6 flex flex-wrap gap-3 items-center">
                <input type="hidden" name="active_tab" value="cat" />
                <input
                    type="text"
                    name="search_cat"
                    placeholder="Cari nama kucing..."
                    value="{{ request('search_cat') }}"
                    class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400" />
                <select name="gender_cat" class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400">
                    <option value="">Semua Jenis Kelamin</option>
                    <option value="male" {{ request('gender_cat') === 'male' ? 'selected' : '' }}>Jantan</option>
                    <option value="female" {{ request('gender_cat') === 'female' ? 'selected' : '' }}>Betina</option>
                </select>
                <select name="breed_cat" class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400">
                    <option value="">Semua Jenis Kucing</option>
                    @foreach($breeds as $breed)
                    <option value="{{ $breed->id }}" {{ request('breed_cat') == $breed->id ? 'selected' : '' }}>
                        {{ $breed->name }}
                    </option>
                    @endforeach
                </select>
                <button type="submit" class="bg-green-600 text-white px-5 py-2 rounded-md shadow hover:bg-green-700 transition-colors">Filter</button>
            </form>

            <table class="w-full border-collapse border border-gray-300 rounded-md overflow-hidden shadow-sm">
                <thead class="bg-[#F5ECD5]">
                    <tr>
                        <th class="border border-gray-300 px-4 py-3 text-left">Gambar</th>
                        <th class="border border-gray-300 px-4 py-3 text-left">Nama Kucing</th>
                        <th class="border border-gray-300 px-4 py-3 text-left">Jenis Kelamin</th>
                        <th class="border border-gray-300 px-4 py-3 text-left">Jenis Kucing</th>
                        <th class="border border-gray-300 px-4 py-3 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cats as $cat)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2 relative">
                            @if ($cat->images->isNotEmpty())
                            <div class="relative inline-block">
                                <img src="{{ asset('storage/' . $cat->images->first()->image_path) }}"
                                    alt="Gambar Kucing"
                                    class="h-16 w-16 object-cover rounded">
                                @if ($cat->images->count() > 1)
                                <span class="absolute bottom-0 left-0 bg-[#578E7E] text-white text-xs px-1.5 py-0.5 rounded-full shadow">
                                    +{{ $cat->images->count() - 1 }}
                                </span>
                                @endif
                            </div>
                            @else
                            <span class="text-gray-400 italic">Tidak ada gambar</span>
                            @endif
                        </td>
                        <td class="border border-gray-300 px-4 py-2 font-medium">{{ $cat->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            {{ $cat->gender === 'male' ? 'Jantan' : ($cat->gender === 'female' ? 'Betina' : '-') }}
                        </td>
                        <td class="border border-gray-300 px-4 py-2">{{ $cat->breed ? $cat->breed->name : '-' }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <a href="{{ route('admin.adoptions.cats.show', $cat->id) }}" class="text-blue-700 hover:underline mr-3">Detail</a>
                            <a href="{{ route('admin.adoptions.cats.edit', $cat->id) }}" class="text-green-700 hover:underline mr-3">Edit</a>
                            <form action="{{ route('admin.adoptions.cats.destroy', $cat->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus kucing ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @if($cats->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-500">Tidak ada data kucing.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <!-- Pengajuan Kucing -->
        <div class="{{ $activeTab === 'submission' ? 'block' : 'hidden' }}">
            <form method="GET" action="{{ route('admin.adoptions.index') }}" class="mb-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3 items-start">
                <input type="hidden" name="active_tab" value="submission" />

                <input
                    type="text"
                    name="search_submission_cat"
                    placeholder="Cari nama kucing..."
                    value="{{ request('search_submission_cat') }}"
                    class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400" />

                <input
                    type="text"
                    name="search_submission_applicant"
                    placeholder="Cari nama pengaju..."
                    value="{{ request('search_submission_applicant') }}"
                    class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400" />

                <select name="gender_submission" class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400">
                    <option value="">Semua Jenis Kelamin</option>
                    <option value="male" {{ request('gender_submission') === 'male' ? 'selected' : '' }}>Jantan</option>
                    <option value="female" {{ request('gender_submission') === 'female' ? 'selected' : '' }}>Betina</option>
                </select>

                <select name="breed_cat" class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400">
                    <option value="">Semua Jenis Kucing</option>
                    @foreach($breeds as $breed)
                    <option value="{{ $breed->id }}" {{ request('breed_cat') == $breed->id ? 'selected' : '' }}>
                        {{ $breed->name }}
                    </option>
                    @endforeach
                </select>

                <select name="submission_status" class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400">
                    <option value="">Semua Status Pengajuan</option>
                    <option value="pending" {{ request('submission_status') === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="approved" {{ request('submission_status') === 'approved' ? 'selected' : '' }}>Disetujui</option>
                    <option value="rejected" {{ request('submission_status') === 'rejected' ? 'selected' : '' }}>Ditolak</option>
                </select>

                <input type="date" name="submission_date" value="{{ request('submission_date') }}"
                    class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400"
                    placeholder="Tanggal pengajuan">

                <button type="submit"
                    class="bg-green-600 text-white px-5 py-2 rounded-md shadow hover:bg-green-700 transition-colors self-end">
                    Filter
                </button>
            </form>

            <table class="w-full border-collapse border border-gray-300 rounded-md overflow-hidden shadow-sm">
                <thead class="bg-[#F5ECD5]">
                    <tr>
                        <th class="border border-gray-300 px-4 py-3 text-left">Gambar</th>
                        <th class="border border-gray-300 px-4 py-3 text-left">Nama Kucing</th>
                        <th class="border border-gray-300 px-4 py-3 text-left">Nama Pengaju</th>
                        <th class="border border-gray-300 px-4 py-3 text-left">Jenis Kelamin</th>
                        <th class="border border-gray-300 px-4 py-3 text-left">Jenis Kucing</th>
                        <th class="border border-gray-300 px-4 py-3 text-left">Tanggal Pengajuan</th>
                        <th class="border border-gray-300 px-4 py-3 text-left">Status</th>
                        <th class="border border-gray-300 px-4 py-3 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($catSubmissions as $submission)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2 relative">
                            @if ($submission->images->isNotEmpty())
                            <div class="relative inline-block">
                                <img src="{{ asset('storage/' . $submission->images->first()->image_path) }}"
                                    alt="Gambar Kucing"
                                    class="h-16 w-16 object-cover rounded">
                                @if ($submission->images->count() > 1)
                                <span class="absolute bottom-0 left-0 bg-[#578E7E] text-white text-xs px-1.5 py-0.5 rounded-full shadow">
                                    +{{ $submission->images->count() - 1 }}
                                </span>
                                @endif
                            </div>
                            @else
                            <span class="text-gray-400 italic">Tidak ada gambar</span>
                            @endif
                        </td>

                        <td class="border border-gray-300 px-4 py-2 font-medium">{{ $submission->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $submission->user->name }}</td>

                        <td class="border border-gray-300 px-4 py-2">
                            {{ $submission->gender === 'male' ? 'Jantan' : ($submission->gender === 'female' ? 'Betina' : '-') }}
                        </td>

                        <td class="border border-gray-300 px-4 py-2">
                            {{ $submission->breed ? $submission->breed->name : '-' }}
                        </td>

                        <td class="border border-gray-300 px-4 py-2">{{ $submission->created_at->format('d M Y') }}</td>

                        {{-- Kolom STATUS --}}
                        <td class="border border-gray-300 px-4 py-2">
                            <span class="inline-block px-2 py-1 rounded text-white
            {{ $submission->status === 'approved' ? 'bg-green-600' :
               ($submission->status === 'pending' ? 'bg-yellow-500' : 'bg-red-600') }}">
                                {{ ucfirst($submission->status) }}
                            </span>
                        </td>

                        {{-- Kolom AKSI --}}
                        <td class="border border-gray-300 px-4 py-2">
                            @if ($submission->status === 'pending')
                            <form action="{{ route('admin.cat-submissions.approve', $submission->id) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit"
                                    onclick="return confirm('Setujui pengajuan ini?')"
                                    class="bg-green-600 hover:bg-green-700 text-white text-sm px-3 py-1 rounded mb-1">
                                    Setujui
                                </button>
                            </form>

                            <form method="POST" onsubmit="return false;" class="inline">
                                <button type="button"
                                    onclick="openRejectModal({{ $submission->id }})"
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm shadow">
                                    Tolak
                                </button>
                            </form>
                            @else
                            <span class="text-sm text-gray-500 italic"></span>
                            @endif

                            <a href="{{ route('admin.adoptions.cat-submissions.show', $submission->id) }}"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm shadow">Detail</a>
                        </td>
                    </tr>
                    @endforeach
                    @if($catSubmissions->isEmpty())
                    <tr>
                        <td colspan="7" class="text-center py-4 text-gray-500">Tidak ada pengajuan kucing.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
            <!-- Modal Tolak Pengajuan Kucing -->
            <div id="rejectModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
                <div class="bg-white w-full max-w-md rounded-lg p-6">
                    <h2 class="text-lg font-semibold mb-4">Tolak Pengajuan Kucing</h2>
                    <form id="rejectForm" method="POST">
                        @csrf
                        <input type="hidden" name="submission_id" id="rejectSubmissionId">
                        <label for="reason" class="block mb-2 font-medium">Tulis Alasan Penolakan:</label>
                        <textarea name="reason" id="reason" required rows="3"
                            class="w-full border border-gray-300 rounded px-3 py-2 mb-4 focus:outline-none focus:ring-2 focus:ring-red-400"
                            placeholder="Tulis alasan penolakan di sini..."></textarea>
                        <div class="flex justify-end space-x-3">
                            <button type="button" onclick="closeRejectModal()" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</button>
                            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Tolak</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Pengajuan Adopsi -->
        <div class="{{ $activeTab === 'adoption' ? 'block' : 'hidden' }}">
            <form method="GET" action="{{ route('admin.adoptions.index') }}" class="mb-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3 items-start">
                <input type="hidden" name="active_tab" value="adoption" />

                <input
                    type="text"
                    name="search_adoption_cat"
                    placeholder="Cari nama kucing..."
                    value="{{ request('search_adoption_cat') }}"
                    class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400" />

                <input
                    type="text"
                    name="search_adoption_applicant"
                    placeholder="Cari nama pemohon..."
                    value="{{ request('search_adoption_applicant') }}"
                    class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400" />

                <select name="gender_adoption" class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400">
                    <option value="">Semua Jenis Kelamin</option>
                    <option value="male" {{ request('gender_adoption') === 'male' ? 'selected' : '' }}>Jantan</option>
                    <option value="female" {{ request('gender_adoption') === 'female' ? 'selected' : '' }}>Betina</option>
                </select>

                <select name="breed_cat" class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400">
                    <option value="">Semua Jenis Kucing</option>
                    @foreach($breeds as $breed)
                    <option value="{{ $breed->id }}" {{ request('breed_cat') == $breed->id ? 'selected' : '' }}>
                        {{ $breed->name }}
                    </option>
                    @endforeach
                </select>

                <input
                    type="date"
                    name="adoption_date"
                    value="{{ request('adoption_date') }}"
                    class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400" />

                <select name="adoption_status" class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400">
                    <option value="">Semua Status Pengajuan</option>
                    <option value="pending" {{ request('adoption_status') === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="approved" {{ request('adoption_status') === 'approved' ? 'selected' : '' }}>Disetujui</option>
                    <option value="rejected" {{ request('adoption_status') === 'rejected' ? 'selected' : '' }}>Ditolak</option>
                </select>

                <button type="submit" class="bg-green-600 text-white px-5 py-2 rounded-md shadow hover:bg-green-700 transition-colors self-end">
                    Filter
                </button>

            </form>

            <form method="GET" action="{{ route('admin.adoptions.export') }}" class="self-end w-full md:w-auto">
                <input type="hidden" name="search_adoption_cat" value="{{ request('search_adoption_cat') }}">
                <input type="hidden" name="search_adoption_applicant" value="{{ request('search_adoption_applicant') }}">
                <input type="hidden" name="gender_adoption" value="{{ request('gender_adoption') }}">
                <input type="hidden" name="breed_cat" value="{{ request('breed_cat') }}">
                <input type="hidden" name="adoption_date" value="{{ request('adoption_date') }}">
                <input type="hidden" name="adoption_status" value="{{ request('adoption_status') }}">

                <button type="submit"
                    class="bg-green-700 hover:bg-green-800 text-white px-5 py-2 mb-5 rounded-md shadow w-full md:w-auto">
                    Export ke Excel
                </button>
            </form>

            <div x-data="{ openModal: false, selectedMessage: '' }">
                <table class="w-full border-collapse border border-gray-300 rounded-md overflow-hidden shadow-sm">
                    <thead class="bg-[#F5ECD5]">
                        <tr>
                            <th class="border border-gray-300 px-4 py-3 text-left">Gambar</th>
                            <th class="border border-gray-300 px-4 py-3 text-left">Nama Kucing</th>
                            <th class="border border-gray-300 px-4 py-3 text-left">Nama Pemohon</th>
                            <th class="border border-gray-300 px-4 py-3 text-left">Alasan Adopsi</th>
                            <th class="border border-gray-300 px-4 py-3 text-left">Jenis Kelamin</th>
                            <th class="border border-gray-300 px-4 py-3 text-left">Jenis Kucing</th>
                            <th class="border border-gray-300 px-4 py-3 text-left">Tanggal Pengajuan</th>
                            <th class="border border-gray-300 px-4 py-3 text-left">Status</th>
                            <th class="border border-gray-300 px-4 py-3 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($adoptionSubmissions as $adoption)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">
                                @if ($adoption->cat && $adoption->cat->images->isNotEmpty())
                                <div class="relative inline-block">
                                    <img src="{{ asset('storage/' . $adoption->cat->images->first()->image_path) }}"
                                        alt="Gambar Kucing"
                                        class="h-16 w-16 object-cover rounded">
                                    @if ($adoption->cat->images->count() > 1)
                                    <span class="absolute bottom-0 left-0 bg-[#578E7E] text-white text-xs px-1.5 py-0.5 rounded-full shadow">
                                        +{{ $adoption->cat->images->count() - 1 }}
                                    </span>
                                    @endif
                                </div>
                                @else
                                <span class="text-gray-400 italic">Tidak ada gambar</span>
                                @endif
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                {{ $adoption->cat->name ?? '-' }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                {{ $adoption->user->name ?? '-' }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                <button @click="openModal = true; selectedMessage = @js($adoption->message)"
                                    class="text-sm text-blue-600 underline hover:text-blue-800 transition">
                                    Lihat Alasan
                                </button>
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                {{ $adoption->cat->gender === 'male' ? 'Jantan' : ($adoption->cat->gender === 'female' ? 'Betina' : '-') }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                {{ $adoption->cat && $adoption->cat->breed ? $adoption->cat->breed->name : '-' }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                {{ $adoption->created_at->format('d M Y') }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                <span class="inline-block px-2 py-1 rounded text-white
                  {{ $adoption->status === 'approved' ? 'bg-green-600' : ($adoption->status === 'pending' ? 'bg-yellow-500' : 'bg-red-600') }}">
                                    {{ ucfirst($adoption->status) }}
                                </span>
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                @if ($adoption->status === 'pending')
                                <form action="{{ route('admin.adoptions.approve', $adoption->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit"
                                        onclick="return confirm('Yakin ingin menyetujui pengajuan ini?')"
                                        class="bg-green-600 hover:bg-green-700 text-white text-sm px-3 py-1 rounded mb-1">
                                        Setujui
                                    </button>
                                </form>

                                <form method="POST" onsubmit="return false;" class="inline">
                                    <button type="button"
                                        onclick="openRejectAdoptionModal({{ $adoption->id }})"
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm shadow">
                                        Tolak
                                    </button>
                                </form>
                                @else
                                <span class="text-sm px-2 py-1 rounded 
            {{ $adoption->status === 'approved' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                    {{ ucfirst($adoption->status) }}
                                </span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        @if($adoptionSubmissions->isEmpty())
                        <tr>
                            <td colspan="9" class="text-center py-4 text-gray-500">Tidak ada pengajuan adopsi.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
                <div id="rejectAdoptionModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
                    <div class="bg-white w-full max-w-md rounded-lg p-6">
                        <h2 class="text-lg font-semibold mb-4">Tolak Pengajuan Adopsi</h2>
                        <form id="rejectAdoptionForm" method="POST">
                            @csrf
                            <input type="hidden" name="adoption_id" id="rejectAdoptionId">
                            <label for="reason_adoption" class="block mb-2 font-medium">Tulis Alasan Penolakan:</label>
                            <textarea name="reason" id="reason_adoption" required rows="3"
                                class="w-full border border-gray-300 rounded px-3 py-2 mb-4 focus:outline-none focus:ring-2 focus:ring-red-400"
                                placeholder="Tulis alasan penolakan di sini..."></textarea>
                            <div class="flex justify-end space-x-3">
                                <button type="button" onclick="closeRejectAdoptionModal()" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</button>
                                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Tolak</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Modal Lihat Alasan -->
                <div x-show="openModal" x-cloak class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                    <div @click.away="openModal = false"
                        class="bg-white rounded-xl shadow-lg max-w-lg w-full p-6 space-y-4">
                        <h3 class="text-xl font-semibold text-[#578E7E]">Alasan Adopsi</h3>
                        <p class="text-gray-700 whitespace-pre-line" x-text="selectedMessage"></p>
                        <div class="text-right">
                            <button @click="openModal = false"
                                class="mt-4 bg-[#578E7E] hover:bg-[#3D3D3D] text-white px-4 py-2 rounded">
                                Tutup
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function changeTab(tabName) {
        const url = new URL(window.location);
        url.searchParams.set('active_tab', tabName);
        // Reset filters optional, atau bisa biarkan
        window.location = url.toString();
    }

    function openRejectModal(submissionId) {
        document.getElementById('rejectModal').classList.remove('hidden');
        document.getElementById('rejectSubmissionId').value = submissionId;
        document.getElementById('rejectForm').action = `/admin/cat-submissions/${submissionId}/reject`; // pastikan sesuai route
    }

    function closeRejectModal() {
        document.getElementById('rejectModal').classList.add('hidden');
    }

    function openRejectAdoptionModal(adoptionId) {
        document.getElementById('rejectAdoptionModal').classList.remove('hidden');
        document.getElementById('rejectAdoptionId').value = adoptionId;
        document.getElementById('rejectAdoptionForm').action = `/admin/adoptions/${adoptionId}/reject`; // sesuaikan dengan route kamu
    }

    function closeRejectAdoptionModal() {
        document.getElementById('rejectAdoptionModal').classList.add('hidden');
    }
</script>

@endsection