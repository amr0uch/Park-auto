@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<div class="row mt-5">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-body">
                <h3 class="card-titl">Editer le Document </h3>
                <hr>
                
                    <form action="{{route('clidoc.update',$client_doc->id)}}" method="post" enctype="multipart/form-data">  
                    @csrf  
                    @method('PUT')  
                    <div  class="mb-3" >
                        <label for="client"><b> Client* </b></label>
                        <select name="id_client" class="custom-select" id="id_client" disabled >voiture
                            @foreach ($client_doc->client()->get() as $item)
                                 <option value="{{$item->id}} {{ $item->id ? 'selected' : '' }}"   >{{$item->first_name}} {{$item->last_name}} </option>
                            
                            @endforeach
                                 
                              </select>
                     </div>

                   
                        <div  class="mb-3" >
                           <label for="alerts"><b> Document* </b></label>
                           <select name="document_id[]" class="custom-select" id="documents"   >Operation
   
                               @foreach ($documents as $document)
                             
                               <option value="{{$document->id}} {{ $document->id ? 'selected' : '' }}"   id="op">{{$document->label}}</option>
                               
                           @endforeach
                       </select>
                        </div>
                          
                          
                          <div class="mb-3">
                           <label for="file"><b> fichier* </b></label>
                           <div class="input-group" >
                           <input type="file" class="form-control" id="file" name="file[]" value="{{$client_doc->file}}" {{ $client_doc->id ? 'selected' : '' }}>
                           </div>
                          </div>
   
                        
                          
                          <button type="submit" class="btn btn-success">Editer</button>
                    </form>
            </div>
        </div>
    </div>
</div>

 @endsection                              