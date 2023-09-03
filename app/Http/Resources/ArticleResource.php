<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

class ArticleResource extends JsonResource
{
    public static $wrap = '';

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource['id'],
            'title' => $this->resource['title'],
            '_embedded' => [
                'comments' => new CommentResourceCollection(
                    new Collection($this->resource['comments'])
                ),
                'user' => new UserResource(
                    [
                        'user_id' => $this->resource['user_id'],
                        'user_name' => $this->resource['user_name']
                    ]
                ),
            ],
            '_links' => [
                'self' => [
                    'href' => sprintf(
                        'https://example.com/articles/%s',
                        $this->resource['id']
                    )
                ]
            ]
        ];
    }
}
