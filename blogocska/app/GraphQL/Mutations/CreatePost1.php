<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

final readonly class CreatePost1
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        // TODO implement the resolver
        $validated = validator(
            [
                'title' => $args['title'],
                'content' => $args['content'],
                'author_id' => $args['author_id'],
                'is_public' => $args['is_public']
            ],
            [
                'title' => 'required|string',
                'content' => 'required|string',
                'author_id' => 'required|integer|exists:users,id',
                'is_public' => 'required|boolean'
            ]
        ) -> validate();
        return \App\Models\Post::create($validated);
    }
}
