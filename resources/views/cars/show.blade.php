
@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<div class="card">
  <div class="card-body">

<table style="border-collapse: collapse; width: 100%;" border="0" class="table-responsive-md">
  <tbody>
  <tr>
  <td  style="width: 33.3333%;"><p><h1><strong>Information Voiture</strong></h1></p></td>
  <td  style="width: 33.3333%;">&nbsp;</td>
  <td  style="width: 33.3333%;"></td>
  </tr>
  </tbody>
  </table>

<table style="border-collapse: collapse; width: 92.0661%; height: 67px;" class="table table-borderless">
<tbody >
<tr>
  <td  style="width: 33.3333%;">Immatriculation : <b>{{$cars->registration }}</b></td>
  <td   style="width: 33.3333%;">Marque: <b>{{$cars->model}}</b></td>
 
</tr>
<tr>
  <td   style="width: 33.3333%;">Carburant : <b>{{$cars->fuel}}</b></td>
  <td   style="width: 33.3333%;">Couleur : <b>{{$cars->color}}</b></td>
</tr>
<tr>
  <td   style="width: 33.3333%;">Nombre de porte : <b>{{$cars->doors_num}}</b></td>
  <td  style="width: 33.3333%;">Nombre de passagers : <b>{{$cars->passengers_num}}</b></td>
</tr>
</tbody>
</table>
<strong><hr /></strong>
<div class="table-responsive-md">
  <table border="0" style="border-collapse: collapse; width: 100%;" height="30">
    <tbody>
    <tr>
    <td style="width: 50%;">
    <h1>Opération</h1>
    </td>
    <td >
    <h1 style="text-align: center;"><a type="submit" class="btn btn-primary" href="{{route('opcar.create',$cars->id)}}"><i class="bx bx-plus"></i></a></h1>
    </td>
    </tr>
    </tbody>
    </table>
<table class="table table-hover">
  
    <thead> 
      <tr >
        <th  scope="col">Operation</th>
        <th scope="col">Date</th>
        <th style=" text-align: right;" >Action</th>
        
    </tr>
  </thead>
  <tbody> 
     {{-- <td><img style="width: 30%; height: 30%" src="{{URL::to('images/'.$cars->file)}}" alt="{{$cars->model}}" /></td>
                
                    <td>{{$cars->registration}}</td>
                    <td>{{$cars->model}}</td>                  
                   
                   <td> 
                     
                   
              </td>                                   --}}
                    
                   
                        {{-- @foreach(\App\CarAlert::where('id_car', $cars->id)->get() as $item)
                            {{$item->date}}
                        @endforeach --}}
                        @foreach ($cars->alerts()->get() as $item)
                        <tr>
                        <td >
                        
                            {{$item->label}}
                       
                    </td>
                    <td>    
                      {{$item->pivot->date}}
                </td>
                <td  style="text-align: right">  <a class="btn btn-success" href="{{ route('opcar.edit',$item->pivot->id) }}">Editer</a></td>
                   
                    <td  style="text-align: left">
                        <form action="{{ route('opcar.delete', $item->pivot->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Supprimer</button>
                                  </form></td>
                  
                      </tr>
                    @endforeach
                </tbody>
            </table>
          </div>

  </div>
</div>      
            

@endsection