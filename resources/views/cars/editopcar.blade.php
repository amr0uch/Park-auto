@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<div class="row mt-5">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-body">
                <h3 class="card-titl">Editer l'opération</h3>
                <hr>

                    <form action="{{route('opcar.update',$carses->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div  class="mb-3" >
                        <label for="alerts"><b> voiture* </b></label>
                        <select name="id_car" class="custom-select" id="id_car" disabled >voiture
                            @foreach ($carses->car()->get() as $item)
                                 <option value="{{$item->model}} {{ $item->id ? 'selected' : '' }}"   >{{$item->model}}</option>
                            
                            @endforeach
                                 
                              </select>
                     </div>

                   
                        <div  class="mb-3" >
                           <label for="alerts"><b> Operation* </b></label>
                           <select name="id_alert[]" class="custom-select" id="id_alert"   >Operation
   
                               @foreach ($alerts as $alert)
                               @if($alert->label!="Changement de Croix" && $alert->label!="Vidange" )
                               <option value="{{$alert->id}} {{ $alert->id ? 'selected' : '' }}"   id="op">{{$alert->label}}</option>
                               @endif
                           @endforeach
                       </select>
                        </div>
                          
                          
                          <div class="form-group">
                           <label for="date"><b> Date Operation* </b></label>
                           <div class="input-group" >
                           <input type="date" class="form-control" id="date" name="date[]" value="{{$carses->date}}" {{ $carses->id ? 'selected' : '' }}>
                         
                           </div>
                          </div>
   
                        
                          

                        <button type="submit" class="btn btn-success">Editer</button>
                    </form>



            </div>
        </div>
    </div>
</div>



@endsection
