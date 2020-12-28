<div class="ui inverted pointing menu" id="topNavbar">
	<a class="item" id="navbarBrand" href="/">
		<img alt="{{ config('app.name') }}" src="{{ asset('img/brand_35x35.png') }}">
		{{ config('app.name') }}
	</a>
	@if(Auth::check())
			<div class="item" id="topNavSearchBar">
				<form class="ui transparent icon input" action="{{ route('search.results') }}">
					<div class="ui transparent icon input">
						<input placeholder="Search..." type="text" name="query">
						<i class="search link icon"></i>
					</div>
				</form>
			</div>
	@endif
	<div class="right menu">
		@if(Auth::check())
			<a href="{{ url('/') }}" class="active item">Timeline</a>
			<div class="ui dropdown item" id="profileDropdown">
				{{ Auth::user()->name }}
				<i class="dropdown icon"></i>
				<div class="menu">
					<a href="{{ route('users.show', ['username' => Auth::user()->name]) }}" class="item">Profile</a>
					<a href="{{ route('settings') }}" class="item">Edit Profile</a>
					<div class="divider"></div>
					<a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="item">Logout</a><form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }} </form>
				</div>
			</div>
		@else
			<a href="{{ url('login') }}" class="ui item">Login</a>
			<a href="{{ url('/#register') }}" class="ui item">Sign up</a>
		@endif
	</div>
</div>

@section('stylesheets')
	<link rel="stylesheet" href="{{ asset('css/nav.css') }}">
@endsection
