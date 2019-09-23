<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title'); // 제목
            $table->string('location')->nullable(); // 장소
            $table->string('thumb')->nullable(); // 대표사진(썸네일)
            $table->string('phone')->nullable(); // 안내전화 번호
            $table->string('link')->nullable(); // 외부링크
            $table->dateTime('start_date')->nullable(); // 기간 - 시작
            $table->dateTime('end_date')->nullable(); // 기간 - 종료
            $table->time('start_time')->nullable(); // 운영시간 - 시작
            $table->time('end_time')->nullable(); // 운영시간 - 종료
            $table->unsignedBigInteger('category_id')->nullable(); // 카테고리 ID
            $table->timestamps();
            // foreign 키 선언
            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informations');
    }
}
