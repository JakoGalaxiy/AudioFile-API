<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'artist_id' => 'required|string|exists:artists,id',
            'title' => 'required|string|max:255',
            'cover_url' => 'required|string',
            'release_date' => 'nullable|date',
            'album_type' => 'required|string|max:50',
        ]);

        $album = Album::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Álbum creado exitosamente',
            'data' => $album
        ], 201);
    }
}