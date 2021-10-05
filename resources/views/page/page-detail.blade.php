@push('seo')
    <x-dklog::meta-tags
        :title="$page->metaTag->title"
        :description="$page->metaTag->description"
        :image="$page->metaTag->imageUrl"/>
@endpush

<div class="max-w-4xl mx-auto pt-4 pb-2 md:pt-8 font-mono">
    <x-slot name="title">{{ $page->title }}</x-slot>

    @include('dklog::partials.header')

    <div class="container mx-auto px-5">
        <div class="mb-10">
            <h1 class="leading-normal block text-gray-800 text-4xl font-semibold dark:text-white">
                {{ $page->title }}
            </h1>

            @auth
                <p class="text-sm mt-2 uppercase dark:text-blue-200">
                    <span><a href="{{ route('admin.pages.edit', $page) }}" class="hover:underline">Edit</a></span>
                </p>
            @endif
        </div>

        <article class="prose dark:prose-light max-w-none leading-10">
            <div>
                {!! $page->htmlContent !!}
            </div>
        </article>
    </div>
</div>
