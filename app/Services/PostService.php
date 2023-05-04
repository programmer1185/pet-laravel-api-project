<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Post;

class PostService {

    public function getAll(): Collection
    {
        return Post::get();
    }

    public function getAllByAuthorId(int $authorId): Collection
    {
        return Post::where('author_id', $authorId)->get();
    }

    public function getById(int $id): Post
    {
        return Post::find($id);
    }

    public function store(array $postDTO): Post
    {
        $postDTO['author_id'] = Auth::user()->id;
        $post = Post::create($postDTO);

        return $post;
    }

    public function update(int $id, array $postDTO): Post
    {
        $post = Post::find($id);
        $post->update($postDTO);

        return $post;
    }

    public function destroy(int $id): array
    {
        $post = Post::find($id);
        $post->delete();

        return ['message' => 'Post is deleted'];
    }
}
