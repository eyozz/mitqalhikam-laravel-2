<picture>
    @if ($avifSources !== [])
        <source type="image/avif" srcset="{{ implode(', ', $avifSources) }}" sizes="{{ $sizes }}">
    @endif
    @if ($webpSources !== [])
        <source type="image/webp" srcset="{{ implode(', ', $webpSources) }}" sizes="{{ $sizes }}">
    @endif
    <img
        src="{{ $fallbackSrc }}"
        @if ($jpegSources !== []) srcset="{{ implode(', ', $jpegSources) }}" sizes="{{ $sizes }}" @endif
        alt="{{ $alt }}"
        @if ($resolvedWidth) width="{{ $resolvedWidth }}" @endif
        @if ($resolvedHeight) height="{{ $resolvedHeight }}" @endif
        loading="{{ $loading }}"
        decoding="{{ $decoding }}"
        @if ($fetchpriority) fetchpriority="{{ $fetchpriority }}" @endif
        {{ $attributes }}
    >
</picture>
