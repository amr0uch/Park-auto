@extends('layouts.app')

@section('styles')

@endsection

@section('content')
<div class="card">
  <div class="card-body">
<table class="table table-hover">
  <thead>
      
    <tr>
      <th scope="col">#</th>
      <th scope="col">statut</th>
     
      <th scope="col">Action</th>
      
   

    </tr>
  </thead>
 
  <tbody>
    <br>
    <h3><b>Status du voiture</b></h3>
    <br>
    <br>
  @foreach($statuses as $status)
  <tr>
    
      <th scope="row">#</th>
      <td>{{$status->label}}</td>
      @can('can-edit-status')
      <td><a class="btn btn-success" href="{{ route('statuses.edit',$status->id) }}">Editer</a></td>
      @endcan
      @can('can-delete-status')
      <td>
      <form action="{{ route('statuses.destroy', $status->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit" onclick="return confirm('Etes-vous sûr de la suppression?');">Supprimer</button>
                </form></td>
                @endcan
     
      
    </tr>
    @endforeach
  </tbody>

</table>
  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    
    @endsection