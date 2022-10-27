<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrameAlignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frame_alignments', function (Blueprint $table) {

            $table->id('frame_alignment_id');

            $table->string('user_id')->nullable();
            $table->string('car_id')->nullable();
            $table->string('service_id')->nullable();

            $table->string('before_left_front_camber_left_top')->nullable();
            $table->string('before_left_front_camber_right_top')->nullable();
            $table->string('before_left_front_camber_middle')->nullable();

            $table->string('before_left_front_caster_left_top')->nullable();
            $table->string('before_left_front_caster_right_top')->nullable();
            $table->string('before_left_front_caster_middle')->nullable();

            $table->string('before_left_front_toe_left_top')->nullable();
            $table->string('before_left_front_toe_right_top')->nullable();
            $table->string('before_left_front_toe_middle')->nullable();

            $table->string('before_left_rear_camber_left_top')->nullable();
            $table->string('before_left_rear_camber_right_top')->nullable();
            $table->string('before_left_rear_camber_middle')->nullable();

            $table->string('before_left_rear_toe_left_top')->nullable();
            $table->string('before_left_rear_toe_right_top')->nullable();
            $table->string('before_left_rear_toe_middle')->nullable();

            $table->string('before_front_total_toe_left_top')->nullable();
            $table->string('before_front_total_toe_right_top')->nullable();
            $table->string('before_front_total_toe_middle')->nullable();

            $table->string('before_front_steer_ahead_left_top')->nullable();
            $table->string('before_front_steer_ahead_right_top')->nullable();
            $table->string('before_front_steer_ahead_middle')->nullable();

            $table->string('before_rear_total_toe_left_top')->nullable();
            $table->string('before_rear_total_toe_right_top')->nullable();
            $table->string('before_rear_total_toe_middle')->nullable();

            $table->string('before_rear_thrust_angle_left_top')->nullable();
            $table->string('before_rear_thrust_angle_right_top')->nullable();
            $table->string('before_rear_thrust_angle_middle')->nullable();

            $table->string('before_right_front_camber_left_top')->nullable();
            $table->string('before_right_front_camber_right_top')->nullable();
            $table->string('before_right_front_camber_middle')->nullable();

            $table->string('before_right_front_caster_left_top')->nullable();
            $table->string('before_right_front_caster_right_top')->nullable();
            $table->string('before_right_front_caster_middle')->nullable();

            $table->string('before_right_front_toe_left_top')->nullable();
            $table->string('before_right_front_toe_right_top')->nullable();
            $table->string('before_right_front_toe_middle')->nullable();

            $table->string('before_right_rear_camber_left_top')->nullable();
            $table->string('before_right_rear_camber_right_top')->nullable();
            $table->string('before_right_rear_camber_middle')->nullable();

            $table->string('before_right_rear_toe_left_top')->nullable();
            $table->string('before_right_rear_toe_right_top')->nullable();
            $table->string('before_right_rear_toe_middle')->nullable();

            

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
        Schema::dropIfExists('frame_alignments');
    }
}
