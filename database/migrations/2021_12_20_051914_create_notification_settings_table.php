<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification_settings', function (Blueprint $table) {
            $table->id();
            $table->boolean('open_recall')->default(false);
            $table->boolean('oil_change_due')->default(false);
            $table->boolean('tire_rotation_due')->default(false);
            $table->boolean('safety_inspection_due')->default(false);
            $table->boolean('registration_due')->default(false);
            $table->boolean('emissions_inspection_due')->default(false);
            $table->boolean('leave_service_review')->default(false);
            $table->boolean('monthly_vehicle_report')->default(false);
            $table->boolean('add_vehicle_reminder')->default(false);
            $table->boolean('still_own_vehicle')->default(false);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
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
        Schema::dropIfExists('notification_settings');
    }
}
