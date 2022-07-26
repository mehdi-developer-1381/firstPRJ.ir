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
        Schema::create('imagable', function (Blueprint $table) {
            $table->bigIncrements('image_id');
            $table->bigInteger("image_foreign_id")->unsigned();
            $table->string("image_name");
            $table->string("image_path");
            $table->morphs("imagable");
            $table->timestamps();

            $table->foreign("image_foreign_id")
                ->references("brand_id")
                ->on("brands")
                ->onDelete("cascade")
                ->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imagable');
    }
};
