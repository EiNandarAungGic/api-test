<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PostResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        return $this->collection->transform(function ($post) {
            return [
                'id' => $post->id,
                'type' => 'Books',
                'attributes' => [
                    'name' => $post->name,
                    'author' => $post->author,
                    'publish_date' => $post->publish_date,
                    'created_at' => $post->created_at,
                    'updated_at' => $post->updated_at
            ]
            ];
        });
    }
}
