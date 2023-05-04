<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Topic;

class TopicService {

    public function getAll(): Collection
    {
        return Topic::get();
    }

    public function getById(int $id): Topic
    {
        return Topic::find($id);
    }

    public function store(array $topicDTO): Topic
    {
        $topic = Topic::create($topicDTO);

        return $topic;
    }

    public function update(int $id, array $topicDTO): Topic
    {
        $topic = Topic::find($id);
        $topic->update($topicDTO);

        return $topic;
    }

    /** @return array<string, string> */
    public function destroy(int $id): array
    {
        $topic = Topic::find($id);

        if (!$topic->posts) {
            $topic->delete();

            return ['message' => 'Topic is deleted'];
        }

        return ['message' => 'Topic cannot be deleted'];
    }
}
