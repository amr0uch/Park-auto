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
      <th scope="col">Model de Voiture</th>
      <th scope="col">Matriculation de Voiture</th>     
      <th scope="col">Opération</th>
      <th scope="col">Date d'opération  </th>
      <th scope="col">Kilométrage</th>
      <th scope="col">Action</th>
  
      
    </tr>
  </thead>
 
  <tbody>
    
    <h3><b>Entretiens</b></h3>
    
    <br>
  @foreach($entretiens as $entretien)
  <tr>
    
      <th scope="row">#</th>
      <td>{{$entretien->cars->model}}</td>
      <td>{{$entretien->cars->registration}}</td>
      
      <td>{{$entretien->alerts->label}}</td>
      <td>{{$entretien->date}}</td>
      <td>{{$entretien->km}} KM</td>
            
      
@can('can-edit-entretien')
      <td><a class="btn btn-success" href="{{ route('entretiens.edit',$entretien->id) }}">Editer</a></td>   
      @endcan          
      @can('can-delete-entretien') 
      <td>
      <form action="{{ route('entretiens.destroy', $entretien->id)}}" method="post">
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