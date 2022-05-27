@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h2>Edit Reclamation</h2>
        @if(Session::has('error'))
          <div class="alert alert-danger">
            {{Session::get('error')}}
          </div>
         @endif    
         @if(Session::has('delete-success'))
          <div class="alert alert-success">
            {{Session::get('delete-success')}}
          </div>
         @endif  
        <form class="form-card fc" action="{{route('update_reclamation',$reclamation->id)}}" method="POST" enctype="multipart/form-data">
                @csrf               
                <input type="hidden" class="form-control"  name="user_id"  value="{{Auth::user()->id}}"> 
                <input type="text" class="form-control" value="{{$reclamation->name}}" name="name" required> <br>

                
                <label for="type" class=" col-form-label text-md-end">Type</label>
                <select class="form-select"value="{{$reclamation->type}}" name="type" required>
                    <option class="form-control" >remarque</option>
                    <option class="form-control" >demande d'intervention</option>
                    <option class="form-control" >excalation</option>
                </select>

                <label for="etat" class="text-bold col-form-label text-md-end">Etat</label>
                <select class="form-select"value="{{$reclamation->etat}}" name="etat" required>
                    <option class="form-control" >nouvelle</option>
                    <option class="form-control" >prise en charge</option>
    
                </select>

                <label for="description" class="text-bold col-form-label text-md-end">Description</label>
                <textarea class="form-control my-3" maxlength="1000" name="description" required>{{$reclamation->description}}</textarea>

                <label for="image" class="text-bold col-form-label text-md-end">Image</label>              
                <input type="file" class="form-control" accept="image/*" name="image" > 
                    <button class="btn btn-info" type="submit" value="save">Modifier</button>
                    <a class="btn btn-secondary" href="{{route('gestion_reclamation')}}">Annuler</a>
            </form>
        </div>
    </div>
</div> 
@endsection