<?php

namespace App\Http\Controllers;

use App\Models\indicateur_performances;
use Illuminate\Http\Request;

class IndicateurPerformancesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cpuA = indicateur_performances::where("Competition_id",1)->where("indicateur_id","1")->where("equipes_id","1")->get();
        $ramA = indicateur_performances::where("Competition_id",1)->where("indicateur_id","2")->where("equipes_id","1")->get();
        $trsA = indicateur_performances::where("Competition_id",1)->where("indicateur_id","3")->where("equipes_id","1")->get();
        $cpuB = indicateur_performances::where("Competition_id",1)->where("indicateur_id","1")->where("equipes_id","2")->get();
        $ramB = indicateur_performances::where("Competition_id",1)->where("indicateur_id","2")->where("equipes_id","2")->get();
        $trsB = indicateur_performances::where("Competition_id",1)->where("indicateur_id","3")->where("equipes_id","2")->get();
     
        return view("indicateur.index")
            ->with("cpuA",$cpuA)
            ->with("ramA",$ramA)
            ->with("trsA",$trsA)
            ->with("cpuB",$cpuB)
            ->with("ramB",$ramB)
            ->with("trsB",$trsB)
            ;
            
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(indicateur_performances $indicateur_performances)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(indicateur_performances $indicateur_performances)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, indicateur_performances $indicateur_performances)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(indicateur_performances $indicateur_performances)
    {
        //
    }
}
