@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<div class="row mt-5">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-body">
                <h3 class="card-titl">Editer la voiture </h3>
                <hr>

                    <form action="{{route('cars.update',$cars->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                            <label for="model"><b> Modéle*</b></label>
                            <input type="text" class="form-control" placeholder="Modéle" id="model"  name="model" value="{{$cars->model}}"required>
                            <input type="hidden" name="_token" value="{{Session::token()}}">

                        </div>
                        <div class="form-group">
                            <label for="registration"><b> Matriculation*</b></label>
                            <input type="text" placeholder="Matriculation" class="form-control" id="registration" name="registration" value="{{$cars->registration}}" required>
                        </div>
                        <div class="form-group">
                            <label for="price_day"><b> Prix*</b></label>
                            <input type="text" placeholder="Prix journaliére" class="form-control" id="price_day" name="price_day" value="{{$cars->price_day}}"required>
                        </div>
                        <div class="form-group">
                        <label for="fuel"><b> Carburant*</b></label>
                        <input type="text" placeholder="Carburant " class="form-control" id="fuel" name="fuel" value="{{$cars->fuel}}" required>
                        </div>
                        <div class="form-group">
                        <label for="doors_num"><b> Nombre de Porte*</b></label>
                        <input type="number" placeholder="Nombre de Porte" class="form-control" id="doors_num" name="doors_num" value="{{$cars->doors_num}}" required>
                        </div>
                        <div class="form-group">
                        <label for="passengers_num"><b> Nombre de Passagers*</b></label>
                        <input type="number" placeholder="Nombre de Passagers" class="form-control" id="passengers_num" name="passengers_num" value="{{$cars->passengers_num}}" required>
                        </div>
                        <div class="form-group">
                        <label for="color"><b> Couleur*</b></label>
                        <input type="text" placeholder="couleur" class="form-control" id="color" name="color"  value="{{$cars->color}}" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="file"><b> Photo* </b></label>
                            <input type="file" class="form-control" id="file" name="file" value="{{$cars->file}}" >
                        </div>

                       <b>Statut</b>
                      <select name="id_status" class="custom-select" id="id_status" required>


                        @foreach ($statuses as $status)

                            <option value="{{$status->id}}" {{ $status->id == $cars->id_status ? 'selected' : '' }}>{{$status->label}}</option>

                        @endforeach
                    </select>

                        <b>Operations</b>
                        <label for="alerts"><b> Operation* </b></label>
                        <select name="id_alert" class="custom-select" id="id_alert"  required>Operation

                            @foreach ($alerts as $alert)

                                <option value="{{$alert->id}}" id="op">{{$alert->label}}</option>
                            @endforeach
                        </select>



                    <div class="form-group">
                        <label for="date"><b> date* </b></label>
                        <input required type="date" class="form-control" id="date" name="date" value="{{$cars->date}}" {{ $cars->id ? 'selected' : '' }}  required>
                    </div>
                        <button type="submit" class="btn btn-success">Editer</button>
                    </form>



            </div>
        </div>
    </div>
</div>


@endsection
