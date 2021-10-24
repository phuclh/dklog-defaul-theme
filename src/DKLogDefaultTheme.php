<?php namespace Phuclh\DKLogDefaultTheme;

use Phuclh\DKLog\DK;
use Phuclh\DKLog\Theme;
use Phuclh\DKLog\View\Data\Component;
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
        $this->registerViewData(Component::HOME, [
            new RecentPostsViewData
        ]);
    }

    public function key(): string
    {
        return 'phuclh/dklog-default-theme';
    }
}
