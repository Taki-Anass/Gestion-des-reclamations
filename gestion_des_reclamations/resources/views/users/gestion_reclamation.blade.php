@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        <div class="d-flex bd-highlight mb-3">
            <div class="me-auto p-2 bd-highlight"><h2>Reclamations</h2></div>
            <div class="p-2 bd-highlight">
                <a class="btn btn-secondary" href="{{route('create_reclamation')}}">Create</a>
            </div>
      </div>
         @if(Session::has('success'))
          <div class="alert alert-success">
            {{Session::get('success')}}
          </div>
         @endif  
      
         @if(Session::has('error'))
          <div class="alert alert-danger">
            {{Session::get('error')}}
          </div>
         @endif     
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nom </th>
              <th scope="col">Type</th>
              <th scope="col">Etat</th>
              <th scope="col">Description</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody id="mytable">
      
          @foreach($reclamations as $reclamation)
          <tr>
          <th scope="row" >{{$reclamation->id}}</th>
          <th scope="row" >{{$reclamation->name}}</th>
          <th scope="row" >{{$reclamation->type}}</th>
          <th scope="row" >{{$reclamation->etat}}</th>
          <th scope="row" >{{$reclamation->description}}</th>
          <th scope="row" >
            @if(Auth::user()->id==$reclamation->user_id)
              <!-- <a class="btn btn-light" href="">Show</a> -->
              <a class="btn btn-success" href="{{route('edit_reclamation',$reclamation->id)}}">Edit</a>
              <a class="btn btn-danger" href="{{route('delete_reclamation',$reclamation->id)}}">Delete</a>
            @endif
            <a class="btn btn-light" href="{{route('show_reclamation',$reclamation->id)}}">Show</a>
          </th>
          </tr>
          @endforeach
     
            </tbody>
        </table>
    </div>
</div>
@endsection
