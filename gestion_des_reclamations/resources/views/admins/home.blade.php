@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    welcome home Admin
                    {{ __('You are logged in!') }}
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
