<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>Parc Auto</title>
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
	<!-- Vector CSS -->
	<link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
	<!--plugins-->
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
	<!-- Icons CSS -->
	<link rel="stylesheet" href="assets/css/icons.css" />
	<!-- App CSS -->
	<link rel="stylesheet" href="assets/css/app.css" />
	<link rel="stylesheet" href="assets/css/dark-sidebar.css" />
	<link rel="stylesheet" href="assets/css/dark-theme.css" />
</head>

<body>
	<!-- wrapper -->
	<div class="wrapper">
		<!--sidebar-wrapper-->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div class="">
					<img src="assets/images/logo-icon.png" class="logo-icon-2" alt="" />
				</div>
				<div>
					<h4 class="logo-text">GALV</h4>
				</div>
				<a href="javascript:;" class="toggle-btn ml-auto"> <i class="bx bx-menu"></i>
				</a>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="/">
						<div class="parent-icon icon-color-1"><i class="bx bxs-dashboard bx-burst-hover"></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				
				</li>
				
				<li class="menu-label">Les Services</li>
				
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon icon-color-10"><i class="bx bx-group bx-flashing-hover"></i>
						</div>
						<div class="menu-title">Client</div>
					</a>
					<ul>
						@can('can-index-client')
						<li> <a href="{{ route('clients.index')}}"><i class="bx bx-right-arrow-alt"></i>Afficher Client</a>
						</li>
						@endcan
						@can('can-add-client')
						<li> <a href="{{ route('clients.create')}}"><i class="bx bx-right-arrow-alt"></i>Ajouter Client</a>
						</li>
						@endcan
						
					</ul>
				</li>
				
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon icon-color-11"><i class="bx bx-repeat bx-burst-hover"></i>
						</div>
						<div class="menu-title">Status</div>
					</a>
					<ul>
						@can('can-index-status')
						<li> <a href="{{ route('stat.index')}}"><i class="bx bx-right-arrow-alt"></i>Afficher Status</a>
						</li>
						@endcan
						@can('can-add-status')
						<li> <a href="{{ route('stat.create')}}"><i class="bx bx-right-arrow-alt"></i>Crée status</a>
						</li>
						@endcan
					</ul>
				</li>
				
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon icon-color-12"> <i class="bx bx-car bx-burst-hover"></i>
						</div>
						<div class="menu-title">Voitures</div>
					</a>
					<ul>
						@can('can-add-car')
						<li> <a href="{{ route('cars.index')}}"><i class="bx bx-right-arrow-alt"></i>Afficher Voiture</a>
						</li>
						@endcan
						@can('can-add-car')
						<li> <a href="{{ route('cars.create')}}"><i class="bx bx-right-arrow-alt"></i>Ajouter Voiture</a>
						</li>
						@endcan
		
					</ul>
				</li>
				
                <li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon icon-color-6"><i class="bx bx-task bx-flashing-hover"></i>
						</div>
						<div class="menu-title">Opération</div>
					</a>
					<ul>
						@can('can-index-operation')
						<li> <a href="{{ route('alerts.index')}}"><i class="bx bx-right-arrow-alt"></i>Afficher Opérations</a>
						</li>
						@endcan
						@can('can-add-operation')
						<li> <a href="{{ route('alerts.create')}}"><i class="bx bx-right-arrow-alt"></i>Ajouter Opération</a>
						</li>
						@endcan
					</ul>
				</li>
				
                <li>
					<a class="has-arrow" href="javascript:;">
                        <div class="parent-icon icon-color-5"><i class="bx bx-group bx-flashing-hover"></i></div>
						<div class="menu-title">Utilisateur</div>
					</a>
					<ul>
						@can('can-index-user')
						<li> <a href="{{ route('users.index')}}"><i class="bx bx-right-arrow-alt"></i>Afficher Utilisateurs</a>
						</li>
						@endcan
						@can('can-add-user')
						<li> <a href="{{ route('users.create')}}"><i class="bx bx-right-arrow-alt"></i>Ajouter Utilisateur</a>
						</li>
						@endcan
						@can('can-add-role')
						<li> <a href="{{ route('permission.create')}}"><i class="bx bx-right-arrow-alt"></i>Ajouter Role </a>
						</li>
						@endcan
						@can('can-index-role')
						<li> <a href="{{ route('role.index')}}"><i class="bx bx-right-arrow-alt"></i>Afficher Roles </a>
						</li>
						@endcan
					</ul>
				</li>
                               
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon icon-color-7"><i class="bx bx-file bx-burst-hover"></i>
						</div>
						<div class="menu-title">Contrats</div>
					</a>
					<ul>
						@can('can-index-contract')
						<li> <a href="{{ route('contracts.index')}}"><i class="bx bx-right-arrow-alt"></i>Afficher Contrat</a>
						</li>
						@endcan
                        @can('can-add-contract')
						<li> <a href="{{ route('contracts.create')}}"><i class="bx bx-right-arrow-alt"></i>Ajouter Contrat</a>
						</li>
						@endcan
					</ul>
				</li>
				
                <li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon icon-color-4"><i class="bx bx-archive bx-burst-hover"></i>
						</div>
						<div class="menu-title">Documents</div>
					</a>
					<ul>
						@can('can-index-document')
						<li> <a href="{{ route('documents.index')}}"><i class="bx bx-right-arrow-alt"></i>Afficher Documents</a>
						</li>
						@endcan
                        @can('can-add-document')
						<li> <a href="{{ route('documents.create')}}"><i class="bx bx-right-arrow-alt"></i>Ajouter Documents</a>
						</li>
						@endcan

					</ul>
				</li>
                <li>
					<a class="has-arrow" href="javascript:;">
                        <div class="parent-icon icon-color-8"> <i class="bx bx-calendar-check bx-tada-hover"></i>
					
						</div>
						
						<div class="menu-title">Entretien</div>
					</a>
					<ul>
						@can('can-index-entretien')
						<li> <a href="{{ route('entretiens.index')}}"><i class="bx bx-right-arrow-alt"></i>Afficher Entretien</a>
						</li>
						@endcan
                        @can('can-add-entretien')
						<li> <a href="{{ route('entretiens.create')}}"><i class="bx bx-right-arrow-alt"></i>Ajouter Entretien</a>
						</li>
						@endcan 
					</ul>
				</li>
				
				<li class="menu-label">Others</li>
				
				<li>
					<a href="{{ route('users.updateprof') }}" target="_blank">
						<div class="parent-icon icon-color-2"><i class="bx bx-cog bx-spin-hover"></i>
						</div>
						<div class="menu-title">Paramétre profile</div>
					</a>
				</li>
				<li>
					<a href="{{ route('logout') }}" onclick="event.preventDefault();
					document.getElementById('logout-form').submit();" target="_blank">
						<div class="parent-icon"><i class="bx bx-log-out bx-fade-left-hover"></i>
						</div>
						<span> {{ __('Logout') }}</span>
					</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
						@csrf
					</form>
				</li>
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar-wrapper-->
		<!--header-->
		<header class="top-header">
			<nav class="navbar navbar-expand">
				<div class="left-topbar d-flex align-items-center">
					<a href="javascript:;" class="toggle-btn">	<i class="bx bx-menu"></i>
					</a>
				</div>
				<div class="flex-grow-1 search-bar">
					<div class="input-group">
						<div class="input-group-prepend search-arrow-back">
							<button class="btn btn-search-back" type="button"><i class="bx bx-arrow-back"></i>
							</button>
						</div>
						<input type="text" class="form-control" placeholder="search" />
						<div class="input-group-append">
							<button class="btn btn-search" type="button"><i class="lni lni-search-alt"></i>
							</button>
						</div>
					</div>
				</div>
				<div class="right-topbar ml-auto">
					<ul class="navbar-nav">
						<li class="nav-item search-btn-mobile">
							<a class="nav-link position-relative" href="javascript:;">	<i class="bx bx-search vertical-align-middle"></i>
							</a>
						</li>
						{{-- <li class="nav-item dropdown dropdown-lg">
							<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="javascript:;" data-toggle="dropdown">	<span class="msg-count">6</span>
								<i class="bx bx-cog bx-spin-hover vertical-align-middle"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<a href="javascript:;">
									<div class="msg-header">
										<h6 class="msg-header-title">Options</h6>
										<p class="msg-header-subtitle">Application Messages</p>
									</div>
								</a>
								<div class="header-message-list">
									<a class="dropdown-item" href="javascript:;">
										<div class="media align-items-center">
											<div class="user-online">
												<img src="https://via.placeholder.com/110x110" class="msg-avatar" alt="user avatar">
											</div>
											<div class="media-body">
												<h6 class="msg-name">Daisy Anderson <span class="msg-time float-right">5 sec
													ago</span></h6>
												<p class="msg-info">The standard chunk of lorem</p>
											</div>
										</div>
									</a>
									<a class="dropdown-item" href="javascript:;">
										<div class="media align-items-center">
											<div class="user-online">
												<img src="https://via.placeholder.com/110x110" class="msg-avatar" alt="user avatar">
											</div>
											<div class="media-body">
												<h6 class="msg-name">Althea Cabardo <span class="msg-time float-right">14
													sec ago</span></h6>
												<p class="msg-info">Many desktop publishing packages</p>
											</div>
										</div>
									</a>
									<a class="dropdown-item" href="javascript:;">
										<div class="media align-items-center">
											<div class="user-online">
												<img src="https://via.placeholder.com/110x110" class="msg-avatar" alt="user avatar">
											</div>
											<div class="media-body">
												<h6 class="msg-name">Oscar Garner <span class="msg-time float-right">8 min
													ago</span></h6>
												<p class="msg-info">Various versions have evolved over</p>
											</div>
										</div>
									</a>
									<a class="dropdown-item" href="javascript:;">
										<div class="media align-items-center">
											<div class="user-online">
												<img src="https://via.placeholder.com/110x110" class="msg-avatar" alt="user avatar">
											</div>
											<div class="media-body">
												<h6 class="msg-name">Katherine Pechon <span class="msg-time float-right">15
													min ago</span></h6>
												<p class="msg-info">Making this the first true generator</p>
											</div>
										</div>
									</a>
									<a class="dropdown-item" href="javascript:;">
										<div class="media align-items-center">
											<div class="user-online">
												<img src="https://via.placeholder.com/110x110" class="msg-avatar" alt="user avatar">
											</div>
											<div class="media-body">
												<h6 class="msg-name">Amelia Doe <span class="msg-time float-right">22 min
													ago</span></h6>
												<p class="msg-info">Duis aute irure dolor in reprehenderit</p>
											</div>
										</div>
									</a>
									<a class="dropdown-item" href="javascript:;">
										<div class="media align-items-center">
											<div class="user-online">
												<img src="https://via.placeholder.com/110x110" class="msg-avatar" alt="user avatar">
											</div>
											<div class="media-body">
												<h6 class="msg-name">Cristina Jhons <span class="msg-time float-right">2 hrs
													ago</span></h6>
												<p class="msg-info">The passage is attributed to an unknown</p>
											</div>
										</div>
									</a>
									<a class="dropdown-item" href="javascript:;">
										<div class="media align-items-center">
											<div class="user-online">
												<img src="https://via.placeholder.com/110x110" class="msg-avatar" alt="user avatar">
											</div>
											<div class="media-body">
												<h6 class="msg-name">James Caviness <span class="msg-time float-right">4 hrs
													ago</span></h6>
												<p class="msg-info">The point of using Lorem</p>
											</div>
										</div>
									</a>
									<a class="dropdown-item" href="javascript:;">
										<div class="media align-items-center">
											<div class="user-online">
												<img src="https://via.placeholder.com/110x110" class="msg-avatar" alt="user avatar">
											</div>
											<div class="media-body">
												<h6 class="msg-name">Peter Costanzo <span class="msg-time float-right">6 hrs
													ago</span></h6>
												<p class="msg-info">It was popularised in the 1960s</p>
											</div>
										</div>
									</a>
									<a class="dropdown-item" href="javascript:;">
										<div class="media align-items-center">
											<div class="user-online">
												<img src="https://via.placeholder.com/110x110" class="msg-avatar" alt="user avatar">
											</div>
											<div class="media-body">
												<h6 class="msg-name">David Buckley <span class="msg-time float-right">2 hrs
													ago</span></h6>
												<p class="msg-info">Various versions have evolved over</p>
											</div>
										</div>
									</a>
									<a class="dropdown-item" href="javascript:;">
										<div class="media align-items-center">
											<div class="user-online">
												<img src="https://via.placeholder.com/110x110" class="msg-avatar" alt="user avatar">
											</div>
											<div class="media-body">
												<h6 class="msg-name">Thomas Wheeler <span class="msg-time float-right">2 days
													ago</span></h6>
												<p class="msg-info">If you are going to use a passage</p>
											</div>
										</div>
									</a>
									<a class="dropdown-item" href="javascript:;">
										<div class="media align-items-center">
											<div class="user-online">
												<img src="https://via.placeholder.com/110x110" class="msg-avatar" alt="user avatar">
											</div>
											<div class="media-body">
												<h6 class="msg-name">Johnny Seitz <span class="msg-time float-right">5 days
													ago</span></h6>
												<p class="msg-info">All the Lorem Ipsum generators</p>
											</div>
										</div>
									</a>
								</div>
								<a href="javascript:;">
									<div class="text-center msg-footer">View All Messages</div>
								</a>
							</div>
						</li> --}}
						{{-- <li >
							<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="{{route('users.editprof')}}" >	<i class="bx bx-bell vertical-align-middle"></i>
								
							</a>

						</li> --}}
						<li class="nav-item dropdown dropdown-user-profile">
							<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-toggle="dropdown">
								<div class="media user-box align-items-center">
									<div class="media-body user-info">
										<p class="user-name mb-0">{{ Auth::user()->name }}</p>
										<p class="designattion mb-0">
											{{-- @if(
											Auth::user()->id=1)
											admin
											@else
												d3soft
											@endif --}}
										</p>
									</div>
									<img src="https://nsa40.casimages.com/img/2021/09/26/21092609201734367.png" class="user-img" alt="user avatar">
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-right">	<a class="dropdown-item" href="{{route('users.editprof')}}"><i
										class="bx bx-user"></i><span>Profile</span></a>
								<a class="dropdown-item" href="{{ route('users.updateprof') }}"><i
										class="bx bx-cog"></i><span>Parametre profile</span></a>
								<a class="dropdown-item" href="/"><i
										class="bx bx-tachometer"></i><span>Dashboard</span></a>
							
										<div class="dropdown-divider mb-0"></div>	<a class="dropdown-item" href="{{ route('logout') }}"
										onclick="event.preventDefault();
													  document.getElementById('logout-form').submit();" ><i
												class="bx bx-power-off"></i><span> {{ __('Logout') }}</span></a>
												<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
													@csrf
												</form>
							</div>
						</li>
					</ul>
				</div>
			</nav>
		</header>
		<!--end header-->
		<!--page-wrapper-->
		<div class="page-wrapper">
			<!--page-content-wrapper-->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="row">
						<div class="col-12 col-lg-3">
							<div class="card radius-15 bg-voilet">
								<div class="card-body">
									<div class="d-flex align-items-center">
										<div>
											<h2 class="mb-0 text-white" >
												<?php 
												$count = DB::table('clients')->count();
												echo '<h3 style="color: white">'.$count.'</h3>';
												?> 
												 </h2>
										</div>
										<div class="ml-auto font-35 text-white"><i class="bx bx-body"></i>
										</div>
									</div>
									<div class="d-flex align-items-center">
										<div>
											<p class="mb-0 text-white">Clients</p>

										</div>
										<div class="ml-auto font-14 text-white"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-3">
							<div class="card radius-15 bg-primary-blue">
								<div class="card-body">
									<div class="d-flex align-items-center">
										<div>
											<h2 class="mb-0 text-white"><?php 
												$count = DB::table('cars')->count();
												echo '<h3 style="color: white">'.$count.'</h3>';
												?>  <i class='bx bxs-down-arrow-alt font-14 text-white'></i> </h2>
										</div>
										<div class="ml-auto font-35 text-white"><i class="bx bx-car"></i>
										</div>
									</div>
									<div class="d-flex align-items-center">
										<div>
											<p class="mb-0 text-white">Voitures</p>
										</div>
										
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-3">
							<div class="card radius-15 bg-rose">
								<div class="card-body">
									<div class="d-flex align-items-center">
										<div>
											<h2 class="mb-0 text-white">
												<?php 
												$count = DB::table('contracts')->count();
												echo '<h3 style="color: white">'.$count.'</h3>';
												?>  <i class='bx bxs-up-arrow-alt font-14 text-white'></i> </h2>
										</div>
										<div class="ml-auto font-35 text-white"><i class="bx bx-map-pin"></i>
										</div>
									</div>
									<div class="d-flex align-items-center">
										<div>
											<p class="mb-0 text-white">Contrats</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-3">
							<div class="card radius-15 bg-sunset">
								<div class="card-body">
									<div class="d-flex align-items-center">
										<div>
											<h2 class="mb-0 text-white"><?php 
												$count = DB::table('contracts')->sum('amount');
												echo '<h3 style="color: white">'.$count.' DH</h3>';
												?>  <i class='bx bxs-up-arrow-alt font-14 text-white'></i> </h2>
										</div>
										<div class="ml-auto font-35 text-white"><i class="bx bx-user"></i>
										</div>
									</div>
									<div class="d-flex align-items-center">
										<div>
											<p class="mb-0 text-white">Revenue Total</p>
										</div>
										<div class="ml-auto font-14 text-white">	<?php 
											$count = DB::table('contracts')->avg('amount')/DB::table('cars')->avg('price_day');
											echo '<h6 style="color: white">'.$count.' %</h6>';
											?></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--end row-->
					{{-- <div class="card radius-15">
						<div class="card-header border-bottom-0">
							<div class="d-lg-flex align-items-center">
								<div>
									<h5 class="mb-2 mb-lg-0">location</h5>
								</div> --}}
								{{-- <div class="ml-lg-auto mb-2 mb-lg-0">
									<div class="btn-group-round">
										<div class="btn-group">
											
											<button type="button" class="btn btn-white">Mensuel</button>
										</div>
									</div>
								</div> --}}
							{{-- </div>
						</div>
						<div class="card-body">
							<div id="chart1"></div>
						</div>
					</div> --}}
					<div class="card-deck">
						<div class="card radius-15">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<h5 class="mb-0">Nombre de location</h5>
									</div>
									<div class="dropdown ml-auto">
										<div class="cursor-pointer font-24 dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
										</div>
										<div class="dropdown-menu dropdown-menu-right">	<a class="dropdown-item" href="javascript:;">Action</a>
											<a class="dropdown-item" href="javascript:;">Another action</a>
											<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Something else here</a>
										</div>
									</div>
								</div>
								<div id="chart4"></div>
								{{-- <div>
									<h5 class="mb-0">Nombre de location</h5>
								</div>
								<hr>
								<div class="legends">
									<div class="row">
										<div class="col-12 col-lg-5">
											<div class="d-flex align-items-center justify-content-between">
												<div class="text-secondary"><i class='bx bxs-circle font-13 text-primary-blue mr-2'></i>Revenue</div>
												<div><?php 
													$count = DB::table('contracts')->sum('amount');
													echo '<h6 style="color: black">'.$count.' DH</h6>';
													?> </div>
												
											</div>
											<div class="my-2"></div>
											<div class="d-flex align-items-center justify-content-between">
												<div class="text-secondary"><i class='bx bxs-circle font-13 text-shineblue mr-2'></i>Clients</div>
												<div><?php 
													$count = DB::table('clients')->count('cin');
													echo '<h6 style="color: black">'.$count.' </h6>';
													?></div>
												
											</div>
										</div>
										<div class="col-12 col-lg-2">
											<div class="vertical-separater"></div>
										</div>
										<div class="col-12 col-lg-5">
											<div class="d-flex align-items-center justify-content-between">
												<div class="text-secondary"><i class='bx bxs-circle font-13 text-primary mr-2'></i>Revenue Moyen</div>
												<div><?php 
													$count = DB::table('contracts')->avg('amount');
													echo '<h6 style="color: black">'.$count.' DH</h6>';
													?></div>
												
											</div>
											<div class="my-2"></div>
											<div class="d-flex align-items-center justify-content-between">
												<div class="text-secondary"><i class='bx bxs-circle font-13 text-red mr-2'></i>Nombre de location</div>
												<div><?php 
													$count = DB::table('contracts')->count();
													echo '<h6 style="color: black">'.$count.' </h6>';
													?></div>
												
											</div>
										</div>
									</div>
								</div> --}}
							</div>
						</div>
						<div class="card radius-15">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<h5 class="mb-0">Voiture</h5>
									</div>
									
								</div>
								<div class="row mt-3">
									<div class="col-12 col-lg-6">
										<div class="card radius-15 mx-0">
											<div class="card-body">
												<div class="d-flex align-items-center">
													<div>
														<p class="mb-0">Diesel</p>
													</div>
													<div class="ml-auto text-success"><span>100%</span>
													</div>
												</div>
												<h4 class="mb-0">2 Voiture</h4>
											</div>
										</div>
									</div>
									<div class="col-12 col-lg-6">
										<div class="card radius-15 mx-0">
											<div class="card-body">
												<div class="d-flex align-items-center">
													<div>
														<p class="mb-0">Essence</p>
													</div>
													<div class="ml-auto text-purple"><span>0%</span>
													</div>
												</div>
												<h4 class="mb-0">0 Voiture</h4>
											</div>
										</div>
									</div>
								</div>
								{{-- <div id="chart8"></div> --}}
								<br>
								<div>
									<h5 class="mb-0">Revenue et Client</h5>
								</div>
								<hr>
								<div class="legends">
									<div class="row">
										<div class="col-12 col-lg-5">
											<div class="d-flex align-items-center justify-content-between">
												<div class="text-secondary"><i class='bx bxs-circle font-13 text-primary-blue mr-2'></i>Revenue</div>
												<div><?php 
													$count = DB::table('contracts')->sum('amount');
													echo '<h6 style="color: black">'.$count.' DH</h6>';
													?> </div>
												
											</div>
											<div class="my-2"></div>
											<div class="d-flex align-items-center justify-content-between">
												<div class="text-secondary"><i class='bx bxs-circle font-13 text-shineblue mr-2'></i>Clients</div>
												<div><?php 
													$count = DB::table('clients')->count('cin');
													echo '<h6 style="color: black">'.$count.' </h6>';
													?></div>
												
											</div>
										</div>
										<div class="col-12 col-lg-2">
											<div class="vertical-separater"></div>
										</div>
										<div class="col-12 col-lg-5">
											<div class="d-flex align-items-center justify-content-between">
												<div class="text-secondary"><i class='bx bxs-circle font-13 text-primary mr-2'></i>Revenue Moyen</div>
												<div><?php 
													$count = DB::table('contracts')->avg('amount');
													echo '<h6 style="color: black">'.$count.' DH</h6>';
													?></div>
												
											</div>
											<div class="my-2"></div>
											<div class="d-flex align-items-center justify-content-between">
												<div class="text-secondary"><i class='bx bxs-circle font-13 text-red mr-2'></i>Nombre de location</div>
												<div><?php 
													$count = DB::table('contracts')->count();
													echo '<h6 style="color: black">'.$count.' </h6>';
													?></div>
												
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12 col-lg-4 d-flex align-items-stretch">
							<div class="card radius-15 w-100">
								<div class="card-body">
									<div class="d-lg-flex align-items-center">
										<div>
											<h5 class="mb-4">Pourcentage de location de voiture</h5>
										</div>
									</div>
									<div class="progress-wrapper">
										<p class="mb-1">AUDI A8 <span class="float-right">50%</span>
										</p>
										<div class="progress radius-15" style="height:4px;">
											<div class="progress-bar bg-green" role="progressbar" style="width: 50%"></div>
										</div>
									</div>
									<hr>
									<div class="progress-wrapper">
										<p class="mb-1">MERCEDES <span class="float-right">50%</span>
										</p>
										<div class="progress radius-15" style="height:4px;">
											<div class="progress-bar bg-voilet" role="progressbar" style="width: 50%"></div>
										</div>
									</div>
									<hr>
									
									<hr>
									
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-8 d-flex align-items-stretch">
							<div class="card radius-15 w-100">
								<div class="card-body">
									<div class="d-flex align-items-center">
										<div>
											<h5 class="mb-0">Prévision de location</h5>
										</div>
										<div class="dropdown ml-auto">
											<div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
											</div>
											<div class="dropdown-menu dropdown-menu-right">	<a class="dropdown-item" href="javascript:;">Action</a>
												<a class="dropdown-item" href="javascript:;">Another action</a>
												<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Something else here</a>
											</div>
										</div>
									</div>
									<div class="row mt-3">
										<div class="col-12 col-lg-6">
											<div class="card radius-15 mx-0">
												<div class="card-body">
													<div class="media align-items-center">
														<div class="media-body">
															<p class="text-secondary mb-0"></p>
															<h4 class="mb-0 "></h4>
														</div>
														<div id="chart6"></div>
													</div>
												</div>
											</div>
										</div>
										
										<div class="col-12 col-lg-6">
											
											<div class="card radius-15 mx-0">

												<div class="card-body">
													
													<div class="d-flex align-items-center">
														<div>
															<p class="mb-0">Entretiens</p>
															{{-- <h4 class="mb-0">-2.7%</h4> --}}
														</div>
														<div id="chart5"></div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-12 col-lg-6">
											<div class="card radius-15 mx-0 mb-3 mb-md-0">
												<div class="card-body">
													<div class="media align-items-center">
														<div class="media-body">
															{{-- <p class="text-secondary mb-0">Orders</p>
															<h4 class="mb-0">+32.6%</h4> --}}
														</div>
														<div id="chart6"></div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-12 col-lg-6">
											<div class="card radius-15 mx-0 mb-0">
												<div class="card-body">
													<div class="media align-items-center">
														<div class="media-body">
															{{-- <p class="text-secondary mb-0">Visitors</p>
															<h4 class="mb-0">+60.2%</h4> --}}
														</div>
														<div id="chart7"></div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--end row-->

					<!--end row-->
					
				
		<!--end page-wrapper-->
		<!--start overlay-->
		<div class="overlay toggle-btn-mobile"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<!--footer -->
		<div class="footer">
		
		</div>
		<!-- end footer -->
	</div>
	<!-- end wrapper -->
	<!--start switcher-->
	<div class="switcher-wrapper">
		<div class="switcher-btn"> <i class='bx bx-cog bx-spin-hover'></i>
		</div>
		<div class="switcher-body">
			<h5 class="mb-0 text-uppercase">Choisir Theme</h5>
			<hr/>
			<h6 class="mb-0">Theme Styles</h6>
			<hr/>
			<div class="d-flex align-items-center justify-content-between">
				<div class="custom-control custom-radio">
					<input type="radio" id="darkmode" name="customRadio" class="custom-control-input">
					<label class="custom-control-label" for="darkmode">Mode de Nuit</label>
				</div>
				<div class="custom-control custom-radio">
					<input type="radio" id="lightmode" name="customRadio" checked class="custom-control-input">
					<label class="custom-control-label" for="lightmode">Mode Lumière</label>
				</div>
			</div>
			<hr/>
			<div class="custom-control custom-switch">
				<input type="checkbox" class="custom-control-input" id="DarkSidebar">
				<label class="custom-control-label" for="DarkSidebar">Sidebar Mode de Nuit</label>
			</div>
			<hr/>
			<div class="custom-control custom-switch">
				<input type="checkbox" class="custom-control-input" id="ColorLessIcons">
				<label class="custom-control-label" for="ColorLessIcons">Icône Sans Couleur</label>
			</div>
		</div>
	</div>
                

                <div class="links">
                    
                    
              
                
  
             

                   
                    
            

            
                    
              	<!--end switcher-->
	<!-- JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<!--plugins-->
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!-- Vector map JavaScript -->
	<script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
	<script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="assets/plugins/vectormap/jquery-jvectormap-in-mill.js"></script>
	<script src="assets/plugins/vectormap/jquery-jvectormap-us-aea-en.js"></script>
	<script src="assets/plugins/vectormap/jquery-jvectormap-uk-mill-en.js"></script>
	<script src="assets/plugins/vectormap/jquery-jvectormap-au-mill.js"></script>
	<script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
	<script src="assets/js/index.js"></script>
	<!-- App JS -->
	<script src="assets/js/app.js"></script>
	<script>
		new PerfectScrollbar('.dashboard-social-list');
		new PerfectScrollbar('.dashboard-top-countries');
	</script>
</body>

</html>