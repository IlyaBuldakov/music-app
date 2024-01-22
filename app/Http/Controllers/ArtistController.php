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
        $this->middleware('auth')->except('index', 'filter');
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
        $this->artistService->store(
            $request->get('name'),
            $request->file('avatar'),
            Auth::id());
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
        $this->artistService->update(
            $artistId,
            $request->get('name'),
            $request->hasFile('avatar') ? $request->file('avatar') : null
        );
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

    public function albums($artistId)
    {
        $artist = $this->artistService->getById($artistId);
        return view('artists/albums', ['name' => $artist->name, 'albums' => $artist->albums]);
    }
}
