@extends('layouts.app')

@section('styles')

@endsection

@section('content')

        <div class="card">
            <div class="card-body">
                <h3 class="card-titl">Les Roles </h3>               
<table class="table table-hover">
  <thead>
      
    <tr>
      <th scope="col">#</th>
      <th scope="col">Role</th>
      <th scope="col" >Action</th>

    </tr>
  </thead>
 
  <tbody>
   
    <br>
  @foreach($groups as $group)
  <tr>
    
      <th scope="row">#</th>
      <td>{{$group->name}}</td>
      @can('can-edit-role')
      <td><a class="btn btn-success" href="{{ route('role.edit',$group->id) }}">Editer</a></td>
      @endcan
      @can('can-delete-role')
      <td>
      <form action="{{ route('role.delete', $group->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit" onclick="return confirm('Etes-vous sûr de la suppression?');">Supprimer</button>
                </form>
            </td>
            @endcan
    </tr>
    @endforeach
  </tbody>

</table>
            </div>
        </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    @endsection