<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>Mot de passe oublier</title>
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

<body class="bg-forgot">
	<!-- wrapper -->
	<div class="wrapper">
		<div class="authentication-forgot d-flex align-items-center justify-content-center">
			<div class="card shadow-lg forgot-box">
				<div class="card-body p-md-5">
					<div class="text-center">
						<img src="/assets/images/icons/forgot-2.png" width="140" alt="" />
					</div>
					<h4 class="mt-5 font-weight-bold">Mot de passe oublié?</h4>
					<p class="text-muted">Veuillez Entrez votre adresse e-mail pour réinitialiser le mot de passe </p>
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
					<div class="form-group mt-5">
						<label>Adresse E-mail</label>
                            
                        <input id="email" type="email" class="form-control form-control-lg radius-30 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
                    <br>
                    <button type="submit" class="btn btn-primary btn-lg btn-block radius-30">
                        {{ __('Envoyer le lien de mot de passe ') }}
                    </button>
                </form>
				</div>
			</div>
        
		</div>
	</div>
	<!-- end wrapper -->
</body>

</html>