@extends('layouts.master')

@section('content')
  <div class="ui container">
    <h3>Your search for "{{ Request::input('query') }}"</h3>
    @if (!$users->count())
      <p>No results found, sorry.</p>
    @else
      <div class="column">
          @foreach ($users as $user)
            @include('partials.userblock')
          @endforeach
      </div>
    @endif
  </div>
@endsection
