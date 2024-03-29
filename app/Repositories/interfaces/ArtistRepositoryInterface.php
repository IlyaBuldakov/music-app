<?php

namespace App\Repositories\interfaces;

interface ArtistRepositoryInterface
{
    public function getAll();

    public function getById($id);

    public function store($name, $avatarPath, $userId);

    public function update($id, $name, ?string $avatarPath);

    public function delete($id);

    public function getByUserId($userId);

    public function getByName($name);
}
