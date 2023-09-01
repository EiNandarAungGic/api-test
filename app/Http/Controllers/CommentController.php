<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommentResource;
use App\Services\CommentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    protected $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }
    
    // get all comments
    public function index()
    {
        $comments =  $this->commentService->getAll();
        return new CommentResource($comments);
    }

    // create new comment
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'comment' => 'required|max:3',
        ]);

        if($validator->fails()) {
            return response()->json([
                'validate_err' => $validator->messages(),
            ]);
        } else {
            $commentData = $request->all();
            $this->commentService->store($commentData);

            return response()->json([
                "message" => "New comment created successfully!"
            ]);
        }
    }

    // update existed comment
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'comment' => 'required|max:3',
        ]);

        if($validator->fails()) {
            return response()->json([
                'validate_err' => $validator->messages(),
            ]);
        } else {
            $this->commentService->update($request->all(), $id);

            return response()->json([
                "message" => "Comment updated successfully!"
            ]);
        }
    }

    // delete existed comment
    public function destroy($id)
    {
        $this->commentService->delete($id);

        return response()->json([
            "message" => "Comment deleted successfully!"
        ]);
    }
}