<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>Récupération de mot de passe</title>
	<!--favicon-->
	<link rel="icon" href="/assets/images/favicon-32x32.png" type="image/png" />
	<!-- loader-->
	<link href="/assets/css/pace.min.css" rel="stylesheet" />
	<script src="/assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css" />
	<!-- Icons CSS -->
	<link rel="stylesheet" href="/assets/css/icons.css" />
	<!-- App CSS -->
	<link rel="stylesheet" href="/assets/css/app.css" />
</head>

<body>
	<!-- wrapper -->
	<div class="wrapper">
		<div class="authentication-reset-password d-flex align-items-center justify-content-center">
			<div class="row">
				<div class="col-12 col-lg-10 mx-auto">
					<div class="card radius-15">
						<div class="row no-gutters">
							<div class="col-lg-5">
								<div class="card-body p-md-5">
									<div class="text-left">
										<img src="/assets/images/logo-icon.png" width="70" height="100" alt="">
									</div>
									<h4 class="mt-5 font-weight-bold">Générer un nouveau mot de passe</h4>
									<p class="text-muted">Nous avons reçu votre demande de réinitialisation de mot de passe. Veuillez saisir votre nouveau mot de passe!</p>
									<form method="POST" action="{{ route('password.update') }}">
                                        @csrf

                                        <input type="hidden" name="token" value="{{ $token }}">
                                        <hr>
                                        <div class="form-group mt-5">
                                            <label>Adresse e-mail</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-5">
										<label>Nouveau mot de passe</label>
										<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
									<div class="form-group">
										<label>Confirmer le mot de passe</label>
										<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                         	</div>
									<button type="submit" class="btn btn-primary btn-block">Changer</button> <a href="{{route('login')}}" class="btn btn-link btn-block"><i class='bx bx-arrow-back mr-1'></i>Retourné pour se Connecter </a>
                                    </form>
                                </div>
							</div>
							<div class="col-lg-7">
								<img src="/assets/images/login-images/forgot-password-frent-img.jpg" class="card-img login-img h-100" alt="...">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end wrapper -->
</body>

</html>
