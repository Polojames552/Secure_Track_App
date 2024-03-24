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
    Route::get('superAdminDashboard',[superAdminController::class ,'AdminDashboard']);
    Route::get('stationsPanel',[superAdminController::class ,'stationsList']);
    Route::get('investigatorsPanel',[superAdminController::class ,'listOfInvestigators']);
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
    Route::get('/forensicRecords', function () {
        return view('SuperAdminPages/forensicRecords');
    });
    Route::get('/weaponsRecords', function () {
        return view('SuperAdminPages/weaponsRecords');
    });
    Route::get('/vehiclesRecords', function () {
        return view('SuperAdminPages/vehiclesRecords');
    });
    Route::get('/otherRecords', function () {
        return view('SuperAdminPages/otherRecords');
    });
 });
//***Super Admin Screens

//***Municipal Admin Screens
Route::middleware(['auth','isMunicipalAdmin'])->group(function(){
    //add Investigator
    Route::post('addInvestigators',[municipalAdminController::class ,'store']);
    Route::get('municipalAdminDashboard',[municipalAdminController::class ,'MunicipalDashboard']);
    Route::get('manageInvestigatorsPanel',[municipalAdminController::class ,'InvestigatorsPanel']);
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
    Route::get('/Municipal_forensicRecords', function () {
        return view('MunicipalAdminPages/Municipal_forensicRecords');
    });
    Route::get('/Municipal_weaponsRecords', function () {
        return view('MunicipalAdminPages/Municipal_weaponsRecords');
    });
    Route::get('/Municipal_vehiclesRecords', function () {
        return view('MunicipalAdminPages/Municipal_vehiclesRecords');
    });
    Route::get('/Municipal_otherRecords', function () {
        return view('MunicipalAdminPages/Municipal_otherRecords');
    });
 });
//***Municipal Admin Screens 

//***Investigators Screens
    Route::middleware(['auth','isInvestigator'])->group(function(){
   
    Route::get('myInvestigatorsProfile',[investigatorController::class ,'investigatorsProfile']);
    // Route::post('addVehicles',[investigatorController::class ,'addEvidenceVehicle']);
    Route::post('addEvidence_Vehicles',[investigatorController::class ,'add_vehicle_evidence'])->name('add_vehicle_evidence');
    
    Route::get('/sample', function () {
        return view('Investigators/sample');
    });
  // Route::get('/myRecords', function () {
    //     return view('Investigators/myRecords');
    // });
  Route::get('/Investigator_forensicRecords', function () {
        return view('Investigators/Investigator_forensicRecords');
    });
    Route::get('/Investigator_weaponsRecords', function () {
        return view('Investigators/Investigator_weaponsRecords');
    });
    Route::get('Investigator_vehiclesRecords',[investigatorController::class ,'investigatorVehicleRecords']);
    // Route::get('/Investigator_vehiclesRecords', function () {
    //     return view('Investigators/Investigator_vehiclesRecords');
    // });
    Route::get('/Investigator_otherRecords', function () {
        return view('Investigators/Investigator_otherRecords');
    });

//    Route::get('/myInvestigatorsProfile', function () {
//         return view('Investigators/myInvestigatorsProfile');
//     });
    //Edit
    Route::post('editEvidence_Vehicles/{id}',[investigatorController::class ,'updateEvidence_Vehicles'])->name('editEvidence_Vehicles');
    //Edit
});
//***Investigators Screens


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
