@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Solver la reclamation</h2>

            <p><strong>ID : </strong>{{$reclamation->id}}</p>
            <p><strong>Nom de reclamation : </strong>{{$reclamation->name}}</p>
            <p><strong>Type : </strong>{{$reclamation->type}}</p>
            <p><strong>Description : </strong>{{$reclamation->description}}</p>
            @if($reclamation->image)
            <label>Image :</label>
            <img src="<?php echo asset("images/reclamations/$reclamation->image") ?>" width="800px" />
            @endif

            <form class="form-card fc" action="{{route('reclamation_resolue',$reclamation->id)}}" method="POST">
                @csrf
                <label for="etat" class="text-bold col-form-label text-md-end">Etat</label>
                <select class="form-select" name="etat" required>
                    <option class="form-control" >traitée</option>
                    <option class="form-control" >en cours</option>
                    <option class="form-control" >en attente</option>
                </select>

                <label for="solution" class="text-bold col-form-label text-md-end">solution:</label>
                <textarea class="form-control my-3" rows="8" maxlength="1000" placeholder="Remarque" name="solution" required></textarea>

                <!-- <label for="solition_image" class="text-bold col-form-label text-md-end">Image:</label>
                <input type="file" class="form-control" accept="image/*" name="solution_image"> <br> -->

                <button class="btn btn-info" type="submit" value="save">envoyer</button>
                <a class="btn btn-secondary" href="{{route('reclamation_details',$reclamation->id)}}">Annuler</a>
            </form>

        </div>
    </div>
</div>
@endsection