@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<div class="row mt-5">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-body">
                <h3 class="card-titl">Editer la statut </h3>
                <hr>
                
                    <form action="{{route('statuses.update',$statuses->id)}}" method="post" enctype="multipart/form-data">  
                    @csrf  
                    @method('PUT')    
                               
                        <div class="form-group">
                            <label for="label"><b> Statut*</b></label>
                            <input type="text" class="form-control" placeholder="Disponibiliter de voiture" id="label"  name="label" value="{{$statuses->label}}">
                            <input type="hidden" name="_token" value="{{Session::token()}}">
                           
                        </div>
                        
                     
                        
                        <button type="submit" class="btn btn-primary">Editer</button>
                    </form>

                
                
            </div>
        </div>
    </div> 
</div>


@endsection