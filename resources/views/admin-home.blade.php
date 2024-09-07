@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            <button type="button" class="btn btn-primary btn-block btn-lg" data-toggle="collapse" data-target="#home">
                <i class="fa fa-home"></i> Accueil
            </button>
        </div>
        <div class="col-md-4">
            <button type="button" class="btn btn-success btn-block btn-lg" data-toggle="collapse" data-target="#about-us">
                <i class="fa fa-info-circle"></i> À propos de nous
            </button>
        </div>
        <div class="col-md-4">
            <button type="button" class="btn btn-warning btn-block btn-lg" data-toggle="collapse" data-target="#contact-us">
                <i class="fa fa-envelope"></i> Nous contacter
            </button>
        </div>
    </div>
    <hr>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h2 style="color: #3700ff;">Défiez vos compétences en sécurité informatique</h2>
        </div>

        <div id="home" class="collapse show">
            <div class="card-body">
                <p>Sur notre site, nous proposons une variété de compétitions de cyber sécurité pour vous permettre de tester vos compétences et de vous mesurer à d'autres passionnés du domaine. Que vous soyez un professionnel de la sécurité informatique chevronné ou un étudiant débutant, vous trouverez ici des défis adaptés à votre niveau et à vos intérêts. Ne manquez pas cette opportunité de mettre en pratique vos connaissances et de vous améliorer dans un environnement stimulant et compétitif.</p>
            </div>
        </div>

        <div id="about-us" class="collapse">
            <hr>
            <div class="card-body">
                <h2 style="color: #33cc33;">À propos de nous</h2>
                <p>Nous sommes un groupe d'étudiants en cyber sécurité passionnés qui avons créé des compétitions pour promouvoir et renforcer les compétences en matière de sécurité informatique. Nous sommes fiers de toujours offrir des expériences stimulantes et enrichissantes aux participants et de contribuer à la sensibilisation à la sécurité informatique.</p>
            </div>
        </div>

        <div id="contact-us" class="collapse">
            <hr>
            <div class="card-body">
                <h2 style="color: #ffcc00;">Nous contacter</h2>
                <p>Nous sommes toujours heureux d'échanger avec nos utilisateurs et de répondre à vos questions sur la sécurité informatique et nos compétitions. Vous pouvez nous contacter de différentes manières :</p>
                <ul>
                    <li>Par e-mail à l'adresse suivante : chahingam292@gmail.com</li>
                    <li>Sur notre page Facebook : <a href="https://www.facebook.com/chahin.gam.3/" style="color: #0066cc;">https://www.facebook.com/chahin.gam.3/</a></li>
                    <li>Par téléphone au numéro suivant : 25140083</li>
                </ul>
                <p>N'hésitez pas à nous contacter si vous avez des questions, des commentaires ou des suggestions. Nous sommes là pour vous aider à améliorer vos compétences en sécurité informatique et à vous offrir les meilleures expériences de compétition possibles.</p>
            </div>
        </div>
    </div>
@stop
