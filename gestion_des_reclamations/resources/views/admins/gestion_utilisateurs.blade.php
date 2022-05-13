@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        <div class="d-flex bd-highlight mb-3">
            <div class="me-auto p-2 bd-highlight"><h2>Utilisateurs</h2></div>
            <div class="p-2 bd-highlight">
                <a class="btn btn-secondary" href="{{route('create_utilisateur')}}">Create</a>
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
              <th scope="col">email</th>
              <th scope="col">created at</th>
              <th scope="col">updaetd at</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody id="mytable">
      
          @foreach($utilisateurs as $utilisateur)
          <tr>
          <th scope="row" >{{$utilisateur->id}}</th>
          <th scope="row" >{{$utilisateur->name}}</th>
          <th scope="row" >{{$utilisateur->email}}</th>
          <th scope="row" >{{$utilisateur->created_at}}</th>
          <th scope="row" >{{$utilisateur->updated_at}}</th>
          <th scope="row" >
              <!-- <a class="btn btn-light" href="">Show</a> -->
              <a class="btn btn-success" href="{{route('edit_utilisateur',$utilisateur->id)}}">Edit</a>
              <a class="btn btn-danger"  href="{{route('delete_utilisateur',$utilisateur->id)}}">Delete</a>
              
          </th>
          </tr>
          @endforeach
     
            </tbody>
        </table>
    </div>
</div>
@endsection
