@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<div class="row mt-5">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-body">
                <h3 class="card-titl">Editer l'Entretien </h3>
                <hr>
                
                    <form action="{{route('entretiens.update',$entretiens->id)}}" method="post" enctype="multipart/form-data">  
                    @csrf  
                    @method('PUT')    
                               
                    <label for=""><b> Modele de Voiture*</b></label>
                    <select name="car_id" class="custom-select" id="car_id">                                
                      @foreach ($cars as $car)
                    
                          <option value="{{$car->id}}" {{ $car->id == $entretiens->car_id ? 'selected' : '' }}>{{$car->model}}
                        </option>
                        
                      @endforeach
                  </select>
                  <label for=""><b> Matriculation *</b></label>
                  <select name="car_id" class="custom-select" id="car_id" disabled>                                
                      @foreach ($cars as $car)
                    
                          <option value="{{$car->id}}" {{ $car->id == $entretiens->car_id ? 'selected' : '' }}>{{$car->registration}}</option>
                        
                      @endforeach
                  </select>
                  <br><br>
                  <label for=""><b> Opération*</b></label>
                  <select name="alert_id" class="custom-select" id="alert_id">                                
                      @foreach ($alerts as $alert)
                    
                          <option value="{{$alert->id}}" {{ $alert->id == $entretiens->alert_id ? 'selected' : '' }}>{{$alert->label}}</option>
                        
                      @endforeach
                      
                  </select>
                        <div class="form-group">
                            <label for="date"><b> Date*</b></label>
                            <input type="date" placeholder="Date d'opération " class="form-control" id="date" name="date" value="{{$entretiens->date}}">
                        </div>
                        <div class="form-group">
                        <label for="km"><b> Kilométrage*</b></label>
                        <input type="text" placeholder="Kilométrage " class="form-control" id="km" name="km" value="{{$entretiens->km}}">


                      <br>
                      <br>
                           
                        
                        <button type="submit" class="btn btn-success">mettre a jour l'entretien</button>
                    </form>

                
                
            </div>
        </div>
    </div> 
</div>


@endsection