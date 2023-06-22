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
        Schema::create('news_archives', function (Blueprint $table) {
            $table->id();
            $table->string('news_id');
            $table->string('name');
            $table->text('description');
            $table->string('url')->nullable();;
            $table->string('category');
            $table->string('language');
            $table->string('country')->nullable();;
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
        Schema::dropIfExists('news_archives');
    }
};
