<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResourceCollection;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }
    
    public function index()
    {
        $posts =  $this->postService->getAll();
        return new PostResourceCollection($posts);
    }

    public function store(PostRequest $request)
    {
        $post = $request->all();
        $this->postService->store($post);

        return response()->json([
            "message" => "New post created successfully!",
        ], 201);
    }

    public function show($id) {
        $post = $this->postService->detail($id);
        if(!empty($post)) {
            return response()->json($post);
        } else {
            return response()->json([
                "message" => "Post not found!"
            ], 404);
        }
    }

    public function update(Request $request, int $id)
    {
        $post = $request->all();
        $res = $this->postService->update($post, $id);
        if($res) {
            return response()->json([
                "message" => "Post updated successfully!",
            ]);
        }
    }

    public function destroy(int $id)
    {
        $this->postService->delete($id);

        return response()->json([
            "message" => "Post deleted successfully!",
        ]);
    }
} 