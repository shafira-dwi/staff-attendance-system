@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'inline-flex items-center px-3 py-2 rounded-lg text-sm font-medium bg-indigo-50 text-indigo-600 transition duration-200'
            : 'inline-flex items-center px-3 py-2 rounded-lg text-sm font-medium text-slate-500 hover:text-indigo-600 hover:bg-indigo-50 transition duration-200';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
