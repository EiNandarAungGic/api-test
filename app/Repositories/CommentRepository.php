<?php
namespace App\Repositories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Collection;

class CommentRepository
{
    protected $commentModel;

    public function __construct(Comment $commentModel)
    {
        $this->commentModel = $commentModel;
    }

    public function getAll() : Collection
    {
        return  $this->commentModel->get();
    }

    public function store($data)
    {
        $this->commentModel->comment = $data['comment'];
        $this->commentModel->save();
    }

    public function update($data, $id)
    {
        $this->commentModel
            ->where('id', $id)
            ->update(['comment' => $data["comment"]]);
    }

    public function delete($id)
    {
        $this->commentModel->find($id)->delete();
    }
}