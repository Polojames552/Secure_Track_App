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
class CrimeLabController extends Controller
{
    public function crimeDashboard()
    {
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
        return view('CrimeLab/CrimeLabDashboard',[
            'active'=>$active,
            'disposed'=>$disposed,
            'totel_record'=>$totel_record
    ]);
    }

    public function crimeCar()
    {
        $data = DB::select('select * from evidence_vehicles where status = "Crime Lab"');
        $count = count($data);
        return view('CrimeLab/CrimeLabCar',['data'=>$data,'count'=>$count]);
    }
    public function crimeProperty()
    {
        $data = DB::select('select * from properties where status = "Crime Lab"');
        $count = count($data);
        return view('CrimeLab/CrimeLabProperty',['data'=>$data,'count'=>$count]);
    }
    public function crimeMotor()
    {
        $data = DB::select('select * from motorcycles where status = "Crime Lab"');
        $count = count($data);
        return view('CrimeLab/CrimeLabMotorVehicle',['data'=>$data,'count'=>$count]);
    }
    public function chartsData1()
    {
        $property = property::get()->count();
        $motorcycle = Motorcycle::get()->count();
        $car = EvidenceVehicle::get()->count();
        return response()->json([
            'property' => $property,
            'motorcycle' => $motorcycle,
            'car' => $car]);
    }
    
}
