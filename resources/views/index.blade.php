@extends('layouts.master')

@section('title')
  {{ config('app.name') }}
@endsection

@section('content')
  <div class="ui container" id="root">
    @include('statuses.create')
    @if (isset($statuses))
      <div id="statusesBlock">
  			@if (!$statuses->count())
  				<p id="nullStatuses">There's nothing in your timeline, yet.</p>
  			@else
  				@foreach($statuses as $status)
  					@include('statuses.show')
  				@endforeach
  			@endif
  		</div>
    @endif
  </div>
@endsection
