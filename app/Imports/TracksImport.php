<?php

namespace App\Imports;

use App\Models\Track;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TracksImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Track([
            'id' => $row['id'],
            'album_id' => $row['album_id'],
            'track_number' => $row['track_number'],
            'track_title' => $row['track_title'],
            'duration' => $row['duration']
        ]);
    }
}
