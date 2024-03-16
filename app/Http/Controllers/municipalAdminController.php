<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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

        //GET TOTAL NUMBER OF RECORDS
        return view('MunicipalAdminPages/municipalAdminDashboard',['investigators'=>$investigators,'num_investigators'=>$num_investigators]);
    }
    public function InvestigatorsPanel()
    {
        // $data = DB::table('users')->get();
        $data = DB::select('select * from users where role = 3 and municipality = ?', [auth()->user()->municipality]);
        $num_investigators = count($data);

        //GET TOTAL NUMBER OF RECORDS
        return view('MunicipalAdminPages/manageInvestigatorsPanel',['data'=>$data,'num_investigators'=>$num_investigators]);
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
}
