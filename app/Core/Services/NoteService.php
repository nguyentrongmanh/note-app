<?php

namespace App\Core\Services;

use App\Core\Repositories\NoteRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class NoteService implements NoteServiceInterface
{
    protected $repository;

    public function __construct(NoteRepositoryInterface $repository)
    {
        return $this->repository = $repository;
    }

    public function searchByContent($search)
    {
        return $this->repository->searchByContent($search);
    }

    public function find($id)
    {
        return $this->repository->findOrFail($id);
    }

    public function store($data)
    {
        $data['user_id'] = Auth::user()->id;

        return $this->repository->store($data);
    }

    public function update($id, $data)
    {
        return $this->repository->update($id, $data);
    }

    public function destroy($id)
    {
        return $this->repository->destroy($id);
    }
}
