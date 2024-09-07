@extends('adminlte::page')

@section('content_header')
    <div class="row">
        <div class="col-md-4">
            <button class="btn btn-primary btn-lg btn-block shadow" type="button" data-toggle="collapse" data-target="#competitions" aria-expanded="true" aria-controls="competitions"><i class="fa fa-trophy"></i> Compétitions en cours</button>
        </div>
        <div class="col-md-4">
            <button class="btn btn-success btn-lg btn-block shadow fa fa-user" type="button" data-toggle="collapse" data-target="#inscription" aria-expanded="false" aria-controls="inscription"><i class="fa fa-pencil"></i> Inscription aux compétitions</button>
        </div>
        <div class="col-md-4">
            <button class="btn btn-warning btn-lg btn-block shadow" type="button" data-toggle="collapse" data-target="#historique" aria-expanded="false" aria-controls="historique"><i class="fa fa-history"></i> Historique de compétitions</button>
        </div>
    </div>
@stop

@section('content')
    <div id="competitions" class="collapse show">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title"><i class="fa fa-trophy"></i> Liste des compétitions en cours</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Numéro</th>
                            <th>Titre</th>
                            <th>Action</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            <tr>
                            <td>{{ $competitions[0]->id }}</td>
                            <td>{{ $competitions[0]->titre }}</td>
                                <td>
                                    <form action="{{ route("competition.show",$competitions[0]->id) }}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> Afficher</button>
                                    </form>
                                </td>
                                <td></td>
                            </tr>
                        
                    </tbody>
                   
                        
                </table>
            </div>
        </div>
    </div>

    <div id="inscription" class="collapse">
        <div class="card card-success card-outline ">
            <div class="card-header">
                <h3 class="card-title"><i class="fa fa-pencil fa fa-user"></i> Inscription</h3>
            </div>
            <div class="card-body">
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Numéro</th>
                            <th>Titre</th>
                            <th>Action</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($competitions as $competition)
                            <tr>
                                <td>{{ $competition->id }}</td>
                                <td>{{ $competition->titre }}</td>
                                <td>
                                    <form action="{{ route("competition.show",$competition->id) }}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> Afficher</button>
                                    </form>
                                </td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="historique" class="collapse">
        <div class="card card-warning card-outline">
          <div class="card-header">
            <h3 class="card-title"><i class="fa fa-history"></i> Historique</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12">
                <h4 style="color: #d3d00f;">Challenge de sécurité informatique</h4>
                <p>
                  Cette compétition était axée sur la résolution de problèmes de sécurité informatique tels que l'analyse de logiciels malveillants, la recherche de vulnérabilités dans des applications Web et la résolution de défis de cryptographie. Les participants ont été mis au défi de résoudre des problèmes complexes dans un environnement de simulation sûr et contrôlé.
                </p>
                <p style="color: #888;">Date : 12 février 2021</p>
                <p style="color: #888;">L'équipe gagnante : Équipe A</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-12">
                <h4 style="color: #d3d00f;">Capture du drapeau (CTF) en sécurité informatique</h4>
                <p>
                  Cette compétition consistait à capturer des "drapeaux" en résolvant des défis de sécurité informatique dans différentes catégories telles que la stéganographie, la cryptographie et la recherche de vulnérabilités. Les participants ont dû utiliser leurs compétences en résolution de problèmes et leur connaissance de la sécurité informatique pour capturer les drapeaux le plus rapidement possible.
                </p>
                <p style="color: #5e5e5e;">Date : 10 avril 2022</p>
                <p style="color: #5e5e5e;">L'équipe gagnante : Équipe B</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      




@stop
