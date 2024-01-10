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
        Schema::create('rents', function (Blueprint $table) {
            $table->id();
            $table->string('name', 190);
            $table->integer('type');
            $table->boolean('active');
            $table->string('area', 20);
            $table->string('meta_title', 190);
            $table->string('meta_description', 190);
            $table->string('meta_robots', 190);
            $table->string('file', 190);
            $table->text('text');
            $table->integer('sort');
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
        Schema::dropIfExists('rents');
    }
};
