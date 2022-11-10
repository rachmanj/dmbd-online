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
            $table->string('unit_code')->nullable();
            $table->string('status')->nullable();
            $table->string('priority')->nullable();
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->integer('hm')->nullable();
            $table->string('project')->nullable();
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
