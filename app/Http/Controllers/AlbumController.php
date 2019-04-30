<?php

namespace App\Http\Controllers;

use App\Models\Album;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::paginate(9);
        return View('album.index', compact(['albums']));
    }

    public function show(Album $album)
    {
        $id = $album->id;
        $path = storage_path('/app/public/albums/' . $id);
        $files = scandir($path);
        return View('album.show', compact(['id', 'files', 'album']));
    }
}
