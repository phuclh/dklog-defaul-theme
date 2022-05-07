<?php namespace Phuclh\DKLogDefaultTheme;

use Phuclh\DKLog\DK;
use Phuclh\DKLog\Theme;
use Phuclh\DKLog\View\Data\Component;
use Phuclh\DKLogDefaultTheme\Shortcodes\GalleryItemShortCode;
use Phuclh\DKLogDefaultTheme\Shortcodes\GalleryShortCode;
use Phuclh\DKLogDefaultTheme\ViewData\RecentPostsViewData;

class DKLogDefaultTheme extends Theme
{
    public function boot()
    {
        DK::booted(function () {
            DK::themeStyle(asset($this->key() . '/css/theme.css'));
            DK::themeScript(asset($this->key() . '/js/theme.js'));
        });

        $this->registerThemeViews();
        $this->publishThemeAssets();
        $this->registerViewData(Component::HOME, [
            new RecentPostsViewData
        ]);

        DK::useShortcode('gallery', GalleryShortCode::class)
            ->useShortcode('gallery-item', GalleryItemShortCode::class);
    }

    public function key(): string
    {
        return 'phuclh/dklog-default-theme';
    }
}
