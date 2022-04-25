@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<div class="row mt-5">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-body">
                <h3 class="card-titl"><b> Ajouter Document </b></h3>
                <hr>

                    <form action="{{route('clidoc.store')}}" method="post" enctype="multipart/form-data">
                        
                       
                            <div  class="mb-3" >
                                <label for="id_car"><b> Client* </b></label>
                                      <input type="text" class="form-control" value="{{$clients->first_name}} {{$clients->last_name}}" readonly>
                                      <input type="hidden"class="form-control" name="id_client" value="{{$clients->id}}" >
                                      <input type="hidden" name="_token" value="{{Session::token()}}">
                             </div>
                             <div id="newlinktpl">
                                <div class="mb-3" >
                                    <label for="documents"><b> Documents* </b></label>
                                    <select name="id_document" class="custom-select" id="documents"  >Documents*
                                        @foreach ($documents as $document)
                                        <option value="{{$document->id}}" id="op">{{$document->label}}</option>
        
        
                                    @endforeach
        
                                </select>
                                 </div>
                                 <div class="form-group">
                                    <label for="date"><b> Document du Client* </b></label>
                                    <div class="input-group" >
                                    <input type="file" class="form-control" id="file" name="file" required>
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