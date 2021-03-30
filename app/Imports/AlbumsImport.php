<?php

namespace App\Imports;

use App\Models\Album;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AlbumsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Album([
            'id' => $row['id'],
            'title' => $row['title'],
            'artist' => $row['artist'],
            'release' => $row['release'],
            'label' => $row['label'],
            'image_link' => $row['image_link']
        ]);
    }
}
