<?php
use Illuminate\Http\json;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompetitionController;
use App\Models\Competition;
use App\Models\indicateur;
use App\Models\indicateur_performances;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get("/competition", function(){
    $competition=Competition::all();
    return $competition->toJson();

});
Route::POST("/competition/add", function(Request $request){
    $competition=new Competition();
    $competition->id=$request->id;
    $competition->titre=$request->titre;
    $competition->cahier_de_charge=$request->cahier_de_charge;
    $competition->date_heure_debut_phase_1=$request->date_heure_debut_phase_1;
    $competition->date_heure_fin_phase_1=$request->date_heure_fin_phase_1;
    $competition->date_heure_debut_phase_2=$request->date_heure_debut_phase_2;
    $competition->date_heure_fin_phase_2=$request->date_heure_fin_phase_2;
    $competition->date_heure_debut_phase_3=$request->date_heure_debut_phase_3;
    $competition->date_heure_fin_phase_3=$request->date_heure_fin_phase_3;
    $competition->save();
    $data["status"]="ok";
    return response()->json($data);
    
});


Route::POST("/indicateur/add",function(Request $request){
    try {
        $ind = indicateur::find($request->indicateur_id);
        indicateur_performances::create([
            "competition_id"=>$request->competition_id,
            "indicateur_id"=>$request->indicateur_id,
            "equipes_id"=>$request->equipes_id,
            "valeur"=>$request->valeur,
            "coef"=>$ind->coef, // on sauvegarde la valeur du coef de l'indicateur pour l'historique. en effet la valeur du coef de l'indicateur peut varier d'une compétition à une autre
        ]);
        $data["status"]="OK";

    } catch (\Throwable $th) {
        $data["status"]="Erreur";
        $data["erreur"]=$th->getMessage();
    }
    return response()->json($data);  
    

});