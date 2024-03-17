<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle; 
use App\Models\EvidenceVehicle;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class investigatorController extends Controller
{
    public function investigatorsProfile()
    {
        $data = DB::select('select * from users where id = ?', [auth()->user()->id]);
        $investigators = DB::select('select * from users where role = 3 and municipality = ?', [auth()->user()->municipality]);
        $num_investigators = count($investigators);
        //GET TOTAL NUMBER OF RECORDS
        return view('Investigators/myInvestigatorsProfile',['data'=>$data,'num_investigators'=>$num_investigators]);
    }
    public function addEvidenceVehicle(Request $request)
    {
            // $request->validate([
            //     'fog_light' => ['required'],
            // ]);

                $data = new Vehicle();
                $data->user_id = Auth::user()->id;
                $data->make_type = $request->input('make_type');
                $data->plate_no = $request->input('plate_no');
                $data->engine_no = $request->input('engine_no');
                $data->fuel = $request->input('fuel');
                $data->chasis_no = $request->input('chasis_no');
                $data->color = $request->input('color');
                $data->registered_owner = $request->input('registered_owner');
                $data->owner_address = $request->input('owner_address');
                $data->brand_make = $request->input('brand_make');
                $data->size = $request->input('size');
                $data->condition = $request->input('condition');
                $data->type = $request->input('type');
                $data->no_studs = $request->input('no_studs');
                // $data->color_tire = $request->input('color_tire');
                $data->general_condition = $request->input('general_condition');

                $data->bumper_front = $request->input('bumper_front');
                $data->fog_light = $request->input('fog_light');
                $data->brand_marking_emblem = $request->input('brand_marking_emblem');
                $data->headlights_lr = $request->input('headlights_lr');
                $data->radiator_grill = $request->input('radiator_grill');
                $data->windshield_wiper = $request->input('windshield_wiper');
                $data->signal_lights_lr = $request->input('signal_lights_lr');
                $data->windshield_glass = $request->input('windshield_glass');
                $data->hazzard_lights_lr = $request->input('hazzard_lights_lr');
                $data->windshield_wiper_blade = $request->input('windshield_wiper_blade');
                $data->headlights_guard = $request->input('headlights_guard');
                $data->windshield_wiper_motor = $request->input('windshield_wiper_motor');
                $data->side_mirror_L = $request->input('side_mirror_L');
                $data->wind_tunnel_glass_L = $request->input('wind_tunnel_glass_L');
                $data->window_glass_front_seat_L = $request->input('window_glass_front_seat_L');
                $data->weather_window_strip_L = $request->input('weather_window_strip_L');
                $data->side_mirror_R = $request->input('side_mirror_R');
                $data->wind_tunnel_glass_R = $request->input('wind_tunnel_glass_R');
                $data->window_glass_front_seat_R = $request->input('window_glass_front_seat_R');
                $data->weather_window_strip_R = $request->input('weather_window_strip_R');
                $data->rear_bumper = $request->input('rear_bumper');
                $data->brand_emblem_marking = $request->input('brand_emblem_marking');
                $data->window_glass_front_seat = $request->input('window_glass_front_seat');
                $data->spare_tire_mounting = $request->input('spare_tire_mounting');
                $data->tools = $request->input('tools');




                $data->steering_wheel = $request->input('steering_wheel');
                $data->shifting_rod_with_knob = $request->input('shifting_rod_with_knob');
                $data->hand_break = $request->input('hand_break');
                $data->ammeter = $request->input('ammeter');
                $data->oil_pressure_gauge = $request->input('oil_pressure_gauge');
                $data->temperature_gauge = $request->input('temperature_gauge');
                $data->rpm_gauge = $request->input('rpm_gauge');
                $data->headlight_knob = $request->input('headlight_knob');
                $data->parking_hazard_knob = $request->input('parking_hazard_knob');
                $data->wiper_knob = $request->input('wiper_knob');
                $data->dimmer_switch = $request->input('dimmer_switch');
                $data->directional_level = $request->input('directional_level');
                $data->speedometer = $request->input('speedometer');
                $data->fuel_gauge = $request->input('fuel_gauge');
                $data->cars_seats_front = $request->input('cars_seats_front');
                $data->car_seat_back = $request->input('car_seat_back');
                $data->car_seat_cover = $request->input('car_seat_cover');
                $data->floor_carpet = $request->input('floor_carpet');
                $data->floor_matting = $request->input('floor_matting');
                $data->computer_box = $request->input('computer_box');
                $data->air_condition_unit = $request->input('air_condition_unit');
                $data->car_stereo = $request->input('car_stereo');
                $data->interceptor_cable = $request->input('interceptor_cable');
                $data->stereo_speaker = $request->input('stereo_speaker');
                $data->twitter = $request->input('twitter');
                $data->car_radio = $request->input('car_radio');
                $data->equalizer = $request->input('equalizer');
                $data->cd_charger = $request->input('cd_charger');
                $data->lighter = $request->input('lighter');
                $data->barometer = $request->input('barometer');
                $data->fire_extinguisher = $request->input('fire_extinguisher');
                $data->antennae = $request->input('antennae');
                $data->air_con_compressor = $request->input('air_con_compressor');
                $data->radiator = $request->input('radiator');
                $data->radiator_cover = $request->input('radiator_cover');
                $data->radiator_inlet_hose = $request->input('radiator_inlet_hose');
                $data->radiator_outlet_hose = $request->input('radiator_outlet_hose');
                $data->water_bypass_hose = $request->input('water_bypass_hose');
                $data->ignition_coil = $request->input('ignition_coil');
                $data->high_tension_wire = $request->input('high_tension_wire');
                $data->distibutor_Cap = $request->input('distibutor_Cap');
                $data->distributor_assembly = $request->input('distributor_assembly');
                $data->contact_point = $request->input('contact_point');
                $data->condenser = $request->input('condenser');
                $data->air_con_condenser = $request->input('air_con_condenser');
                $data->rotor = $request->input('rotor');
                $data->advancer = $request->input('advancer');



                $data->oil_dipstick = $request->input('oil_dipstick');
                $data->air_con_driver_belt = $request->input('air_con_driver_belt');
                $data->carburettor_assembly = $request->input('carburettor_assembly');
                $data->alternator = $request->input('alternator');
                $data->alternator_voltage_regulator = $request->input('alternator_voltage_regulator');
                $data->oil_filter = $request->input('oil_filter');
                $data->steering_gear_box = $request->input('steering_gear_box');
                $data->water_pump_assembly = $request->input('water_pump_assembly');
                $data->engine_fan = $request->input('engine_fan');
                $data->auxiliary_fan = $request->input('auxiliary_fan');
                $data->fan_belt = $request->input('fan_belt');
                $data->spark_plugs = $request->input('spark_plugs');
                $data->battery = $request->input('battery');
                $data->battery_cable = $request->input('battery_cable');
                $data->battery_terminal = $request->input('battery_terminal');
                $data->horn_assembly = $request->input('horn_assembly');
                $data->horn_relay = $request->input('horn_relay');
                $data->accelerator_cable = $request->input('accelerator_cable');
                $data->intake_manifold = $request->input('intake_manifold');
                $data->exhaust_manifold = $request->input('exhaust_manifold');
                $data->engine_mounting = $request->input('engine_mounting');
                $data->ignition_wiring = $request->input('ignition_wiring');
                $data->transmission = $request->input('transmission');
                $data->suspension_assembly = $request->input('suspension_assembly');
                $data->tie_rod_end = $request->input('tie_rod_end');
                $data->idler_arm = $request->input('idler_arm');
                $data->front_coil_spring = $request->input('front_coil_spring');
                $data->pitman_arm = $request->input('pitman_arm');
                $data->newly_painted = $request->input('newly_painted');
                $data->paint_discoloration = $request->input('paint_discoloration');
                $data->good_body_shape = $request->input('good_body_shape');
                $data->body_in_bad_shape = $request->input('body_in_bad_shape');
                $data->body_ongoing_repair = $request->input('body_ongoing_repair');
                $data->for_repainting = $request->input('for_repainting');
                $data->beyond_economical_repair = $request->input('beyond_economical_repair');
                
                
                $data->remark = $request->input('remark');
                $data->recovering_personel = $request->input('recovering_personel');
                $data->witness_owner_barangay_official = $request->input('witness_owner_barangay_official');
                $data->noted_by = $request->input('noted_by');
                $data->date = $request->input('date');
                $data->status = "Active";
            $data->save();
            return redirect('Investigator_vehiclesRecords')->with('message','Data added Successfully!');
            // return redirect()->back()->with('message', 'Data added successfully!');
    }

    public function add_vehicle_evidence(Request $request)
    {
        // $request->validate([
        //     'username' => ['required', 'string', 'max:255', 'unique:'.User::class],
        // ]);
        $currentDate = Carbon::now();

      
            $data = new EvidenceVehicle();
                $data->user_id = Auth::user()->id;
                $data->make_type = $request->input('make_type');
                $data->plate_no = $request->input('plate_no');
                $data->engine_no = $request->input('engine_no');
                $data->fuel = $request->input('fuel');
                $data->chasis_no = $request->input('chasis_no');
                $data->color = $request->input('color');
                $data->registered_owner = $request->input('registered_owner');
                $data->owner_address = $request->input('owner_address');

                $data->brand_make = $request->input('brand_make');
                $data->general_condition = $request->input('general_condition');
                $data->size = $request->input('size');
                $data->condition = $request->input('condition');
                $data->type = $request->input('type');
                $data->no_studs = $request->input('no_studs');

                
                $data->bumper_front = $request->filled('bumper_front') ? "true" : "false";
                $data->fog_light = $request->filled('fog_light') ? "true" : "false";
                $data->brand_marking_emblem = $request->filled('brand_marking_emblem') ? "true" : "false";
                $data->headlights_lr = $request->filled('headlights_lr') ? "true" : "false";
                $data->radiator_grill = $request->filled('radiator_grill') ? "true" : "false";
                $data->windshield_wiper = $request->filled('windshield_wiper') ? "true" : "false";
                $data->signal_lights_lr = $request->filled('signal_lights_lr') ? "true" : "false";
                $data->windshield_glass = $request->filled('windshield_glass') ? "true" : "false";
                $data->hazzard_lights_lr = $request->filled('hazzard_lights_lr') ? "true" : "false";
                $data->windshield_wiper_blade = $request->filled('windshield_wiper_blade') ? "true" : "false";
                $data->headlights_guard = $request->filled('headlights_guard') ? "true" : "false";
                $data->windshield_wiper_motor = $request->filled('windshield_wiper_motor') ? "true" : "false";
                $data->side_mirror_L = $request->filled('side_mirror_L') ? "true" : "false";
                $data->wind_tunnel_glass_L = $request->filled('wind_tunnel_glass_L') ? "true" : "false";
                $data->window_glass_front_seat_L = $request->filled('window_glass_front_seat_L') ? "true" : "false";
                $data->weather_window_strip_L = $request->filled('weather_window_strip_L') ? "true" : "false";
                $data->side_mirror_R = $request->filled('side_mirror_R') ? "true" : "false";
                $data->wind_tunnel_glass_R = $request->filled('wind_tunnel_glass_R') ? "true" : "false";
                $data->window_glass_front_seat_R = $request->filled('window_glass_front_seat_R') ? "true" : "false";
                $data->weather_window_strip_R = $request->filled('weather_window_strip_R') ? "true" : "false";
                $data->rear_bumper = $request->filled('rear_bumper') ? "true" : "false";
                $data->brand_emblem_marking = $request->filled('brand_emblem_marking') ? "true" : "false";
                $data->window_glass_front_seat = $request->filled('window_glass_front_seat') ? "true" : "false";
                $data->spare_tire_mounting = $request->filled('spare_tire_mounting') ? "true" : "false";
                $data->tools = $request->filled('tools') ? "true" : "false";

                $data->steering_wheel = $request->filled('steering_wheel') ? "true" : "false";
                $data->shifting_rod_with_knob = $request->filled('shifting_rod_with_knob') ? "true" : "false";
                $data->hand_break = $request->filled('hand_break') ? "true" : "false";
                $data->ammeter = $request->filled('ammeter') ? "true" : "false";
                $data->oil_pressure_gauge = $request->filled('oil_pressure_gauge') ? "true" : "false";
                $data->temperature_gauge = $request->filled('temperature_gauge') ? "true" : "false";
                $data->rpm_gauge = $request->filled('rpm_gauge') ? "true" : "false";
                $data->headlight_knob = $request->filled('headlight_knob') ? "true" : "false";
                $data->parking_hazard_knob = $request->filled('parking_hazard_knob') ? "true" : "false";
                $data->wiper_knob = $request->filled('wiper_knob') ? "true" : "false";
                $data->dimmer_switch = $request->filled('dimmer_switch') ? "true" : "false";
                $data->directional_level = $request->filled('directional_level') ? "true" : "false";
                $data->speedometer = $request->filled('speedometer') ? "true" : "false";
                $data->fuel_gauge = $request->filled('fuel_gauge') ? "true" : "false";
                $data->cars_seats_front = $request->filled('cars_seats_front') ? "true" : "false";
                $data->car_seat_back = $request->filled('car_seat_back') ? "true" : "false";
                $data->car_seat_cover = $request->filled('car_seat_cover') ? "true" : "false";
                $data->floor_carpet = $request->filled('floor_carpet') ? "true" : "false";
                $data->floor_matting = $request->filled('floor_matting') ? "true" : "false";
                $data->computer_box = $request->filled('computer_box') ? "true" : "false";
                $data->air_condition_unit = $request->filled('air_condition_unit') ? "true" : "false";
                $data->car_stereo = $request->filled('car_stereo') ? "true" : "false";
                $data->interceptor_cable = $request->filled('interceptor_cable') ? "true" : "false";
                $data->stereo_speaker = $request->filled('stereo_speaker') ? "true" : "false";
                $data->twitter = $request->filled('twitter') ? "true" : "false";
                $data->car_radio = $request->filled('car_radio') ? "true" : "false";
                $data->equalizer = $request->filled('equalizer') ? "true" : "false";
                $data->cd_charger = $request->filled('cd_charger') ? "true" : "false";
                $data->lighter = $request->filled('lighter') ? "true" : "false";
                $data->barometer = $request->filled('barometer') ? "true" : "false";
                $data->fire_extinguisher = $request->filled('fire_extinguisher') ? "true" : "false";
                $data->antennae = $request->filled('antennae') ? "true" : "false";
                $data->air_con_compressor = $request->filled('air_con_compressor') ? "true" : "false";
                $data->radiator = $request->filled('radiator') ? "true" : "false";
                $data->radiator_cover = $request->filled('radiator_cover') ? "true" : "false";
                $data->radiator_inlet_hose = $request->filled('radiator_inlet_hose') ? "true" : "false";
                $data->radiator_outlet_hose = $request->filled('radiator_outlet_hose') ? "true" : "false";
                $data->water_bypass_hose = $request->filled('water_bypass_hose') ? "true" : "false";
                $data->ignition_coil = $request->filled('ignition_coil') ? "true" : "false";
                $data->high_tension_wire = $request->filled('high_tension_wire') ? "true" : "false";
                $data->distibutor_Cap = $request->filled('distibutor_Cap') ? "true" : "false";
                $data->distributor_assembly = $request->filled('distributor_assembly') ? "true" : "false";
                $data->contact_point = $request->filled('contact_point') ? "true" : "false";
                $data->condenser = $request->filled('condenser') ? "true" : "false";
                $data->air_con_condenser = $request->filled('air_con_condenser') ? "true" : "false";
                $data->rotor = $request->filled('rotor') ? "true" : "false";
                $data->advancer = $request->filled('advancer') ? "true" : "false";

                $data->oil_dipstick = $request->filled('oil_dipstick') ? "true" : "false";
                $data->air_con_driver_belt = $request->filled('air_con_driver_belt') ? "true" : "false";
                $data->carburettor_assembly = $request->filled('carburettor_assembly') ? "true" : "false";
                $data->alternator = $request->filled('alternator') ? "true" : "false";
                $data->alternator_voltage_regulator = $request->filled('alternator_voltage_regulator') ? "true" : "false";
                $data->oil_filter = $request->filled('oil_filter') ? "true" : "false";
                $data->steering_gear_box = $request->filled('steering_gear_box') ? "true" : "false";
                $data->water_pump_assembly = $request->filled('water_pump_assembly') ? "true" : "false";
                $data->engine_fan = $request->filled('engine_fan') ? "true" : "false";
                $data->auxiliary_fan = $request->filled('auxiliary_fan') ? "true" : "false";
                $data->fan_belt = $request->filled('fan_belt') ? "true" : "false";
                $data->spark_plugs = $request->filled('spark_plugs') ? "true" : "false";
                $data->battery = $request->filled('battery') ? "true" : "false";
                $data->battery_cable = $request->filled('battery_cable') ? "true" : "false";
                $data->battery_terminal = $request->filled('battery_terminal') ? "true" : "false";
                $data->horn_assembly = $request->filled('horn_assembly') ? "true" : "false";
                $data->horn_relay = $request->filled('horn_relay') ? "true" : "false";
                $data->accelerator_cable = $request->filled('accelerator_cable') ? "true" : "false";
                $data->intake_manifold = $request->filled('intake_manifold') ? "true" : "false";
                $data->exhaust_manifold = $request->filled('exhaust_manifold') ? "true" : "false";
                $data->engine_mounting = $request->filled('engine_mounting') ? "true" : "false";
                $data->ignition_wiring = $request->filled('ignition_wiring') ? "true" : "false";
                $data->transmission = $request->filled('transmission') ? "true" : "false";
                $data->suspension_assembly = $request->filled('suspension_assembly') ? "true" : "false";
                $data->tie_rod_end = $request->filled('tie_rod_end') ? "true" : "false";
                $data->idler_arm = $request->filled('idler_arm') ? "true" : "false";
                $data->front_coil_spring = $request->filled('front_coil_spring') ? "true" : "false";
                $data->pitman_arm = $request->filled('pitman_arm') ? "true" : "false";
                $data->newly_painted = $request->filled('newly_painted') ? "true" : "false";
                $data->paint_discoloration = $request->filled('paint_discoloration') ? "true" : "false";
                $data->good_body_shape = $request->filled('good_body_shape') ? "true" : "false";
                $data->body_in_bad_shape = $request->filled('body_in_bad_shape') ? "true" : "false";
                $data->body_ongoing_repair = $request->filled('body_ongoing_repair') ? "true" : "false";
                $data->for_repainting = $request->filled('for_repainting') ? "true" : "false";
                $data->beyond_economical_repair = $request->filled('beyond_economical_repair') ? "true" : "false";

                $data->remark = $request->input('remark');
                $data->recovering_personel = $request->input('recovering_personel');
                $data->witness_owner_barangay_official = $request->input('witness_owner_barangay_official');
                $data->noted_by = $request->input('noted_by');
                $data->date = $currentDate->format('F j, Y');
                $data->status = "Active";
                // $data->bumper_front = $request->filled('bumper_front') ? "true" : "false";
                // $data->fog_light = $request->filled('fog_light') ? "true" : "false";
                // $data->general_condition = $request->input('general_condition');
            
            $data->save();
            return redirect('Investigator_vehiclesRecords')->with('message','Data added Successfully!');
       
    }

}
