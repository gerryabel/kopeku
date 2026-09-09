@extends('layouts.notificationcats')

@section('title', 'Notifikasi Adopsi')

@section('notificationcats-content')
<h1 class="text-2xl font-bold mb-3 text-[#4F4F4F]">🔔 Notifikasi Pengajuan</h1>

<div class="flex justify-between items-center mb-5">
    <a href="{{ route('adoptions.index') }}" class="text-sm text-gray-600 hover:underline">← Kembali</a>
</div>

@if(session('success'))
<div class="mb-4 p-3 bg-green-100 border border-green-300 text-green-800 rounded">
    {{ session('success') }}
</div>
@endif

@if ($notifications->isEmpty())
<p class="text-gray-600 italic">Tidak ada notifikasi.</p>
@else
<form action="{{ route('adoptions.notifications.readAll') }}" method="POST" class="mb-6">
    @csrf
    <button type="submit"
        class="px-4 py-2 bg-[#578E7E] text-white rounded hover:bg-[#476e63] transition font-medium">
        Tandai Semua Sudah Dibaca
    </button>
</form>

<div class="space-y-4">
    @foreach ($notifications as $notification)
    <div class="flex items-start gap-4 p-4 border rounded-lg shadow-sm
        {{ is_null($notification->read_at) ? 'bg-yellow-50 border-yellow-300' : 'bg-white' }}">

        {{-- Icon Status --}}
        <div class="mt-1">
            @if (is_null($notification->read_at))
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" />
            </svg>
            @else
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 13l4 4L19 7" />
            </svg>
            @endif
        </div>

        {{-- Konten Notifikasi --}}
        <div class="flex-1">
            <div class="text-gray-800 leading-relaxed">
                {!! $notification->data['message'] ?? 'Tidak ada pesan' !!}
            </div>

            <div class="mt-2">
                <a href="{{ route('adoptions.catsubmission.index') }}"
                    class="inline-block text-sm text-blue-600 hover:underline">
                    🔍 Lihat Detail
                </a>
            </div>

            <div class="text-sm text-gray-500 mt-2">
                {{ $notification->created_at->diffForHumans() }}
                @if (is_null($notification->read_at))
                <strong class="ml-2 text-yellow-600">(Belum dibaca)</strong>
                @else
                <span class="ml-2">(Sudah dibaca)</span>
                @endif
            </div>

            @if (is_null($notification->read_at))
            <form action="{{ route('adoptions.notifications.read', $notification->id) }}" method="POST"
                class="mt-2">
                @csrf
                <button type="submit"
                    class="text-sm text-blue-600 hover:underline font-medium">
                    ✅ Tandai Sudah Dibaca
                </button>
            </form>
            @endif
        </div>
    </div>
    @endforeach
</div>

{{-- Pagination --}}
<div class="mt-8">
    {{ $notifications->links() }}
</div>
@endif
@endsection