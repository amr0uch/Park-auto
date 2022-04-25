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
      <th scope="col">Nom Document</th>
      <th scope="col" >Action</th>

    </tr>
  </thead>
 
  <tbody>
    
    <h3><b> Documents</b></h3>
    <br>
  @foreach($documents as $document)
  <tr>
    
      <th scope="row">#</th>
      <td>{{$document->label}}</td>
@can('can-edit-document')
    <td><a class="btn btn-success" href="{{ route('documents.edit',$document->id) }}">Editer</a></td>
    @endcan
    @can('can-delete-document')
      <td>
      <form action="{{ route('documents.destroy', $document->id)}}" method="post">
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