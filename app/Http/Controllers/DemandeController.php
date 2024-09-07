<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\equipes;
use App\Models\competition;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function register(Request $request)
    {
        // Check if the user has already registered for a team
        $user = Auth::user();
        $existingDemande = Demande::where('User_id', $user->id)->first();
        if ($existingDemande) {
            // User has already registered, handle accordingly (e.g., show an error message)
            return redirect()->back()->with('error', 'Vous êtes déjà inscrit !');
        }

        // Get the selected team (equipe)
        $equipe = $request->input('equipe');

        // Determine the corresponding team ID
        $equipeId = ($equipe === 'A') ? 1 : 2;

        // Create a new Demande record for the user
        $demande = new Demande();
        $demande->User_id = $user->id; // Update to the correct foreign key name
        $demande->equipes_id = $equipeId;
        $demande->competition_id = 1; // Update to the correct competition ID
        $demande->status = 0;
        $demande->save();

        // Display success message indicating waiting for admin approval
        return redirect()->back()->with('success', 'Vous êtes inscrit ! En attente de la confirmation de l\'administrateur.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Demande $demande)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Demande $demande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Demande $demande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Demande $demande)
    {
        //
    }
    public function approve(Demande $demande)
    {
        $demande->status = 1;
        $demande->save();

        return Redirect::back()->with('success', 'Demande approuvée avec succès !');
    }
    public function reject(Demande $demande)
    {
        $demande->status = 2;
        $demande->save();

        return Redirect::back()->with('success', 'Demande rejetée avec succès !');
    }
}
