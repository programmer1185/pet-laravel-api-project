<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\User;
use App\Models\Topic;

/**
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $lead
 * @property User $author
 * @property Topic $topic
 */
class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'lead' => $this->lead,
            'author' => $this->author,
            'topic' => $this->topic
        ];
    }
}
