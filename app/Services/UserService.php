<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\interfaces\ArtistRepositoryInterface;
use App\Repositories\interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserService
{

    private UserRepositoryInterface $userRepository;

    private ArtistRepositoryInterface $artistRepository;

    /**
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository,
                                ArtistRepositoryInterface $artistRepository)
    {
        $this->userRepository = $userRepository;
        $this->artistRepository = $artistRepository;
    }

    public function create($email, $password): User
    {
        return $this->userRepository->create($email, Hash::make($password));
    }

    public function getOwnArtists($userId) {
        return $this->artistRepository->getByUserId($userId);
    }
}
