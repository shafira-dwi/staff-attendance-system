@props(['type' => 'primary'])

@php
    $classes = match ($type) {
        'secondary' => 'bg-gray-200 text-gray-800',
        'danger' => 'bg-red-600 text-white',
        default => 'bg-blue-600 text-white',
    };
@endphp

<button {{ $attributes->merge([
    'class' => "px-4 py-2 rounded hover:opacity-90 {$classes}",
]) }}>
    {{ $slot }}
</button>
