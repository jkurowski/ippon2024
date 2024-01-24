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
        Schema::create('investment_pages', function (Blueprint $table) {
            $table->id();
            $table->string('title', 190);
            $table->text('content');
            $table->string('meta_title', 190)->nullable();
            $table->string('meta_robots', 190)->nullable();
            $table->text('meta_description')->nullable();
            $table->bigInteger('sort')->default(0);
            $table->boolean('active')->default(1);
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
        Schema::dropIfExists('investment_pages');
    }
};
