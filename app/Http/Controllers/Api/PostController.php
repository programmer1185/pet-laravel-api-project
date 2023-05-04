<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\PostService;
use App\Http\Resources\PostResource;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Response;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PostController extends Controller
{
    /** @var PostService $postService */
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index(): AnonymousResourceCollection
    {
        return PostResource::collection($this->postService->getAll());
    }

    public function store(CreatePostRequest $request): PostResource
    {
        $post = $this->postService->store($request->only('title', 'content', 'lead', 'topic_id'));

        return new PostResource($post);
    }

    public function show(int $id): PostResource
    {
        return new PostResource($this->postService->getById($id));
    }

    public function update(UpdatePostRequest $request, int $id): PostResource
    {
        $post = $this->postService->update($id, $request->only('title', 'content', 'lead'));

        return new PostResource($post);
    }

    public function destroy(int $id): Response
    {
        return response($this->postService->destroy($id));
    }
}
