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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('author'); // Assuming author's name is a string
            $table->unsignedTinyInteger('rating'); // Assuming rating is an integer between 0 and 255
            $table->text('content');
            $table->unsignedTinyInteger('type'); // Assuming type is an integer between 0 and 255
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};
