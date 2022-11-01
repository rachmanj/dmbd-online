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
        Schema::create('wo_data', function (Blueprint $table) {
            $table->id();
            $table->string('project', 10)->nullable();
            $table->string('plant_group', 5)->nullable();
            $table->string('unit_type', 50)->nullable();
            $table->string('unit_code', 20)->nullable();
            $table->string('unit_model', 100)->nullable();
            $table->string('wo_status', 20)->nullable();
            $table->string('status_position', 50)->nullable();
            $table->integer('hour_meter')->nullable();
            $table->string('activity_code', 10)->nullable();
            $table->date('malfunction_date')->nullable(); // gabungan antara malfunction date dan time
            $table->integer('malfunction_time')->nullable(); // gabungan antara malfunction date dan time
            $table->integer('days_of_breakdown')->nullable(); // lama hari breakdwon s/d hari ini
            $table->string('notification_description', 100)->nullable();
            $table->string('job_category', 20)->nullable();
            $table->string('wo_no', 50)->nullable();
            $table->string('call_id', 20)->nullable();
            $table->string('last_operator_id', 20)->nullable();
            $table->date('wo_date')->nullable();
            $table->string('mr_no', 20)->nullable();
            $table->date('mr_date')->nullable();
            $table->string('mr_status', 10)->nullable();
            $table->string('first_mi_no', 20)->nullable();
            $table->date('first_mi_date')->nullable();
            $table->string('last_mi_no', 20)->nullable();
            $table->date('last_mi_date')->nullable();
            $table->string('pr_no', 20)->nullable();
            $table->date('pr_date')->nullable();
            $table->string('po_no', 20)->nullable();
            $table->date('po_date')->nullable();
            $table->string('po_status', 20)->nullable();
            $table->string('po_rev_no', 20)->nullable();
            $table->date('eta_date')->nullable();
            $table->string('delivery_status', 20)->nullable();
            $table->date('delivery_date')->nullable();
            $table->string('grpo_no', 20)->nullable();
            $table->date('grpo_date')->nullable();
            $table->string('ito_no', 20)->nullable();
            $table->date('ito_date')->nullable();
            $table->string('iti_no', 20)->nullable();
            $table->date('iti_date')->nullable();
            $table->date('finish_date')->nullable(); // gabungan antara finish date dan time
            $table->integer('finish_time')->nullable(); // gabungan antara finish date dan time
            $table->date('last_activity_date')->nullable();
            $table->text('activity_text')->nullable();
            $table->text('remarks')->nullable();
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
        Schema::dropIfExists('wo_data');
    }
};
