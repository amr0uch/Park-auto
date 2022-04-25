@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<div class="row mt-5">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-body">
                <h3 class="card-titl">Ajouter Utilisateur </h3>
                <hr>
                
                    <form action="{{route('users.index')}}" method="post" enctype="multipart/form-data">  
                    {{ csrf_field() }}       
                               
                        <div class="form-group">
                            <label for="name"><b>Nom Complet*</b></label>
                            <input type="text" class="form-control" placeholder="Full name" id="name"  name="name" required>
                            <input type="hidden" name="_token" value="{{Session::token()}}">
                           
                        </div>
                        <div class="form-group">
                            <label for="email"><b> Email*</b></label>
                            <input type="email" placeholder="Email " class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password"><b> Mot de Passe*</b></label>
                            <div class="input-group" id="show_hide_password">
                            <input type="password" placeholder="Password " class="form-control" id="password" name="password" required>
                            <div class="input-group-append"><a href="javascript:;" class="input-group-text bg-transparent border-left-0"><i class='bx bx-hide'></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                        
                        <input type="hidden" placeholder="Status of user" class="form-control" id="status" name="status" value="1" required>                          
                        </div>                 
                        <div class="form-group">
                            <label for=""><b>Role*</b></label>
                        <select name="group_id" class="custom-select" id="group_id">                       
                            @foreach ($groups as $group )       
                            <option value="{{$group->id}}">{{$group->name}}</option>
                          @endforeach
                            </select>
                        </div>   
    
                        
                        <button type="submit" class="btn btn-success">Ajouter Utilisateur</button>
                    </form>

                
                
            </div>
        </div>
    </div> 
</div>
<script src="assets/js/jquery.min.js"></script>
<script>
    $(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
</script>

@endsection