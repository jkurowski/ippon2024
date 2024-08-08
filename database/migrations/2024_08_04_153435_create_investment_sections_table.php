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
        Schema::create('investment_sections', function (Blueprint $table) {
            $table->id(); // id column
            $table->unsignedBigInteger('investment_id'); // investment_id column
            $table->string('title'); // title column
            $table->string('subtitle')->nullable(); // subtitle column
            $table->text('text')->nullable(); // text column
            $table->string('link')->nullable(); // link column
            $table->string('link_button')->nullable(); // link_button column
            $table->string('file')->nullable(); // file column
            $table->boolean('active')->default(true); // active column
            $table->integer('position')->default(0); // position column
            $table->timestamps(); // created_at and updated_at columns

            // Define foreign key constraint
            $table->foreign('investment_id')->references('id')->on('investments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('investment_sections');
    }
};
