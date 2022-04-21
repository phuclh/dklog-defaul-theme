@push('seo')
    <x-dklog::meta-tags
            :title="$metaTags['meta_title'] ?? null"
            :description="$metaTags['meta_description'] ?? null"
            :image="Phuclh\DKLog\DK::resolveImageUrl($metaTags['meta_image'] ?? null)"/>
@endpush

<div class="max-w-4xl mx-auto pt-4 pb-2 md:pt-8 font-mono">
    @include('dklog::partials.header')

    <div class="container mx-auto px-5">
        @forelse ($posts as $post)
            <a href="{{ $post->link }}" class="transform hover:-translate-y-2 duration-200 block">
                <div class="w-full mb-10 p-5 bg-gray-100 rounded dark:bg-[#04243f]">
                    <h2 class="leading-normal block text-gray-800 text-xl font-semibold dark:text-white">
                        {{ $post->title }}
                    </h2>

                    <p class="text-xs mt-2 dark:text-gray-300">
                        <span>Updated: {{ $post->updated_at->format('F d, Y') }} —</span>
                        <span class="uppercase">{{ $post->readingDuration }} Read</span>
                    </p>

                    <p class="leading-relaxed mt-4 text-gray-600 dark:text-blue-200">
                        {{ $post->excerpt }}
                    </p>
                </div>
            </a>
        @empty
            <p class="text-gray-500 font-medium text-lg text-center p-6">
                There are no posts.
            </p>
        @endforelse

        @if ($posts->hasPages())
            <div class="py-8">
                {{ $posts->links('dklog::admin.partials.pagination.simple') }}
            </div>
        @endif
    </div>
</div>
