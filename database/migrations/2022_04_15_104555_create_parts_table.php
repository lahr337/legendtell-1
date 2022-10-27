<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parts', function (Blueprint $table) {
            $table->id('part_id');
            $table->string('system')->nullable();
            $table->string('diagnosis')->nullable();
            $table->string('part')->nullable();
            $table->string('manufacturer_by')->nullable();
            $table->string('part_number')->nullable();
            $table->string('is_waranty')->nullable();
            $table->string('waranty_company')->nullable();
            $table->text('part_note')->nullable();
            $table->text('document')->nullable();
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
        Schema::dropIfExists('parts');
    }
}
