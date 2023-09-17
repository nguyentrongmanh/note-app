<?php

namespace App\Core\Repositories;

use App\Models\Note;

class NoteRepository implements NoteRepositoryInterface
{
    protected $model;

    public function __construct(Note $model)
    {
        $this->model = $model;
    }

    public function searchByContentAndUid($search, $userId)
    {
        return $this->model->where('content', 'like', "%$search%")->orderBy('created_at', 'DESC')
            ->where("user_id", $userId)
            ->paginate(12);
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function store($data)
    {
        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        $note = $this->note->find($id);
        if ($note) {
            return $note->update($data);
        }
    }

    public function destroy($id)
    {
        return $this->model->destroy($id);
    }
}
