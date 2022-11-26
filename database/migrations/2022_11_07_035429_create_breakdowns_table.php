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
        Schema::create('breakdowns', function (Blueprint $table) {
            $table->id();
            $table->string('bd_no')->nullable();
            $table->string('unit_code', 20)->nullable();
            $table->string('status', 20)->nullable();
            $table->string('priority', 10)->nullable();
            $table->string('bd_code', 20)->nullable();
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->integer('hm')->nullable();
            $table->string('project', 20)->nullable();
            $table->string('plant_group')->nullable();
            $table->string('unit_model')->nullable();
            $table->text('description')->nullable();
            $table->string('created_by')->nullable();
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
        Schema::dropIfExists('breakdowns');
    }
};
