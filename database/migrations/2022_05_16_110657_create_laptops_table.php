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
        Schema::create('laptops', function (Blueprint $table) {
            $table->id();
            $table->string("brand");
            /*
             *CPU SPECS 
             */
            $table->string("cpu_brand");
            $table->float("cpu_frequency");
            $table->string("cpu_family");
            $table->integer("cpu_generation");
            $table->integer("cpu_number_identifier");
            $table->string("cpu_modifier");
            /*
             *CPU SPECS END
             */
            $table->integer("state");
            /*
             *GPU SPECS 
             */
            $table->string("gpu_brand");
            $table->string("gpu_words_identifier");
            $table->string("gpu_number_identifier");
            $table->integer("gpu_vram");
            $table->float("gpu_frequency");
            /*
             *GPU SPECS END
             */
            $table->integer("ram");
            $table->float("ram_frequency");
            $table->string("ram_type");
            /*
             *RAM SPECS END
             */
            $table->integer("ssd");
            $table->integer("hdd");
            $table->integer("screen_refresh_rate");
            $table->float("screen_size");
            $table->string("screen_resolution");
            $table->integer("anti_glare");
            $table->integer("touch_screen");
            $table->float("price");
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
        Schema::dropIfExists('laptops');
    }
};
