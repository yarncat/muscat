<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('artist');
            $table->date('release');
            $table->string('label');
            $table->string('image_link')->nullable();
            $table->timestamps();
        });

        DB::statement("CREATE INDEX title_artist_idx ON albums USING GIN (to_tsvector('english', title || ' ' || artist))");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		DB::statement("DROP INDEX IF EXISTS title_artist_idx");
        Schema::dropIfExists('albums');
    }
}
