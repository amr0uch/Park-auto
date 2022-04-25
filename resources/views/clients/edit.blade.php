@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<div class="row mt-5">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-body">
                <h3 class="card-titl">Editer le client </h3>
                <hr>
                
                    <form action="{{route('clients.update',$clients->id)}}" method="post" enctype="multipart/form-data">  
                    @csrf  
                    @method('PUT')    
                               
                        <div class="form-group">
                            <label for="first_name"><b> Prenom*</b></label>
                            <input type="text" class="form-control" placeholder="Prenom" id="first_name"  name="first_name" value="{{$clients->first_name}}">
                            <input type="hidden" name="_token" value="{{Session::token()}}">
                           
                        </div>
                        <div class="form-group">
                            <label for="first_name"><b> Nom*</b></label>
                            <input type="text" placeholder="Nom" class="form-control" id="last_name" name="last_name" value="{{$clients->last_name}}">
                        </div>
                        <div class="form-group">
                            <label for="address"><b> Adresse*</b></label>
                            <input type="text" placeholder="Adresse " class="form-control" id="address" name="address" value="{{$clients->address}}">
                        </div>
                        <div class="form-group">
                        <label for="Email"><b> Email*</b></label>
                        <input type="text" placeholder="Email" class="form-control" id="email" name="email" value="{{$clients->email}}">                          
                        <br>                        
                        <div class="form-group">
                            <label for="telephone"><b> Telephone* </b></label>                           
                            <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Telephone" value="{{$clients->telephone}}">
                        </div> 
                        <div class="form-group">
                            <label for="cin"><b> CIN* </b></label>                           
                            <input type="text" class="form-control" id="cin" name="cin" placeholder="CIN" value="{{$clients->cin}}">
                        </div> 
                        <div class="form-group">
                            <label for="permit"><b> Numero de Permit* </b></label>                           
                            <input type="text" class="form-control" id="permit" name="permit" placeholder="Permit" value="{{$clients->permit}}">
                        </div> 
                       
                        <button type="submit" class="btn btn-primary">Editer</button>
                    </form>

                
                
            </div>
        </div>
    </div> 
</div>


@endsection