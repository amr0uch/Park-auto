@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<div class="row mt-5">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-body">
                <h3 class="card-titl">Role Permission</h3>
                <hr>
                
                    <form action="{{route('users.role')}}" method="get" enctype="multipart/form-data">  
                    {{ csrf_field() }}   
                        <div class="form-group">
                            <input type="text" placeholder="Permission " class="form-control" id="name" name="name" required>
                        </div>
                        <br><br>
                        <hr>
                        <table border="0" style="border-collapse: collapse; width: 100%; height: 231px;">
                            <tbody>
                            <tr style="height: 21px;">
                                
                                
                                   
                            <td style="width: 32.973%; height: 21px;">
                                @if($permissions->entity="Voiture")
                                {{$permissions->entity}}
                                @endif
                            </td>
                            <td style="width: 42.027%; height: 21px;">
                                @foreach ($permissions as $permission)
                                    @if($permission->entity=="Voiture")
                                    {{$permission->name}} <input type="checkbox">
                                    @endif
                                @endforeach
                            </td> 

                            </tr>
                            <tr style="height: 21px;">
                            <td style="width: 32.973%; height: 21px;">
                                @if($permissions->entity="Status")
                                {{$permissions->entity}}
                                @endif
                            </td>
                            <td style="width: 42.027%; height: 21px;">
                                @foreach ($permissions as $permission)
                                    @if($permission->entity=="Status")
                                    {{$permission->name}} <input type="checkbox">
                                    @endif
                                @endforeach
                            </td>
                            </tr>
                            <tr style="height: 21px;">
                            <td style="width: 32.973%; height: 21px;">Opération</td>
                            <td style="width: 42.027%; height: 21px;"></td>
                            </tr>
                            
                            <tr style="height: 21px;">
                            <td style="width: 32.973%; height: 21px;">Opération-Voiture</td>
                            <td style="width: 42.027%; height: 21px;"></td>
                            </tr>
                            <tr style="height: 21px;">
                            <td style="width: 32.973%; height: 21px;">Client</td>
                            <td style="width: 42.027%; height: 21px;"></td>
                            </tr>
                            <tr style="height: 21px;">
                            <td style="width: 32.973%; height: 21px;">Doument</td>
                            <td style="width: 42.027%; height: 21px;"></td>
                            </tr>
                            <tr style="height: 21px;">
                            <td style="width: 32.973%; height: 21px;">Document-Client</td>
                            <td style="width: 42.027%; height: 21px;"></td>
                            </tr>
                            <tr style="height: 21px;">
                            <td style="width: 32.973%; height: 21px;">Contrat</td>
                            <td style="width: 42.027%; height: 21px;"></td>
                            </tr>
                            <tr style="height: 21px;">
                            <td style="width: 32.973%; height: 21px;">Utilisateur</td>
                            <td style="width: 42.027%; height: 21px;"></td>
                            </tr>
                            <tr style="height: 21px;">
                            <td style="width: 32.973%; height: 21px;">Entretien</td>
                            <td style="width: 42.027%; height: 21px;"></td>
                            </tr>
                            </tbody>
                            </table>

                        <button type="submit" class="btn btn-success"> Ajouter</button>
                    </form>
            </div>
        </div>
    </div>
</div>
 @endsection