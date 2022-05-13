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
                    welcome home Prestataire
                    {{ __('You are logged in!') }}
                </div>
            </div>
            <div>
                <a class="btn my-3 btn-success " href="{{route('prestataire_inbox')}}">Inbox</a>
            </div>
        </div>
    </div>
</div>
@endsection
