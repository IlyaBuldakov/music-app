<?php

namespace App\Services;

use App\Helpers\FileHelper;
use App\Repositories\interfaces\ArtistRepositoryInterface;
use Illuminate\Http\UploadedFile;

class ArtistService
{

    private RequestService $requestService;

    private ArtistRepositoryInterface $artistRepository;

    private const AVATAR_PATH = '/artist/avatar/';

    private const TARGET_ENTITY = 'artist';

    /**
     * @param ArtistRepositoryInterface $artistRepository
     * @param RequestService $requestService
     */
    public function __construct(ArtistRepositoryInterface $artistRepository,
                                RequestService            $requestService)
    {
        $this->artistRepository = $artistRepository;
        $this->requestService = $requestService;
    }

    public function getAll()
    {
        return $this->artistRepository->getAll();
    }

    public function getById($id)
    {
        return $this->artistRepository->getById($id);
    }

    public function getByName($name)
    {
        return $this->artistRepository->getByName($name);
    }

    public function store($name, $avatarFile, $userId)
    {
        $this->artistRepository->store(
            $name,
            is_null($avatarFile)
                ? $this->requestService->getAlbumImageUrl([
                    'entity' => self::TARGET_ENTITY,
                    'artist' => $name
                ])
                : FileHelper::saveFileLocally($avatarFile, self::AVATAR_PATH),
            $userId);
    }

    public function update($id, $name, ?UploadedFile $avatarFile)
    {
        $this->artistRepository->update(
            $id,
            $name,
            is_null($avatarFile) ? null : FileHelper::saveFileLocally($avatarFile, self::AVATAR_PATH)
        );
    }

    public function delete($id)
    {
        $this->artistRepository->delete($id);
    }
}
