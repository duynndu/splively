@props(['active', 'href'])

@php
$classes = ($active ?? false)
            ? 'nav-link active'
            : 'nav-link';
@endphp

<a {{ $attributes->merge(['class' => $classes, 'href' => $href]) }}>
    {{ $slot }}
</a>
