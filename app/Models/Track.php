<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Track extends Model
{
    use HasFactory;

    protected $fillable = ['album_id', 'track_number', 'track_title', 'duration'];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    public function scopeTotalTimePerAlbum($query)
    {
        return $query->select('album_id', DB::raw('SUM(duration) as total_time'))->groupBy('album_id');
    }

    public function getDurationAttribute($duration)
    {
        $minutes = intval($duration / 60);
        $seconds = str_pad($duration % 60, 2, "0", STR_PAD_LEFT);
        return "$minutes:$seconds";
    }

    public function setDurationAttribute($duration)
    {
        $arr = explode(':', $duration);
        $this->attributes['duration'] = $arr[0] * 60 + $arr[1];
    }
}
