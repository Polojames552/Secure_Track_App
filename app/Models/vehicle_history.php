<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehicle_history extends Model
{
    use HasFactory;
    protected $fillable = [
        // image for QR code 'image', 
        //  'user_id',
        //  'make_type',
        //  'plate_no',
        //  'engine_no',
        //  'fuel',
        //  'chasis_no',
        //  'color',
        //  'registered_owner',
        //  'owner_address',
        //  'bumper_front',
        //  'fog_light',
        //  'general_condition',
        // image for QR code 'image', 
        'user_id',
        'uuid',
        'make_type',
        'plate_no',
        'engine_no',
        'fuel',
        'chasis_no',
        'color',
        'registered_owner',
        'owner_address',
        'brand_make',
        'size',
        'condition',
        'type',
        'no_studs',
        // 'color_tire',
        'general_condition',
        'bumper_front',
        'fog_light',
        'brand_marking_emblem',
        'headlights_lr',
        'radiator_grill',
        'windshield_wiper',
        'signal_lights_lr',
        'windshield_glass',
        'hazzard_lights_lr',
        'windshield_wiper_blade',
        'headlights_guard',
        'windshield_wiper_motor',
        'side_mirror_L',
        'wind_tunnel_glass_L',
        'window_glass_front_seat_L',
        'weather_window_strip_L',
        'side_mirror_R',
        'wind_tunnel_glass_R',
        'window_glass_front_seat_R',
        'weather_window_strip_R',
        'rear_bumper',
        'brand_emblem_marking',
        'window_glass_front_seat',
        'spare_tire_mounting',
        'tools',
        'steering_wheel',
        'shifting_rod_with_knob',
        'hand_break',
        'ammeter',
        'oil_pressure_gauge',
        'temperature_gauge',
        'rpm_gauge',
        'headlight_knob',
        'parking_hazard_knob',
        'wiper_knob',
        'dimmer_switch',
        'directional_level',
        'speedometer',
        'fuel_gauge',
        'cars_seats_front',
        'car_seat_back',
        'car_seat_cover',
        'floor_carpet',
        'floor_matting',
        'computer_box',
        'air_condition_unit',
        'car_stereo',
        'interceptor_cable',
        'stereo_speaker',
        'twitter',
        'car_radio',
        'equalizer',
        'cd_charger',
        'lighter',
        'barometer',
        'fire_extinguisher',
        'antennae',
        'air_con_compressor',
        'radiator',
        'radiator_cover',
        'radiator_inlet_hose',
        'radiator_outlet_hose',
        'water_bypass_hose',
        'ignition_coil',
        'high_tension_wire',
        'distibutor_Cap',
        'distributor_assembly',
        'contact_point',
        'condenser',
        'air_con_condenser',
        'rotor',
        'advancer',
        'oil_dipstick',
        'air_con_driver_belt',
        'carburettor_assembly',
        'alternator',
        'alternator_voltage_regulator',
        'oil_filter',
        'steering_gear_box',
        'water_pump_assembly',
        'engine_fan',
        'auxiliary_fan',
        'fan_belt',
        'spark_plugs',
        'battery',
        'battery_cable',
        'battery_terminal',
        'horn_assembly',
        'horn_relay',
        'accelerator_cable',
        'intake_manifold',
        'exhaust_manifold',
        'engine_mounting',
        'ignition_wiring',
        'transmission',
        'suspension_assembly',
        'tie_rod_end',
        'idler_arm',
        'front_coil_spring',
        'pitman_arm',
        'newly_painted',
        'paint_discoloration',
        'good_body_shape',
        'body_in_bad_shape',
        'body_ongoing_repair',
        'for_repainting',
        'beyond_economical_repair',
        'remark',
        'recovering_personel',
        'witness_owner_barangay_official',
        'noted_by',
        'date',
        // Checkbox
        'status',
        'municipality',
        // 'qr_code_image',
        ];
}
