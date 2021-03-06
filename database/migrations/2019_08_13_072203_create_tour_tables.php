<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Master Tables

        // Detail Tables
        Schema::create('tour_mast', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('emp_id');
            $table->unsignedInteger('apr_id');
            $table->string('title');
            $table->integer('current_stage')->nullable();
          	$table->decimal('adv_amt', 15, 4)->default(0.00);
          	$table->text('purpose');
            $table->string('start_loc');
            $table->date('start_dt');
            $table->string('end_loc');
            $table->date('end_dt');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('tour_approval_detail', function (Blueprint $table) {
            $table->increments('id');
           	$table->unsignedInteger('tour_id');
           	$table->integer('act_id');
           	$table->integer('state_id');
           	$table->string('permits', 255);   //Copying permits because in future may be permits get changed so it won't be possible to change history, if we store permits in this table too... then we can preserve the history
           	$table->date('date');
            $table->char('status', 1)->nullable();
            $table->text('remark');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('tours');
      Schema::dropIfExists('tour_approval_detail');  
    }
}
