<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Album extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'artist', 'release', 'label'];

    public function tracks()
    {
        return $this->hasMany(Track::class)->orderBy('track_number');
    }

    public function scopeJoinTotalTime($query)
    {
        return $query->leftJoinSub(Track::totalTimePerAlbum(), 'tracks', function ($join) {
                    $join->on('albums.id', '=', 'tracks.album_id');
                });
    }

    public function scopeSearch($query, $search)
    {
        return $query->whereRaw("to_tsvector(title || ' ' || artist) @@ plainto_tsquery(?)", $search);

    }

    public function scopeListingResource($query)
    {
        return $query->select('*', DB::raw('EXTRACT(year FROM release) AS year'))
                    ->joinTotalTime()
                    ->orderBy('release');
    }

    public function getTotalTimeAttribute($totalTime)
    {
        $minutes = intval($totalTime / 60);
        $seconds = str_pad($totalTime % 60, 2, "0", STR_PAD_LEFT);
        return "$minutes:$seconds";
    }

    public function getHumanReadableRelease($date)
    {
        $dateObj = Carbon::parse($date)->locale('ru');
        return $dateObj->translatedFormat('j F Y');
    }
}
