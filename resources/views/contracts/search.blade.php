@extends('layouts.app')

@section('styles')

@endsection

@section('content')
<nav class="navbar navbar-light ">
  <a href="/" class="btn btn-primary" style="margin-left: 2%;" >Précedent</a>
  <form class="form-inline" action="{{ url('search') }}" type="get"  >
      
      <input class="form-control mr-sm-2" name="query" type="search" placeholder="Chercher" aria-label="Chercher Contracteur">
      <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Recherche</button>
  </form>
  </nav>
<table class="table table-striped">
  <thead>

    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom complet de Client</th>
      <th scope="col">Nom de l'employé </th>
      <th scope="col">Matriculation</th>
      <th scope="col">Debut de Contrat</th>
      <th scope="col">Fin de Contrat</th>
      <th scope="col">Prix par Jour</th>
      <th scope="col">Montant</th>
      <th scope="col">action</th>
      
    </tr>
  </thead>

  <tbody>
    <br>
   
    
 
  @foreach($contracts as $contract)
  <tr>

      <th scope="row">{{$contract->id}}</th>
      <td>{{$contract->clients->first_name}}
          {{$contract->clients->last_name}}
      </td>
      <td>{{$contract->users->name}}</td>
    <td  >

      {{$contract->car->registration}}
    </td>
      <td>{{$contract->debut_contract}}</td>
      <td>{{$contract->end_contract}}</td>
      <td>{{$contract->price_day}} DH</td>
      <td>{{$contract->amount}} DH</td>
      <td>
      <form action="{{ route('contracts.destroy', $contract->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Supprimer</button>
                </form></td>
      <td> <a  class="btn btn-warning" href="{{route('contracts.show',$contract->id)}}"> Contrat </a ></td>

      <td><a class="btn btn-primary" href="{{ route('contracts.edit',$contract->id) }}">Editer</a></td>
    </tr>
    @endforeach
  </tbody>

</table>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>


    @endsection
