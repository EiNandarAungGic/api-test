<?php
namespace App\Repositories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

class PostRepository
{
    protected $postModel;

    public function __construct(Post $postModel)
    {
        $this->postModel = $postModel;
    }

    public function getAll() : Collection
    {
        return $this->postModel->get();
    }

    public function store($data)
    {
        $this->postModel->title = $data['title'];
        $this->postModel->content = $data['content'];
        $this->postModel->save();
    }

    public function detail($id)
    {
        return $this->postModel->find($id);
    }

    public function update($data, int $id)
    {
        $post = $this->postModel->find($id);
        $post->title = $data['title'];
        $post->content = $data['content'];
        return $post->save();
    }

    public function delete(int $id)
    {
        $this->postModel->find($id)->delete();
    }
}