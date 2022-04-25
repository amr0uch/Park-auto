@extends('layouts.app')

@section('styles')

@endsection

@section('content')
<style>

    .mlr-auto {
      display: inline-block;
      margin-right: auto;
      margin-left: auto;
    }

    .custom-checkbox-slider {
      position: relative;
      margin-right: 40px;
    }
    .custom-checkbox-slider:checked::before {
      transform: translateX(150%);
    }
    .custom-checkbox-slider:checked::after {
      background: purple;
    }
    .custom-checkbox-slider::after, .custom-checkbox-slider::before {
      content: "";
      top: -2px;
      left: -2px;
      position: absolute;
      transition: all 0.3s ease-in-out;
    }
    .custom-checkbox-slider::after {
      background: #b1b1b1;
      width: 50px;
      height: 20px;
      border-radius: 10px;
      outline: none;
    }
    .custom-checkbox-slider::before {
      width: 18px;
      height: 18px;
      left: 1px;
      top: -1px;
      border-radius: 50%;
      background: #fff;
      z-index: 1;
      outline: none;
    }
    </style>
<div class="row mt-5">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-body">
                <h3 class="card-titl">Editer Role</h3>
                <hr>

                    <form action="{{route('role.update',$groups->id)}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field()}}
                    @method('PUT')
                        <div class="form-group">
                            <input type="text" placeholder="CrÃ©e un Role " class="form-control" id="name" name="name" value="{{$groups->name}}" required>
                            <input type="hidden" name="_token" value="{{Session::token()}}">

                        </div>

                        <hr>
                        <table border="0" style="border-collapse: collapse; width: 100%; height: 231px;">
                            <tbody>
                                @foreach ($permissions as $permission)
                            <tr style="height: 21px;">
                            <td style="width: 32.973%; height: 21px;">

                             <p><b> {{$permission->entity}}<span><br></span> </b></p> 

                            </td>
                            <td style="width: 42.027%; height: 21px;">

                                {{$permission->name}} 
                                
                            </td>
                            
                            <td>
                                <input  name="permissions[]" class="custom-checkbox-slider" type="checkbox" value="{{$permission->id}}" @if($groups->hasPermission($permission->id)) checked @endif >
                                
                            </td>
                            </tr>
                            
                            @endforeach
                            </tbody>
                            </table>

                        <button type="submit" class="btn btn-success"> Editer</button>
                    </form>
            </div>
        </div>
    </div>
</div>
 @endsection
