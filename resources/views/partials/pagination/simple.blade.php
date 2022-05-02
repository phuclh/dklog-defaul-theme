<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
            <span>
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <span class="flex items-center text-gray-400 dark:text-gray-600 cursor-not-allowed">
                        <x-heroicon-o-arrow-left class="w-4 h-4"/>
                        <span class="ml-2 uppercase">More Recent Posts</span>
                    </span>
                @else
                    <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev" class="flex items-center text-gray-800 dark:text-blue-200 hover:underline disabled:opacity-25">
                        <x-heroicon-o-arrow-left class="w-4 h-4"/>
                        <span class="ml-2 uppercase">More Recent Posts</span>
                    </button>
                @endif
            </span>

            <span>
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <button wire:click="nextPage" wire:loading.attr="disabled" rel="next" class="flex items-center text-gray-800 dark:text-blue-200 hover:underline disabled:opacity-25">
                        <span class="mr-2 uppercase">Check More Posts</span>
                        <x-heroicon-o-arrow-right class="w-4 h-4"/>
                    </button>
                @else
                    <span class="flex items-center text-gray-400 dark:text-gray-600 cursor-not-allowed uppercase">
                        Check More Posts
                    </span>
                @endif
            </span>
        </nav>
    @endif
</div>
