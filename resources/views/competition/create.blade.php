@extends('adminlte::page')

@section('content')
<h2>Création d'une competition</h2>


<form action="{{ route("competition.store") }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Titre</label>
        <input type="text" class="form-control"  name="titre"/>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Cahier de charge</label>
        <input type="text" class="form-control"  name="cahier_de_charge"/>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Date heure debut phase 1</label>
        <input type="text" class="form-control"  name="date_heure_debut_phase_1"/>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Date heure fin phase 1</label>
        <input type="text" class="form-control"  name="date_heure_fin_phase_1"/>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Date heure debut phase 2</label>
        <input type="text" class="form-control"  name="date_heure_debut_phase_2"/>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Date heure fin phase 2</label>
        <input type="text" class="form-control"  name="date_heure_fin_phase_2"/>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Date heure debut phase 3</label>
        <input type="text" class="form-control"  name="date_heure_debut_phase_3"/>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Date heure fin phase 3</label>
        <input type="text" class="form-control"  name="date_heure_fin_phase_3"/>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Timeout</label>
        <input type="text" class="form-control"  name="timeout"/>
    </div>
    <button type="submit" class="btn btn-success">Créer</button>
</form>
@endsection