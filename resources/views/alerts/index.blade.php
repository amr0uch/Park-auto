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
      <th scope="col">L'opération</th>
      <th scope="col" >Action</th>

    </tr>
  </thead>
 
  <tbody>
    
    <h3><b><span>Opération</span></b></h3>
    
    <br>
  @foreach($alerts as $alert)
  <tr>
    
      <th scope="row">#</th>
      <td>{{$alert->label}}</td>
   @can('can-edit-operation')
      <td><a class="btn btn-success" href="{{ route('alerts.edit',$alert->id) }}">Editer</a></td>
      @endcan
      @can('can-delete-operation')
      <td>
      <form action="{{ route('alerts.destroy', $alert->id)}}" method="post">
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