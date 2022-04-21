@push('seo')

@endpush

<div class="max-w-4xl mx-auto pt-4 pb-2 md:pt-8 font-mono">
    @include('dklog::partials.header')

    <div class="container mx-auto px-5">
        <h1 class="leading-normal block text-gray-900 text-3xl font-bold dark:text-white">
            Search
        </h1>

        <form action="{{ route('search') }}" method="GET" class="py-4">
            <label for="search" class="sr-only">Search</label>
            <div class="relative">
                <div class="pointer-events-none absolute inset-y-0 left-0 pl-3 flex items-center">
                    <x-heroicon-s-search class="h-5 w-5 text-gray-400"/>
                </div>
                <input
                        value="{{ request('query') }}"
                        id="search"
                        name="query"
                        class="block w-full bg-white border border-gray-300 rounded-md py-2 pl-10 pr-3 text-base placeholder-gray-500 focus:outline-none focus:text-gray-900 focus:placeholder-gray-400 focus:ring-1 focus:ring-black focus:border-black sm:text-lg"
                        placeholder="Search"
                        type="search">
            </div>
        </form>

        @forelse ($searchResults as $searchResult)
            <div class="py-3">
                <a href="{{ $searchResult->url }}" class="hover:underline">
                    <h3 class="leading-normal block text-gray-800 text-xl font-semibold dark:text-white">
                        {{ $searchResult->title }}
                    </h3>
                </a>
            </div>
        @empty
            <p class="text-gray-500 font-medium text-lg text-center p-6">
                There are no results that match your search.
            </p>
        @endforelse
    </div>
</div>
