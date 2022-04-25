<?php
use App\User;
?>
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

@can('can-restore-user') 
<div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab"><span class="btn btn-outline-primary" >←</span></label>	
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"><span class="btn btn-outline-success"> ↻ </span></label>
@endcan
		<div class="login-form">
			<div class="sign-in-htm">
<div class="card">
<div class="card-body">	
	<h3> <b><span> Utilisateurs</span></b></h3>		
<table class="table table-hover">
  <thead>     
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom Complet</th>
      <th scope="col">Email</th>
      <th scope="col">Statut</th>
	 
      <th scope="col">Action</th>
	  
    </tr>
  </thead>
  <tbody>
    
  @foreach($users as $user)
  <tr>
      <th scope="row">#</th>
      <td>{{$user->name}}</td>   
      <td>{{$user->email}}</td>
      <td >@if ($user->status=true)
		  Disponible
	  @endif</td>
	  @can('can-edit-user')
	  <td><a class="btn btn-success" href="{{ route('users.edit',$user->id) }}">Editer</a></td>
	  @endcan
	  @can('can-delete-user')
	  <td>  
      <form action="{{ route('users.destroy', $user->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit" onclick="return confirm('Etes-vous sûr de la suppression?');">Supprimer</button>
                </form></td>  @endcan
    </tr>
 
    @endforeach
  </tbody>
</table>
</div>
</div>

</div>
<div class="sign-up-htm">
	@can('can-restore-user') 
	<div class="card">
		<div class="card-body">	
			<h3><b>Utilisateur Supprimer</b></h3>
  <table class="table table-striped">
    <thead>     
      <tr>
        <th scope="col">#</th>
		<th scope="col">Nom Complet</th>
		<th scope="col">Email</th>
		<th scope="col">Statut</th>
		<th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <br>
      
    @foreach($userss as $user)
         @if ($user->deleted_at !=null )
    <tr>
        <th scope="row">#</th>
        <td>{{$user->name}}</td>   
        <td>{{$user->email}}</td>
        <td >@if ($user->status == false)
			Indisponible
		@endif</td>
		@can('can-restore-user')
        <td>         
          <a href="{{ route('users.restore', $user->id) }}" class="btn btn-success" onclick="return confirm('voulez-vous vraiment restaurer cet utilisateur?');">restaurer</a>
        </td>  
		@endcan
	   </td>
	   @can('can-edit-user')     
        <td><a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Editer</a></td>
		@endcan
      </tr>
      @endif
      @endforeach
    </tbody>
  </table>
  @endcan
</div>
</div>


</div>  
</div>
	</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
  </script>  
    @endsection