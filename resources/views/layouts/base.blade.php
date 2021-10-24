<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <x-dklog::head/>
</head>
<body class="font-sans antialiased dark:bg-black">

{{ $slot }}

<footer class="py-8 text-center text-sm text-gray-500 dark:text-blue-200">
    This site was built using <span class="text-gray-600 dark:text-white">DKLog</span>.

    @if (Route::has('feeds.main'))
        Follow the <a href="{{ url(config('feed.feeds.main.url')) }}" target="_blank" class="text-gray-600 hover:underline dark:text-white">RSS Feed</a>.
    @endif
</footer>

@stack('scripts')

</body>
</html>
