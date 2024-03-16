<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
}
