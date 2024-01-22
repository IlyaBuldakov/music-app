<?php

namespace App\Repositories;

use App\Models\Album;
use App\Repositories\interfaces\AlbumRepositoryInterface;
use Illuminate\Support\Facades\DB;

class AlbumRepository implements AlbumRepositoryInterface
{

    public function getAll()
    {
        return Album::paginate(5);
    }

    public function store($name, $description, $coverPath, $userId, $artistId) : Album
    {
        return Album::create([
            'name' => $name,
            'description' => $description,
            'cover_path' => $coverPath,
            'user_id' => $userId,
            'artist_id' => $artistId
        ]);
    }

    public function update($id, $name, $description, ?string $coverPath)
    {
        $album = Album::whereId($id)->first();
        $album->name = $name;
        $album->description = $description;
        if (!is_null($coverPath)) $album->cover_path = $coverPath;
        $album->save();
    }

    public function delete($id)
    {
        Album::whereId($id)->delete();
    }

    public function getById($id)
    {
        return Album::whereId($id)->first();
    }

    public function getByName($name)
    {
        return DB::table('albums')->where('name', 'like', "{$name}%")->paginate(5);
    }

    public function getByUserId($userId)
    {
        return Album::whereUserId($userId)->paginate(5);
    }
}
