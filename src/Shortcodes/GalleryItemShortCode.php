<?php

namespace Phuclh\DKLogDefaultTheme\Shortcodes;

use Phuclh\DKLog\Shortcode;

class GalleryItemShortCode implements Shortcode
{
    public function register($shortcode, $content, $compiler, $name, $viewData): string
    {
        $alt = $shortcode->alt ?? null;
        $src = $shortcode->src ?? null;
        $full = $shortcode->full ? 'true' : 'false';

        return <<< HTML
            <a 
                href="#" 
                x-bind:class="{
                    'group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 overflow-hidden': style === 'row',
                    'group block w-1/2 p-1 md:p-2': style === 'mix' && '$full' === 'false',
                    'group block w-full p-1 md:p-2': style === 'mix' && '$full' === 'true',
                }"
            >
                <img 
                    src="$src" 
                    alt="$alt"
                    x-bind:class="group" 
                    x-bind:class="{
                        'w-full h-full block': style === 'mix'
                    }"
                    class="group-hover:opacity-75 object-cover object-center rounded-lg" style="margin-top: 0; margin-bottom: 0">
            </a><!-- gallery-item-end -->
        HTML;
    }

    protected function mixStyle(): string
    {
        return <<< HTML
                <div class="flex flex-wrap w-1/2">
                    <div class="w-1/2 p-1 md:p-2">
                      <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                        src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(70).webp">
                    </div>
                    <div class="w-1/2 p-1 md:p-2">
                      <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                        src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(72).webp">
                    </div>
                    <div class="w-full p-1 md:p-2">
                      <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                        src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(73).webp">
                    </div>
                  </div>
                  <div class="flex flex-wrap w-1/2">
                    <div class="w-full p-1 md:p-2">
                      <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                        src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(74).webp">
                    </div>
                    <div class="w-1/2 p-1 md:p-2">
                      <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                        src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(75).webp">
                    </div>
                    <div class="w-1/2 p-1 md:p-2">
                      <img alt="gallery" class="block object-cover object-center w-full h-full rounded-lg"
                        src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(77).webp">
                    </div>
                  </div>
        HTML;
    }
}
