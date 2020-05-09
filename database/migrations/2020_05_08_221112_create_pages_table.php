<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('page_name');
            $table->string('page_url');
            $table->longText('page_meta_description')->nullable();
            $table->longText('page_meta_title')->nullable();
            $table->longText('page_details')->nullable();
            $table->longText('page_summary')->nullable();
            $table->string('page_header')->nullable();
            $table->text('page_image_url')->nullable();
            $table->boolean('isIndexed')->default(false);
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
        Schema::dropIfExists('pages');
    }
}
