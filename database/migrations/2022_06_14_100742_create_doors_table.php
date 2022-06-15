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
        Schema::create('doors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('building_id');
            $table->float('width');
            $table->float('length');
            $table->integer('count')->default(1);
            $table->timestamps();
            $table->foreign('building_id')->references('id')->on('buildings')->onUpdate('cascade')->ondelete('null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doors');
    }
};
