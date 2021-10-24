<?php namespace Phuclh\DKLogDefaultTheme\ViewData;

use Phuclh\DKLog\Models\Post;
use Phuclh\DKLog\View\Data\ViewData;

class RecentPostsViewData implements ViewData
{
    public function key(): string
    {
        return 'posts';
    }

    public function value(): mixed
    {
        return Post::query()
            ->orderBy('published_at', 'desc')
            ->published()
            ->simplePaginate(config('dk.blog.per_page', 10));
    }
}
