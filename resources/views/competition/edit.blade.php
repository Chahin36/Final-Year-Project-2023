@extends('adminlte::page')

@section('content')
<h2>Modification d'une competition</h2>


<form action="{{ route("competition.update",$competition->id) }}" method="POST">
    @csrf
    @method("put")
    <div class="mb-3">
        <label for="" class="form-label">id</label>
        <input type="text" class="form-control"  name="id" value="{{ $competition->id }}"/>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">titre</label>
        <input type="text" class="form-control"  name="titre" value="{{ $competition->titre }}"/>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">cahier de charge</label>
        <input type="text" class="form-control"  name="cahier_de_charge" value="{{ $competition->cahier_de_charge }}"/>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">date heure debut phase 1</label>
        <input type="text" class="form-control"  name="date_heure_debut_phase_1" value="{{ $competition->date_heure_debut_phase_1 }}"/>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">date heure fin phase 1</label>
        <input type="text" class="form-control"  name="date_heure_fin_phase_1" value="{{ $competition->date_heure_fin_phase_1 }}"/>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">date heure debut phase 2</label>
        <input type="text" class="form-control"  name="date_heure_debut_phase_2" value="{{ $competition->date_heure_debut_phase_2 }}"/>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">date heure fin phase 2</label>
        <input type="text" class="form-control"  name="date_heure_fin_phase_2" value="{{ $competition->date_heure_fin_phase_2 }}"/>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">date heure debut phase 3</label>
        <input type="text" class="form-control"  name="date_heure_debut_phase_3" value="{{ $competition->date_heure_debut_phase_3 }}"/>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">date heure fin phase 3</label>
        <input type="text" class="form-control"  name="date_heure_fin_phase_3" value="{{ $competition->date_heure_fin_phase_3 }}"/>
    </div>
    <div class="mb-3">
        <label for="timeout" class="form-label">Timeout</label>
        <input type="text" class="form-control" name="timeout" id="timeout" value="{{ $competition->timeout}}" >
    </div>
    <button type="submit" class="btn btn-success">Modifier</button>
</form>
@endsection