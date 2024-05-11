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

class municipalAdminController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:'.User::class],
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
            $data->address = Auth::user()->address;
            $data->username = $request->input('username');
            $data->password = Hash::make($request->input('password'));
            $data->municipality = Auth::user()->municipality;
            $data->municipal_director = Auth::user()->municipal_director;
            $data->status = "Active";
            $data->role = "3";
            $data->save();
            return redirect('manageInvestigatorsPanel')->with('message','Investigator added Successfully!');
        }
    }
    public function MunicipalDashboard()
    {
        // $data = DB::table('users')->get();
        $investigators = DB::select('select * from users where role = 3 and municipality = ?', [auth()->user()->municipality]);
        $num_investigators = count($investigators);

      
        $property = property::where('municipality', auth()->user()->municipality)
        ->where('status', 'Crime Lab')
        ->orWhere('status', 'MPS Custodian')
        ->get()
        ->count();
        $motorcycle = Motorcycle::where('municipality', auth()->user()->municipality)
        ->where('status', 'Crime Lab')
        ->orWhere('status', 'MPS Custodian')
        ->get()
        ->count();
        $car = EvidenceVehicle::where('municipality', auth()->user()->municipality)
        ->where('status', 'Crime Lab')
        ->orWhere('status', 'MPS Custodian')
        ->get()
        ->count();
        $active = ($property+$motorcycle+$car);

        $property = property::where('municipality', auth()->user()->municipality)
        ->where('status', 'Disposed' || 'Released')
        ->get()
        ->count();
        $motorcycle = Motorcycle::where('municipality', auth()->user()->municipality)
        ->where('status', 'Disposed' || 'Released')
        ->get()
        ->count();
        $car = EvidenceVehicle::where('municipality', auth()->user()->municipality)
        ->where('status', 'Disposed' || 'Released')
        ->get()
        ->count();
        $disposed = ($property+$motorcycle+$car);
        $total_record = $disposed+$active;
        //GET TOTAL NUMBER OF RECORDS
        return view('MunicipalAdminPages/municipalAdminDashboard',[
            'investigators'=>$investigators,
            'num_investigators'=>$num_investigators,
            'active'=>$active,
            'disposed'=>$disposed,
            'total_record'=>$total_record
        ]);
    }
    public function InvestigatorsPanel()
    {
        // $data = DB::table('users')->get();
        $data = DB::select('select * from users where role = 3 and municipality = ?', [auth()->user()->municipality]);
        $num_investigators = count($data);

        //GET TOTAL NUMBER OF RECORDS
        return view('MunicipalAdminPages/manageInvestigatorsPanel',['data'=>$data,'num_investigators'=>$num_investigators]);
    }
    public function viewProperty()
    {
        // $data = DB::table('users')->get();
        $data = DB::select('select * from properties where municipality = ?', [auth()->user()->municipality]);

        //GET TOTAL NUMBER OF RECORDS
        return view('MunicipalAdminPages/Municipal_propertyGoodsRecords',['data'=>$data]);
    }
    public function viewMotorcycle()
    {
        // $data = DB::table('users')->get();
        $data = DB::select('select * from motorcycles where municipality = ?', [auth()->user()->municipality]);

        //GET TOTAL NUMBER OF RECORDS
        return view('MunicipalAdminPages/Municipal_motorVehiclesRecords',['data'=>$data]);
    }
    public function viewVehicle() 
    {
        // $data = DB::table('users')->get();
        $data = DB::select('select * from evidence_vehicles where municipality = ?', [auth()->user()->municipality]);
        return view('MunicipalAdminPages/Municipal_vehiclesRecords',['data'=>$data]);
    } 
    public function update_investigator(Request $request, $id)
    {

        DB::table('users')
        ->where('id', $id)
        ->update(array(
            'name' => $request->input('name'),
            // 'address' => $request->input('address'),
            'username' => $request->input('username'),
            'municipality' => $request->input('municipality'),
            'municipal_director' => $request->input('municipal_director'),
            'status' => $request->input('status'),
        ));
            return redirect('manageInvestigatorsPanel')->with('message','Details updated successfully!');
    }
    public function chartsData()
    {
        $property1 = property::where('municipality', auth()->user()->municipality)
        ->get()
        ->count();
        $motorcycle1 = Motorcycle::where('municipality', auth()->user()->municipality)
        ->get()
        ->count();
        $car1 = EvidenceVehicle::where('municipality', auth()->user()->municipality)
        ->get()
        ->count();
        
        
        return response()->json([
            'property1' => $property1,
            'motorcycle1' => $motorcycle1,
            'car1' => $car1]);
    }
}
