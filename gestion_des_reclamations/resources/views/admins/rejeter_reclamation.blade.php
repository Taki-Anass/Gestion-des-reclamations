@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>refuser la solution</h2>
            <p><strong>Nom de reclamation : </strong>{{$reclamation->name}}</p>
            <p><strong>Type : </strong>{{$reclamation->type}}</p>
            <p><strong>Etat : </strong>{{$reclamation->etat}}</p>
            <p><strong>Description : </strong>{{$reclamation->description}}</p>
            @if($reclamation->image) file:
            <img src="<?php echo asset("images/reclamations/$reclamation->image") ?>" width="800px" />
            @endif
            <hr>
     
            <form class="form-card fc" method="POST" action="{{route('refuse_reclamation',$reclamation->id)}}"  >
                @csrf

                <label for="raison_du_refus" class="text-bold col-form-label text-md-end"><strong>raison du refus:</strong></label>
                <textarea class="form-control my-3" placeholder="raison du refus" maxlength="1000" name="raison_du_refus" required></textarea>

                <br>
                <button class="btn btn-info" type="submit" value="save">send</button>
                <a class="btn btn-secondary" href="{{route('admin_show_reclamation',$reclamation->id)}}">back</a>
            </form>
        </div>
    </div>
</div>
@endsection