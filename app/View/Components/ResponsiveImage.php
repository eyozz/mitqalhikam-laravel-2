<?php

declare(strict_types=1);

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ResponsiveImage extends Component
{
    /** @var array<int, string> */
    public array $avifSources = [];

    /** @var array<int, string> */
    public array $webpSources = [];

    /** @var array<int, string> */
    public array $jpegSources = [];

    public string $fallbackSrc;

    public ?int $resolvedWidth;

    public ?int $resolvedHeight;

    public function __construct(
        public string $src,
        public string $alt = '',
        public string $sizes = '100vw',
        public string $loading = 'lazy',
        public string $decoding = 'async',
        public int|string|null $width = null,
        public int|string|null $height = null,
        public ?string $fetchpriority = null,
    ) {
        $this->fallbackSrc = $this->src;
        $this->resolvedWidth = $this->width ? (int) $this->width : null;
        $this->resolvedHeight = $this->height ? (int) $this->height : null;
        $this->hydrateSources();
    }

    public function render(): View
    {
        return view('components.responsive-image');
    }

    private function hydrateSources(): void
    {
        $relativePath = ltrim(parse_url($this->src, PHP_URL_PATH) ?: $this->src, '/');

        if (! str_starts_with($relativePath, 'images/')) {
            $this->resolveDimensions($relativePath);
            return;
        }

        $optimizedDirectory = public_path('images/optimized/'.md5($relativePath));

        if (! is_dir($optimizedDirectory)) {
            $this->resolveDimensions($relativePath);
            return;
        }

        foreach (glob($optimizedDirectory.'/*.jpg') ?: [] as $jpegPath) {
            $imageWidth = (int) pathinfo($jpegPath, PATHINFO_FILENAME);
            $publicBasePath = '/images/optimized/'.basename($optimizedDirectory).'/'.$imageWidth;

            $this->jpegSources[$imageWidth] = $publicBasePath.'.jpg '.$imageWidth.'w';

            if (is_file($optimizedDirectory.'/'.$imageWidth.'.webp')) {
                $this->webpSources[$imageWidth] = $publicBasePath.'.webp '.$imageWidth.'w';
            }

            if (is_file($optimizedDirectory.'/'.$imageWidth.'.avif')) {
                $this->avifSources[$imageWidth] = $publicBasePath.'.avif '.$imageWidth.'w';
            }
        }

        ksort($this->jpegSources);
        ksort($this->webpSources);
        ksort($this->avifSources);

        if ($this->jpegSources !== []) {
            $targetWidth = $this->resolvedWidth ?: 640;
            $availableWidths = array_keys($this->jpegSources);
            $selectedWidth = end($availableWidths);

            foreach ($availableWidths as $availableWidth) {
                if ($availableWidth >= $targetWidth) {
                    $selectedWidth = $availableWidth;
                    break;
                }
            }

            $this->fallbackSrc = '/images/optimized/'.basename($optimizedDirectory).'/'.$selectedWidth.'.jpg';
        }

        $this->resolveDimensions($relativePath);
    }

    private function resolveDimensions(string $relativePath): void
    {
        if ($this->resolvedWidth && $this->resolvedHeight) {
            return;
        }

        $imagePath = public_path($relativePath);

        if (! is_file($imagePath)) {
            return;
        }

        $size = @getimagesize($imagePath);

        if ($size === false) {
            return;
        }

        $this->resolvedWidth ??= $size[0];
        $this->resolvedHeight ??= $size[1];
    }
}
