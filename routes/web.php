<?php


use App\Http\Controllers\CompetitionController;

use App\Http\Controllers\IndicateurPerformancesController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemandeController;


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

Route::get("/script/watch",function(){
    try {
        
        //shell_exec('"c:\Program Files\Oracle\VirtualBox\vboxmanage.exe" startvm kalii');
        shell_exec('PowerShell -ExecutionPolicy Bypass -File C:\\script\\scriptA.ps1');
        return "Ok";
    } catch (\Throwable $th) {
        return "erreur";
    }
    
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::resource("/competition",CompetitionController::class);
Route::resource("/indicateur",IndicateurPerformancesController::class);
Route::put('/users/{user}', 'Controller@update')->name('users.update');
Route::post('/demande/register', [DemandeController::class, 'register'])->name('demande.register');
Route::post('/demande/{demande}/approve', [DemandeController::class, 'approve'])->name('demande.approve');
Route::post('/demande/{demande}/reject', [DemandeController::class, 'reject'])->name('demande.reject');








