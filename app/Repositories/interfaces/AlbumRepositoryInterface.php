<?php

namespace App\Repositories\interfaces;

use App\Models\Album;

interface AlbumRepositoryInterface
{
    public function getAll();

    public function getById($id);

    public function store($name, $description, $coverPath, $userId, $artistId) : Album;

    public function update($id, $name, $description, ?string $coverPath);

    public function delete($id);

    public function getByName($name);

    public function getByUserId($userId);
}
