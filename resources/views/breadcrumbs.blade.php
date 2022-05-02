@unless ($breadcrumbs->isEmpty())
    <nav aria-label="Breadcrumb">
        <ol role="list" class="flex items-center space-x-1 text-base text-gray-500 dark:text-white">
            @foreach ($breadcrumbs as $breadcrumb)
                @if ($loop->first)
                    <li>
                        <a class="block transition-colors hover:text-gray-700" href="{{ $breadcrumb->url }}">
                            <span class="sr-only">Home</span>
                            <x-heroicon-o-home class="w-5 h-5"/>
                        </a>
                    </li>
                @endif

                @if (!$loop->first && !$loop->last)
                    <li>
                        <x-heroicon-o-chevron-right class="w-5 h-5"/>
                    </li>

                    <li>
                        @if ($breadcrumb->url)
                            <a class="block transition-colors hover:text-gray-700" href="{{ $breadcrumb->url }}">
                                {{ $breadcrumb->title }}
                            </a>
                        @else
                            {{ $breadcrumb->title }}
                        @endif
                    </li>
                @endif

                @if($loop->last)
                    <li>
                        <x-heroicon-o-chevron-right class="w-5 h-5"/>
                    </li>

                    <li>{{ $breadcrumb->title }}</li>
                @endif
            @endforeach
        </ol>
    </nav>
@endunless
