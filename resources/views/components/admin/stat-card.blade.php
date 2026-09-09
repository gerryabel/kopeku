@props(['icon', 'label', 'value', 'color', 'labelClass' => 'text-softgray'])

<div class="p-5 rounded-xl shadow-sm {{ $color }}">
    <div class="flex items-center justify-between">
        <div class="text-2xl">{{ $icon }}</div>
        <div class="text-right">
            <div class="text-sm font-semibold {{ $labelClass }}">{{ $label }}</div>
            <div class="text-3xl font-bold mt-1">{{ $value }}</div>
        </div>
    </div>
</div>
