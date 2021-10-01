<?php namespace Phuclh\DKLogDefaultTheme;

use Phuclh\DKLog\DK;
use Phuclh\DKLog\AddonsServiceProvider;

class DKLogDefaultTheme extends AddonsServiceProvider
{
    public function boot()
    {
        DK::booted(function () {
            DK::themeStyle(asset($this->key() . '/css/theme.css'));
            DK::themeScript(asset($this->key() . '/js/theme.js'));
        });

        $this->registerThemeViews();
    }

    public function key(): string
    {
        return 'phuclh/dklog-default-theme';
    }
}
