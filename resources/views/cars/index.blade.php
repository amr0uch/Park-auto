
@extends('layouts.app')

@section('styles')

@endsection

@section('content')

@if (session('status'))
    <div class="alert alert-warning alert-dismissible fade show" >
        {{ session('status') }}
    </div>
@endif

<div class="card">
  <div class="card-body">
    
    <h3 class="card-titl"><b> Voitures </b></h3>
<table class="table table-hover">
  <thead>

    <tr>
      {{-- <th scope="col">#</th> --}}
      <th scope="col">Photo</th>
      <th scope="col">Immatriculation</th>
      <th scope="col">Marque</th>
      <th scope="col">Carburant  </th>
      <th scope="col">Couleur</th>
      <th scope="col">Nombre de Porte</th>
      <th scope="col">Nombre de Passager</th>
      <th scope="col">Prix </th>
      <th scope="col"> Statut</th>
        {{-- <th scope="col">Date</th> --}}
        
      <th scope="col" style="text-align: center;">Action</th>
      
    </tr>
  </thead>

  <tbody>
    
    <br>
  @foreach($cars as $car)
  <tr>

      {{-- <th scope="row">{{$car->id}}</th> --}}
      <td>
        <img class="img-fluid " src="{{URL::to('images/'.$car->file)}}" alt="{{$car->model}}" >
        </td>
      <td>{{$car->registration}}</td>
      <td>{{$car->model}}</td>
      <td>{{$car->fuel}}</td>
      <td>{{$car->color}}</td>
      <td>{{$car->doors_num}}</td>
      <td>{{$car->passengers_num}}</td>
      <td>{{$car->price_day}} DH</td>
      <td>
      {{$car->statuses->label}}
      </td>
      {{-- <td>
         @foreach(\App\CarAlert::where('id_car', $car->id)->get() as $item)
             {{$item->date}}
          @endforeach
      </td> --}}
      
      @can('can-edit-car')
      <td><a class="btn btn-success" href="{{ route('cars.edit',$car->id) }}">Editer</a></td>
      @endcan
      @can('can-show-car-operation')
      <td><a class="btn btn-primary" href="{{ route('cars.show',$car->id) }}">Opération</a></td>
     @endcan
     @can('can-delete-car')
      <td>
      <form action="{{ route('cars.destroy', $car->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit"  onclick="return confirm('Etes-vous sûr de la suppression?');" >Supprimer</button>
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

    
    