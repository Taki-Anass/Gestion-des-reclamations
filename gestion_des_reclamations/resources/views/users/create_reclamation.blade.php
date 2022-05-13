@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Ajouter reclamation</h2>
              
            <form class="form-card fc" action="{{route('store_reclamation')}}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <input type="hidden" class="form-control"  name="user_id"  value="{{Auth::user()->id}}"> 
                <input type="text" class="form-control" placeholder="Nom" name="name" required> <br>
                
                <label for="type" class=" col-form-label text-md-end">Type</label>
                <select class="form-select" name="type" required>
                    <option class="form-control" >remarque</option>
                    <option class="form-control" >demande d'intervention</option>
                    <option class="form-control" >excalation</option>
                </select>

                <label for="etat" class="text-bold col-form-label text-md-end">Etat</label>
                <select class="form-select" name="etat" required>
                    <option class="form-control" >nouvelle</option>
                    <option class="form-control" >prise en charge</option>
                    <option class="form-control" >en cours</option>
                    <option class="form-control" >realisee</option>
                    <option class="form-control" >refusee</option>
                    <option class="form-control" >en attente</option>
                </select>

                <label for="description" class="text-bold col-form-label text-md-end">Description</label>
                <textarea class="form-control my-3" placeholder="description" maxlength="1000" name="description" required></textarea>

                <label for="image" class="text-bold col-form-label text-md-end">Image</label>              
                <input type="file" class="form-control" accept="image/*" name="image" > 
               <br>
                    <button class="btn btn-info" type="submit" value="save">créer</button>
                    <a class="btn btn-secondary" href="{{route('gestion_reclamation')}}">Annuler</a>
            </form> 
        </div>
    </div>
</div>
@endsection
