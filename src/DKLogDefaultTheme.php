<?php namespace Phuclh\DKLogDefaultTheme;

use Phuclh\DKLog\DK;
use Phuclh\DKLog\AddonsServiceProvider;

class DKLogDefaultTheme extends AddonsServiceProvider
{
    public function boot()
    {
        DK::booted(function () {
            DK::themeStyle(asset('/phuclh/dklog-default-theme/css/theme.css'));
            DK::themeScript(asset('/phuclh/dklog-default-theme/js/theme.js'));
        });

        $this->loadViewsFrom($this->basePath('/../resources/views'), 'dklog');

        $this->publishes([
            $this->basePath('/../resources/dist') => public_path('phuclh/dklog-default-theme'),
        ], 'dklog-default-theme-assets');

        $this->publishes([
            $this->basePath('/../resources/views') => resource_path('views/vendor/dklog'),
        ], 'dklog-default-theme-views');
    }
}
