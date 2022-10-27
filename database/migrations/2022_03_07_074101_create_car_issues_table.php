<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_issues', function (Blueprint $table) {
            $table->id('issue_id');
            $table->string('user_id')->nullable();
            $table->string('car_id')->nullable();
            $table->string('service_id')->nullable();
            $table->text('diagnosis')->nullable();
            $table->text('known_issue')->nullable();
            $table->text('install_info')->nullable();
            $table->text('recall_issue')->nullable();
            $table->text('servicing_issue')->nullable();
            $table->text('repair_info')->nullable();
            $table->integer('status')->default(1);
            
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
        Schema::dropIfExists('car_issues');
    }
}
