@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<div class="row mt-5">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-body">
                <h3 class="card-titl">Editer Profile </h3>
                <hr>
                    <form action="{{route('users.updateprof')}}" method="post" enctype="multipart/form-data">  
                    @csrf  
                    @method('PUT')    
                  
                        <div class="form-group">
                            <label for="name"><b> Nom complet*</b></label>
                            <input type="text" class="form-control" placeholder="Nom Complet" id="name"  name="name" value="{{$user->name}}">
                            <input type="hidden" name="_token" value="{{Session::token()}}">     
                                
                        </div>
                        
                        <div class="form-group">
                            <label for="email"><b> E-mail*</b></label>
                            <input type="text" class="form-control" placeholder="E-mail" id="email"  name="email" value="{{$user->email}}">                   
                        </div>
                        <div class="form-group">
                            <label for="password"><b> Nouveau Mot de passe*</b></label>
                            <div class="input-group" id="show_hide_password">
                            <input type="password" value="" class="form-control @error('password') is-invalid @enderror" placeholder="Nouveau Mot de passe" id="password"  name="password" required autocomplete="new-password">
                          
                            <div class="input-group-append">	<a href="javascript:;" class="input-group-text bg-transparent border-left-0"><i class='bx bx-hide'></i></a>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror 
                            </div>
                        </div>            
                        </div>
                        <div class="form-group">
                            <label for="password"><b> Confirmer Mot de passe*</b></label>
                            <div class="input-group" id="show_hide_password">
                            <input type="password" value="" class="form-control" placeholder="confirmer Mot de passe" id="password-confirm"  name="password_confirmation" required autocomplete="new-password"> 
                            <div class="input-group-append">	<a href="javascript:;" class="input-group-text bg-transparent border-left-0"><i class='bx bx-hide'></i></a>
                            </div>
                        </div>            
                        </div>
                        <div class="form-group">
                            
                            <input type="hidden" class="form-control" placeholder="Status Of User" id="status"  name="status" value="{{$user->status}}" disabled>                   
                        </div>
                     
                        <button type="submit" class="btn btn-success">Editer</button>
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