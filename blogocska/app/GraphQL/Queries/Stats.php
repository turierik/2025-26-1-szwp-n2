<?php declare(strict_types=1);

namespace App\GraphQL\Queries;
use App\Models\Post;
use App\Models\Category;
final readonly class Stats
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        // TODO implement the resolver
        return [
            "postCount" => Post::count(),
            "publicPostCount" => Post::where('is_public', true) -> count(),
            "postPerCategory" => Post::count() / Category::count()
        ];
    }
}
