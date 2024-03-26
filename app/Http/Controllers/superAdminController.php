<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
    public function AdminDashboard()
    {
        // $data = DB::table('users')->get();
        $stations = DB::select('select * from users where role = 2');
        $num_stations = count($stations);

        $investigators = DB::select('select * from users where role = 3');
        $num_investigators = count($investigators);

        $allusers = DB::select('select * from users where role = 2');
        $total_users = count($allusers);

        //GET TOTAL NUMBER OF RECORDS
        return view('SuperAdminPages/superAdminDashboard',['allusers'=>$allusers,'total_users'=>$total_users,'num_stations'=>$num_stations, 'num_investigators'=>$num_investigators]);
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
