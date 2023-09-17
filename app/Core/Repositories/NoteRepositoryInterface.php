<?php

namespace App\Core\Repositories;

interface NoteRepositoryInterface
{
    public function searchByContent(str $search);
    public function find($id);
    public function store(array $data);
    public function update($id, array $data);
    public function destroy($id);
}
