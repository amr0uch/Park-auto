@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<div class="row mt-5">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-body">
                <h3 class="card-titl">Ajouter l'Entretien </h3>
                <hr>
                
                    <form action="{{route('entretiens.index')}}" method="post" enctype="multipart/form-data">  
                    {{ csrf_field() }}       
                               
                        <div class="form-group">                          
                                 <input type="hidden" name="_token" value="{{Session::token()}}">                          
                        </div>
                        <div class="form-group">
                        <Label><b>Marque Voiture*</b></Label>
                        <select name="car_id" class="custom-select" id="car_id">
                            
                            @foreach ($cars as $car )                     
                                <option value="{{$car->id}}" data-regist="{{$car->registration}}">{{$car->model}}</option>                        
                            @endforeach
                        </select> 
                        </div>                  
                        <div class="form-group">
                        <Label><b>Matriculation*</b></Label>
                        <input type="text" class="form-control regist"  id="registration" name="registration" value="" readonly required  />
                    </div>
                    
            <div class="form-group">

                    <Label><b>Opération</b></Label>
                    <select name="alert_id" class="custom-select" id="alert_id">                     
                    @foreach ($alerts as $alert )                     
                        <option value="{{$alert->id}}" >{{$alert->label}}</option>                        
                    @endforeach
                </select>
            </div>
                <div class="form-group">
                    <label for="date"><b> Date d'opération*</b></label>
                    <input type="date" placeholder="Date de fin" class="form-control" id="date" name="date">
                </div>
                <div class="form-group">
                    <label for="km"><b> Kilométrage*</b></label>
                    <input type="number" placeholder="Kilométrage" class="form-control" id="km" name="km">
                </div>


                           
                        
                        <button type="submit" class="btn btn-success">Ajouter l'entretien</button>
                    </form>

                
                
            </div>
        </div>
    </div> 
</div>
<script type="text/javascript" >
    let sel = document.getElementById('car_id');
    sel.addEventListener('click', function (e) {
        let regist = e.srcElement.selectedOptions["0"].dataset.regist;
        document.getElementById('registration').value = regist; });
</script>



@endsection