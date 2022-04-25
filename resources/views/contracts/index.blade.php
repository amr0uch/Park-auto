@extends('layouts.app')

@section('styles')

@endsection

@section('content')
<style>
  

  .login-wrap{
    
  
  }
  .login-html{
    width:100%;
  
    
    padding:90px 70px 50px 70px;
    
  }
  .login-html .sign-in-htm,
  .login-html .sign-up-htm{
    top:0;
    left:0;
    right:0;
    bottom:0;
    position:absolute;
    transform:rotateY(180deg);
    backface-visibility:hidden;
    transition:all .4s linear;
  }
  .login-html .sign-in,
  .login-html .sign-up,
  .login-form .group .check{
    display:none;
  }
  .login-html .tab,
  .login-form .group .label,
  .login-form .group .button{
    text-transform:uppercase;
  }
  .login-html .tab{
    font-size:22px;
    margin-right:15px;
    padding-bottom:5px;
    margin:0 15px 10px 0;
    display:inline-block;
    border-bottom:2px solid transparent;
  }
  .login-html .sign-in:checked + .tab,
  .login-html .sign-up:checked + .tab{
    color:#fff;
    
  }
  .login-form{
    min-height:345px;
    position:relative;
    perspective:1000px;
    transform-style:preserve-3d;
  }
  .login-form .group{
    margin-bottom:15px;
  }
  .login-form .group .label,
  .login-form .group .input,
  .login-form .group .button{
    width:100%;
    color:#fff;
    display:block;
  }
  .login-form .group .input,
  .login-form .group .button{
    border:none;
    padding:15px 20px;
    border-radius:25px;
    background:rgba(255,255,255,.1);
  }
  .login-form .group input[data-type="password"]{
    text-security:circle;
    -webkit-text-security:circle;
  }
  .login-form .group .label{
    color:#aaa;
    font-size:12px;
  }
  
  .login-form .group label .icon{
    width:15px;
    height:15px;
    border-radius:2px;
    position:relative;
    display:inline-block;
    background:rgba(255,255,255,.1);
  }
  .login-form .group label .icon:before,
  .login-form .group label .icon:after{
    content:'';
    width:10px;
    height:2px;
    background:#fff;
    position:absolute;
    transition:all .2s ease-in-out 0s;
  }
  .login-form .group label .icon:before{
    left:3px;
    width:5px;
    bottom:6px;
    transform:scale(0) rotate(0);
  }
  .login-form .group label .icon:after{
    top:6px;
    right:0;
    transform:scale(0) rotate(0);
  }
  .login-form .group .check:checked + label{
    color:#fff;
  }
  
  .login-form .group .check:checked + label .icon:before{
    transform:scale(1) rotate(45deg);
  }
  .login-form .group .check:checked + label .icon:after{
    transform:scale(1) rotate(-45deg);
  }
  .login-html .sign-in:checked + .tab + .sign-up + .tab + .login-form .sign-in-htm{
    transform:rotate(0);
  }
  .login-html .sign-up:checked + .tab + .login-form .sign-up-htm{
    transform:rotate(0);
  }
  
  .hr{
    height:2px;
    margin:60px 0 50px 0;
    background:rgba(255,255,255,.2);
  }
  .foot-lnk{
    text-align:center;
  }
  </style>
@can('can-restore-contract') 
<div class="login-wrap">
  <div class="login-html">  
    
    <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab"><span class="btn btn-outline-primary" >←</span></label> 
    <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"><span class="btn btn-outline-success"> ↻ </span></label>
 @endcan
    <div class="login-form">
      <div class="sign-in-htm">

  <div class="card">
    <div class="card-body"> 
      <h3>Contrats</h3>
<table class="table table-hover">
  <thead>

    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom complet de Client</th>
      <th scope="col">Nom de l'employé </th>
      <th scope="col">Matriculation</th>
      <th scope="col">Debut de Contrat</th>
      <th scope="col">Fin de Contrat</th>
      <th scope="col">Montant</th>
      <th scope="col">action</th>
      
    </tr>
  </thead>

  <tbody>
    <br>
  
 
  @foreach($contracts as $contract)
  <tr>

      <th scope="row">~</th>
      <td>{{$contract->clients->first_name}}
          {{$contract->clients->last_name}}
      </td>
      <td>{{$contract->users->name}}</td>
    <td  >

      {{$contract->car->registration}}
    </td>
      <td>{{$contract->debut_contract}}</td>
      <td>{{$contract->end_contract}}</td>
      {{-- <td>{{$contract->price_day}} DH</td> --}}
      <td>{{$contract->amount}} DH</td>
      @can('can-edit-contract')
      <td><a class="btn btn-success" href="{{ route('contracts.edit',$contract->id) }}">Editer</a></td>
      @endcan
      @can('can-show-contract')
      <td> <a  class="btn btn-primary" href="{{route('contracts.show',$contract->id)}}"> Contrat </a ></td>
        @endcan
      @can('can-delete-contract')
      <td>
      <form action="{{ route('contracts.destroy', $contract->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger"  type="submit" onclick="return confirm('Etes-vous sûr de la suppression?');">Supprimer</button>
                </form></td>
                @endcan
      

      
    </tr>
    @endforeach
  </tbody>

</table>
    </div>
  </div>
</div>  
<div class="sign-up-htm">
  @can('can-restore-contract') 
  <div class="card">
    <div class="card-body"> 
      <h3>Contrats Supprimer</h3>
  <table class="table table-hover">
    <thead>

      <tr>
        <th scope="col">#</th>
        <th scope="col">Nom complet de Client</th>
        <th scope="col">Nom de l'employé </th>
        <th scope="col">Matriculation</th>
        <th scope="col">Debut de Contrat</th>
        <th scope="col">Fin de Contrat</th>
        <th scope="col">Montant</th>
        <th scope="col">action</th>
        
      </tr>
    </thead> 
    <tbody>
      <br>

    @foreach($contractss as $contract)
        @if ($contract->deleted_at !=null )
    <tr>
  
        <th scope="row">~</th>
        <td>{{$contract->clients->first_name}}
            {{$contract->clients->last_name}}
        </td>
        <td>{{$contract->users->name}}</td>
      <td  >
  
        {{$contract->car->registration}}
      </td>
        <td>{{$contract->debut_contract}}</td>
        <td>{{$contract->end_contract}}</td>
        {{-- <td>{{$contract->price_day}} DH</td> --}}
        <td>{{$contract->amount}} DH</td>
        <td>
          @can('can-restore-contract')
          <td>
  
            <a style="margin-left: -76%" href="{{ route('contracts.restore', $contract->id) }}" class="btn btn-success">restaurer</a>
          </td>   
          @endcan
    
  
        {{-- <td><a class="btn btn-primary" href="{{ route('contracts.edit',$contract->id) }}">Editer</a></td> --}}
      </tr>
      @endif
      @endforeach
    </tbody>
  </div>

  </table>
  @endcan
  </div>
</div>

</div>
</div>  
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>


    @endsection
