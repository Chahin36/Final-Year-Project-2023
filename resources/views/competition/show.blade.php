@extends('adminlte::page')

@section('content')
<br>
<script src="{{ asset("js/Chart.min.js") }}"></script>
<script src="{{ asset("js/jquery.min.js") }}"></script>
<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title" style="font-size: 28px; font-weight: bold; color: #333;">Détails</h3>
        @if (auth()->check() && auth()->user()->is_admin)

        <div class="card-tools">
            <a href="{{ route("competition.create") }}" class="btn btn-primary">Ajouter une compétition</a>
        </div>
        @endif
    </div>
    <div class="card-body">
        <div class="mb-3">
            <label for="id" class="form-label">Numéro</label>
            <input type="text" class="form-control" name="id" id="id" value="{{ $competition->id }}" readonly>
        </div>
        <div class="mb-3">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" class="form-control" name="titre" id="titre" value="{{ $competition->titre }}" readonly>
        </div>
        <div class="mb-3">
            <label for="cahier_de_charge" class="form-label">Cahier de charge</label>
            <textarea class="form-control" name="cahier_de_charge" id="cahier_de_charge" rows="5" readonly>{{ $competition->cahier_de_charge }}</textarea>
        </div>
        <div class="mb-3">
          <label for="timeout" class="form-label">Timeout</label>
          <input type="text" class="form-control" name="timeout" id="timeout" value="{{ $competition->timeout}}" readonly>
      </div>
    </div>
    <br>
    
</div>
<div style="display: flex; justify-content: flex-end;">
  @if (auth()->check() && auth()->user()->is_admin)
  <a href="{{ route('competition.edit', $competition->id) }}" class="btn btn-success icon-edit" style="margin-right: 10px;">Modifier</a>
      
      <form action="{{ route('competition.destroy', $competition->id) }}" method="POST" style="display: inline;">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger" style="margin-right: 10px;">Supprimer</button>
      </form>
  @endif
</div>

<h1>
  @php
      $status = $competition->status();
  @endphp

  @if ($status === "En attente inscription")
      <span style="color: blue;">En attente inscription</span>
  @elseif ($status === "Inscription")
      <span style="color: green;">Inscription</span>
  @elseif ($status === "En attente configuration")
      <span style="color: blue;">En attente configuration</span>
  @elseif ($status === "Configuration")
      <span style="color: orange;">Configuration</span>
  @elseif ($status === "En attente attaque")
      <span style="color: blue;">En attente attaque</span>
  @elseif ($status === "Attaque")
      <span style="color: red;">Attaque</span>
  @elseif ($status === "Terminé")
      <span style="color: gray;">Terminé</span>
  @else
      {{ $status }}
  @endif
</h1>


<h1>Timeline</h1>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="timeline">
          <div class="time-label">
            <span class="bg-red">{{ $competition->date_heure_debut_phase_1 }} - {{ $competition->date_heure_fin_phase_1 }}</span>
          </div>
          <div>
            <i class="fas fa-user-plus bg-blue"></i>
            <div class="timeline-item">
              <h3 class="timeline-header">Phase d'inscription</h3>
              <div class="timeline-body">
                <p>Cette phase permet aux participants de s'inscrire à la compétition.</p>
              </div>
            </div>
          </div>
          <div class="time-label">
            <span class="bg-yellow">{{ $competition->date_heure_debut_phase_2 }} - {{ $competition->date_heure_fin_phase_2 }}</span>
          </div>
          <div>
            <i class="fas fa-cog bg-green"></i>
            <div class="timeline-item">
              <h3 class="timeline-header">Préparation de l'environnement de travail</h3>
              <div class="timeline-body">
                <p>Cette phase marque le démarrage de la machine, le changement de l'adresse IP, l'ajout d'un utilisateur et l'attribution d'un mot de passe, et l'envoi de l'adresse IP et des informations de connexion aux compétiteurs.</p>
              </div>
            </div>
          </div>
          <div class="time-label">
            <span class="bg-purple">{{ $competition->date_heure_debut_phase_3 }} - {{ $competition->date_heure_fin_phase_3 }}</span>
          </div>
          <div>
          <i class="fas fa-flag bg-orange"></i>

            <div class="timeline-item">
              <h3 class="timeline-header">Début de la compétition</h3>
              <div class="timeline-body">
                <p>Cette phase marque le début de la compétition, avec l'envoi de l'adresse IP de la machine de l'adversaire, et les deux compétiteurs qui vont essayer d'attaquer la machine de l'équipe adverse.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>








   
  
<div style="display: flex; justify-content: space-between;">
  <div style="width: 45%;">
    <h1>Equipe A</h1>
    <table style="border-collapse: collapse; width: 100%;">
    <thead style="background-color: #f2f2f2;">
      <tr>
        <th style="border: 1px solid #ddd; padding: 8px;">Nom compétiteur</th>
        <th style="border: 1px solid #ddd; padding: 8px;">Status</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($equipeA as $demande)
      <tr>
        <td style="border: 1px solid #ddd; padding: 8px;">{{ $demande->User->name }}</td>
        
        <td id="status-{{ $demande->id }}" style="border: 1px solid #ddd; padding: 8px;">
          @if ($demande->status > 0)
            @if ($demande->status == 1)
              <span class="badge badge-success">Confirmé</span>
            @else
              <span class="badge badge-danger">Refusé</span>
            @endif
          @else
          @if (auth()->check() && auth()->user()->is_admin)
            <form action="{{ route('demande.approve', $demande->id) }}" method="POST" style="display: inline;">
              @csrf
              <button type="submit">✔️</button>
          </form>
          
          <form action="{{ route('demande.reject', $demande->id) }}" method="POST" style="display: inline;">
              @csrf
              <button type="submit">❌</button>
          </form>
            @else
              <span class="badge badge-info">En attente...</span>
            @endif
          @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
<canvas id="équipeA" width="800" height="300"></canvas>
  
</div>
<br>
<div style="width: 45%;">
  <h1>Equipe B</h1>
  <table style="border-collapse: collapse; width: 100%;">
    <thead style="background-color: #f2f2f2;">
      <tr>
        <th style="border: 1px solid #ddd; padding: 8px;">Nom du compétiteur</th>
        <th style="border: 1px solid #ddd; padding: 8px;">Status</th>
      </tr>
    </thead>
    <tbody>
      @if (true)
      @foreach ($equipeB as $demande)
      <tr>
        <td style="border: 1px solid #ddd; padding: 8px;">{{ $demande->User->name }}</td>
        
        <td style="border: 1px solid #ddd; padding: 8px;">
          @if ($demande->status>0)
            @if ($demande->status==1)
              <span class="badge badge-success">Confirmé</span>
            @else
              <span class="badge badge-danger">Refusé</span>
            @endif
          @else
          @if (auth()->check() && auth()->user()->is_admin)
          <form action="{{ route('demande.approve', $demande->id) }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit">✔️</button>
        </form>
        
        <form action="{{ route('demande.reject', $demande->id) }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit">❌</button>
        </form>
            @else
              <span class="badge badge-info">En attente...</span>
            @endif
          @endif
       
      @endforeach
      @endif
    </tbody>
  </table>
<canvas id="équipeB" width="800" height="300"></canvas>

</div>

</div>







<br>
<br>  
@if (now() < $competition->date_heure_fin_phase_1 && now () > $competition->date_heure_debut_phase_1 )
    @if (!Auth::check())
        <a href="{{ route('login') }}" class="btn btn-primary">S'inscrire</a>
    @elseif (!auth()->user()->is_admin)
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#registerModal">S'inscrire</a>
    @endif
@endif

    <!-- Register Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">Inscription à la compétition</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Veuillez choisir l'équipe à laquelle vous souhaitez vous inscrire :</p>
                        @csrf
                        <div class="form-group">
                        <div class="form-group">
    <div class="form-check">
        <input class="form-check-input" type="radio" name="equipe" id="equipeA" value="A">
        <label class="form-check-label" for="equipeA">
            Équipe A
        </label>
    </div>
    
</div>

<div class="form-group">
    <div class="form-check">
        <input class="form-check-input" type="radio" name="equipe" id="equipeB" value="B">
        <label class="form-check-label" for="equipeB">
            Équipe B
        </label>
    </div>
</div>

<button type="submit" class="btn btn-primary" onclick="event.preventDefault(); register()">S'inscrire</button>


<script>
  function register() {
      // Retrieve the selected team
      const selectedTeam = document.querySelector('input[name="equipe"]:checked');
      if (!selectedTeam) {
    alert("Veuillez choisir une équipe.");
    return;
  }

      // Create a hidden form to send the POST request
      const form = document.createElement('form');
      form.method = 'POST';
      form.action = '{{ route('demande.register') }}'; // Replace with the actual route name for the register method

      // Add CSRF token input field
      const csrfTokenInput = document.createElement('input');
      csrfTokenInput.type = 'hidden';
      csrfTokenInput.name = '_token';
      csrfTokenInput.value = '{{ csrf_token() }}'; // Retrieve the CSRF token

      // Add selected team input field
      const selectedTeamInput = document.createElement('input');
      selectedTeamInput.type = 'hidden';
      selectedTeamInput.name = 'equipe';
      selectedTeamInput.value = selectedTeam ? selectedTeam.value : '';

      // Append inputs to the form
      form.appendChild(csrfTokenInput);
      form.appendChild(selectedTeamInput);

      // Append the form to the document body and submit it
      document.body.appendChild(form);
      form.submit();
      function showConfirmation() {
    alert("Inscription réussie ! Merci d'avoir participé à la compétition.");
  }

  function showAlreadyRegistered() {
    alert("Vous êtes déjà inscrit à la compétition.");
  }

  // Check if the user is logged in or the demande status is 0
  if ({{ Auth::check() }} &&  {
    showAlreadyRegistered();
} else {
    showConfirmation();
}




  }

   
 
</script>
                        


<script>

  $(function () {
      'use strict';
    
      var ticksStyle = {
          fontColor: '#495057',
          fontStyle: 'bold'
      };
    
      var mode = 'index';
      var intersect = true;
    
      var $courbeA = $('#équipeA');
      // eslint-disable-next-line no-unused-vars
      var courbeA = new Chart($courbeA, {
          type: 'line',
          data: {
              labels: [
                  @foreach ($cpuA as $value)
                  "{{ $value->created_at }}",
                  @endforeach
              ],
              datasets: [
                  {
                      label: 'CPU',
                      data: [
                          @foreach ($cpuA as $value)
                              {{ $value->valeur }},
                          @endforeach
                      ],
                      backgroundColor: 'transparent',
                      borderColor: '#007bff',
                      pointBorderColor: '#007bff',
                      pointBackgroundColor: '#007bff',
                      fill: false
                  },
                  {
                      label: 'RAM',
                      data: [
                          @foreach ($ramA as $value)
                              {{ $value->valeur }},
                          @endforeach
                      ],
                      backgroundColor: 'transparent',
                      borderColor: '#28a745',
                      pointBorderColor: '#28a745',
                      pointBackgroundColor: '#28a745',
                      fill: false
                  },
                  {
                      label: 'TRS',
                      data: [
                          @foreach ($trsA as $value)
                              {{ $value->valeur }},
                          @endforeach
                      ],
                      backgroundColor: 'transparent',
                      borderColor: '#dc3545',
                      pointBorderColor: '#dc3545',
                      pointBackgroundColor: '#dc3545',
                      fill: false
                  }
              ]
          },
          options: {
  
          } //end option
      });
  
      
      var $courbeB = $('#équipeB');
      // eslint-disable-next-line no-unused-vars
      var courbeB = new Chart($courbeB, {
          type: 'line',
          data: {
              labels: [
                  @foreach ($cpuB as $value)
                  "{{ $value->created_at }}",
                  @endforeach
              ],
              datasets: [
                  {
                      label: 'CPU',
                      data: [
                          @foreach ($cpuB as $value)
                              {{ $value->valeur }},
                          @endforeach
                      ],
                      backgroundColor: 'transparent',
                      borderColor: '#007bff',
                      pointBorderColor: '#007bff',
                      pointBackgroundColor: '#007bff',
                      fill: false
                  },
                  {
                      label: 'RAM',
                      data: [
                          @foreach ($ramB as $value)
                              {{ $value->valeur }},
                          @endforeach
                      ],
                      backgroundColor: 'transparent',
                      borderColor: '#28a745',
                      pointBorderColor: '#28a745',
                      pointBackgroundColor: '#28a745',
                      fill: false
                  },
                  {
                      label: 'TRS',
                      data: [
                          @foreach ($trsB as $value)
                              {{ $value->valeur }},
                          @endforeach
                      ],
                      backgroundColor: 'transparent',
                      borderColor: '#dc3545',
                      pointBorderColor: '#dc3545',
                      pointBackgroundColor: '#dc3545',
                      fill: false
                  }
              ]
          },
          options: {
  
          } //end option
      });
      
  });
  
  
  </script>            
        
        



@endsection