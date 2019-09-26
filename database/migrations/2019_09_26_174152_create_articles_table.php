<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('description');
            $table->string('thumb')->nullable();
            $table->boolean('is_external'); // 외부 링크를 포함하는지
            $table->string('external_link')->nullable(); // 외부 링크
            $table->unsignedBigInteger('board_id')->nullable(); // 게시판 ID
            $table->timestamps();
        });

        Schema::table('articles', function (Blueprint $table) {
            $table->foreign('board_id')
                ->references('id')->on('boards')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
