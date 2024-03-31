<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle; 
use App\Models\property; 
use App\Models\property_history; 
use App\Models\Motorcycle; 
use App\Models\EvidenceVehicle;
use App\Models\vehicle_history;
use App\Models\motorcycle_history; 
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
class investigatorController extends Controller
{
    //Get
    public function investigatorsProfile()
    {
        $data = DB::select('select * from users where id = ?', [auth()->user()->id]);
        $investigators = DB::select('select * from users where role = 3 and municipality = ?', [auth()->user()->municipality]);
        $num_investigators = count($investigators);

        $property = property::where('user_id', auth()->user()->id)
        ->where('status', 'Active')
        ->get()
        ->count();
        $motorcycle = Motorcycle::where('user_id', auth()->user()->id)
        ->where('status', 'Active')
        ->get()
        ->count();
        $car = EvidenceVehicle::where('user_id', auth()->user()->id)
        ->where('status', 'Active')
        ->get()
        ->count();
        $active = ($property+$motorcycle+$car);

        $property1 = property::where('user_id', auth()->user()->id)
        ->where('status', 'Disposed' || 'Released')
        ->get()
        ->count();
        $motorcycle1 = Motorcycle::where('user_id', auth()->user()->id)
        ->where('status', 'Disposed' || 'Released')
        ->get()
        ->count();
        $car1 = EvidenceVehicle::where('user_id', auth()->user()->id)
        ->where('status', 'Disposed' || 'Released')
        ->get()
        ->count();
        $disposed = ($property1+$motorcycle1+$car1);
        $totel_record = ($active+$disposed);
        //GET TOTAL NUMBER OF RECORDS
        return view('Investigators/myInvestigatorsProfile',['data'=>$data,
            'num_investigators'=>$num_investigators,
            'active'=>$active,
            'disposed'=>$disposed,
            'totel_record'=>$totel_record
    ]);
    }
    public function investigatorVehicleRecords()
    {
        $data = DB::select('select * from evidence_vehicles where user_id = ?', [auth()->user()->id]);
        $count = count($data);
        return view('Investigators/Investigator_vehiclesRecords',['data'=>$data,'count'=>$count]);
    }

    public function investigatorPropertyRecords()
    {
        $data = DB::select('select * from properties where user_id = ?', [auth()->user()->id]);
        $count = count($data);
        return view('Investigators/Investigator_PropertyGoodsRecords',['data'=>$data,'count'=>$count]);
    }
    public function investigatorMotorcycleRecords()
    {
        $data = DB::select('select * from motorcycles where user_id = ?', [auth()->user()->id]);
        $count = count($data);
        return view('Investigators/Investigator_MotorVehiclesRecords',['data'=>$data,'count'=>$count]);
    }

    public function add_property_evidence(Request $request)
    {
        $currentDate = Carbon::now();
        $sample_data = DB::select('select * from properties');
        $count = count($sample_data);
       
        $data = new property();
            $data->user_id = Auth::user()->id;
            $data->municipality = Auth::user()->municipality;
            $data->qr_code_image = QrCode::size(100)->backgroundColor(255, 255, 204)->generate("property".$count +1);
            $data->uuid = "property".($count +1);
            $data->establishment = $request->input('establishment');
            $data->address = $request->input('address');
            $data->quantity = $request->input('quantity');
            $data->description =  $request->input('description');
            $data->seizing_officer =  $request->input('seizing_officer');
            $data->witness =  $request->input('witness');
            $data->date = $currentDate->format('F j, Y');
            $data->status =  "Active";
        $data->save();
        return redirect('Investigator_PropertyGoodsRecords')->with('message','Evidence added Successfully!');
    }

    public function add_motorcycle_evidence(Request $request)
    {
        $currentDate = Carbon::now();
        $sample_data = DB::select('select * from motorcycles');
        $count = count($sample_data);
       
        $data = new Motorcycle();
            $data->user_id = Auth::user()->id;
            $data->municipality = Auth::user()->municipality;
            $data->qr_code_image = QrCode::size(100)->backgroundColor(255, 255, 204)->generate("motorcycle".$count +1);
            $data->uuid = "motorcycle".($count +1);
            $data->make_type = $request->input('make_type');
            $data->chasis = $request->input('chasis');
            $data->motor_no = $request->input('motor_no');
            $data->plate_no =  $request->input('plate_no');
            $data->color =  $request->input('color');
            $data->ORCR_no =  $request->input('ORCR_no');
            $data->LTO_File_no =  $request->input('LTO_File_no');
            $data->registered_owner =  $request->input('registered_owner');
            $data->address =  $request->input('address');
            $data->violations =  $request->input('violations');
            $data->date = $currentDate->format('F j, Y');
            $data->status =  "Active";
        $data->save();
        return redirect('Investigator_MotorVehiclesRecords')->with('message','Evidence added Successfully!');
    }
    public function add_vehicle_evidence(Request $request)
    {
        $sample_data = DB::select('select * from evidence_vehicles');
        $count = count($sample_data);
        // $request->validate([
        //     'username' => ['required', 'string', 'max:255', 'unique:'.User::class],
        // ]);
        $currentDate = Carbon::now();
      
            $data = new EvidenceVehicle();
                $data->user_id = Auth::user()->id;
                $data->municipality = Auth::user()->municipality;
                $data->qr_code_image = QrCode::size(100)->backgroundColor(255, 255, 204)->generate("evidencevehicle".$count +1);
                $data->uuid = "evidencevehicle".($count +1);
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
            $data->save();

            // $data = new vehicle_history();
            //     $data->user_id = Auth::user()->id;
            //     // $data->qr_code_image = QrCode::size(100)->backgroundColor(255, 255, 204)->generate("evidencevehicle".$count +1);
            //     $data->uuid = "evidencevehicle".($count +1);
            //     $data->make_type = $request->input('make_type');
            //     $data->plate_no = $request->input('plate_no');
            //     $data->engine_no = $request->input('engine_no');
            //     $data->fuel = $request->input('fuel');
            //     $data->chasis_no = $request->input('chasis_no');
            //     $data->color = $request->input('color');
            //     $data->registered_owner = $request->input('registered_owner');
            //     $data->owner_address = $request->input('owner_address');
            //     $data->brand_make = $request->input('brand_make');
            //     $data->general_condition = $request->input('general_condition');
            //     $data->size = $request->input('size');
            //     $data->condition = $request->input('condition');
            //     $data->type = $request->input('type');
            //     $data->no_studs = $request->input('no_studs');
            //     $data->bumper_front = $request->filled('bumper_front') ? "true" : "false";
            //     $data->fog_light = $request->filled('fog_light') ? "true" : "false";
            //     $data->brand_marking_emblem = $request->filled('brand_marking_emblem') ? "true" : "false";
            //     $data->headlights_lr = $request->filled('headlights_lr') ? "true" : "false";
            //     $data->radiator_grill = $request->filled('radiator_grill') ? "true" : "false";
            //     $data->windshield_wiper = $request->filled('windshield_wiper') ? "true" : "false";
            //     $data->signal_lights_lr = $request->filled('signal_lights_lr') ? "true" : "false";
            //     $data->windshield_glass = $request->filled('windshield_glass') ? "true" : "false";
            //     $data->hazzard_lights_lr = $request->filled('hazzard_lights_lr') ? "true" : "false";
            //     $data->windshield_wiper_blade = $request->filled('windshield_wiper_blade') ? "true" : "false";
            //     $data->headlights_guard = $request->filled('headlights_guard') ? "true" : "false";
            //     $data->windshield_wiper_motor = $request->filled('windshield_wiper_motor') ? "true" : "false";
            //     $data->side_mirror_L = $request->filled('side_mirror_L') ? "true" : "false";
            //     $data->wind_tunnel_glass_L = $request->filled('wind_tunnel_glass_L') ? "true" : "false";
            //     $data->window_glass_front_seat_L = $request->filled('window_glass_front_seat_L') ? "true" : "false";
            //     $data->weather_window_strip_L = $request->filled('weather_window_strip_L') ? "true" : "false";
            //     $data->side_mirror_R = $request->filled('side_mirror_R') ? "true" : "false";
            //     $data->wind_tunnel_glass_R = $request->filled('wind_tunnel_glass_R') ? "true" : "false";
            //     $data->window_glass_front_seat_R = $request->filled('window_glass_front_seat_R') ? "true" : "false";
            //     $data->weather_window_strip_R = $request->filled('weather_window_strip_R') ? "true" : "false";
            //     $data->rear_bumper = $request->filled('rear_bumper') ? "true" : "false";
            //     $data->brand_emblem_marking = $request->filled('brand_emblem_marking') ? "true" : "false";
            //     $data->window_glass_front_seat = $request->filled('window_glass_front_seat') ? "true" : "false";
            //     $data->spare_tire_mounting = $request->filled('spare_tire_mounting') ? "true" : "false";
            //     $data->tools = $request->filled('tools') ? "true" : "false";
            //     $data->steering_wheel = $request->filled('steering_wheel') ? "true" : "false";
            //     $data->shifting_rod_with_knob = $request->filled('shifting_rod_with_knob') ? "true" : "false";
            //     $data->hand_break = $request->filled('hand_break') ? "true" : "false";
            //     $data->ammeter = $request->filled('ammeter') ? "true" : "false";
            //     $data->oil_pressure_gauge = $request->filled('oil_pressure_gauge') ? "true" : "false";
            //     $data->temperature_gauge = $request->filled('temperature_gauge') ? "true" : "false";
            //     $data->rpm_gauge = $request->filled('rpm_gauge') ? "true" : "false";
            //     $data->headlight_knob = $request->filled('headlight_knob') ? "true" : "false";
            //     $data->parking_hazard_knob = $request->filled('parking_hazard_knob') ? "true" : "false";
            //     $data->wiper_knob = $request->filled('wiper_knob') ? "true" : "false";
            //     $data->dimmer_switch = $request->filled('dimmer_switch') ? "true" : "false";
            //     $data->directional_level = $request->filled('directional_level') ? "true" : "false";
            //     $data->speedometer = $request->filled('speedometer') ? "true" : "false";
            //     $data->fuel_gauge = $request->filled('fuel_gauge') ? "true" : "false";
            //     $data->cars_seats_front = $request->filled('cars_seats_front') ? "true" : "false";
            //     $data->car_seat_back = $request->filled('car_seat_back') ? "true" : "false";
            //     $data->car_seat_cover = $request->filled('car_seat_cover') ? "true" : "false";
            //     $data->floor_carpet = $request->filled('floor_carpet') ? "true" : "false";
            //     $data->floor_matting = $request->filled('floor_matting') ? "true" : "false";
            //     $data->computer_box = $request->filled('computer_box') ? "true" : "false";
            //     $data->air_condition_unit = $request->filled('air_condition_unit') ? "true" : "false";
            //     $data->car_stereo = $request->filled('car_stereo') ? "true" : "false";
            //     $data->interceptor_cable = $request->filled('interceptor_cable') ? "true" : "false";
            //     $data->stereo_speaker = $request->filled('stereo_speaker') ? "true" : "false";
            //     $data->twitter = $request->filled('twitter') ? "true" : "false";
            //     $data->car_radio = $request->filled('car_radio') ? "true" : "false";
            //     $data->equalizer = $request->filled('equalizer') ? "true" : "false";
            //     $data->cd_charger = $request->filled('cd_charger') ? "true" : "false";
            //     $data->lighter = $request->filled('lighter') ? "true" : "false";
            //     $data->barometer = $request->filled('barometer') ? "true" : "false";
            //     $data->fire_extinguisher = $request->filled('fire_extinguisher') ? "true" : "false";
            //     $data->antennae = $request->filled('antennae') ? "true" : "false";
            //     $data->air_con_compressor = $request->filled('air_con_compressor') ? "true" : "false";
            //     $data->radiator = $request->filled('radiator') ? "true" : "false";
            //     $data->radiator_cover = $request->filled('radiator_cover') ? "true" : "false";
            //     $data->radiator_inlet_hose = $request->filled('radiator_inlet_hose') ? "true" : "false";
            //     $data->radiator_outlet_hose = $request->filled('radiator_outlet_hose') ? "true" : "false";
            //     $data->water_bypass_hose = $request->filled('water_bypass_hose') ? "true" : "false";
            //     $data->ignition_coil = $request->filled('ignition_coil') ? "true" : "false";
            //     $data->high_tension_wire = $request->filled('high_tension_wire') ? "true" : "false";
            //     $data->distibutor_Cap = $request->filled('distibutor_Cap') ? "true" : "false";
            //     $data->distributor_assembly = $request->filled('distributor_assembly') ? "true" : "false";
            //     $data->contact_point = $request->filled('contact_point') ? "true" : "false";
            //     $data->condenser = $request->filled('condenser') ? "true" : "false";
            //     $data->air_con_condenser = $request->filled('air_con_condenser') ? "true" : "false";
            //     $data->rotor = $request->filled('rotor') ? "true" : "false";
            //     $data->advancer = $request->filled('advancer') ? "true" : "false";
            //     $data->oil_dipstick = $request->filled('oil_dipstick') ? "true" : "false";
            //     $data->air_con_driver_belt = $request->filled('air_con_driver_belt') ? "true" : "false";
            //     $data->carburettor_assembly = $request->filled('carburettor_assembly') ? "true" : "false";
            //     $data->alternator = $request->filled('alternator') ? "true" : "false";
            //     $data->alternator_voltage_regulator = $request->filled('alternator_voltage_regulator') ? "true" : "false";
            //     $data->oil_filter = $request->filled('oil_filter') ? "true" : "false";
            //     $data->steering_gear_box = $request->filled('steering_gear_box') ? "true" : "false";
            //     $data->water_pump_assembly = $request->filled('water_pump_assembly') ? "true" : "false";
            //     $data->engine_fan = $request->filled('engine_fan') ? "true" : "false";
            //     $data->auxiliary_fan = $request->filled('auxiliary_fan') ? "true" : "false";
            //     $data->fan_belt = $request->filled('fan_belt') ? "true" : "false";
            //     $data->spark_plugs = $request->filled('spark_plugs') ? "true" : "false";
            //     $data->battery = $request->filled('battery') ? "true" : "false";
            //     $data->battery_cable = $request->filled('battery_cable') ? "true" : "false";
            //     $data->battery_terminal = $request->filled('battery_terminal') ? "true" : "false";
            //     $data->horn_assembly = $request->filled('horn_assembly') ? "true" : "false";
            //     $data->horn_relay = $request->filled('horn_relay') ? "true" : "false";
            //     $data->accelerator_cable = $request->filled('accelerator_cable') ? "true" : "false";
            //     $data->intake_manifold = $request->filled('intake_manifold') ? "true" : "false";
            //     $data->exhaust_manifold = $request->filled('exhaust_manifold') ? "true" : "false";
            //     $data->engine_mounting = $request->filled('engine_mounting') ? "true" : "false";
            //     $data->ignition_wiring = $request->filled('ignition_wiring') ? "true" : "false";
            //     $data->transmission = $request->filled('transmission') ? "true" : "false";
            //     $data->suspension_assembly = $request->filled('suspension_assembly') ? "true" : "false";
            //     $data->tie_rod_end = $request->filled('tie_rod_end') ? "true" : "false";
            //     $data->idler_arm = $request->filled('idler_arm') ? "true" : "false";
            //     $data->front_coil_spring = $request->filled('front_coil_spring') ? "true" : "false";
            //     $data->pitman_arm = $request->filled('pitman_arm') ? "true" : "false";
            //     $data->newly_painted = $request->filled('newly_painted') ? "true" : "false";
            //     $data->paint_discoloration = $request->filled('paint_discoloration') ? "true" : "false";
            //     $data->good_body_shape = $request->filled('good_body_shape') ? "true" : "false";
            //     $data->body_in_bad_shape = $request->filled('body_in_bad_shape') ? "true" : "false";
            //     $data->body_ongoing_repair = $request->filled('body_ongoing_repair') ? "true" : "false";
            //     $data->for_repainting = $request->filled('for_repainting') ? "true" : "false";
            //     $data->beyond_economical_repair = $request->filled('beyond_economical_repair') ? "true" : "false";
            //     $data->remark = $request->input('remark');
            //     $data->recovering_personel = $request->input('recovering_personel');
            //     $data->witness_owner_barangay_official = $request->input('witness_owner_barangay_official');
            //     $data->noted_by = $request->input('noted_by');
            //     $data->date = $currentDate->format('F j, Y');
            //     $data->status = "Active";
            // $data->save();
            return redirect('Investigator_vehiclesRecords')->with('message','Data added Successfully!');
       
    }
   
    public function updateMotorcycle_Evidence(Request $request, $id)
    {
        DB::table('motorcycles')
        ->where('id', $id)
        ->update(array(
            'make_type' => $request->input('make_type'),
            'chasis' => $request->input('chasis'),
            'motor_no' => $request->input('motor_no'),
            'plate_no' => $request->input('plate_no'),
            'color' => $request->input('color'),
            'ORCR_no' => $request->input('ORCR_no'),
            'LTO_File_no' => $request->input('LTO_File_no'),
            'registered_owner' => $request->input('registered_owner'),
            'address' => $request->input('address'),
            'violations' => $request->input('violations'),
            'status' => $request->input('status'),
        ));
 
        return redirect('Investigator_MotorVehiclesRecords')->with('message','Details updated successfully!');
    }
    public function updateProperty_Evidence(Request $request, $id)
    {
        DB::table('properties')
        ->where('id', $id)
        ->update(array(
            'establishment' => $request->input('establishment'),
            'address' => $request->input('address'),
            'quantity' => $request->input('quantity'),
            'description' => $request->input('description'),
            'seizing_officer' => $request->input('seizing_officer'),
            'witness' => $request->input('witness'),
            'status' => $request->input('status'),
        ));
 
        return redirect('Investigator_PropertyGoodsRecords')->with('message','Details updated successfully!');
    }
    public function updateEvidence_Vehicles(Request $request, $id)
    {
        DB::table('evidence_vehicles')
        ->where('id', $id)
        ->update(array(
            'make_type' => $request->input('make_type'),
            'plate_no' => $request->input('plate_no'),
            'engine_no' => $request->input('engine_no'),
            'fuel' => $request->input('fuel'),
            'chasis_no' => $request->input('chasis_no'),
            'color' => $request->input('color'),
            'registered_owner' => $request->input('registered_owner'),
            'owner_address' => $request->input('owner_address'),
            'brand_make' => $request->input('brand_make'),
            'general_condition' => $request->input('general_condition'),
            'size' => $request->input('size'),
            'condition' => $request->input('condition'),
            'type' => $request->input('type'),
            'no_studs' => $request->input('no_studs'),
            'bumper_front' => $request->filled('bumper_front') ? "true" : "false",
            'fog_light' => $request->filled('fog_light') ? "true" : "false",
            'brand_marking_emblem' => $request->filled('brand_marking_emblem') ? "true" : "false",
            'headlights_lr' => $request->filled('headlights_lr') ? "true" : "false",
            'radiator_grill' => $request->filled('radiator_grill') ? "true" : "false",
            'windshield_wiper' => $request->filled('windshield_wiper') ? "true" : "false",
            'signal_lights_lr' => $request->filled('signal_lights_lr') ? "true" : "false",
            'windshield_glass' => $request->filled('windshield_glass') ? "true" : "false",
            'hazzard_lights_lr' => $request->filled('hazzard_lights_lr') ? "true" : "false",
            'windshield_wiper_blade' => $request->filled('windshield_wiper_blade') ? "true" : "false",
            'headlights_guard' => $request->filled('headlights_guard') ? "true" : "false",
            'windshield_wiper_motor' => $request->filled('windshield_wiper_motor') ? "true" : "false",
            'side_mirror_L' => $request->filled('side_mirror_L') ? "true" : "false",
            'wind_tunnel_glass_L' => $request->filled('wind_tunnel_glass_L') ? "true" : "false",
            'window_glass_front_seat_L' => $request->filled('window_glass_front_seat_L') ? "true" : "false",
            'weather_window_strip_L' => $request->filled('weather_window_strip_L') ? "true" : "false",
            'side_mirror_R' => $request->filled('side_mirror_R') ? "true" : "false",
            'wind_tunnel_glass_R' => $request->filled('wind_tunnel_glass_R') ? "true" : "false",
            'window_glass_front_seat_R' => $request->filled('window_glass_front_seat_R') ? "true" : "false",
            'weather_window_strip_R' => $request->filled('weather_window_strip_R') ? "true" : "false",
            'rear_bumper' => $request->filled('rear_bumper') ? "true" : "false",
            'brand_emblem_marking' => $request->filled('brand_emblem_marking') ? "true" : "false",
            'window_glass_front_seat' => $request->filled('window_glass_front_seat') ? "true" : "false",
            'spare_tire_mounting' => $request->filled('spare_tire_mounting') ? "true" : "false",
            'tools' => $request->filled('tools') ? "true" : "false",
            'steering_wheel' => $request->filled('steering_wheel') ? "true" : "false",
            'shifting_rod_with_knob' => $request->filled('shifting_rod_with_knob') ? "true" : "false",
            'hand_break' => $request->filled('hand_break') ? "true" : "false",
            'ammeter' => $request->filled('ammeter') ? "true" : "false",
            'oil_pressure_gauge' => $request->filled('oil_pressure_gauge') ? "true" : "false",
            'temperature_gauge' => $request->filled('temperature_gauge') ? "true" : "false",
            'rpm_gauge' => $request->filled('rpm_gauge') ? "true" : "false",
            'headlight_knob' => $request->filled('headlight_knob') ? "true" : "false",
            'parking_hazard_knob' => $request->filled('parking_hazard_knob') ? "true" : "false",
            'wiper_knob' => $request->filled('wiper_knob') ? "true" : "false",
            'dimmer_switch' => $request->filled('dimmer_switch') ? "true" : "false",
            'directional_level' => $request->filled('directional_level') ? "true" : "false",
            'speedometer' => $request->filled('speedometer') ? "true" : "false",
            'fuel_gauge' => $request->filled('fuel_gauge') ? "true" : "false",
            'cars_seats_front' => $request->filled('cars_seats_front') ? "true" : "false",
            'car_seat_back' => $request->filled('car_seat_back') ? "true" : "false",
            'car_seat_cover' => $request->filled('car_seat_cover') ? "true" : "false",
            'floor_carpet' => $request->filled('floor_carpet') ? "true" : "false",
            'floor_matting' => $request->filled('floor_matting') ? "true" : "false",
            'computer_box' => $request->filled('computer_box') ? "true" : "false",
            'air_condition_unit' => $request->filled('air_condition_unit') ? "true" : "false",
            'car_stereo' => $request->filled('car_stereo') ? "true" : "false",
            'interceptor_cable' => $request->filled('interceptor_cable') ? "true" : "false",
            'stereo_speaker' => $request->filled('stereo_speaker') ? "true" : "false",
            'twitter' => $request->filled('twitter') ? "true" : "false",
            'car_radio' => $request->filled('car_radio') ? "true" : "false",
            'equalizer' => $request->filled('equalizer') ? "true" : "false",
            'cd_charger' => $request->filled('cd_charger') ? "true" : "false",
            'lighter' => $request->filled('lighter') ? "true" : "false",
            'barometer' => $request->filled('barometer') ? "true" : "false",
            'fire_extinguisher' => $request->filled('fire_extinguisher') ? "true" : "false",
            'antennae' => $request->filled('antennae') ? "true" : "false",
            'air_con_compressor' => $request->filled('air_con_compressor') ? "true" : "false",
            'radiator' => $request->filled('radiator') ? "true" : "false",
            'radiator_cover' => $request->filled('radiator_cover') ? "true" : "false",
            'radiator_inlet_hose' => $request->filled('radiator_inlet_hose') ? "true" : "false",
            'radiator_outlet_hose' => $request->filled('radiator_outlet_hose') ? "true" : "false",
            'water_bypass_hose' => $request->filled('water_bypass_hose') ? "true" : "false",
            'ignition_coil' => $request->filled('ignition_coil') ? "true" : "false",
            'high_tension_wire' => $request->filled('high_tension_wire') ? "true" : "false",
            'distibutor_Cap' => $request->filled('distibutor_Cap') ? "true" : "false",
            'distributor_assembly' => $request->filled('distributor_assembly') ? "true" : "false",
            'contact_point' => $request->filled('contact_point') ? "true" : "false",
            'condenser' => $request->filled('condenser') ? "true" : "false",
            'air_con_condenser' => $request->filled('air_con_condenser') ? "true" : "false",
            'rotor' => $request->filled('rotor') ? "true" : "false",
            'advancer' => $request->filled('advancer') ? "true" : "false",
            'oil_dipstick' => $request->filled('oil_dipstick') ? "true" : "false",
            'air_con_driver_belt' => $request->filled('air_con_driver_belt') ? "true" : "false",
            'carburettor_assembly' => $request->filled('carburettor_assembly') ? "true" : "false",
            'alternator' => $request->filled('alternator') ? "true" : "false",
            'alternator_voltage_regulator' => $request->filled('alternator_voltage_regulator') ? "true" : "false",
            'oil_filter' => $request->filled('oil_filter') ? "true" : "false",
            'steering_gear_box' => $request->filled('steering_gear_box') ? "true" : "false",
            'water_pump_assembly' => $request->filled('water_pump_assembly') ? "true" : "false",
            'engine_fan' => $request->filled('engine_fan') ? "true" : "false",
            'auxiliary_fan' => $request->filled('auxiliary_fan') ? "true" : "false",
            'fan_belt' => $request->filled('fan_belt') ? "true" : "false",
            'spark_plugs' => $request->filled('spark_plugs') ? "true" : "false",
            'battery' => $request->filled('battery') ? "true" : "false",
            'battery_cable' => $request->filled('battery_cable') ? "true" : "false",
            'battery_terminal' => $request->filled('battery_terminal') ? "true" : "false",
            'horn_assembly' => $request->filled('horn_assembly') ? "true" : "false",
            'horn_relay' => $request->filled('horn_relay') ? "true" : "false",
            'accelerator_cable' => $request->filled('accelerator_cable') ? "true" : "false",
            'intake_manifold' => $request->filled('intake_manifold') ? "true" : "false",
            'exhaust_manifold' => $request->filled('exhaust_manifold') ? "true" : "false",
            'engine_mounting' => $request->filled('engine_mounting') ? "true" : "false",
            'ignition_wiring' => $request->filled('ignition_wiring') ? "true" : "false",
            'transmission' => $request->filled('transmission') ? "true" : "false",
            'suspension_assembly' => $request->filled('suspension_assembly') ? "true" : "false",
            'tie_rod_end' => $request->filled('tie_rod_end') ? "true" : "false",
            'idler_arm' => $request->filled('idler_arm') ? "true" : "false",
            'front_coil_spring' => $request->filled('front_coil_spring') ? "true" : "false",
            'pitman_arm' => $request->filled('pitman_arm') ? "true" : "false",
            'newly_painted' => $request->filled('newly_painted') ? "true" : "false",
            'paint_discoloration' => $request->filled('paint_discoloration') ? "true" : "false",
            'good_body_shape' => $request->filled('good_body_shape') ? "true" : "false",
            'body_in_bad_shape' => $request->filled('body_in_bad_shape') ? "true" : "false",
            'body_ongoing_repair' => $request->filled('body_ongoing_repair') ? "true" : "false",
            'for_repainting' => $request->filled('for_repainting') ? "true" : "false",
            'beyond_economical_repair' => $request->filled('beyond_economical_repair') ? "true" : "false",
            'remark' => $request->input('remark'),
            'recovering_personel' => $request->input('recovering_personel'),
            'witness_owner_barangay_official' => $request->input('witness_owner_barangay_official'),
            'noted_by' => $request->input('noted_by'),
        ));
 
            return redirect('Investigator_vehiclesRecords')->with('message','Details updated successfully!');
    }

    public function transferVehicles_Evidence(Request $request, $id)
    {
            $my_data = DB::table('evidence_vehicles')->where('id', $id)->get();
        // $my_data = DB::select('select * from vehicle_histories where id = ?', [$id]);
            $data = new vehicle_history();
                $data->user_id = Auth::user()->id;
                $data->municipality = Auth::user()->municipality;
                // $data->qr_code_image = QrCode::size(100)->backgroundColor(255, 255, 204)->generate("evidencevehicle".$count +1);
                $data->uuid = $my_data[0]->uuid;
                $data->make_type = $my_data[0]->make_type;
                $data->plate_no = $my_data[0]->plate_no;
                $data->engine_no = $my_data[0]->engine_no;
                $data->fuel = $my_data[0]->fuel;

                $data->chasis_no = $my_data[0]->chasis_no;
                $data->color = $my_data[0]->color;
                $data->registered_owner = $my_data[0]->registered_owner;
                $data->owner_address = $my_data[0]->owner_address;
                $data->brand_make = $my_data[0]->brand_make;
                $data->general_condition = $my_data[0]->general_condition;
                $data->size = $my_data[0]->size;
                $data->condition = $my_data[0]->condition;
                $data->type = $my_data[0]->type;
                $data->no_studs = $my_data[0]->no_studs;
                
                $data->bumper_front = $my_data[0]->bumper_front;
                $data->fog_light = $my_data[0]->fog_light;
                $data->brand_marking_emblem = $my_data[0]->brand_marking_emblem;
                $data->headlights_lr = $my_data[0]->headlights_lr;
                $data->radiator_grill = $my_data[0]->radiator_grill;
                $data->windshield_wiper = $my_data[0]->windshield_wiper;
                $data->signal_lights_lr = $my_data[0]->signal_lights_lr;
                $data->windshield_glass = $my_data[0]->windshield_glass;
                $data->hazzard_lights_lr = $my_data[0]->hazzard_lights_lr;
                $data->windshield_wiper_blade = $my_data[0]->windshield_wiper_blade;
                $data->headlights_guard = $my_data[0]->headlights_guard;
                $data->windshield_wiper_motor = $my_data[0]->windshield_wiper_motor;
                $data->side_mirror_L = $my_data[0]->side_mirror_L;
                $data->wind_tunnel_glass_L = $my_data[0]->wind_tunnel_glass_L;
                $data->window_glass_front_seat_L = $my_data[0]->window_glass_front_seat_L;
                $data->weather_window_strip_L = $my_data[0]->weather_window_strip_L;
                $data->side_mirror_R = $my_data[0]->side_mirror_R;
                $data->wind_tunnel_glass_R = $my_data[0]->wind_tunnel_glass_R;
                $data->window_glass_front_seat_R = $my_data[0]->window_glass_front_seat_R;
                $data->weather_window_strip_R = $my_data[0]->weather_window_strip_R;
                $data->rear_bumper = $my_data[0]->rear_bumper;
                $data->brand_emblem_marking = $my_data[0]->brand_emblem_marking;
                $data->window_glass_front_seat = $my_data[0]->window_glass_front_seat;
                $data->spare_tire_mounting = $my_data[0]->spare_tire_mounting;
                $data->tools = $my_data[0]->tools;
                $data->steering_wheel = $my_data[0]->steering_wheel;
                $data->shifting_rod_with_knob = $my_data[0]->shifting_rod_with_knob;
                $data->hand_break = $my_data[0]->hand_break;
                $data->ammeter = $my_data[0]->ammeter;
                $data->oil_pressure_gauge = $my_data[0]->oil_pressure_gauge;
                $data->temperature_gauge = $my_data[0]->temperature_gauge;
                $data->rpm_gauge = $my_data[0]->rpm_gauge;
                $data->headlight_knob = $my_data[0]->headlight_knob;
                $data->parking_hazard_knob = $my_data[0]->parking_hazard_knob;
                $data->wiper_knob = $my_data[0]->wiper_knob;
                $data->dimmer_switch = $my_data[0]->dimmer_switch;
                
                $data->directional_level = $my_data[0]->directional_level;
                $data->speedometer = $my_data[0]->speedometer;
                $data->fuel_gauge = $my_data[0]->fuel_gauge;
                $data->cars_seats_front = $my_data[0]->cars_seats_front;
                $data->car_seat_back = $my_data[0]->car_seat_back;
                $data->car_seat_cover = $my_data[0]->car_seat_cover;
                $data->floor_carpet = $my_data[0]->floor_carpet;
                $data->floor_matting = $my_data[0]->floor_matting;
                $data->computer_box = $my_data[0]->computer_box;
                $data->air_condition_unit = $my_data[0]->air_condition_unit;
                $data->car_stereo = $my_data[0]->car_stereo;
                $data->interceptor_cable = $my_data[0]->interceptor_cable;
                $data->stereo_speaker = $my_data[0]->stereo_speaker;
                $data->twitter = $my_data[0]->twitter;
                $data->car_radio = $my_data[0]->car_radio;
                $data->equalizer = $my_data[0]->equalizer;
                $data->cd_charger = $my_data[0]->cd_charger;
                $data->lighter = $my_data[0]->lighter;
                $data->barometer = $my_data[0]->barometer;
                $data->fire_extinguisher = $my_data[0]->fire_extinguisher;
                $data->antennae = $my_data[0]->antennae;
                $data->air_con_compressor = $my_data[0]->air_con_compressor;
                $data->radiator = $my_data[0]->radiator;
                $data->radiator_cover = $my_data[0]->radiator_cover;
                $data->radiator_inlet_hose = $my_data[0]->radiator_inlet_hose;
                $data->radiator_outlet_hose = $my_data[0]->radiator_outlet_hose;
                $data->water_bypass_hose = $my_data[0]->water_bypass_hose;
                $data->ignition_coil = $my_data[0]->ignition_coil;
                $data->high_tension_wire = $my_data[0]->high_tension_wire;
                $data->distibutor_Cap = $my_data[0]->distibutor_Cap;
                $data->distributor_assembly = $my_data[0]->distributor_assembly;
                $data->contact_point = $my_data[0]->contact_point;
                $data->condenser = $my_data[0]->condenser;
                $data->air_con_condenser = $my_data[0]->air_con_condenser;
                $data->rotor = $my_data[0]->rotor;
                $data->advancer = $my_data[0]->advancer;
                $data->oil_dipstick = $my_data[0]->oil_dipstick;

                $data->air_con_driver_belt = $my_data[0]->air_con_driver_belt;
                $data->carburettor_assembly = $my_data[0]->carburettor_assembly;
                $data->alternator = $my_data[0]->alternator;
                $data->alternator_voltage_regulator = $my_data[0]->alternator_voltage_regulator;
                $data->oil_filter = $my_data[0]->oil_filter;
                $data->steering_gear_box = $my_data[0]->steering_gear_box;
                $data->water_pump_assembly = $my_data[0]->water_pump_assembly;
                $data->engine_fan = $my_data[0]->engine_fan;
                $data->auxiliary_fan = $my_data[0]->auxiliary_fan;
                $data->fan_belt = $my_data[0]->fan_belt;
                $data->spark_plugs = $my_data[0]->spark_plugs;
                $data->battery = $my_data[0]->battery;
                $data->battery_cable = $my_data[0]->battery_cable;
                $data->battery_terminal = $my_data[0]->battery_terminal;
                $data->horn_assembly = $my_data[0]->horn_assembly;
                $data->horn_relay = $my_data[0]->horn_relay;
                $data->accelerator_cable = $my_data[0]->accelerator_cable;
                $data->intake_manifold = $my_data[0]->intake_manifold;
                $data->exhaust_manifold = $my_data[0]->exhaust_manifold;
                $data->engine_mounting = $my_data[0]->engine_mounting;
                $data->ignition_wiring = $my_data[0]->ignition_wiring;
                $data->transmission = $my_data[0]->transmission;
                $data->suspension_assembly = $my_data[0]->suspension_assembly;
                $data->tie_rod_end = $my_data[0]->tie_rod_end;
                $data->idler_arm = $my_data[0]->idler_arm;
                $data->front_coil_spring = $my_data[0]->front_coil_spring;
                $data->pitman_arm = $my_data[0]->pitman_arm;
                $data->newly_painted = $my_data[0]->newly_painted;
                $data->paint_discoloration = $my_data[0]->paint_discoloration;
                $data->good_body_shape = $my_data[0]->good_body_shape;
                $data->body_in_bad_shape = $my_data[0]->body_in_bad_shape;
                $data->body_ongoing_repair = $my_data[0]->body_ongoing_repair;
                $data->for_repainting = $my_data[0]->for_repainting;
                $data->beyond_economical_repair = $my_data[0]->beyond_economical_repair;

                $data->remark = $my_data[0]->remark;
                $data->recovering_personel = $my_data[0]->recovering_personel;
                $data->witness_owner_barangay_official = $my_data[0]->witness_owner_barangay_official;
                $data->noted_by = $my_data[0]->noted_by;
                $data->date = $my_data[0]->date;
                $data->status = $my_data[0]->status;

            $data->save();

        DB::table('evidence_vehicles')
        ->where('id', $id)
        ->update(array(
            'make_type' => $request->input('make_type'),
            'plate_no' => $request->input('plate_no'),
            'engine_no' => $request->input('engine_no'),
            'fuel' => $request->input('fuel'),
            'chasis_no' => $request->input('chasis_no'),
            'color' => $request->input('color'),
            'registered_owner' => $request->input('registered_owner'),
            'owner_address' => $request->input('owner_address'),
            'brand_make' => $request->input('brand_make'),
            'general_condition' => $request->input('general_condition'),
            'size' => $request->input('size'),
            'condition' => $request->input('condition'),
            'type' => $request->input('type'),
            'no_studs' => $request->input('no_studs'),
            'bumper_front' => $request->filled('bumper_front') ? "true" : "false",
            'fog_light' => $request->filled('fog_light') ? "true" : "false",
            'brand_marking_emblem' => $request->filled('brand_marking_emblem') ? "true" : "false",
            'headlights_lr' => $request->filled('headlights_lr') ? "true" : "false",
            'radiator_grill' => $request->filled('radiator_grill') ? "true" : "false",
            'windshield_wiper' => $request->filled('windshield_wiper') ? "true" : "false",
            'signal_lights_lr' => $request->filled('signal_lights_lr') ? "true" : "false",
            'windshield_glass' => $request->filled('windshield_glass') ? "true" : "false",
            'hazzard_lights_lr' => $request->filled('hazzard_lights_lr') ? "true" : "false",
            'windshield_wiper_blade' => $request->filled('windshield_wiper_blade') ? "true" : "false",
            'headlights_guard' => $request->filled('headlights_guard') ? "true" : "false",
            'windshield_wiper_motor' => $request->filled('windshield_wiper_motor') ? "true" : "false",
            'side_mirror_L' => $request->filled('side_mirror_L') ? "true" : "false",
            'wind_tunnel_glass_L' => $request->filled('wind_tunnel_glass_L') ? "true" : "false",
            'window_glass_front_seat_L' => $request->filled('window_glass_front_seat_L') ? "true" : "false",
            'weather_window_strip_L' => $request->filled('weather_window_strip_L') ? "true" : "false",
            'side_mirror_R' => $request->filled('side_mirror_R') ? "true" : "false",
            'wind_tunnel_glass_R' => $request->filled('wind_tunnel_glass_R') ? "true" : "false",
            'window_glass_front_seat_R' => $request->filled('window_glass_front_seat_R') ? "true" : "false",
            'weather_window_strip_R' => $request->filled('weather_window_strip_R') ? "true" : "false",
            'rear_bumper' => $request->filled('rear_bumper') ? "true" : "false",
            'brand_emblem_marking' => $request->filled('brand_emblem_marking') ? "true" : "false",
            'window_glass_front_seat' => $request->filled('window_glass_front_seat') ? "true" : "false",
            'spare_tire_mounting' => $request->filled('spare_tire_mounting') ? "true" : "false",
            'tools' => $request->filled('tools') ? "true" : "false",
            'steering_wheel' => $request->filled('steering_wheel') ? "true" : "false",
            'shifting_rod_with_knob' => $request->filled('shifting_rod_with_knob') ? "true" : "false",
            'hand_break' => $request->filled('hand_break') ? "true" : "false",
            'ammeter' => $request->filled('ammeter') ? "true" : "false",
            'oil_pressure_gauge' => $request->filled('oil_pressure_gauge') ? "true" : "false",
            'temperature_gauge' => $request->filled('temperature_gauge') ? "true" : "false",
            'rpm_gauge' => $request->filled('rpm_gauge') ? "true" : "false",
            'headlight_knob' => $request->filled('headlight_knob') ? "true" : "false",
            'parking_hazard_knob' => $request->filled('parking_hazard_knob') ? "true" : "false",
            'wiper_knob' => $request->filled('wiper_knob') ? "true" : "false",
            'dimmer_switch' => $request->filled('dimmer_switch') ? "true" : "false",
            'directional_level' => $request->filled('directional_level') ? "true" : "false",
            'speedometer' => $request->filled('speedometer') ? "true" : "false",
            'fuel_gauge' => $request->filled('fuel_gauge') ? "true" : "false",
            'cars_seats_front' => $request->filled('cars_seats_front') ? "true" : "false",
            'car_seat_back' => $request->filled('car_seat_back') ? "true" : "false",
            'car_seat_cover' => $request->filled('car_seat_cover') ? "true" : "false",
            'floor_carpet' => $request->filled('floor_carpet') ? "true" : "false",
            'floor_matting' => $request->filled('floor_matting') ? "true" : "false",
            'computer_box' => $request->filled('computer_box') ? "true" : "false",
            'air_condition_unit' => $request->filled('air_condition_unit') ? "true" : "false",
            'car_stereo' => $request->filled('car_stereo') ? "true" : "false",
            'interceptor_cable' => $request->filled('interceptor_cable') ? "true" : "false",
            'stereo_speaker' => $request->filled('stereo_speaker') ? "true" : "false",
            'twitter' => $request->filled('twitter') ? "true" : "false",
            'car_radio' => $request->filled('car_radio') ? "true" : "false",
            'equalizer' => $request->filled('equalizer') ? "true" : "false",
            'cd_charger' => $request->filled('cd_charger') ? "true" : "false",
            'lighter' => $request->filled('lighter') ? "true" : "false",
            'barometer' => $request->filled('barometer') ? "true" : "false",
            'fire_extinguisher' => $request->filled('fire_extinguisher') ? "true" : "false",
            'antennae' => $request->filled('antennae') ? "true" : "false",
            'air_con_compressor' => $request->filled('air_con_compressor') ? "true" : "false",
            'radiator' => $request->filled('radiator') ? "true" : "false",
            'radiator_cover' => $request->filled('radiator_cover') ? "true" : "false",
            'radiator_inlet_hose' => $request->filled('radiator_inlet_hose') ? "true" : "false",
            'radiator_outlet_hose' => $request->filled('radiator_outlet_hose') ? "true" : "false",
            'water_bypass_hose' => $request->filled('water_bypass_hose') ? "true" : "false",
            'ignition_coil' => $request->filled('ignition_coil') ? "true" : "false",
            'high_tension_wire' => $request->filled('high_tension_wire') ? "true" : "false",
            'distibutor_Cap' => $request->filled('distibutor_Cap') ? "true" : "false",
            'distributor_assembly' => $request->filled('distributor_assembly') ? "true" : "false",
            'contact_point' => $request->filled('contact_point') ? "true" : "false",
            'condenser' => $request->filled('condenser') ? "true" : "false",
            'air_con_condenser' => $request->filled('air_con_condenser') ? "true" : "false",
            'rotor' => $request->filled('rotor') ? "true" : "false",
            'advancer' => $request->filled('advancer') ? "true" : "false",
            'oil_dipstick' => $request->filled('oil_dipstick') ? "true" : "false",
            'air_con_driver_belt' => $request->filled('air_con_driver_belt') ? "true" : "false",
            'carburettor_assembly' => $request->filled('carburettor_assembly') ? "true" : "false",
            'alternator' => $request->filled('alternator') ? "true" : "false",
            'alternator_voltage_regulator' => $request->filled('alternator_voltage_regulator') ? "true" : "false",
            'oil_filter' => $request->filled('oil_filter') ? "true" : "false",
            'steering_gear_box' => $request->filled('steering_gear_box') ? "true" : "false",
            'water_pump_assembly' => $request->filled('water_pump_assembly') ? "true" : "false",
            'engine_fan' => $request->filled('engine_fan') ? "true" : "false",
            'auxiliary_fan' => $request->filled('auxiliary_fan') ? "true" : "false",
            'fan_belt' => $request->filled('fan_belt') ? "true" : "false",
            'spark_plugs' => $request->filled('spark_plugs') ? "true" : "false",
            'battery' => $request->filled('battery') ? "true" : "false",
            'battery_cable' => $request->filled('battery_cable') ? "true" : "false",
            'battery_terminal' => $request->filled('battery_terminal') ? "true" : "false",
            'horn_assembly' => $request->filled('horn_assembly') ? "true" : "false",
            'horn_relay' => $request->filled('horn_relay') ? "true" : "false",
            'accelerator_cable' => $request->filled('accelerator_cable') ? "true" : "false",
            'intake_manifold' => $request->filled('intake_manifold') ? "true" : "false",
            'exhaust_manifold' => $request->filled('exhaust_manifold') ? "true" : "false",
            'engine_mounting' => $request->filled('engine_mounting') ? "true" : "false",
            'ignition_wiring' => $request->filled('ignition_wiring') ? "true" : "false",
            'transmission' => $request->filled('transmission') ? "true" : "false",
            'suspension_assembly' => $request->filled('suspension_assembly') ? "true" : "false",
            'tie_rod_end' => $request->filled('tie_rod_end') ? "true" : "false",
            'idler_arm' => $request->filled('idler_arm') ? "true" : "false",
            'front_coil_spring' => $request->filled('front_coil_spring') ? "true" : "false",
            'pitman_arm' => $request->filled('pitman_arm') ? "true" : "false",
            'newly_painted' => $request->filled('newly_painted') ? "true" : "false",
            'paint_discoloration' => $request->filled('paint_discoloration') ? "true" : "false",
            'good_body_shape' => $request->filled('good_body_shape') ? "true" : "false",
            'body_in_bad_shape' => $request->filled('body_in_bad_shape') ? "true" : "false",
            'body_ongoing_repair' => $request->filled('body_ongoing_repair') ? "true" : "false",
            'for_repainting' => $request->filled('for_repainting') ? "true" : "false",
            'beyond_economical_repair' => $request->filled('beyond_economical_repair') ? "true" : "false",
            'remark' => $request->input('remark'),
            'recovering_personel' => $request->input('recovering_personel'),
            'witness_owner_barangay_official' => $request->input('witness_owner_barangay_official'),
            'noted_by' => $request->input('noted_by'),
        ));
                
            return redirect('Investigator_vehiclesRecords')->with('message','Evidence transfered successfully!');
    }
    public function transferMotorCycle_Evidence(Request $request, $id)
    {
            $my_data = DB::table('motorcycles')->where('id', $id)->get();
            $data = new motorcycle_history();
                $data->user_id = Auth::user()->id;
                $data->municipality = Auth::user()->municipality;
                // $data->qr_code_image = QrCode::size(100)->backgroundColor(255, 255, 204)->generate("motorcycle".$count +1);
                $data->uuid =  $my_data[0]->uuid;
                $data->make_type =  $my_data[0]->make_type;
                $data->chasis = $my_data[0]->chasis;
                $data->motor_no =  $my_data[0]->motor_no;
                $data->plate_no =  $my_data[0]->plate_no;
                $data->color =   $my_data[0]->color;
                $data->ORCR_no =   $my_data[0]->ORCR_no;
                $data->LTO_File_no =  $my_data[0]->LTO_File_no;
                $data->registered_owner =   $my_data[0]->registered_owner;
                $data->address =   $my_data[0]->address;
                $data->violations =  $my_data[0]->violations;
                $data->date =  $my_data[0]->date;
                $data->status =   $my_data[0]->status;
            $data->save();

            DB::table('motorcycles')
            ->where('id', $id)
            ->update(array(
                'make_type' => $request->input('make_type'),
                'chasis' => $request->input('chasis'),
                'motor_no' => $request->input('motor_no'),
                'plate_no' => $request->input('plate_no'),
                'color' => $request->input('color'),
                'ORCR_no' => $request->input('ORCR_no'),
                'LTO_File_no' => $request->input('LTO_File_no'),
                'registered_owner' => $request->input('registered_owner'),
                'address' => $request->input('address'),
                'violations' => $request->input('violations'),
                'status' => $request->input('status'),
            ));

            return redirect('Investigator_MotorVehiclesRecords')->with('message','Evidence transfered successfully!');
    }
    public function transferProperty_Evidence(Request $request, $id)
    {
            $my_data = DB::table('properties')->where('id', $id)->get();
            $data = new property_history();
                $data->user_id = $my_data[0]->address;
                $data->municipality = Auth::user()->municipality;
                // $data->qr_code_image = QrCode::size(100)->backgroundColor(255, 255, 204)->generate("property".$count +1);
                $data->uuid = $my_data[0]->uuid;
                $data->establishment = $my_data[0]->establishment;
                $data->address =  $my_data[0]->address;
                $data->quantity =  $my_data[0]->quantity;
                $data->description =   $my_data[0]->description;
                $data->seizing_officer = $my_data[0]->seizing_officer;
                $data->witness =   $my_data[0]->witness;
                $data->date =  $my_data[0]->date;
                $data->status =   $my_data[0]->status;
            $data->save();

            DB::table('properties')
            ->where('id', $id)
            ->update(array(
                'establishment' => $request->input('establishment'),
                'address' => $request->input('address'),
                'quantity' => $request->input('quantity'),
                'description' => $request->input('description'),
                'seizing_officer' => $request->input('seizing_officer'),
                'witness' => $request->input('witness'),
                'status' => $request->input('status'),
            ));

            return redirect('Investigator_PropertyGoodsRecords')->with('message','Evidence transfered successfully!');
    }


    public function getVehicleRecordScanner(Request $request, $uuid)
    {
        try {
            //  $uuid = $request->input('uuid');
            // Fetch data from database using the UUID
            //  $data = DB::select('select * from vehicle_histories where uuid = evidencevehicle1')->get();
            
            $data = vehicle_history::where('uuid', $uuid)->get();
            $data1 = EvidenceVehicle::where('uuid', $uuid)->get();

            if ($data) {
                if ($data->isEmpty() && $data1->isEmpty()) {
                    return response()->json(['error' => 'No data available'], 404);
                } else {
                    return response()->json([$data,$data1]);
                }
            } else {
                return response()->json(['error' => 'No record found for the given UUID'], 404);
            }
        } catch (\Exception $e) {
            // Log the exception
            \Log::error($e);
            // Return an error response
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
    public function getPropertyRecordScanner(Request $request, $uuid)
    {
        try {
            //  $uuid = $request->input('uuid');
            // Fetch data from database using the UUID
            //  $data = DB::select('select * from vehicle_histories where uuid = evidencevehicle1')->get();
            
            $data = property_history::where('uuid', $uuid)->get();
            $data1 = property::where('uuid', $uuid)->get();

            if ($data) {
                if ($data->isEmpty() && $data1->isEmpty()) {
                    return response()->json(['error' => 'No data available'], 404);
                } else {
                    return response()->json([$data,$data1]);
                }
            } else {
                return response()->json(['error' => 'No record found for the given UUID'], 404);
            }
        } catch (\Exception $e) {
            // Log the exception
            \Log::error($e);
            // Return an error response
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
    public function getMotorcycleRecordScanner(Request $request, $uuid)
    {
        try {
            //  $uuid = $request->input('uuid');
            // Fetch data from database using the UUID
            //  $data = DB::select('select * from vehicle_histories where uuid = evidencevehicle1')->get();
            
            $data = motorcycle_history::where('uuid', $uuid)->get();
            $data1 = Motorcycle::where('uuid', $uuid)->get();

            if ($data) {
                if ($data->isEmpty() && $data1->isEmpty()) {
                    return response()->json(['error' => 'No data available'], 404);
                } else {
                    return response()->json([$data,$data1]);
                }
            } else {
                return response()->json(['error' => 'No record found for the given UUID'], 404);
            }
        } catch (\Exception $e) {
            // Log the exception
            \Log::error($e);
            // Return an error response
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
    // getMotorcycleRecordScanner

}
