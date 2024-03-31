<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\addUser;
use App\Http\Controllers\superAdminController; 
use App\Http\Controllers\municipalAdminController; 
use App\Http\Controllers\investigatorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/welcome1', function () {
//     return view('welcome1');
// });
//***Super Admin Screens
 Route::middleware(['auth','isSuperAdmin'])->group(function(){
    // Route::get('/superAdminDashboard', function () {
    //     return view('SuperAdminPages/superAdminDashboard');
    // });
      //DATA of CHART  chartsData
    Route::get('fetch-data',[superAdminController::class ,'chartsData']);

    Route::get('superAdminDashboard',[superAdminController::class ,'AdminDashboard']);
    Route::get('stationsPanel',[superAdminController::class ,'stationsList']);
    Route::get('investigatorsPanel',[superAdminController::class ,'listOfInvestigators']);
    Route::get('propertyGoodsRecords',[superAdminController::class ,'viewPropertyGoods']);
    Route::get('motorVehicleRecords',[superAdminController::class ,'viewMotorcycle']);
    Route::get('vehiclesRecords',[superAdminController::class ,'viewVehicle']);
    //add stations
    Route::post('addStations',[superAdminController::class ,'store']);
    //Edit stations
    Route::post('edit_station/{id}',[superAdminController::class ,'update_station'])->name('edit_station');
    // Route::get('/investigatorsPanel', function () {
    //     return view('SuperAdminPages/investigatorsPanel');
    // });
    // Route::get('/superAdminRecords', function () {
    //     return view('SuperAdminPages/superAdminRecords');
    // });
    // Route::get('/motorVehicleRecords', function () {
    //     return view('SuperAdminPages/motorVehicleRecords');
    // });
    // Route::get('/propertyGoodsRecords', function () {
    //     return view('SuperAdminPages/propertyGoodsRecords');
    // });
    // Route::get('/vehiclesRecords', function () {
    //     return view('SuperAdminPages/vehiclesRecords');
    // });
    Route::get('/otherRecords', function () {
        return view('SuperAdminPages/otherRecords');
    });
 });
//***Super Admin Screens

//***Municipal Admin Screens
Route::middleware(['auth','isMunicipalAdmin'])->group(function(){
    // for charts
    // Route::get('fetch-data',[superAdminController::class ,'chartsData']);
    
    Route::get('fetch-data-municipal',[municipalAdminController::class ,'chartsData']);
    //add Investigator
    Route::post('addInvestigators',[municipalAdminController::class ,'store']);
    Route::get('municipalAdminDashboard',[municipalAdminController::class ,'MunicipalDashboard']);
    Route::get('manageInvestigatorsPanel',[municipalAdminController::class ,'InvestigatorsPanel']);
    Route::get('Municipal_propertyGoodsRecords',[municipalAdminController::class ,'viewProperty']);
    Route::get('Municipal_motorVehiclesRecords',[municipalAdminController::class ,'viewMotorcycle']);
    Route::get('Municipal_vehiclesRecords',[municipalAdminController::class ,'viewVehicle']);
    //Edit stations 
    Route::post('edit_investigator/{id}',[municipalAdminController::class ,'update_investigator'])->name('edit_investigator');
    // Route::get('/municipalAdminDashboard', function () {
    //     return view('MunicipalAdminPages/municipalAdminDashboard');
    // });
    // Route::get('/manageInvestigatorsPanel', function () {
    //     return view('MunicipalAdminPages/manageInvestigatorsPanel');
    // });
    // Route::get('/municipalRecords', function () {
    //     return view('MunicipalAdminPages/municipalRecords');
    // });
    // Route::get('/Municipal_propertyGoodsRecords', function () {
    //     return view('MunicipalAdminPages/Municipal_propertyGoodsRecords');
    // });
    // Route::get('/Municipal_motorVehiclesRecords', function () {
    //     return view('MunicipalAdminPages/Municipal_motorVehiclesRecords');
    // });
    // Route::get('/Municipal_vehiclesRecords', function () {
    //     return view('MunicipalAdminPages/Municipal_vehiclesRecords');
    // });
    Route::get('/Municipal_otherRecords', function () {
        return view('MunicipalAdminPages/Municipal_otherRecords');
    });
 });
//***Municipal Admin Screens 

//***Investigators Screens
    Route::middleware(['auth','isInvestigator'])->group(function(){

    Route::get('myInvestigatorsProfile',[investigatorController::class ,'investigatorsProfile']);
    Route::get('Investigator_PropertyGoodsRecords',[investigatorController::class ,'investigatorPropertyRecords']);
    Route::get('Investigator_vehiclesRecords',[investigatorController::class ,'investigatorVehicleRecords']);
    Route::get('Investigator_MotorVehiclesRecords',[investigatorController::class ,'investigatorMotorcycleRecords']);
    
    // Route::post('addVehicles',[investigatorController::class ,'addEvidenceVehicle']);
    //adding Evidences
    Route::post('addEvidence_Vehicles',[investigatorController::class ,'add_vehicle_evidence']);
    Route::post('addProperty_Evidence',[investigatorController::class ,'add_property_evidence']);
    Route::post('addMotorCycle_Evidence',[investigatorController::class ,'add_motorcycle_evidence']);
    // Route::post('addMotorCycle_Evidence',[investigatorController::class ,'add_motorcycle_evidence'])->name('add_motorcycle_evidence');
    //Edit
    Route::post('editEvidence_Vehicles/{id}',[investigatorController::class ,'updateEvidence_Vehicles'])->name('editEvidence_Vehicles');
    Route::post('editMotorCycle_Evidence/{id}',[investigatorController::class ,'updateMotorcycle_Evidence'])->name('editMotorCycle_Evidence');
    Route::post('editProperty_Evidence/{id}',[investigatorController::class ,'updateProperty_Evidence'])->name('editProperty_Evidence');
    //Transfer Evidence  
    Route::post('transferEvidence_Vehicles/{id}',[investigatorController::class ,'transferVehicles_Evidence'])->name('transferEvidence_Vehicles');
    Route::post('transferMotorCycle_Evidence/{id}',[investigatorController::class ,'transferMotorcycle_Evidence'])->name('transferMotorCycle_Evidence');
    Route::post('transferProperty_Evidence/{id}',[investigatorController::class ,'transferProperty_Evidence'])->name('transferProperty_Evidence');
    
    Route::get('/sample', function () {
        return view('Investigators/sample');
    });

   
  
  // Route::get('/myRecords', function () {
    //     return view('Investigators/myRecords');
    // }); 
    // Route::get('/Investigator_PropertyGoodsRecords', function () {
    //     return view('Investigators/Investigator_PropertyGoodsRecords');
    // });
  
    // Route::get('/Investigator_MotorVehiclesRecords', function () {
    //     return view('Investigators/Investigator_MotorVehiclesRecords');
    // });
    Route::get('/Investigator_otherRecords', function () {
        return view('Investigators/Investigator_otherRecords');
    });

//    Route::get('/myInvestigatorsProfile', function () {
//         return view('Investigators/myInvestigatorsProfile');
//     });
    
});
//***Investigators Screens
 //Get data for Scanner   
 Route::post('scanner_vehicle_record/{uuid}',[investigatorController::class ,'getVehicleRecordScanner'])->name('scanner_vehicle_record');
 Route::post('scanner_property_record/{uuid}',[investigatorController::class ,'getPropertyRecordScanner'])->name('scanner_property_record');
 Route::post('scanner_motorcycle_record/{uuid}',[investigatorController::class ,'getMotorcycleRecordScanner'])->name('scanner_motorcycle_record');

Route::get('/MyLogin', function () {
    return view('MyLogin');
});
// Route::get('/MyLogin', [AuthenticatedSessionController::class, 'create'])
// ->name('MyLogin');
// Route::post('MyLogin', [AuthenticatedSessionController::class, 'store']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
