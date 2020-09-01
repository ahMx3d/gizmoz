<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCateTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cate_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cate_id')->unsigned();
            $table->string('locale');
            $table->string('name');

            $table->unique([
                'cate_id',
                'locale',
            ]);
            $table->foreign('cate_id')->references('id')->on('cates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cate_translations');
    }
}
