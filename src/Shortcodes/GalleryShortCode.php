<?php

namespace Phuclh\DKLogDefaultTheme\Shortcodes;

use Phuclh\DKLog\Shortcode;
use Illuminate\Support\Facades\Blade;

class GalleryShortCode implements Shortcode
{
    public function register($shortcode, $content, $compiler, $name, $viewData): string
    {
        $glightbox = Blade::render('<x-dklog::glightbox/>');

        $selector = $shortcode->group ?? 'glightbox-' . str()->random(8);
        $width = $shortcode->width ? str($shortcode->width)->finish('px') : '900px';
        $height = $shortcode->height ? str($shortcode->height)->finish('px') : '506px';
        $loop = $shortcode->loop ?? true;

        $style = match ($shortcode->style) {
            'mix' => 'mix',
            default => 'row'
        };

        $alpineJs = $this->alpineJs($selector, $style, $width, $height, $loop);

        $html = match ($style) {
            'mix' => $this->mixStyle($alpineJs, $content),
            'row' => $this->rowStyle($alpineJs, $content)
        };

        return $html . $glightbox;
    }

    protected function rowStyle(string $alpineJs, string $content): string
    {
        $galleryItems = $this->getRenderedGalleryItems($content);

        $cols = match (count($galleryItems)) {
            default => 'grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-3 xl:grid-cols-4',
            3 => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-3',
            2 => 'grid-cols-2',
            1 => 'grid-cols-1',
        };

        return <<< HTML
            <section $alpineJs>
                <div class="grid gap-3 $cols">
                    $content
                </div>
            </section>
        HTML;
    }

    protected function mixStyle(string $alpineJs, string $content): string
    {
        $galleryItems = $this->getRenderedGalleryItems($content);
        $width = count($galleryItems) <= 3 ? 'sm:w-full' : 'sm:w-1/2';

        $content = '';
        foreach (array_chunk($galleryItems, 3) as $galleryItemsChunk) {
            $content .= '<div class="flex flex-wrap w-full ' . $width . '">' . implode("\n", $galleryItemsChunk) . '</div>';
        }

        return <<< HTML
            <section $alpineJs>
                <div class="px-5 py-2 mx-auto">
                    <div class="flex flex-wrap -m-1 md:-m-2">
                        $content
                    </div>
                </div>
            </section>
        HTML;
    }

    protected function alpineJs(string $selector, string $style, string $width, string $height, bool $loop): string
    {
        return <<< HTML
            x-data="{
                group: '$selector',
                style: '$style',
                init() {
                    this.\$nextTick(() => { 
                        GLightbox({
                            selector: '.$selector',
                            width: '$width',
                            height: '$height',
                            loop: '$loop'
                        }); 
                    });
                }
            }"
    HTML;
    }

    protected function getRenderedGalleryItems(string $content): array
    {
        return array_filter(explode("<!-- gallery-item-end -->\n", $content));
    }
}
