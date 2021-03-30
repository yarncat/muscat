<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Imports\AlbumsImport;
use App\Imports\TracksImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Models\Album;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new AlbumsImport, 'resources/files/albums.xls');
        Excel::import(new TracksImport, 'resources/files/tracks.xls');
    }
}
