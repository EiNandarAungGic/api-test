<?php
namespace App\Services;

use App\Repositories\PostRepository;
use Illuminate\Database\Eloquent\Collection;

class PostService
{
    protected $postRepo;

    public function __construct(PostRepository $postRepo)
    {
        $this->postRepo = $postRepo;
    }

    public function getAll() : Collection
    {
        return $this->postRepo->getAll();
    }

    public function store($data)
    {
        $this->postRepo->store($data);
    }

    public function detail($id)
    {
        return $this->postRepo->detail($id);
    }

    public function update($data, int $id)
    {
        return $this->postRepo->update($data, $id);
    }

    public function delete(int $id)
    {
        $this->postRepo->delete($id);
    }
}