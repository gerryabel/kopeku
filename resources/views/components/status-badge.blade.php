@php
    $colors = [
        'pending' => 'bg-orange-100 text-orange-600',
        'approved' => 'bg-green-100 text-green-600',
        'rejected' => 'bg-red-100 text-red-600',
    ];
@endphp

<span class="px-2 py-1 rounded text-xs font-semibold {{ $colors[$status] ?? 'bg-gray-100 text-gray-600' }}">
    {{ ucfirst($status) }}
</span>
