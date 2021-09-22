<div class="md:flex px-6 items-center">
    <div class="flex-shrink-0">
        <a href="{{ route('home') }}" title="{{ config('app.name') }}">
            <img class="hidden dark:hidden md:inline-block md:dark:hidden md:max-w-[200px]" src="{{ asset('vendor/dklog/images/logo-dark.svg') }}" alt="{{ config('app.name') }}">
            <img class="hidden md:dark:inline-block md:dark:max-w-[200px]" src="{{ asset('vendor/dklog/images/logo.svg') }}" alt="{{ config('app.name') }}">
        </a>
    </div>

    <section class="md:ml-10">
        <h1 class="text-gray-800 leading-normal text-3xl dark:text-white">Hi there! 👋</h1>

        <p class="mt-6 text-gray-600 dark:text-white leading-normal text-xl">
            You can customize this section by publishing views.
        </p>
    </section>
</div>

<hr class="my-8 border-dashed border-gray-300 dark:border-gray-800">
