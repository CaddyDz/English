@extends('layouts.master')

@section('content')

<div class="jumbotron">
	<div id="header">
		<img src="{{ asset('img/brand.png') }}" id="logo" alt="English DZ Logo">
		<span id="websiteTitle">English DZ</span>
		<p id="websiteSlogan">Learn English in Algeria, the fun way</p>
	</div>
</div>

<div id="theCarousel" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		<li data-target="#theCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#theCarousel" data-slide-to="1"></li>
		<li data-target="#theCarousel" data-slide-to="2"></li>
		<li data-target="#theCarousel" data-slide-to="3"></li>
	</ol>
	<div class="carousel-inner">
		<div class="item active">
			<div class="slide1"></div>
				<div class="carousel-caption">
					<h1>English DZ</h1>
					<p>Algerian English speakers social network</p>
					@if(!Auth::user())
					<p><a href="{{ url('/register') }}" class="btn btn-success btn-sm">Sign Up Now!</a></p>
				@endif
				</div>
		</div>
		<div class="item">
			<div class="slide2"></div>
				<div class="carousel-caption">
					<h1>English DZ</h1>
					<p>Algerian English speakers social network</p>
				</div>
		</div>
		<div class="item">
			<div class="slide3"></div>
				<div class="carousel-caption">
					<h1>English DZ</h1>
					<p>Algerian English speakers social network</p>
				</div>
		</div>
		<div class="item">
			<div class="slide4"></div>
				<div class="carousel-caption">
					<h1>English DZ</h1>
					<p>Algerian English speakers social network</p>
				</div>
		</div>
	</div>
	<a class="right carousel-control" href="#theCarousel" data-slide="next">
	<span class="glyphicon glyphicon-chevron-right"></span></a>
	<a class="left carousel-control" href="#theCarousel" data-slide="prev">
	<span class="glyphicon glyphicon-chevron-left"></span></a>
</div>
@if (!Auth::user())
<div class="row usr-login">
	<div class="col-lg-3 col-sm-8 col-lg-offset-2 col-sm-offset-2 usr-login-sec">
		<p>Existing user?</p>
		<a class="usr-btn" href="{{ url('/login') }}">Login</a>
	</div>
	<div class="col-lg-3 col-sm-8 col-lg-offset-2 col-sm-offset-2 usr-register-sec">
		<p>New user?</p>
		<a class="usr-btn" href="{{ url('/register') }}">Register</a>
	</div>
</div>
@endif

@endsection

@section('stylesheets')
  <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
@endsection
