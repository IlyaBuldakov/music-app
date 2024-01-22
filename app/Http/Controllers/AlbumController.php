<?php

namespace App\Http\Controllers;

use App\Services\AlbumService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{

    private AlbumService $albumService;

    private UserService $userService;

    /**
     * @param AlbumService $albumService
     * @param UserService $userService
     */
    public function __construct(AlbumService $albumService,
                                UserService  $userService)
    {
        $this->middleware('auth')->except('index', 'filter');
        $this->albumService = $albumService;
        $this->userService = $userService;
    }

    // Get all - GET
    public function index()
    {
        return view('albums/index', ['albums' => $this->albumService->getAll()]);
    }

    // Create form - GET
    public function create()
    {
        return view('albums/create', ['artists' => $this->userService->getOwnArtists(Auth::id())]);
    }

    // Store in datasource - POST
    public function store(Request $request)
    {
        $artistId = $request->input('artistCheckbox');
        $cover = $request->file('cover');
        $this->albumService->store(
            $request->get('name'),
            $request->get('description'),
            $cover,
            $artistId,
            Auth::id());
        return redirect()->route('user.albums');
    }

    // Get edit form - GET
    public function edit($albumId)
    {
        $album = $this->albumService->getById($albumId);
        if ($album->user_id == Auth::id()) {
            return view('albums/edit', ['album' => $album]);
        }
        abort(403);
    }

    // Update artist - PUT
    public function update(Request $request, $albumId)
    {
        $this->albumService->update(
            $albumId,
            $request->get('name'),
            $request->get('description'),
            $request->hasFile('cover') ? $request->file('cover') : null
        );
        return redirect()->route('user.albums');
    }

    // Delete artist - DELETE
    public function destroy($albumId)
    {
        $album = $this->albumService->getById($albumId);
        if ($album->user_id == Auth::id()) {
            $this->albumService->delete($albumId);
        }
        return redirect()->route('user.albums');
    }

    // Filter. Returns filtered index - GET
    public function filter(Request $request)
    {
        return view('albums/index', ['albums' => $this->albumService->getByName($request->get('albumName'))]);
    }
}
