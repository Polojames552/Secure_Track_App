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
use Mpdf\Mpdf;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Intervention\Image\Facades\Image;
class investigatorController extends Controller
{
    //Get
    public function investigatorsProfile()
    {
        $data = DB::select('select * from users where id = ?', [auth()->user()->id]);
        $investigators = DB::select('select * from users where role = 3 and municipality = ?', [auth()->user()->municipality]);
        $num_investigators = count($investigators);

        $property = property::where('user_id', auth()->user()->id)
        ->where('status', 'Crime Lab')
        ->orWhere('status', 'MPS Custodian')
        ->get()
        ->count();
        $motorcycle = Motorcycle::where('user_id', auth()->user()->id)
        ->where('status', 'Crime Lab')
        ->orWhere('status', 'MPS Custodian')
        ->get()
        ->count();
        $car = EvidenceVehicle::where('user_id', auth()->user()->id)
        ->where('status', 'Crime Lab')
        ->orWhere('status', 'MPS Custodian')
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
            $data->item = $request->input('item');
            $data->description =  $request->input('description');
            $data->seizing_officer =  $request->input('seizing_officer');
            $data->witness =  $request->input('witness');
            $data->date = $currentDate->format('F j, Y');
            $data->status =  "MPS Custodian";
            //Picture
            $file1 = $request->file('Picture');
            $extension = $file1->getClientOriginalName();
            $filename = $extension;
            $file1->move('images/', $filename);
            $data->picture = $filename;
            $data->changes = "0";
            $data->received = "-";
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
            $data->status =  "MPS Custodian";
             //Picture
             $file1 = $request->file('Picture');
             $extension = $file1->getClientOriginalName();
             $filename = $extension;
             $file1->move('images/', $filename);
             $data->picture = $filename;
             $data->received = "-";
             $data->changes = "0";
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
                $data->status = "MPS Custodian";
                 //Picture
                $file1 = $request->file('Picture');
                $extension = $file1->getClientOriginalName();
                $filename = $extension;
                $file1->move('images/', $filename);
                $data->picture = $filename;
                $data->received = "-";
                $data->changes = "0";
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
            //     $data->status = "MPS Custodian";
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
        if(Auth::user()->role == "3"){
            return redirect('Investigator_MotorVehiclesRecords')->with('message','Details updated successfully!');
        }else{
            return redirect('CrimeLabMotorVehicle')->with('message','Details updated successfully!');
        }
        
    }
    public function updateProperty_Evidence(Request $request, $id)
    {
        DB::table('properties')
        ->where('id', $id)
        ->update(array(
            'establishment' => $request->input('establishment'),
            'address' => $request->input('address'),
            'quantity' => $request->input('quantity'),
            'item' => $request->input('item'),
            'description' => $request->input('description'),
            'seizing_officer' => $request->input('seizing_officer'),
            'witness' => $request->input('witness'),
            'status' => $request->input('status'),
        ));
 
        if(Auth::user()->role == "3"){
            return redirect('Investigator_PropertyGoodsRecords')->with('message','Details updated successfully!');
        }else{
            return redirect('CrimeLabProperty')->with('message','Details updated successfully!');
        }
        
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
 
        if(Auth::user()->role == "3"){
            return redirect('Investigator_vehiclesRecords')->with('message','Details updated successfully!');
        }else{
            return redirect('CrimeLabCar')->with('message','Details updated successfully!');
        }
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
                //Picture
                $file1 = $request->file('Picture');
                $extension = $file1->getClientOriginalName();
                $filename = $extension;
                $file1->move('images/', $filename);
                $data->receipt = $filename;
                $data->received = $request->input('received');
            $data->save();

        $currentDate = Carbon::now();
        $mydate = $currentDate->format('F j, Y');
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
            // $data->date = $my_data[0]->date;
            'date' => $mydate,
            'status' => $request->input('status'),
            'changes' => "1",
        ));
                
        if(Auth::user()->role == "3"){
            return redirect('Investigator_vehiclesRecords')->with('message','Evidence transfered successfully!');
        }else{
            return redirect('CrimeLabCar')->with('message','Evidence transfered successfully!');
        }
           
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
                 //Picture
                 $file1 = $request->file('Picture');
                 $extension = $file1->getClientOriginalName();
                 $filename = $extension;
                 $file1->move('images/', $filename);
                 $data->receipt = $filename;
                 $data->received = $request->input('received');
            $data->save();

            $currentDate = Carbon::now();
            $mydate = $currentDate->format('F j, Y');
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
                'date' => $mydate,
                'changes' => "1",
            ));

            if(Auth::user()->role == "3"){
                return redirect('Investigator_MotorVehiclesRecords')->with('message','Evidence transfered successfully!');
            }else{
                return redirect('CrimeMotorVehicle')->with('message','Evidence transfered successfully!');
            }
           
    }
    public function transferProperty_Evidence(Request $request, $id)
    {
            $my_data = DB::table('properties')->where('id', $id)->get();
            $data = new property_history();
                $data->user_id = $my_data[0]->address;
                $data->municipality = Auth::user()->municipality;
                $data->uuid = $my_data[0]->uuid;
                $data->establishment = $my_data[0]->establishment;
                $data->address =  $my_data[0]->address;
                $data->quantity =  $my_data[0]->quantity;
                $data->item =  $my_data[0]->item;
                $data->description =   $my_data[0]->description;
                $data->seizing_officer = $my_data[0]->seizing_officer;
                $data->witness =   $my_data[0]->witness;
                $data->date =  $my_data[0]->date;
                $data->status =   $my_data[0]->status;
                //Picture
                $file1 = $request->file('Picture');
                $extension = $file1->getClientOriginalName();
                $filename = $extension;
                $file1->move('images/', $filename);
                $data->receipt = $filename;
                $data->received = $request->input('received');
            $data->save();

            $currentDate = Carbon::now();
            $mydate = $currentDate->format('F j, Y');
            DB::table('properties')
            ->where('id', $id)
            ->update(array(
                'establishment' => $request->input('establishment'),
                'address' => $request->input('address'),
                'quantity' => $request->input('quantity'),
                'item' => $request->input('item'),
                'description' => $request->input('description'),
                'seizing_officer' => $request->input('seizing_officer'),
                'witness' => $request->input('witness'),
                'status' => $request->input('status'),
                'date' => $mydate,
                'changes' => "1",
            ));

            if(Auth::user()->role == "3"){
                return redirect('Investigator_PropertyGoodsRecords')->with('message','Evidence transfered successfully!');
            }else{
                return redirect('CrimeProperty')->with('message','Evidence transfered successfully!');
            }
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

    public function downloadMotorcycle($id)
{
    $data = Motorcycle::findOrFail($id); // Retrieve the motorcycle data by ID

    // Instantiate mPDF
    $mpdf = new \Mpdf\Mpdf();

    $mpdf->SetTitle('Download Motorcycle Evidence');
    // Read the CSS file
    $cssFilePath = public_path('css/downloadPDFCar.css');
    $cssFile = file_get_contents($cssFilePath);

    // Write the CSS to the document
    $mpdf->WriteHTML($cssFile, \Mpdf\HTMLParserMode::HEADER_CSS);

    $violations = preg_replace('/\d+/', '<br><span style="padding-bottom: 5px;">$0</span>', $data->violations);
    // HTML content
    $html = '<h3 style="text-align:center; padding-top:-10px;">Republic of the Philippines</h3>
            <h3 style="text-align:center; padding-top:-10px;">Department of the Interior and Local Government</h3>
            <h2 style="text-align:center; padding-top:-10px;">PHILIPPINE NATIONAL POLICE</h2>
            <h3 style="text-align:center; padding-left:500px; padding-top:20px; padding-bottom:20px;">Date: ' . $data->date . '</h3>
            <h1 style="text-decoration: underline solid 10px; text-align:center; padding-top:10px;">IMPOUNDING RECEIPT OF MOTOR VEHICLE</h1>
            <h2 style="padding-bottom:15px;padding-top:8px;">Description of Motor Vehicle</h2>
            <ul class="information-list">
                <li style="font-size: 14px;padding-bottom:5px;"><strong>Make Type: </strong>' . $data->make_type . '</li>
                <li style="font-size: 14px;padding-bottom:5px;"><strong>Chassis:</strong> ' . $data->chasis . '</li>
                <li style="font-size: 14px;padding-bottom:5px;"><strong>Motor Number:</strong> ' . $data->motor_no . '</li>
                <li style="font-size: 14px;padding-bottom:5px;"><strong>Plate Number:</strong> ' . $data->plate_no . '</li>
                <li style="font-size: 14px;padding-bottom:5px;"><strong>Color:</strong> ' . $data->color . '</li>
                <li style="font-size: 14px;padding-bottom:5px;"><strong>CR/OR No.:</strong> ' . $data->ORCR_no . '</li>
                <li style="font-size: 14px;padding-bottom:5px;"><strong>LTO File Number:</strong> ' . $data->LTO_File_no . '</li>
                <li style="font-size: 14px;padding-bottom:5px;"><strong>Registered Owner:</strong> ' . $data->registered_owner . '</li>
                <li style="font-size: 14px;padding-bottom:5px;"><strong>Address:</strong> ' . $data->address . '</li>
                <li style="font-size: 15.5px;padding-bottom:5px;"><strong>VIOLATIONS:</strong><span style="font-size: 13px;padding-bottom:5px;">' . $violations . '</span></li>
                <!-- Add more information as needed -->
            </ul>
            <p style="text-align: justify;font-size: 13px;padding-bottom:8px;">Subject MV was apprehended by Anti-Carnapping operatives of the office for violation/s stated above on __________________________
            at about ___________ along the vicinity of______________________________and same was brought to______________________________________for
            safekeeping subject for the investigation/verification and proper disposition.</p>
            
            <p style="text-align: justify; font-size: 13px;padding-bottom:8px;"><b> Note:</b> Subject MV shall only be released upon presentation of its pertinent original documents and upon notation/approval of the Head of Office.</p> 
            
            
            <p style="font-size: 15;text-align:center; padding-left:470px;"><b> Officer:</b> '.Auth::user()->name;'</p>';

    // Write HTML content to the document
    $mpdf->WriteHTML($html);

    // Output PDF
    $pdfFileName = "Motorcycle_Evidence_" . $id . '.pdf';
    $mpdf->Output($pdfFileName, \Mpdf\Output\Destination::INLINE);
    return response()->download(public_path($pdfFileName), $pdfFileName);
    // $mpdf->Output($pdfFileName, \Mpdf\Output\Destination::FILE);
    // return response()->download(public_path($pdfFileName), $pdfFileName);
   
}

public function downloadProperty($id)
{
    $data = property::findOrFail($id);
    $mpdf = new \Mpdf\Mpdf(['format' => 'A4']); 
    $mpdf->SetTitle('Download Property/Goods Evidence');
   
    $cssFilePath = public_path('css/downloadPDF.css');
    $cssFile = file_get_contents($cssFilePath);
    $mpdf->WriteHTML($cssFile, \Mpdf\HTMLParserMode::HEADER_CSS);
    $html = '<h3 style="text-align:center; padding-top:-10px;">Republic of the Philippines</h3>
    <h3 style="text-align:center; padding-top:-10px;">Department of the Interior and Local Government</h3>
    <h2 style="text-align:center; padding-top:-10px;">PHILIPPINE NATIONAL POLICE</h2>
    <h3 style="text-align:center; padding-left:500px; padding-top:20px; padding-bottom:20px;">Date: ' . $data->date . '</h3>
    <h1 style="text-decoration: underline solid 10px; text-align:center; padding-top:20px; padding-bottom:20px;">INVENTORY SHEET/RECEIPT FOR PROPERT/GOODS <br>SEIZED/RECOVERED</h1>
    <p style="text-align: justify;font-size: 17px;padding-bottom:8px;">
    Inventory Sheet of article/items seized/recovered from the
    premise/establishment of <b style="text-decoration: underline solid 10px;">'.$data->establishment.'</b> located at <b style="text-decoration: underline solid 10px;">'.$data->address.'</b> by virtue of______________________________________________.
    </p>
    <br>
    <p style="font-size: 13px;padding-top:8px;padding-bottom:-5px;">ITEMS/ARTICLE: <b style="font-size: 14px;">'.$data->item.'</b></p>
    <p style="font-size: 13px;">QUANTITY/UNITS: <b style="font-size: 14px;">'.$data->quantity.'</b></p>
    <p style="font-size: 15px;padding-top:15px;padding-bottom:-10px;"><b>Description:</b></p>
    <p style="text-align: justify;font-size: 13px;padding-bottom:10px;">'.$data->description.'</p>
    <p style="font-size: 14px;padding-top:8px;padding-bottom:-12px;padding-left:5px;"><b style="text-decoration: underline solid 10px;">'.$data->seizing_officer.'</b></p> 
    <p style="font-size: 15px;">Seizing Officer</p>
    <p style="padding-top: 15px;font-size: 15px;">Witnessed by:</p>
    <p style="font-size: 16px;padding-left:65px;padding-bottom:-14px;"><b style="text-decoration: underline solid 10px;">'.$data->witness.'</b></p> 
    <p style="font-size: 14px;padding-left:40px;">(Signature Over Printed Name)</p>';
    $mpdf->WriteHTML($html);

    $pdfFileName = "Property-Goods_Evidence_" . $id . '.pdf';
    $mpdf->Output($pdfFileName, \Mpdf\Output\Destination::INLINE);
    return response()->download(public_path($pdfFileName), $pdfFileName);
   
}

public function downloadCar($id)
{
    $data = EvidenceVehicle::findOrFail($id); // Retrieve the motorcycle data by ID

    // Instantiate mPDF
    $mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
  
    $mpdf->SetTitle('Download Property/Goods Evidence');
    // Read the CSS file
    $cssFilePath = public_path('css/downloadPDF.css');
    $cssFile = file_get_contents($cssFilePath);

    // Write the CSS to the document
    $mpdf->WriteHTML($cssFile, \Mpdf\HTMLParserMode::HEADER_CSS);
    
    //1st row
    $bumper_front = '';
    $fog_light = '';
    $brand_marking_emblem = '';
    $headlights_lr = '';
    $radiator_grill = '';
    $windshield_wiper = '';
    //2nd row
    $signal_lights_lr='';
    $hazzard_lights_lr = ''; 
    $windshield_glass = ''; 
    $windshield_wiper_blade = ''; 
    $headlights_guard = ''; 
    $windshield_wiper_motor = '';

//if Condition 1st row
    if ($data->bumper_front === "true") {
        $bumper_front = '<input type="checkbox" checked="checked">';
    }else{
        $bumper_front = '<input type="checkbox">';
    }

    if ($data->fog_light === "true") {
        $fog_light = '<input type="checkbox" checked="checked">';
    } else {
        $fog_light = '<input type="checkbox">';
    }
  
    if ($data->brand_marking_emblem === "true") {
        $brand_marking_emblem = '<input type="checkbox" checked="checked">';
    } else {
        $brand_marking_emblem = '<input type="checkbox">';
    }
  
    if ($data->headlights_lr === "true") {
        $headlights_lr = '<input type="checkbox" checked="checked">';
    } else {
        $headlights_lr = '<input type="checkbox">';
    }
  
    if ($data->radiator_grill === "true") {
        $radiator_grill = '<input type="checkbox" checked="checked">';
    } else {
        $radiator_grill = '<input type="checkbox">';
    }
   
    if ($data->windshield_wiper === "true") {
        $windshield_wiper = '<input type="checkbox" checked="checked">';
    } else {
        $windshield_wiper = '<input type="checkbox">';
    }
//if Condition 1st row
    if ($data->signal_lights_lr === "true") {
        $signal_lights_lr = '<input type="checkbox" checked="checked">';
    } else {
        $signal_lights_lr = '<input type="checkbox">';
    }
    if ($data->windshield_glass === "true") {
        $windshield_glass = '<input type="checkbox" checked="checked">';
    } else {
        $windshield_glass = '<input type="checkbox">';
    }

    if ($data->hazzard_lights_lr === "true") {
        $hazzard_lights_lr = '<input type="checkbox" checked="checked">';
    } else {
        $hazzard_lights_lr = '<input type="checkbox">';
    }
   
  
    if ($data->windshield_wiper_blade === "true") {
        $windshield_wiper_blade = '<input type="checkbox" checked="checked">';
    } else {
        $windshield_wiper_blade = '<input type="checkbox">';
    }
   
    if ($data->headlights_guard === "true") {
        $headlights_guard = '<input type="checkbox" checked="checked">';
    } else {
        $headlights_guard = '<input type="checkbox">';
    }
   
    if ($data->windshield_wiper_motor === "true") {
        $windshield_wiper_motor = '<input type="checkbox" checked="checked">';
    } else {
        $windshield_wiper_motor = '<input type="checkbox">';
    }

    //leftside portion
    if ($data->side_mirror_L === "true") {
        $side_mirror_L = '<input type="checkbox" checked="checked">';
    } else {
        $side_mirror_L = '<input type="checkbox">';
    }

    if ($data->wind_tunnel_glass_L === "true") {
        $wind_tunnel_glass_L = '<input type="checkbox" checked="checked">';
    } else {
        $wind_tunnel_glass_L = '<input type="checkbox">';
    }

    if ($data->window_glass_front_seat_L === "true") {
        $window_glass_front_seat_L = '<input type="checkbox" checked="checked">';
    } else {
        $window_glass_front_seat_L = '<input type="checkbox">';
    }

    if ($data->weather_window_strip_L === "true") {
        $weather_window_strip_L = '<input type="checkbox" checked="checked">';
    } else {
        $weather_window_strip_L = '<input type="checkbox">';
    }
    //rightside portion
      if ($data->side_mirror_R === "true") {
        $side_mirror_R = '<input type="checkbox" checked="checked">';
    } else {
        $side_mirror_R = '<input type="checkbox">';
    }

    if ($data->wind_tunnel_glass_R === "true") {
        $wind_tunnel_glass_R = '<input type="checkbox" checked="checked">';
    } else {
        $wind_tunnel_glass_R = '<input type="checkbox">';
    }

    if ($data->window_glass_front_seat_R === "true") {
        $window_glass_front_seat_R = '<input type="checkbox" checked="checked">';
    } else {
        $window_glass_front_seat_R = '<input type="checkbox">';
    }

    if ($data->weather_window_strip_R === "true") {
        $weather_window_strip_R = '<input type="checkbox" checked="checked">';
    } else {
        $weather_window_strip_R = '<input type="checkbox">';
    }

     //Rear Back Portion
     if ($data->rear_bumper === "true") {
        $rear_bumper = '<input type="checkbox" checked="checked">';
    } else {
        $rear_bumper = '<input type="checkbox">';
    }

    if ($data->brand_emblem_marking === "true") {
        $brand_emblem_marking = '<input type="checkbox" checked="checked">';
    } else {
        $brand_emblem_marking = '<input type="checkbox">';
    }

    if ($data->window_glass_front_seat === "true") {
        $window_glass_front_seat = '<input type="checkbox" checked="checked">';
    } else {
        $window_glass_front_seat = '<input type="checkbox">';
    }

    if ($data->spare_tire_mounting === "true") {
        $spare_tire_mounting = '<input type="checkbox" checked="checked">';
    } else {
        $spare_tire_mounting = '<input type="checkbox">';
    }
    if ($data->tools === "true") {
        $tools = '<input type="checkbox" checked="checked">';
    } else {
        $tools = '<input type="checkbox">';
    }
    //Inside Features 1
    if ($data->steering_wheel === "true") {
        $steering_wheel = '<input type="checkbox" checked="checked">';
    } else {
        $steering_wheel = '<input type="checkbox">';
    }

    if ($data->shifting_rod_with_knob === "true") {
        $shifting_rod_with_knob = '<input type="checkbox" checked="checked">';
    } else {
        $shifting_rod_with_knob = '<input type="checkbox">';
    }

    if ($data->hand_break === "true") {
        $hand_break = '<input type="checkbox" checked="checked">';
    } else {
        $hand_break = '<input type="checkbox">';
    }

    if ($data->ammeter === "true") {
        $ammeter = '<input type="checkbox" checked="checked">';
    } else {
        $ammeter = '<input type="checkbox">';
    }
    if ($data->oil_pressure_gauge === "true") {
        $oil_pressure_gauge = '<input type="checkbox" checked="checked">';
    } else {
        $oil_pressure_gauge = '<input type="checkbox">';
    }
    if ($data->temperature_gauge === "true") {
        $temperature_gauge = '<input type="checkbox" checked="checked">';
    } else {
        $temperature_gauge = '<input type="checkbox">';
    }
     //Inside Features 2
     if ($data->rpm_gauge === "true") {
        $rpm_gauge = '<input type="checkbox" checked="checked">';
    } else {
        $rpm_gauge = '<input type="checkbox">';
    }

    if ($data->headlight_knob === "true") {
        $headlight_knob = '<input type="checkbox" checked="checked">';
    } else {
        $headlight_knob = '<input type="checkbox">';
    }

    if ($data->parking_hazard_knob === "true") {
        $parking_hazard_knob = '<input type="checkbox" checked="checked">';
    } else {
        $parking_hazard_knob = '<input type="checkbox">';
    }

    if ($data->wiper_knob === "true") {
        $wiper_knob = '<input type="checkbox" checked="checked">';
    } else {
        $wiper_knob = '<input type="checkbox">';
    }
    if ($data->dimmer_switch === "true") {
        $dimmer_switch = '<input type="checkbox" checked="checked">';
    } else {
        $dimmer_switch = '<input type="checkbox">';
    }
    if ($data->directional_level === "true") {
        $directional_level = '<input type="checkbox" checked="checked">';
    } else {
        $directional_level = '<input type="checkbox">';
    }
        //Inside Features 3
        if ($data->speedometer === "true") {
            $speedometer = '<input type="checkbox" checked="checked">';
        } else {
            $speedometer = '<input type="checkbox">';
        }
    
        if ($data->fuel_gauge === "true") {
            $fuel_gauge = '<input type="checkbox" checked="checked">';
        } else {
            $fuel_gauge = '<input type="checkbox">';
        }
    
        if ($data->cars_seats_front === "true") {
            $cars_seats_front = '<input type="checkbox" checked="checked">';
        } else {
            $cars_seats_front = '<input type="checkbox">';
        }
    
        if ($data->car_seat_back === "true") {
            $car_seat_back = '<input type="checkbox" checked="checked">';
        } else {
            $car_seat_back = '<input type="checkbox">';
        }
        if ($data->car_seat_cover === "true") {
            $car_seat_cover = '<input type="checkbox" checked="checked">';
        } else {
            $car_seat_cover = '<input type="checkbox">';
        }
        if ($data->floor_carpet === "true") {
            $floor_carpet = '<input type="checkbox" checked="checked">';
        } else {
            $floor_carpet = '<input type="checkbox">';
        }
         //Inside Features 4
         if ($data->floor_matting === "true") {
            $floor_matting = '<input type="checkbox" checked="checked">';
        } else {
            $floor_matting = '<input type="checkbox">';
        }
    
        if ($data->computer_box === "true") {
            $computer_box = '<input type="checkbox" checked="checked">';
        } else {
            $computer_box = '<input type="checkbox">';
        }
    
        if ($data->air_condition_unit === "true") {
            $air_condition_unit = '<input type="checkbox" checked="checked">';
        } else {
            $air_condition_unit = '<input type="checkbox">';
        }
    
        if ($data->car_stereo === "true") {
            $car_stereo = '<input type="checkbox" checked="checked">';
        } else {
            $car_stereo = '<input type="checkbox">';
        }
        if ($data->interceptor_cable === "true") {
            $interceptor_cable = '<input type="checkbox" checked="checked">';
        } else {
            $interceptor_cable = '<input type="checkbox">';
        }
        if ($data->stereo_speaker === "true") {
            $stereo_speaker = '<input type="checkbox" checked="checked">';
        } else {
            $stereo_speaker = '<input type="checkbox">';
        }
        //Inside Features 5
        if ($data->twitter === "true") {
            $twitter = '<input type="checkbox" checked="checked">';
        } else {
            $twitter = '<input type="checkbox">';
        }
    
        if ($data->car_radio === "true") {
            $car_radio = '<input type="checkbox" checked="checked">';
        } else {
            $car_radio = '<input type="checkbox">';
        }
    
        if ($data->equalizer === "true") {
            $equalizer = '<input type="checkbox" checked="checked">';
        } else {
            $equalizer = '<input type="checkbox">';
        }
    
        if ($data->cd_charger === "true") {
            $cd_charger = '<input type="checkbox" checked="checked">';
        } else {
            $cd_charger = '<input type="checkbox">';
        }
        if ($data->lighter === "true") {
            $lighter = '<input type="checkbox" checked="checked">';
        } else {
            $lighter = '<input type="checkbox">';
        }
        if ($data->barometer === "true") {
            $barometer = '<input type="checkbox" checked="checked">';
        } else {
            $barometer = '<input type="checkbox">';
        }
        //Inside Features 6
        if ($data->fire_extinguisher === "true") {
            $fire_extinguisher = '<input type="checkbox" checked="checked">';
        } else {
            $fire_extinguisher = '<input type="checkbox">';
        }
    
        if ($data->antennae === "true") {
            $antennae = '<input type="checkbox" checked="checked">';
        } else {
            $antennae = '<input type="checkbox">';
        }
        //Engine Compartment1
        if ($data->air_con_compressor === "true") {
            $air_con_compressor = '<input type="checkbox" checked="checked">';
        } else {
            $air_con_compressor = '<input type="checkbox">';
        }
    
        if ($data->radiator === "true") {
            $radiator = '<input type="checkbox" checked="checked">';
        } else {
            $radiator = '<input type="checkbox">';
        }
    
        if ($data->radiator_cover === "true") {
            $radiator_cover = '<input type="checkbox" checked="checked">';
        } else {
            $radiator_cover = '<input type="checkbox">';
        }
    
        if ($data->radiator_inlet_hose === "true") {
            $radiator_inlet_hose = '<input type="checkbox" checked="checked">';
        } else {
            $radiator_inlet_hose = '<input type="checkbox">';
        }
        if ($data->radiator_outlet_hose === "true") {
            $radiator_outlet_hose = '<input type="checkbox" checked="checked">';
        } else {
            $radiator_outlet_hose = '<input type="checkbox">';
        }
        if ($data->water_bypass_hose === "true") {
            $water_bypass_hose = '<input type="checkbox" checked="checked">';
        } else {
            $water_bypass_hose = '<input type="checkbox">';
        }
         //Engine Compartment2
         if ($data->ignition_coil === "true") {
            $ignition_coil = '<input type="checkbox" checked="checked">';
        } else {
            $ignition_coil = '<input type="checkbox">';
        }
    
        if ($data->high_tension_wire === "true") {
            $high_tension_wire = '<input type="checkbox" checked="checked">';
        } else {
            $high_tension_wire = '<input type="checkbox">';
        }
    
        if ($data->distibutor_Cap === "true") {
            $distibutor_Cap = '<input type="checkbox" checked="checked">';
        } else {
            $distibutor_Cap = '<input type="checkbox">';
        }
    
        if ($data->distributor_assembly === "true") {
            $distributor_assembly = '<input type="checkbox" checked="checked">';
        } else {
            $distributor_assembly = '<input type="checkbox">';
        }
        if ($data->contact_point === "true") {
            $contact_point = '<input type="checkbox" checked="checked">';
        } else {
            $contact_point = '<input type="checkbox">';
        }
        if ($data->condenser === "true") {
            $condenser = '<input type="checkbox" checked="checked">';
        } else {
            $condenser = '<input type="checkbox">';
        }
         //Engine Compartment 3
         if ($data->air_con_condenser === "true") {
            $air_con_condenser = '<input type="checkbox" checked="checked">';
        } else {
            $air_con_condenser = '<input type="checkbox">';
        }
    
        if ($data->rotor === "true") {
            $rotor = '<input type="checkbox" checked="checked">';
        } else {
            $rotor = '<input type="checkbox">';
        }
    
        if ($data->advancer === "true") {
            $advancer = '<input type="checkbox" checked="checked">';
        } else {
            $advancer = '<input type="checkbox">';
        }
    
        if ($data->oil_dipstick === "true") {
            $oil_dipstick = '<input type="checkbox" checked="checked">';
        } else {
            $oil_dipstick = '<input type="checkbox">';
        }
        if ($data->air_con_driver_belt === "true") {
            $air_con_driver_belt = '<input type="checkbox" checked="checked">';
        } else {
            $air_con_driver_belt = '<input type="checkbox">';
        }
        if ($data->carburettor_assembly === "true") {
            $carburettor_assembly = '<input type="checkbox" checked="checked">';
        } else {
            $carburettor_assembly = '<input type="checkbox">';
        }
         //Engine Compartment 4
         if ($data->alternator === "true") {
            $alternator = '<input type="checkbox" checked="checked">';
        } else {
            $alternator = '<input type="checkbox">';
        }
    
        if ($data->alternator_voltage_regulator === "true") {
            $alternator_voltage_regulator = '<input type="checkbox" checked="checked">';
        } else {
            $alternator_voltage_regulator = '<input type="checkbox">';
        }
    
        if ($data->oil_filter === "true") {
            $oil_filter = '<input type="checkbox" checked="checked">';
        } else {
            $oil_filter = '<input type="checkbox">';
        }
    
        if ($data->steering_gear_box === "true") {
            $steering_gear_box = '<input type="checkbox" checked="checked">';
        } else {
            $steering_gear_box = '<input type="checkbox">';
        }
        if ($data->water_pump_assembly === "true") {
            $water_pump_assembly = '<input type="checkbox" checked="checked">';
        } else {
            $water_pump_assembly = '<input type="checkbox">';
        }
        if ($data->engine_fan === "true") {
            $engine_fan = '<input type="checkbox" checked="checked">';
        } else {
            $engine_fan = '<input type="checkbox">';
        }
         //Engine Compartment 5
         if ($data->auxiliary_fan === "true") {
            $auxiliary_fan = '<input type="checkbox" checked="checked">';
        } else {
            $auxiliary_fan = '<input type="checkbox">';
        }
    
        if ($data->fan_belt === "true") {
            $fan_belt = '<input type="checkbox" checked="checked">';
        } else {
            $fan_belt = '<input type="checkbox">';
        }
    
        if ($data->spark_plugs === "true") {
            $spark_plugs = '<input type="checkbox" checked="checked">';
        } else {
            $spark_plugs = '<input type="checkbox">';
        }
    
        if ($data->battery === "true") {
            $battery = '<input type="checkbox" checked="checked">';
        } else {
            $battery = '<input type="checkbox">';
        }
        if ($data->battery_cable === "true") {
            $battery_cable = '<input type="checkbox" checked="checked">';
        } else {
            $battery_cable = '<input type="checkbox">';
        }
        if ($data->battery_terminal === "true") {
            $battery_terminal = '<input type="checkbox" checked="checked">';
        } else {
            $battery_terminal = '<input type="checkbox">';
        }
        //Engine Compartment 6
        if ($data->horn_assembly === "true") {
            $horn_assembly = '<input type="checkbox" checked="checked">';
        } else {
            $horn_assembly = '<input type="checkbox">';
        }
    
        if ($data->horn_relay === "true") {
            $horn_relay = '<input type="checkbox" checked="checked">';
        } else {
            $horn_relay = '<input type="checkbox">';
        }
    
        if ($data->accelerator_cable === "true") {
            $accelerator_cable = '<input type="checkbox" checked="checked">';
        } else {
            $accelerator_cable = '<input type="checkbox">';
        }
    
        if ($data->intake_manifold === "true") {
            $intake_manifold = '<input type="checkbox" checked="checked">';
        } else {
            $intake_manifold = '<input type="checkbox">';
        }
        if ($data->exhaust_manifold === "true") {
            $exhaust_manifold = '<input type="checkbox" checked="checked">';
        } else {
            $exhaust_manifold = '<input type="checkbox">';
        }
        if ($data->engine_mounting === "true") {
            $engine_mounting = '<input type="checkbox" checked="checked">';
        } else {
            $engine_mounting = '<input type="checkbox">';
        }
        //Engine Compartment 7
        if ($data->ignition_wiring === "true") {
            $ignition_wiring = '<input type="checkbox" checked="checked">';
        } else {
            $ignition_wiring = '<input type="checkbox">';
        }
    
        if ($data->transmission === "true") {
            $transmission = '<input type="checkbox" checked="checked">';
        } else {
            $transmission = '<input type="checkbox">';
        }
    
        if ($data->suspension_assembly === "true") {
            $suspension_assembly = '<input type="checkbox" checked="checked">';
        } else {
            $suspension_assembly = '<input type="checkbox">';
        }
    
        if ($data->tie_rod_end === "true") {
            $tie_rod_end = '<input type="checkbox" checked="checked">';
        } else {
            $tie_rod_end = '<input type="checkbox">';
        }
        if ($data->idler_arm === "true") {
            $idler_arm = '<input type="checkbox" checked="checked">';
        } else {
            $idler_arm = '<input type="checkbox">';
        }
        if ($data->front_coil_spring === "true") {
            $front_coil_spring = '<input type="checkbox" checked="checked">';
        } else {
            $front_coil_spring = '<input type="checkbox">';
        }
         //Engine Compartment 7
         if ($data->pitman_arm === "true") {
            $pitman_arm = '<input type="checkbox" checked="checked">';
        } else {
            $pitman_arm = '<input type="checkbox">';
        }

         //General Appearance 1
         if ($data->newly_painted === "true") {
            $newly_painted = '<input type="checkbox" checked="checked">';
        } else {
            $newly_painted = '<input type="checkbox">';
        }
        if ($data->paint_discoloration === "true") {
            $paint_discoloration = '<input type="checkbox" checked="checked">';
        } else {
            $paint_discoloration = '<input type="checkbox">';
        }
        if ($data->good_body_shape === "true") {
            $good_body_shape = '<input type="checkbox" checked="checked">';
        } else {
            $good_body_shape = '<input type="checkbox">';
        }
        if ($data->body_in_bad_shape === "true") {
            $body_in_bad_shape = '<input type="checkbox" checked="checked">';
        } else {
            $body_in_bad_shape = '<input type="checkbox">';
        }
        //General Appearance 2
        if ($data->body_ongoing_repair === "true") {
            $body_ongoing_repair = '<input type="checkbox" checked="checked">';
        } else {
            $body_ongoing_repair = '<input type="checkbox">';
        }
        if ($data->for_repainting === "true") {
            $for_repainting = '<input type="checkbox" checked="checked">';
        } else {
            $for_repainting = '<input type="checkbox">';
        }
        if ($data->beyond_economical_repair === "true") {
            $beyond_economical_repair = '<input type="checkbox" checked="checked">';
        } else {
            $beyond_economical_repair = '<input type="checkbox">';
        }
    $html = '<h4 style="text-align:center; padding-top:-10px;">Republic of the Philippines</h4>
    <h4 style="text-align:center; padding-top:-10px;">Department of the Interior and Local Government</h4>
    <h3 style="text-align:center; padding-top:-10px;">PHILIPPINE NATIONAL POLICE</h3>
    <br><br>
    <h3 style="text-align:center;padding-top:1  0px;">TECHNICAL INSPECTION AND INVENTORY REPORT OF RECOVERED MOTOR VEHICLE</h3>
    <h5 style="padding-top:10px; padding-bottom:10px;">Accomplished: ' . $data->date . '</h5>
    
    <section style="text-align:center; background-color: #000000; margin-bottom:10px;">
        <h3 style="color:#FFFFFF;"><b>Motor Vehicle Description:</b></h3>
    </section>
    <div class="modal-body">
    <div class="form-row" style="margin-bottom: 10px;">
        <div style="width: 33.33%; float: left;">
            <label id="headlabel" for="inputEmail4"><b>Make/Type:</b> ' .$data->make_type.'</label>
        </div>
        <div style="width: 33.33%; float: left;">
            <label id="headlabel" for="inputEmail4"><b>Plate No:</b> '.$data->plate_no.'</label>
        </div>
        <div style="width: 33.33%; float: left;">
            <label id="headlabel" for="inputEmail4"><b>Engine No:</b> '.$data->engine_no.'</label>
        </div>
    </div>
    <div class="form-row" style="margin-bottom: 10px;">
        <div style="width: 33.33%; float: left;">
            <label id="headlabel" for="inputEmail4"><b>Fuel:</b> ' . $data->fuel . '</label>
        </div>
        <div style="width: 33.33%; float: left;">
            <label id="headlabel" for="inputEmail4"><b>Chasis No:</b> ' . $data->chasis_no . '</label>
        </div>
        <div style="width: 33.33%; float: left;">
            <label id="headlabel" for="inputEmail4"><b>Color:</b> ' . $data->color . '</label>
        </div>
    </div>
    <div class="form-row" style="margin-bottom: 10px;">
        <div style="width: 33.33%; float: left;">
            <label id="headlabel" for="inputEmail4"><b>Registered Owner:</b> ' . $data->registered_owner . '</label>
        </div>
        <div style="width: 33.33%; float: left;">
            <label id="headlabel" for="inputEmail4"><b>Owners Address:</b> ' . $data->owner_address . '</label>
        </div>
    </div>

        <section style="text-align:center; background-color: #000000; margin-bottom:10px;">
            <h3 style="color:#FFFFFF;"><b>Tires:</b></h3>
        </section>
        <div class="form-row" style="margin-bottom: 10px;">
            <div style="width: 33.33%; float: left;">
                <label id="headlabel" for="inputEmail4"><b>Brand/Make: </b>'.$data->brand_make.'</label>
            </div>
            <div style="width: 33.33%; float: left;">
                <label id="headlabel" for="inputEmail4"><b>Type:</b> ' . $data->type . '</label>
            </div>
            <div style="width: 33.33%; float: left;">
                <label id="headlabel" for="inputEmail4"><b>No. of Studs:</b> ' . $data->no_studs . '</label>
            </div>
        </div>
        <div class="form-row">
            <div style="width: 33.33%; float: left;">
                <label id="headlabel" for="inputEmail4"><b>Size:</b> ' . $data->size . '</label>
            </div>
            <div style="width: 33.33%; float: left;">
                <label id="headlabel" for="inputEmail4"><b>Condition:</b> ' . $data->condition . '</label>
            </div>
          
            <div style="width: 33.33%; float: left;">
                <label id="headlabel" for="inputEmail4"><b>Gen. Condition of the MV: </b>'.$data->general_condition.'</label>
            </div>
        </div>

       
        <section style="text-align:center; background-color: #000000; margin-bottom:10px; margin-top:10px;">
            <h3 style="color:#FFFFFF;"><b>Outside Features Front:</b></h3>
        </section>
        <div class="form-row">
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $bumper_front .' Bumper Front</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $fog_light . ' Fog Light</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $brand_marking_emblem . ' Brand Marking Emblem</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $headlights_lr . ' Headlights LR</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $radiator_grill . ' Radiator Grill</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $windshield_wiper . ' Windshield Wiper</label>
            </div>
        </div>
        <div class="form-row">
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $signal_lights_lr .' Signal Lights L/R</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $windshield_glass . ' Windshield Glass</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $hazzard_lights_lr . ' Hazard Lights L/R</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $windshield_wiper_blade . ' Windshield Wiper Blade</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $headlights_guard . ' Headlights Guard</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $windshield_wiper_motor . ' Windshield Wiper Motor</label>
            </div>
        </div>
        <section style="padding-bottom:-10px;">
            <h5><b>Left Side Portion:</b></h5>
        </section>
        <div class="form-row">
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $side_mirror_L .' Side Mirror</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $wind_tunnel_glass_L . ' Wind Tunnel</label>
            </div>
            <div style="font-size:10.5px; width: 33%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $window_glass_front_seat_L . ' Window Glass Front Seat</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $weather_window_strip_L . ' Weather Window Strip</label>
            </div>
        </div>

        <section style="padding-bottom:-10px;">
            <h5><b>Right Side Portion:</b></h5>
        </section>
        <div class="form-row">
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $side_mirror_R .' Side Mirror</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $wind_tunnel_glass_R . ' Wind Tunnel</label>
            </div>
            <div style="font-size:10.5px; width: 33%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $window_glass_front_seat_R . ' Window Glass Front Seat</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $weather_window_strip_R . ' Weather Window Strip</label>
            </div>
        </div>
        <br>
        <section style="text-align:center; background-color: #000000; margin-bottom:10px; margin-top:-5px;">
            <h3 style="color:#FFFFFF;"><b>Rear Back Portion/Luggage Compartment:</b></h3>
        </section>
        <div class="form-row">
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $rear_bumper .' Rear Bumper</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $brand_emblem_marking . ' Brand Emblem Marking</label>
            </div>
            <div style="font-size:10.5px; width: 33%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $window_glass_front_seat . ' Window Glass Front Seat</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $spare_tire_mounting . ' Spare Tire Mounting</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $tools . ' Tools</label>
            </div>
        </div>
        
        <section style="text-align:center; background-color: #000000; margin-bottom:10px; margin-top:10px;">
            <h3 style="color:#FFFFFF;"><b>Inside Features:</b></h3>
        </section>
        <div class="form-row" style="margin-bottom: 5px;">
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $steering_wheel .' Steering Wheel</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $shifting_rod_with_knob . ' Shifting Rod with Knob</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $hand_break . ' Hand Break</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $ammeter . ' Ammeter</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $oil_pressure_gauge . ' Oil Pressure Gauge</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $temperature_gauge . ' Temperature Gauge</label>
            </div>
        </div>
        <div class="form-row" style="margin-bottom: 5px;">
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $rpm_gauge .' RPM Gauge</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $headlight_knob . ' Headlight Knob</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $parking_hazard_knob . ' Parking/Hazzard Knob</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $wiper_knob . ' Wiper Knob</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $dimmer_switch . ' Dimmer Switch</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $directional_level . ' Directional Level</label>
            </div>
        </div>
        <div class="form-row" style="margin-bottom: 5px;">
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $speedometer .' Speedometer</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $fuel_gauge . ' Fuel Gauge</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $cars_seats_front . ' Car Seats Front</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $car_seat_back . ' Car Seat Back</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $car_seat_cover . ' Car Seat Cover</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $floor_carpet . ' Floor Carpet</label>
            </div>
        </div>
        <div class="form-row" style="margin-bottom: 5px;">
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $floor_matting .' Floor Matting</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $computer_box . ' Computer Box</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $air_condition_unit . ' Air Condition Unit</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $car_stereo . ' Car Stereo</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $interceptor_cable . ' Interceptor Cable</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $stereo_speaker . ' Stereo Speaker</label>
            </div>
        </div>
        <div class="form-row" style="margin-bottom: 5px;">
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $twitter .' Twitter</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $car_radio . ' Car Radio</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $equalizer . ' Equalizer</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $cd_charger . ' Cd Charger</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $lighter . ' Lighter</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $barometer . ' Barometer</label>
            </div>
        </div>
        <div class="form-row" style="margin-bottom: 5px;">
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $fire_extinguisher .' Fire Extinguisher</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $antennae . ' Antennae</label>
            </div>
        </div>
        <section style="text-align:center; background-color: #000000; margin-bottom:10px; margin-top:50px;">
            <h3 style="color:#FFFFFF;"><b>Engine Compartment:</b></h3>
        </section>
        <div class="form-row" style="margin-bottom: 5px;">
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $air_con_compressor .' Twitter</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $radiator . ' Radiator</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $radiator_cover . ' Radiator Cover</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $radiator_inlet_hose . ' Radiator Inlet Hose</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $radiator_outlet_hose . ' Radiator Outlet Hose</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $water_bypass_hose . ' Water Bypass Hose</label>
            </div>
        </div>

        <div class="form-row" style="margin-bottom: 5px;">
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $ignition_coil .' Twitter</label>
            </div>
             <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $high_tension_wire .' High Tension Wire</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $distibutor_Cap .' Distributor Cap</label>
            </div>
             <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $distributor_assembly .' Distributor Assembly</label>
            </div>
             <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $contact_point .' Contact Point</label>
            </div>
             <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $condenser .' Condenser</label>
            </div>
        </div>
        <div class="form-row" style="margin-bottom: 5px;">
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $air_con_condenser .' Aircon Condenser</label>
            </div>
             <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $rotor .' Rotor</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $advancer .' Advancer</label>
            </div>
             <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $oil_dipstick .' Oil Dipstick</label>
            </div>
             <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $air_con_driver_belt .' Aircon Driver Belt</label>
            </div>
             <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $carburettor_assembly .' Carburettor Assembly</label>
            </div>
        </div>
        <div class="form-row" style="margin-bottom: 5px;">
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $alternator .' Alternator</label>
            </div>
             <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $alternator_voltage_regulator .' Alternator Voltage Regulator</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $oil_filter .' Oil Filter</label>
            </div>
             <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $steering_gear_box .' Steering Gear Box</label>
            </div>
             <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $water_pump_assembly .' Water Pump Assembly</label>
            </div>
             <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $engine_fan .' Engine Fan</label>
            </div>
        </div>
        <div class="form-row" style="margin-bottom: 5px;">
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $auxiliary_fan .' Auxiliary Fan</label>
            </div>
             <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $fan_belt .' Fan Belt</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $spark_plugs .' Spark Plugs</label>
            </div>
             <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $battery .' Battery</label>
            </div>
             <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $battery_cable .' Battery Cable</label>
            </div>
             <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $battery_terminal .' Battery Terminal</label>
            </div>
        </div>
        <div class="form-row" style="margin-bottom: 5px;">
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $horn_assembly .' Horn Assembly</label>
            </div>
             <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $horn_relay .' Horn Relay</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $accelerator_cable .' Accelerator Cable</label>
            </div>
             <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $intake_manifold .' Intake Manifold</label>
            </div>
             <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $exhaust_manifold .' Exhaust Manifold</label>
            </div>
             <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $engine_mounting .' Engine Mounting</label>
            </div>
        </div>
        <div class="form-row" style="margin-bottom: 5px;">
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $ignition_wiring .' Ignition Wiring</label>
            </div>
             <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $transmission .' Transmission</label>
            </div>
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $suspension_assembly .' Suspension Assembly</label>
            </div>
             <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $tie_rod_end .' Tie Rod End</label>
            </div>
             <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $idler_arm .' Idler Arm</label>
            </div>
             <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $front_coil_spring .' Front Coil Spring</label>
            </div>
        </div>
        <div class="form-row" style="margin-bottom: 5px;">
            <div style="font-size:10.5px; width: 16.6%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $pitman_arm .' Pitman Arm</label>
            </div>
        </div>
    
        <br>
        <section style="text-align:center; background-color: #000000; margin-bottom:10px; margin-top:5px;">
            <h3 style="color:#FFFFFF;"><b>General Apperance:</b></h3>
        </section>
        <div class="form-row" style="margin-bottom: 5px;">
            <div style="font-size:10.5px; width: 25%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $newly_painted .' Newly Painted</label>
            </div>
            <div style="font-size:10.5px; width: 25%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $paint_discoloration .' Paint Discoloration</label>
            </div>
            <div style="font-size:10.5px; width: 25%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $good_body_shape .' Good Body Shape</label>
            </div>
            <div style="font-size:10.5px; width: 25%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $body_in_bad_shape .' Bodi in Bad Shape</label>
            </div>
        </div>
        <div class="form-row" style="margin-bottom: 5px;">
            <div style="font-size:10.5px; width: 25%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $body_ongoing_repair .' Body On going Repair</label>
            </div>
            <div style="font-size:10.5px; width: 25%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $for_repainting .' For Repainting</label>
            </div>
            <div style="font-size:10.5px; width: 50%; float: left;">
                <label id="headlabel" for="inputEmail4">'. $beyond_economical_repair .' Beyond Economical Repair and corrosion have set in, which requires a major body repair</label>
            </div>
        </div>
        <br>
      
        <div class="form-row" style="margin-bottom: 10px;">
            <label id="headlabel" for="inputEmail4"><b>Remark:</b></label>
            <div style="width: 100%; float: left;">
                <label id="headlabel" for="inputEmail4">' . $data->remark . '</label>
            </div>
        </div>
        <div class="form-row" style="margin-top: 50px;margin-bottom: 10px;">
            <div style="width: 33.33%; float: left;">
                <label id="headlabel" for="inputEmail4"><b>Recovering Personel:</b></label><br>
                <span padding-left:10px;>' . $data->recovering_personel . '</span>
            </div>
            <div style="width: 33.33%; float: left;">
                <label id="headlabel" for="inputEmail4"><b>Noted By:</b></label><br>
                <span padding-left:10px;>' . $data->noted_by . '</span>
            </div>
            <div style="width: 33.33%; float: left;">
                <label id="headlabel" for="inputEmail4"><b>Witness Owner Barangay Official:</b></label><br>
                <span padding-left:10px;>' . $data->witness_owner_barangay_official . '</span>
            </div>
        </div>
       ';
 
    // Write HTML content to the document
    $mpdf->WriteHTML($html);

    // // Output PDF
    // $pdfFileName = "Property-Goods_Evidence" . $id . '.pdf';
    // $mpdf->Output($pdfFileName, \Mpdf\Output\Destination::FILE);
    // return response()->download(public_path($pdfFileName), $pdfFileName);

    $pdfFileName = "Car_Evidence_" . $id . '.pdf';
    $mpdf->Output($pdfFileName, \Mpdf\Output\Destination::INLINE);
    return response()->download(public_path($pdfFileName), $pdfFileName);
   
}

    public function my_receipt(Request $request)
    {
        $currentDate = Carbon::now();
        $date = $currentDate->format('F j, Y');
        $day = $currentDate->format('j');

            if ($day % 10 == 1 && $day != 11) {
                $finalday= $day. 'st';
            } elseif ($day % 10 == 2 && $day != 12) {
                $finalday= $day. 'nd';
            } elseif ($day % 10 == 3 && $day != 13) {
                $finalday= $day.  'rd';
            } else {
                $finalday= $day.  'th';
            }
        
        $month = $currentDate->format('F');

        $case = $request->input('case');
        $item =$request->input('item');
        $quantity =$request->input('quantity');
        $description =$request->input('description');
        $seizing_officer =$request->input('seizing_officer');
        $received =$request->input('received');

        $file1 = $request->file('Picture');
        $extension = $file1->getClientOriginalName();
        $filename = $extension;
        $file1->move('images/', $filename);
    


        $mpdf = new \Mpdf\Mpdf(['format' => 'A4']); 
        $mpdf->SetTitle('Download Turn-Over Receipt');
    
        $cssFilePath = public_path('css/downloadPDF.css');
        $cssFile = file_get_contents($cssFilePath);
        $mpdf->WriteHTML($cssFile, \Mpdf\HTMLParserMode::HEADER_CSS);
        $html = '<h3 style="text-align:center; padding-top:-10px;">Republic of the Philippines</h3>
        <h3 style="text-align:center; padding-top:-10px;">Department of the Interior and Local Government</h3>
        <h2 style="text-align:center; padding-top:-10px;">PHILIPPINE NATIONAL POLICE</h2>
        <h3 style="text-align:center; padding-left:500px; padding-top:20px; padding-bottom:20px;">Date:'.$date.'</h3>
        <h3 style="padding-top:20px; padding-bottom:20px;">Case: <span style="text-decoration: underline solid 10px;">'.$case.'</span></h3>
        <h1 style="text-decoration: underline solid 10px; text-align:center; padding-top:20px; padding-bottom:20px;">TURN-OVER RECEIPT</h1>
        <br>
        <div>
            <p style="font-size: 13px;padding-top:8px;padding-bottom:-5px;">ITEMS/ARTICLE: <b style="font-size: 14px;">'.$item.'</b></p>
            <p style="font-size: 13px;">QUANTITY/UNITS: <b style="font-size: 14px;">'.$quantity.'</b></p>
        </div>
        <p style="text-align:center;font-size: 15px;padding-top:15px;">('.'<span style="text-decoration: underline solid 10px;"><b>Description of the Properties</b></span>'.')</p>
        <p style="text-align: justify;font-size: 13px;padding-bottom:10px;">'.$description.'</p>
        <p style="font-size: 14px;padding-top:8px;padding-bottom:-12px;text-align:center; padding-left:500px;"><b style="text-decoration: underline solid 10px;">'.$seizing_officer.'</b></p> 
        <p style="font-size: 12px; text-align:center; padding-left:500px; padding-bottom:10px;">Name and Signature of Seizing Officer</p>
        <div style="text-align: center;">
            <img style="height: 30%; width: 30%;" src="images/'.$filename.'" alt="profile"/>
        </div>
        <p style="text-align: justify;font-size: 13px;">I herby certify that the above described properties were received in good condition appearing on the pictures as presented on this <b>'.$finalday.'</b> day of <b>'.$month.'</b>.</p>
        <br>
        <p style="padding-top: 15px;font-size: 14px; text-align:center; padding-left:300px;">Received by:</p>
        <p style="font-size: 14px;padding-left:65px;padding-bottom:-14px; text-align:center; padding-left:500px;"><b style="text-decoration: underline solid 10px;">'.$received.'</b></p> 
        <p style="font-size: 12px;padding-left:40px; text-align:center; padding-left:500px;">Name and Signature of Evidence Custodian</p>';
        $mpdf->WriteHTML($html);

        $pdfFileName = "Turn-Over_Receipt.pdf";
        $mpdf->Output($pdfFileName, \Mpdf\Output\Destination::INLINE);
        return response()->download(public_path($pdfFileName), $pdfFileName);
    
    }
}
