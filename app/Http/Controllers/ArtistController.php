<?php

namespace App\Http\Controllers;

use App\Services\ArtistService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtistController extends Controller
{

    private ArtistService $artistService;

    /**
     * @param ArtistService $artistService
     */
    public function __construct(ArtistService $artistService)
    {
        $this->artistService = $artistService;
    }

    // Get all - GET
    public function index()
    {
        return view('artists/index', ['artists' => $this->artistService->getAll()]);
    }

    // Create form - GET
    public function create()
    {
        return view('artists/create');
    }

    // Store in datasource - POST
    public function store(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $path = $this->artistService->saveFile($request->file('avatar'));
            $this->artistService->store($request->get('name'), $path, Auth::id());
        }
        return redirect()->route('user.artists');
    }

    // Get edit form - GET
    public function edit($artistId)
    {
        $artist = $this->artistService->getById($artistId);
        if ($artist->user_id == Auth::id()) {
            return view('artists/edit', ['artist' => $artist]);
        }
        abort(403);
    }

    // Update artist - PUT
    public function update(Request $request, $artistId)
    {
        $this->artistService->update($artistId, $request->get('name'), $request->file('avatar'));
        return redirect()->route('user.artists');
    }

    // Delete artist - DELETE
    public function destroy($artistId)
    {
        $artist = $this->artistService->getById($artistId);
        if ($artist->user_id == Auth::id()) {
            $this->artistService->delete($artistId);
        }
        return redirect()->route('user.artists');
    }

    // Filter. Returns filtered index - GET
    public function filter(Request $request)
    {
        return view('artists/index', ['artists' => $this->artistService->getByName($request->get('artistName'))]);
    }
}
