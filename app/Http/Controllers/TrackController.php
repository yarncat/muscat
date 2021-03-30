<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrackRequest;
use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    public function updateOrStore(TrackRequest $request, $albumId)
    {
        $tracks = array_map(function($trackId, $trackNumber, $trackTitle, $duration) {
            return ['id' => $trackId,
                    'track_number' => $trackNumber,
                    'track_title' => $trackTitle,
                    'duration' => $duration
            ];
        }, $request->id, $request->track_number, $request->track_title, $request->duration);

        foreach ($tracks as $track) {
            Track::updateOrCreate([
                'id' => $track['id']
            ],[
                'album_id' => $albumId,
                'track_number' => $track['track_number'],
                'track_title' => $track['track_title'],
                'duration' => $track['duration']
            ]);
        }

        $request->session()->flash('success', 'Данные успешно обновлены');
    }

    public function destroy(Request $request, $id)
    {
        $track = Track::findOrFail($id);
        $track->delete();

        $request->session()->flash('success', 'Трек успешно удалён из списка композиций');
    }
}
