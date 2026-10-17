<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function index()
    {
        $songs = Song::with('album')->get();
        $songs = Song::with('album.artist')->get();

        return response()->json([
            'success' => true,
            'data' => $songs
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'album_id' => 'required|exists:albums,id',
            'title' => 'required|string|max:255',
            'duration_seconds' => 'required|integer',
            'audio_url' => 'required|string',
            'track_number' => 'nullable|integer',
        ]);

        $song = Song::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Canción creada exitosamente',
            'data' => $song
        ], 201);
    }
}
