@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<div class="row mt-5">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-body">
                <h3 class="card-titl"><b> Ajouter Opération </b></h3>
                <hr>

                    <form action="{{route('opcar.store')}}" method="post" enctype="multipart/form-data">
                        
                       
                            <div  class="mb-3" >
                                <label for="id_car"><b> voiture* </b></label>
                                {{-- <select name="id_car" class="custom-select" id="id_car" readOnly>voiture

                                         <option value="{{$cars->id}} {{ $cars->id ? 'selected' : '' }}"   >{{$cars->model}}</option>
                                         
                                      </select> --}}
                                      <input type="text" class="form-control" value="{{$cars->model}}" readonly>
                                      <input type="hidden"class="form-control" name="id_car" value="{{$cars->id}}" >
                                      <input type="hidden" name="_token" value="{{Session::token()}}">
                             </div>
                             <div id="newlinktpl">
                             <div  class="mb-3" >
                                
                                    <label for="alerts"><b> Operation* </b></label>
                                    <select name="id_alert" class="custom-select" id="id_alert">Operation
            
                                        @foreach ($alerts as $alert)
                                        @if($alert->label!="Changement de Croix" && $alert->label!="Vidange" )
                                        <option value="{{$alert->id}}" id="op">{{$alert->label}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                 </div>
                                 <div class="form-group">
                                    <label for="date"><b> Date Operation* </b></label>
                                    <div class="input-group" >
                                    <input type="date" class="form-control" id="date" name="date" required>
                                    </div>
                                    
                                   
                                   </div>
                                   
                             </div>
                             
                             <button type="submit" class="btn btn-success">Ajouter</button> 
                                 
                                    
 
                    </form>
            </div>
        </div>
    </div>
</div>

@endsection