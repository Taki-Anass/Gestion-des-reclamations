@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Rapport de Statistique</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    
                    <div class="row">
                        <div class="col-4"> Nombre total de réclamations pour ce mois: <br><strong> {{ $nombre_total_des_réclamations}}</strong></div>
                        <div class="col-4"> Nombre des réclamations traitées pour ce mois : <br><strong>{{ $Nombre_des_réclamations_traitées}}</strong></div>
                        <div class="col-4"> Nombre des réclamations rejetées pour ce mois: <br><strong>{{ $Nombre_des_réclamations_rejetées}}</strong></div>
                    </div>
                </div>
            </div>
            <div>
                <a class="btn my-3 btn-success " href="{{route('liste_utilisateur')}}">Liste des utilisateurs</a>
                <a class="btn my-3 btn-success " href="{{route('liste_reclamations')}}">Liste des reclamations</a>
            </div>
        </div>
    </div>
</div>
@endsection