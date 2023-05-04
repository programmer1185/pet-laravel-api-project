<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\TopicService;
use App\Http\Resources\TopicResource;
use App\Http\Requests\CreateTopicRequest;
use App\Http\Requests\UpdateTopicRequest;
use Illuminate\Http\Response;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TopicController extends Controller
{
    /** @var TopicService $topicService */
    protected $topicService;

    public function __construct(TopicService $topicService)
    {
        $this->topicService = $topicService;
    }

    public function index(): AnonymousResourceCollection
    {
        return TopicResource::collection($this->topicService->getAll());
    }

    public function store(CreateTopicRequest $request): TopicResource
    {
        $topic = $this->topicService->store($request->only('name', 'slug'));

        return new TopicResource($topic);
    }

    public function show(int $id): TopicResource
    {
        return new TopicResource($this->topicService->getById($id));
    }

    public function update(UpdateTopicRequest $request, int $id): TopicResource
    {
        $topic = $this->topicService->update($id, $request->only('name', 'slug'));

        return new TopicResource($topic);
    }

    public function destroy(int $id): Response
    {
        return response($this->topicService->destroy($id));
    }
}
