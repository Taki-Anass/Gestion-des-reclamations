@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Modifier un Utilisateur</h2>
              
            <form class="form-card fc" action="{{route('update_utilisateur',$utilisateur->id)}}" method="POST">
                @csrf
               
                <label for="type" class=" col-form-label text-md-end">Nom</label>
                <input type="text" class="form-control" value="{{$utilisateur->name}}" name="name" > <br>
                @if ($errors->has('name'))
                    <div class="text-danger">{{ $errors->first('name') }}</div>
                @endif
                <label for="type" class=" col-form-label text-md-end">Email</label>
                <input type="text" class="form-control" value="{{$utilisateur->email}}" name="email" > <br>
                @if ($errors->has('email'))
                    <div class="text-danger">{{ $errors->first('email') }}</div>
                @endif
                <label for="type" class=" col-form-label text-md-end">password</label>
                <input type="password" class="form-control" placeholder="new password" name="password" required> <br>
                <label for="type" class=" col-form-label text-md-end">confirm password</label>
                <input type="password" class="form-control" placeholder="confirm new password" name="password_confirmation" required> <br>

                @if ($errors->has('password'))
                    <div class="text-danger">{{ $errors->first('password') }}</div>
                @endif
                    <button class="btn btn-info" type="submit" value="save">Modifier</button>
                    <a class="btn btn-secondary" href="{{route('liste_utilisateur')}}">Annuler</a>
            </form> 
        </div>
    </div>
</div>
@endsection
