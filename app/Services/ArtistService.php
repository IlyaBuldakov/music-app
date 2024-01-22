<?php

namespace App\Services;

use App\Repositories\interfaces\ArtistRepositoryInterface;
use Illuminate\Support\Str;

class ArtistService
{

    private ArtistRepositoryInterface $artistRepository;

    /**
     * @param ArtistRepositoryInterface $artistRepository
     */
    public function __construct(ArtistRepositoryInterface $artistRepository)
    {
        $this->artistRepository = $artistRepository;
    }

    public function saveFile($avatarFile): string
    {
        return $this->saveAvatarLocally($avatarFile);
    }

    public function getAll()
    {
        return $this->artistRepository->getAll();
    }

    public function getById($id)
    {
        return $this->artistRepository->getById($id);
    }

    public function store($name, $avatarPath, $userId)
    {
        $this->artistRepository->store($name, $avatarPath, $userId);
    }

    public function update($id, $name, $avatarFile)
    {
        $this->artistRepository->update($id, $name, $this->saveFile($avatarFile));
    }

    public function delete($id)
    {
        $this->artistRepository->delete($id);
    }

    private function saveAvatarLocally($avatarFile): string
    {
        $publicQualifier = '/artist/avatar/';
        $fileName = Str::random(10) . '.' . $avatarFile->getExtension();
        $avatarFile->move(public_path() . $publicQualifier, $fileName);
        return $publicQualifier . $fileName;
    }
}
