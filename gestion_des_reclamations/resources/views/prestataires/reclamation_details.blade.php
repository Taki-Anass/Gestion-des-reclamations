@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2> Show Reclamation numero {{$reclamation->id}}:</h2>
            <p><strong>Nom de reclamation : </strong>{{$reclamation->name}}</p>
            <p><strong>Type : </strong>{{$reclamation->type}}</p>
            <p><strong>Etat : </strong>{{$reclamation->etat}}</p>
            <p><strong>Description : </strong>{{$reclamation->description}}</p>
            @if($reclamation->image)
            image:
            <img src="<?php echo asset("images/reclamations/$reclamation->image") ?>" width="800px" />
            @endif
            <a class="btn btn-secondary" href="{{route('prestataire_inbox')}}">retourner</a>
            <a class="btn btn-success" href="{{route('prestataire_solution',$reclamation->id)}}">reponder</a>
        </div>
    </div>
    @endsection