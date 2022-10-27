<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAfterFrameAlignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('after_frame_alignments', function (Blueprint $table) {
            $table->id('after_frame_alignment_id');
            $table->unsignedBigInteger('before_frame_alignment_id');
            $table->string('user_id')->nullable();
            $table->string('car_id')->nullable();
            $table->string('service_id')->nullable();

            $table->string('after_left_front_camber_left_top')->nullable();
            $table->string('after_left_front_camber_right_top')->nullable();
            $table->string('after_left_front_camber_middle')->nullable();

            $table->string('after_left_front_caster_left_top')->nullable();
            $table->string('after_left_front_caster_right_top')->nullable();
            $table->string('after_left_front_caster_middle')->nullable();

            $table->string('after_left_front_toe_left_top')->nullable();
            $table->string('after_left_front_toe_right_top')->nullable();
            $table->string('after_left_front_toe_middle')->nullable();

            $table->string('after_left_rear_camber_left_top')->nullable();
            $table->string('after_left_rear_camber_right_top')->nullable();
            $table->string('after_left_rear_camber_middle')->nullable();

            $table->string('after_left_rear_toe_left_top')->nullable();
            $table->string('after_left_rear_toe_right_top')->nullable();
            $table->string('after_left_rear_toe_middle')->nullable();

            $table->string('after_front_total_toe_left_top')->nullable();
            $table->string('after_front_total_toe_right_top')->nullable();
            $table->string('after_front_total_toe_middle')->nullable();

            $table->string('after_front_steer_ahead_left_top')->nullable();
            $table->string('after_front_steer_ahead_right_top')->nullable();
            $table->string('after_front_steer_ahead_middle')->nullable();

            $table->string('after_rear_total_toe_left_top')->nullable();
            $table->string('after_rear_total_toe_right_top')->nullable();
            $table->string('after_rear_total_toe_middle')->nullable();

            $table->string('after_rear_thrust_angle_left_top')->nullable();
            $table->string('after_rear_thrust_angle_right_top')->nullable();
            $table->string('after_rear_thrust_angle_middle')->nullable();

            $table->string('after_right_front_camber_left_top')->nullable();
            $table->string('after_right_front_camber_right_top')->nullable();
            $table->string('after_right_front_camber_middle')->nullable();

            $table->string('after_right_front_caster_left_top')->nullable();
            $table->string('after_right_front_caster_right_top')->nullable();
            $table->string('after_right_front_caster_middle')->nullable();

            $table->string('after_right_front_toe_left_top')->nullable();
            $table->string('after_right_front_toe_right_top')->nullable();
            $table->string('after_right_front_toe_middle')->nullable();

            $table->string('after_right_rear_camber_left_top')->nullable();
            $table->string('after_right_rear_camber_right_top')->nullable();
            $table->string('after_right_rear_camber_middle')->nullable();

            $table->string('after_right_rear_toe_left_top')->nullable();
            $table->string('after_right_rear_toe_right_top')->nullable();
            $table->string('after_right_rear_toe_middle')->nullable();
            $table->timestamps();

            $table->foreign('before_frame_alignment_id')
            ->references('frame_alignment_id')
            ->on('frame_alignments')
            ->onUpdate('CASCADE')
            ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('after_frame_alignments');
    }
}
