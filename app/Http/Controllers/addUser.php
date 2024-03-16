<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
class addUser extends Controller
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
            $data->role = "3";
            $data->save();
            return redirect('manageInvestigatorsPanel')->with('message','Investigator added Successfully!');
        }
              
    }

}


