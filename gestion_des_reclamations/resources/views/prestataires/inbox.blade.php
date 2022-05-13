@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="d-flex bd-highlight mb-3">
        <div class="me-auto p-2 bd-highlight">
          <h2>Liste des Reclamations</h2>
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
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody id="mytable">

            @foreach($reclamations as $reclamation)
            <tr>
              <th scope="row">{{$reclamation->id}}</th>
              <th scope="row">{{$reclamation->name}}</th>
              <th scope="row">{{$reclamation->type}}</th>
              <th scope="row">{{$reclamation->etat}}</th>
              <th scope="row">
                <a class="btn btn-light" href="{{route('reclamation_details',$reclamation->id)}}">more details</a>
              </th>
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>
    @endsection