@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<div class="row mt-5">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-body">



                    <form action="{{route ('cars.store')}}" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <h3 class="card-titl"><b> Ajouter une Nouvelle voiture </b></h3>
                            <div style="float: right;margin-top: -5%" >
                                <button type="submit" class="btn btn-success">Ajouter Voiture</button>
                                </div>
                                <hr>

                            <label for="model"><b> Marque*</b></label>
                            <input type="text" class="form-control" placeholder="Marque" id="model"  name="model" required>
                            <input type="hidden" name="_token" value="{{Session::token()}}">

                        </div>
                        <div class="form-group">
                            <label for="registration"><b> Immatriculation*</b></label>
                            <input type="text" placeholder="Matriculation " class="form-control" id="registration" name="registration">
                        </div>
                        <div class="form-group">
                            <label for="price_day"><b> Prix journaliére*</b></label>
                            <input type="number" placeholder="Prix " class="form-control" id="price_day" name="price_day">
                        </div>
                        <div class="form-group">
                        <label for="fuel"><b> Carburant*</b></label>
                        <input type="text" placeholder="Type de Carburant " class="form-control" id="fuel" name="fuel">
                        </div>
                        <div class="form-group">
                        <label for="doors_num"><b> Nombre de Porte*</b></label>
                        <input type="number" placeholder="Nombre de Porte" class="form-control" id="doors_num" name="doors_num">
                        </div>
                        <div class="form-group">
                        <label for="passengers_num"><b> Nombre de Passagers*</b></label>
                        <input type="number" placeholder="Nombre de Passagers" class="form-control" id="passengers_num" name="passengers_num">
                        </div>
                        <div class="form-group">
                        <label for="color"><b> Couleur*</b></label>
                        <input type="text" placeholder="couleur de Voiture" class="form-control" id="color" name="color">
                        </div>

                        <div class="form-group">
                            <label for="file"><b> Photo de voiture* </b></label>
                            <input type="file" class="form-control" id="file" name="file" >
                        </div>
                        <label for=""> <b>Statut*</b></label>
                        <select name="id_status" class="custom-select" id="">


                        @foreach ($statuses as $status )

                            <option value="" >{{$status->label}}</option>

                        @endforeach
                    </select>
                     <br><br>
                     <div id="newlinktpl">
                     <div  class="mb-3" >
                        <label for="alerts"><b> Operation* </b></label>

                        <select name="id_alert[]" class="custom-select" id="id_alert"  >Operation

                            @foreach ($alerts as $alert)
                                @if($alert->id==3 || $alert->id==4)
                            <option value="{{$alert->id}}" id="op">{{$alert->label}}</option>
                             @endif
                        @endforeach
                    </select>
                     </div>


                       <div class="form-group">
                        <label for="date"><b> Date Operation* </b></label>

                        <div class="input-group" >
                        <input type="date" class="form-control" id="date" name="date[]" >
                        <div id="addnew" class="input-group-append">
                            <a href="javascript:new_link()" class="btn btn-success" class="input-group-text bg-transparent border-left-0" ><i class='bx bx-plus'></i> </a>
                        </div>

                    </div>


                   </div>

             </div>


                       <form method="post" action="">
                        <div id="newlink">
                        <div>
                        </form>
                        {{-- <button type="submit" class="btn btn-success">Ajouter Voiture</button> --}}
                        <!-- Template -->
                        {{-- <div id="newlinktpl" style="display:none">
                            <div>
                                <div class="mb-3" >
                                    <label for="alerts"><b> Operation* </b></label>
                                    <select  name="id_alert[]" class="custom-select" id="id_alert"  >Operation

                                        @foreach ($alerts as $alert)

                                        <option value="{{$alert->id}}" id="op">{{$alert->label}}</option>
                                    @endforeach
                                </select>
                                 </div>

                                   <div class="form-group">
                                    <label for="date"><b> Date Operation* </b></label>
                                    <div class="input-group" >
                                    <input type="date" class="form-control" id="date" name="date[]" >
                                   </div>
                                   </div>
                            </div>
                        </div> --}}



                        <br>


                    </form>


                </div>
            </div>
        </div>
    </div>

<script>
    var ct = 1;
function new_link()
 {

  ct++;
  var div1 = document.createElement("div");
  div1.id = ct;
  // link to delete extended form elements
  var delLink =
    '<div  style="margin-left:94%" class="input-group-append"><a href="javascript:delIt(' +
    ct +
    ')" class="btn btn-danger" class="input-group-text bg-transparent border-left-0" style="border-radius: 10%" ><i class="bx bx-minus"></i></a></div>';
  div1.innerHTML = document.getElementById("newlinktpl").innerHTML + delLink;
  document.getElementById("newlink").appendChild(div1);
}
// function to delete the newly added set of elements
function delIt(eleId) {
  d = document;
  var ele = d.getElementById(eleId);
  var parentEle = d.getElementById("newlink");
  parentEle.removeChild(ele);
}


</script>


@endsection
