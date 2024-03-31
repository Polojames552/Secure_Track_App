<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\property;
use App\Models\Motorcycle;
use App\Models\EvidenceVehicle;
use App\Models\property_history;
use App\Models\motorcycle_history;
use App\Models\vehicle_history;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
class superAdminController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'municipality' => ['required', 'string', 'max:255', 'unique:'.User::class],
        ]);
      
        if(Auth::user()->role =='1'){
            $data = new User();
            $data->name = "N/A";
            $data->address = $request->input('address');
            $data->username = $request->input('username');
            $data->password = Hash::make($request->input('password'));
            $data->municipality = $request->input('municipality');
            $data->municipal_director = $request->input('municipal_director');
            $data->status = "Active";
            $data->role = "2";
            $data->save();
            return redirect('stationsPanel')->with('message','Station added Successfully!');
        }else{
            $data = new User();
            $data->name = $request->input('name');
            $data->address = $request->input('address');
            $data->username = $request->input('username');
            $data->password = Hash::make($request->input('password'));
            $data->municipality = $request->input('municipality');
            $data->municipal_director = $request->input('municipal_director');
            $data->status = "Active";
            $data->role = "3";
            $data->save();
            return redirect('manageInvestigatorsPanel')->with('message','Investigator added Successfully!');
        }
              
    }

    public function stationsList()
    {
        // $data = DB::table('users')->get();
        $data = DB::select('select * from users where role = 2');
        return view('SuperAdminPages/stationsPanel',['data'=>$data]);
    }
    public function listOfInvestigators()
    {
        // $data = DB::table('users')->get();
        $data = DB::select('select * from users where role = 3');
        return view('SuperAdminPages/investigatorsPanel',['data'=>$data]);
    }

    public function viewPropertyGoods() 
    {
        // $data = DB::table('users')->get();
        $data = DB::select('select * from properties');
        return view('SuperAdminPages/propertyGoodsRecords',['data'=>$data]);
    }
    public function viewMotorcycle() 
    {
        // $data = DB::table('users')->get();
        $data = DB::select('select * from motorcycles');
        return view('SuperAdminPages/motorVehicleRecords',['data'=>$data]);
    } 
    public function viewVehicle() 
    {
        // $data = DB::table('users')->get();
        $data = DB::select('select * from evidence_vehicles');
        return view('SuperAdminPages/vehiclesRecords',['data'=>$data]);
    } 
    public function AdminDashboard()
    {
        // $data = DB::table('users')->get();
        $stations = DB::select('select * from users where role = 2');
        $num_stations = count($stations);

        $investigators = DB::select('select * from users where role = 3');
        $num_investigators = count($investigators);

        $allusers = DB::select('select * from users where role = 2');
        $total_users = count($allusers);


        $property = property::get()->count();
        $motorcycle = Motorcycle::get()->count();
        $car = EvidenceVehicle::get()->count();

        // $property = DB::select('select * from properties')->count();
        // $motorcycle = DB::select('select * from motorcycles')->count();
        // $car = DB::select('select * from evidence_vehicles')->count();

        $total_evidences = ($property + $motorcycle + $car);
       

        //GET TOTAL NUMBER OF RECORDS
        return view('SuperAdminPages/superAdminDashboard',['allusers'=>$allusers,
        'total_users'=>$total_users,
        'num_stations'=>$num_stations, 
        'num_investigators'=>$num_investigators,
        'total_evidences'=>$total_evidences,
        'property'=>$property,
        'motorcycle'=>$motorcycle,
        'car'=>$car
        ]);
    }
    public function chartsData()
    {
        $property = property::get()->count();
        $motorcycle = Motorcycle::get()->count();
        $car = EvidenceVehicle::get()->count();
        
        // $property1 = property::where('municipality', auth()->user()->municipality)
        // ->where('status', 'Active')
        // ->get()
        // ->count();
        // $motorcycle1 = Motorcycle::where('municipality', auth()->user()->municipality)
        // ->where('status', 'Active')
        // ->get()
        // ->count();
        // $car1 = EvidenceVehicle::where('municipality', auth()->user()->municipality)
        // ->where('status', 'Active')
        // ->get()
        // ->count();

        return response()->json([
            'property' => $property,
            'motorcycle' => $motorcycle,
            'car' => $car]);
    }

    public function update_station(Request $request, $id)
    {

        DB::table('users')
        ->where('id', $id)
        ->update(array(
            'name' => "N/A",
            'address' => $request->input('address'),
            'username' => $request->input('username'),
            'municipality' => $request->input('municipality'),
            'municipal_director' => $request->input('municipal_director'),
            'status' => $request->input('status'),
        ));
            return redirect('stationsPanel')->with('message','Station details updated successfully!');
    }
}
