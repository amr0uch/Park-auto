@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<div class="row mt-5">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-body">
                <h3 class="card-titl">Ajouter statut  </h3>
                <hr>
                
                    <form action="{{route('stat.store')}}" method="post" enctype="multipart/form-data">  
                    {{ csrf_field() }}       
                               
                        <div class="form-group">
                                 <input type="hidden" name="_token" value="{{Session::token()}}">
                           
                        </div>
                        <div class="form-group">
                            <label for="label"><b> Statut *</b></label>
                            <input type="text" placeholder="Statut pour les voitures " class="form-control" id="label" name="label" >
                        </div>

                        <button type="submit" class="btn btn-success">Ajouter </button>
                    </form>

            </div>
        </div>
    </div> 
</div>


@endsection