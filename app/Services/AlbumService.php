<?php

namespace App\Services;

use App\Helpers\FileHelper;
use App\Repositories\interfaces\AlbumRepositoryInterface;
use App\Repositories\interfaces\ArtistRepositoryInterface;
use Illuminate\Http\UploadedFile;

class AlbumService
{

    private RequestService $requestService;

    private AlbumRepositoryInterface $albumRepository;

    private ArtistRepositoryInterface $artistRepository;

    private const COVER_PATH = '/album/cover/';

    private const TARGET_ENTITY = 'album';

    /**
     * @param AlbumRepositoryInterface $albumRepository
     * @param RequestService $requestService
     * @param ArtistRepositoryInterface $artistRepository
     */
    public function __construct(AlbumRepositoryInterface  $albumRepository,
                                RequestService            $requestService,
                                ArtistRepositoryInterface $artistRepository)
    {
        $this->albumRepository = $albumRepository;
        $this->requestService = $requestService;
        $this->artistRepository = $artistRepository;
    }

    public function getAll()
    {
        return $this->albumRepository->getAll();
    }

    public function getById($id)
    {
        return $this->albumRepository->getById($id);
    }

    public function store($name, $description, $coverFile, $artistId, $userId)
    {
        $artistName = $this->artistRepository->getById($artistId)->name;
        $this->albumRepository->store(
            $name,
            $description,
            is_null($coverFile)
                ? $this->requestService->getAlbumImageUrl([
                    'entity' => self::TARGET_ENTITY,
                    'artist' => $artistName,
                    'album' => $name
                ])
                : FileHelper::saveFileLocally($coverFile, self::COVER_PATH),
            $userId,
            $artistId);
    }

    public function update($id, $name, $description, ?UploadedFile $coverFile)
    {
        $this->albumRepository->update(
            $id,
            $name,
            $description,
            is_null($coverFile) ? null : FileHelper::saveFileLocally($coverFile, self::COVER_PATH)
        );
    }

    public function delete($id)
    {
        $this->albumRepository->delete($id);
    }

    public function getByName($name)
    {
        return $this->albumRepository->getByName($name);
    }
}
