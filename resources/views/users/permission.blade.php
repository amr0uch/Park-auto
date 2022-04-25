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
                <h3 class="card-titl">Ajouter Role</h3>
                <hr>

                    <form action="{{route('permission.store')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" placeholder="Crée un Role " class="form-control" id="name" name="name" required>
                        </div>

                        <hr>
                        <table border="0" style="border-collapse: collapse; width: 100%; height: 231px;">
                            <tbody>
                                @foreach ($permissions as $permission)
                            <tr >
                            <td >

                             <p><b> {{$permission->entity}}<span><br></span> </b></p>

                            </td>
                            <td >

                                {{$permission->name}}
                            </td>
                            <td><input name="permissions[]" class="custom-checkbox-slider"  value="{{$permission->id}}" type="checkbox"></td>
                            </tr>
                            @endforeach
                            </tbody>
                            </table>
                            <br>
                        <button type="submit" class="btn btn-success"> Ajouter</button>
                    </form>
            </div>
        </div>
    </div>
</div>
 @endsection
