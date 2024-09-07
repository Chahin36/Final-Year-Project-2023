<?php

namespace App\Http\Controllers;

use App\Models\competition;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\equipes;
use App\Models\indicateur_performances;

class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $competitions=Competition::all();
        return view("competition.index")->with("competitions",$competitions);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("competition.create");

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $competition=new Competition();
        $competition->titre=$request->titre;
        $competition->cahier_de_charge=$request->cahier_de_charge;
        $competition->date_heure_debut_phase_1=$request->date_heure_debut_phase_1;
        $competition->date_heure_fin_phase_1=$request->date_heure_fin_phase_1;
        $competition->date_heure_debut_phase_2=$request->date_heure_debut_phase_2;
        $competition->date_heure_fin_phase_2=$request->date_heure_fin_phase_2;
        $competition->date_heure_debut_phase_3=$request->date_heure_debut_phase_3;
        $competition->date_heure_fin_phase_3=$request->date_heure_fin_phase_3;
        $competition->timeout=$request->timeout;
        $competition->save();

        equipes::create([
            "competition_id"=>$competition->id,
            "libellé"=>"A",
        ]);
        
        equipes::create([
            "competition_id"=>$competition->id,
            "libellé"=>"B",
        ]);
    
        return redirect()->route("competition.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(competition $competition)
    {
        $trsA = indicateur_performances::where("Competition_id",$competition->id)->where("indicateur_id","3")->where("equipes_id","1")->get();
        $ramA = indicateur_performances::where("Competition_id",$competition->id)->where("indicateur_id","2")->where("equipes_id","1")->get();
        $cpuA = indicateur_performances::where("Competition_id",$competition->id)->where("indicateur_id","1")->where("equipes_id","1")->get();
        $cpuB = indicateur_performances::where("Competition_id",$competition->id)->where("indicateur_id","1")->where("equipes_id","2")->get();
        $ramB = indicateur_performances::where("Competition_id",$competition->id)->where("indicateur_id","2")->where("equipes_id","2")->get();
        $trsB = indicateur_performances::where("Competition_id",$competition->id)->where("indicateur_id","3")->where("equipes_id","2")->get();
     
        $users = User::all();
        $equipeA=$competition->equipeA();
        $equipeB=$competition->equipeB();
        return view('competition.show', compact('competition', 'users'))
            ->with("competition",$competition)
            ->with("equipeA",$equipeA)
            ->with("equipeB",$equipeB)
            ->with("cpuA",$cpuA)
            ->with("ramA",$ramA)
            ->with("trsA",$trsA)
            ->with("cpuB",$cpuB)
            ->with("ramB",$ramB)
            ->with("trsB",$trsB);




    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(competition $competition)
    {
        return view("competition.edit")->with("competition",$competition);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, competition $competition)
    {
        $competition->id=$request->id;
        $competition->titre=$request->titre;
        $competition->cahier_de_charge=$request->cahier_de_charge	;
        $competition->date_heure_debut_phase_1=$request->date_heure_debut_phase_1;
        $competition->date_heure_fin_phase_1=$request->date_heure_fin_phase_1;
        $competition->date_heure_debut_phase_2=$request->date_heure_debut_phase_2;
        $competition->date_heure_fin_phase_2=$request->date_heure_fin_phase_2;
        $competition->date_heure_debut_phase_3=$request->date_heure_debut_phase_3;
        $competition->date_heure_fin_phase_3=$request->date_heure_fin_phase_3;
        $competition->timeout=$request->timeout;
        $competition->save();
        return redirect()->route("competition.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(competition $competition)
    {
        $competition->destroy($competition->id);
        return redirect()->route("competition.index");
    }
    public function cv()
{
    $users = User::all();

    return view('users.index', [
        'users' => $users,
        'user' => auth()->user()
    ]);
    
}


   
    
}
