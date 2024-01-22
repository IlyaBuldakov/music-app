<?php

namespace App\Repositories;

use App\Models\Artist;
use App\Repositories\interfaces\ArtistRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ArtistRepository implements ArtistRepositoryInterface
{

    public function getAll()
    {
        return DB::table('artists')->paginate(5);
    }

    public function store($name, $avatarPath, $userId)
    {
        Artist::create([
            'name' => $name,
            'user_id' => $userId,
            'avatar_path' => $avatarPath
        ]);
    }

    public function update($id, $name, $avatarPath)
    {
        $artist = Artist::whereId($id)->first();
        $artist->name = $name;
        $artist->avatar_path = $avatarPath;
        $artist->save();
    }

    public function delete($id)
    {
        Artist::whereId($id)->delete();
    }

    public function getByUserId($userId)
    {
        return DB::table('artists')->where('user_id', $userId)->paginate(5);
    }

    public function getById($id)
    {
        return Artist::whereId($id)->first();
    }
}
