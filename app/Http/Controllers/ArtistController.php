<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|string|exists:users,id',
            'stage_name' => 'required|string|max:255',
            'verification_status' => 'required|string|max:50',
        ]);

        $artist = Artist::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Artista creado exitosamente',
            'data' => $artist
        ], 201);
    }
}