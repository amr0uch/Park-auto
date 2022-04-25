@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<div class="row mt-5">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-body">
                <h3 class="card-titl">Ajouter un Document</h3>
                <hr>
                
                    <form action="{{route('documents.index')}}" method="post" enctype="multipart/form-data">  
                    {{ csrf_field() }}       
                               
                        <div class="form-group">
                                 <input type="hidden" name="_token" value="{{Session::token()}}">
                           
                        </div>
                        <div class="form-group">
                            <label for="label"><b> Nom Document*</b></label>
                            <input type="text" placeholder="Nom document" class="form-control" id="label" name="label" >
                        </div>
                        
                           
                        
                        <button type="submit" class="btn btn-success">Add the Document</button>
                    </form>   
            </div>
        </div>
    </div> 
</div>


@endsection