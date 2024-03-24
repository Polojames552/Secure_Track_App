<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('evidence_vehicles', function (Blueprint $table) {
            // $table->id();
            // $table->string('user_id');
            // $table->string('make_type');
            // $table->string('plate_no');
            // $table->string('engine_no');
            // $table->string('fuel');
            // $table->string('chasis_no');
            // $table->string('color');
            // $table->string('registered_owner');
            // $table->string('owner_address');
            // $table->string('bumper_front');
            // $table->string('fog_light');
            // $table->string('general_condition');
            // $table->timestamps();
            $table->id();
            $table->text('qr_code_image');
            $table->string('user_id');
            $table->string('make_type');
            $table->string('plate_no');
            $table->string('engine_no');
            $table->string('fuel');
            $table->string('chasis_no');
            $table->string('color');
            $table->string('registered_owner');
            $table->string('owner_address');
            $table->string('brand_make');
            $table->string('size');
            $table->string('condition');
            $table->string('type');
            $table->string('no_studs');
            // $table->string('color_tire');
            $table->string('general_condition');
            $table->string('bumper_front');
            $table->string('fog_light');
            $table->string('brand_marking_emblem');
            $table->string('headlights_lr');
            $table->string('radiator_grill');
            $table->string('windshield_wiper');
            $table->string('signal_lights_lr');
            $table->string('windshield_glass');
            $table->string('hazzard_lights_lr');
            $table->string('windshield_wiper_blade');
            $table->string('headlights_guard');
            $table->string('windshield_wiper_motor');
            $table->string('side_mirror_L');
            $table->string('wind_tunnel_glass_L');
            $table->string('window_glass_front_seat_L');
            $table->string('weather_window_strip_L');
            $table->string('side_mirror_R');
            $table->string('wind_tunnel_glass_R');
            $table->string('window_glass_front_seat_R');
            $table->string('weather_window_strip_R');
            $table->string('rear_bumper');
            $table->string('brand_emblem_marking');
            $table->string('window_glass_front_seat');
            $table->string('spare_tire_mounting');
            $table->string('tools');
            $table->string('steering_wheel');
            $table->string('shifting_rod_with_knob');
            $table->string('hand_break');
            $table->string('ammeter');
            $table->string('oil_pressure_gauge');
            $table->string('temperature_gauge');
            $table->string('rpm_gauge');
            $table->string('headlight_knob');
            $table->string('parking_hazard_knob');
            $table->string('wiper_knob');
            $table->string('dimmer_switch');
            $table->string('directional_level');
            $table->string('speedometer');
            $table->string('fuel_gauge');
            $table->string('cars_seats_front');
            $table->string('car_seat_back');
            $table->string('car_seat_cover');
            $table->string('floor_carpet');
            $table->string('floor_matting');
            $table->string('computer_box');
            $table->string('air_condition_unit');
            $table->string('car_stereo');
            $table->string('interceptor_cable');
            $table->string('stereo_speaker');
            $table->string('twitter');
            $table->string('car_radio');
            $table->string('equalizer');
            $table->string('cd_charger');
            $table->string('lighter');
            $table->string('barometer');
            $table->string('fire_extinguisher');
            $table->string('antennae');
            $table->string('air_con_compressor');
            $table->string('radiator');
            $table->string('radiator_cover');
            $table->string('radiator_inlet_hose');
            $table->string('radiator_outlet_hose');
            $table->string('water_bypass_hose');
            $table->string('ignition_coil');
            $table->string('high_tension_wire');
            $table->string('distibutor_Cap');
            $table->string('distributor_assembly');
            $table->string('contact_point');
            $table->string('condenser');
            $table->string('air_con_condenser');
            $table->string('rotor');
            $table->string('advancer');
            $table->string('oil_dipstick');
            $table->string('air_con_driver_belt');
            $table->string('carburettor_assembly');
            $table->string('alternator');
            $table->string('alternator_voltage_regulator');
            $table->string('oil_filter');
            $table->string('steering_gear_box');
            $table->string('water_pump_assembly');
            $table->string('engine_fan');
            $table->string('auxiliary_fan');
            $table->string('fan_belt');
            $table->string('spark_plugs');
            $table->string('battery');
            $table->string('battery_cable');
            $table->string('battery_terminal');
            $table->string('horn_assembly');
            $table->string('horn_relay');
            $table->string('accelerator_cable');
            $table->string('intake_manifold');
            $table->string('exhaust_manifold');
            $table->string('engine_mounting');
            $table->string('ignition_wiring');
            $table->string('transmission');
            $table->string('suspension_assembly');
            $table->string('tie_rod_end');
            $table->string('idler_arm');
            $table->string('front_coil_spring');
            $table->string('pitman_arm');
            $table->string('newly_painted');
            $table->string('paint_discoloration');
            $table->string('good_body_shape');
            $table->string('body_in_bad_shape');
            $table->string('body_ongoing_repair');
            $table->string('for_repainting');
            $table->string('beyond_economical_repair');
            $table->string('remark');
            $table->string('recovering_personel');
            $table->string('witness_owner_barangay_official');
            $table->string('noted_by');
            $table->string('date');
            $table->string('status');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evidence_vehicles');
    }
};
