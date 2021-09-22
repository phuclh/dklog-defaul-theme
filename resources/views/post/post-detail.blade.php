@push('seo')
    <x-dklog::meta-tags
        :title="$post->metaTag->title"
        :description="$post->metaTag->description"
        :image="$post->metaTag->imageUrl"
        type="article"/>
@endpush

<div class="max-w-4xl mx-auto pt-4 pb-2 md:pt-8 font-mono">
    @include('dklog::partials.header')

    <div class="container mx-auto px-5">
        <div class="mb-14">
            <h1 class="leading-normal block text-gray-800 text-4xl font-semibold dark:text-white">
                {{ $post->title }}
            </h1>

            <p class="text-sm mt-2 uppercase dark:text-blue-200">
                <span>{{ $post->updated_at->format('F d, Y') }} —</span>
                <span>{{ $post->readingDuration }} Read</span>

                @auth
                    | <span><a href="{{ route('admin.posts.edit', $post) }}" class="hover:underline">Edit</a></span>
                @endif
            </p>
        </div>

        <article class="prose dark:prose-light max-w-none leading-10">
            @if ($post->hasFeaturedImage())
                <figure>
                    <img width="{{ $post->featuredImageWidth }}"
                         height="{{ $post->featuredImageHeight }}"
                         srcset="{{ $post->featuredImageSrcSet }}"
                         src="{{ $post->featuredImageUrl }}"
                         alt="{{ $post->title }}"
                         class="w-full rounded-lg">
                    <figcaption>{!! $post->featured_image_caption !!}</figcaption>
                </figure>
            @endif

            <div>
                {!! $post->htmlContent !!}
            </div>
        </article>

        <div class="uppercase flex items-center flex-1 mt-10 py-8 justify-between">
            @if ($previousPost = $post->previousPost())
                <a href="{{ $previousPost->link }}" rel="prev" class="flex items-center text-gray-800 hover:underline dark:text-blue-200">
                    <x-heroicon-o-arrow-left class="w-4 h-4"/>
                    <span class="ml-2">{{ $previousPost->title }}</span>
                </a>
            @endif

            @if ($nextPost = $post->nextPost())
                <a href="{{ $nextPost->link }}" rel="next" class="flex items-center text-gray-800 hover:underline dark:text-blue-200">
                    <span class="mr-2">{{ $nextPost->title }}</span>
                    <x-heroicon-o-arrow-right class="w-4 h-4"/>
                </a>
            @endif
        </div>
    </div>
</div>
