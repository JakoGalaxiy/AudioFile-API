<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'album_id',
        'title',
        'duration_seconds',
        'audio_url',
        'track_number',
    ];

    // unha cancion puede pertenecer a un album
    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    // una cancion puede ser favorita para varios usuarios
    public function favoritedByUsers()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }
}
