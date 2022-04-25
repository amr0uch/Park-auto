<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>Authentification</title>
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
	<!-- Icons CSS -->
	<link rel="stylesheet" href="assets/css/icons.css" />
	<!-- App CSS -->
	<link rel="stylesheet" href="assets/css/app.css" />
</head>

<body class="bg-login">
	<!-- wrapper -->
	<div class="wrapper">
		<div class="section-authentication-login d-flex align-items-center justify-content-center">
			<div class="row">
				<div class="col-12 col-lg-10 mx-auto">
					<div class="card radius-15">
						<div class="row no-gutters">
							<div class="col-lg-6">
								<div class="card-body p-md-5">
									<div class="text-center">
										<img src="assets/images/logo-icon.png" width="80" alt="">
										<h3 class="mt-4 font-weight-bold">Re-Bienvenue</h3>
									</div>
									<hr>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
									<div class="form-group mt-4">
										<label>Adresse e-mail</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror	
                                    </div>
									<div class="form-group">
										<label>Mot de passe</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror	
                                    </div>
									<div class="form-row">
										<div class="form-group col">
											<div class="custom-control custom-switch">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Souviens-toi de moi') }}
                                                </label>		
                                            </div>
										</div>
										<div class="form-group col text-right">  @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}"> 
                                          <span style="font-size: 90%" >      <i class='bx bxs-key mr-2'></i> {{ __('Mot de passe oublié ?') }} </span>
                                            </a>
                                        @endif
										</div>
									</div>
									<div class="btn-group mt-3 w-100">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Se connecter') }}
                                        </button>
										<button type="submit" class="btn btn-primary"><i class="lni lni-arrow-right"></i>
										</button>
									</div>
									
								
								</div>
							</div>
							<div class="col-lg-6">
								<img src="assets/images/login-images/login-frent-img.jpg" class="card-img login-img h-100" alt="...">
							</div>
						</div>
						<!--end row-->
					</div>
				</div>
            </form>
			</div>
		</div>
	</div>
	<!-- end wrapper -->
</body>

</html>