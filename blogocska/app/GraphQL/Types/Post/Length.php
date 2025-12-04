<?php declare(strict_types=1);

namespace App\GraphQL\Types\Post;
use App\Models\Post;
final readonly class Length
{
    /** @param  array{}  $args */
    public function __invoke(Post $_, array $args)
    {
        // TODO implement the resolver
        return mb_strlen($_ -> content);
    }
}
