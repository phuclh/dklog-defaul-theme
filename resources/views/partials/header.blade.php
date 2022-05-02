<header class="mt-6 sm:mt-4 container mx-auto">
    <div class="sm:flex sm:items-baseline px-6 md:px-8 pt-4 pb-4 sm:pb-8">
        <a href="{{ route('home') }}" class="md:inline-flex md:items-baseline font-bold text-base uppercase dark:text-white">
            <span class="text-gray-800">{{ config('app.name') }}</span>
        </a>

        <nav class="ml-auto flex items-baseline uppercase text-sm mt-4 sm:mt-0">
            <form action="{{ route('search') }}" method="GET">
                <label for="search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="pointer-events-none absolute inset-y-0 left-0 pl-3 flex items-center">
                        <x-heroicon-s-search class="h-5 w-5 text-gray-400"/>
                    </div>
                    <input
                            x-data="{
                                blacklistTags: ['INPUT', 'TEXTAREA']
                            }"
                            x-on:keydown.window="
                                if ($event.keyCode === 191 && !blacklistTags.includes($event.target.tagName)) {
                                    $event.preventDefault();
                                    $refs['searchInput'].focus();
                                }
                            "
                            value="{{ request('query') }}"
                            x-ref="searchInput"
                            id="search"
                            name="query"
                            class="block w-full bg-white border border-gray-300 rounded-md py-2 pl-10 pr-3 text-sm placeholder-gray-500 focus:outline-none focus:text-gray-900 focus:placeholder-gray-400 focus:ring-1 focus:ring-black focus:border-black sm:text-sm"
                            placeholder="Press / to search"
                            type="search">
                </div>
            </form>
        </nav>
    </div>

    <div class="md:flex px-6 items-center">
        <div class="flex-shrink-0">
            <a href="{{ route('home') }}" title="{{ config('app.name') }}">
                <img class="hidden dark:hidden md:inline-block md:dark:hidden md:max-w-[200px]" src="{{ asset('vendor/dklog/images/logo-dark.svg') }}" alt="{{ config('app.name') }}">
                <img class="hidden md:dark:inline-block md:dark:max-w-[200px]" src="{{ asset('vendor/dklog/images/logo.svg') }}" alt="{{ config('app.name') }}">
            </a>
        </div>

        <section class="md:ml-10">
            <h1 class="text-gray-800 leading-normal text-2xl md:text-3xl dark:text-white">Hi there! 👋</h1>

            <p class="mt-6 text-gray-600 dark:text-white leading-normal text-lg md:text-xl">
                You can customize this section by publishing views.
            </p>
        </section>
    </div>

    <hr class="my-8 border-dashed border-gray-300 dark:border-gray-800">
</header>
