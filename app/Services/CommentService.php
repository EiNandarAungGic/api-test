<?php
namespace App\Services;

use App\Repositories\CommentRepository;
use Illuminate\Database\Eloquent\Collection;

class CommentService
{
    protected $commentRepo;

    public function __construct(CommentRepository $commentRepo)
    {
        $this->commentRepo = $commentRepo;
    }

    public function getAll() : Collection
    {
        return $this->commentRepo->getAll();
    }

    public function store($data)
    {
        $this->commentRepo->store($data);
    }

    public function update($data, $id)
    {
        $this->commentRepo->update($data, $id);
    }

    public function delete($id)
    {
        $this->commentRepo->delete($id);
    }
}