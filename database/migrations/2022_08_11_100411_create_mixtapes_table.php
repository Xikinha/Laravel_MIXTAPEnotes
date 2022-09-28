<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mixtapes', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('track');
            $table->string('artist');
            $table->string('image_url');
            $table->string('track_uri');
            $table->text('notes');
            $table->boolean('soft_delete');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mixtapes');
    }
};
