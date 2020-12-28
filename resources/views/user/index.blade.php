@extends('layouts.master')

@section('content')
  <div class="ui container">
    @include('partials.userblock')
    <hr>
    @if (!$statuses->count())
      <p>{{ $user->name }} hasn't posted anything yet.</p>
    @else
      <div class="ui container">
        <div class="ui feed">
          @foreach($statuses as $status)
            <div class="event">
              <div class="label">
                <a href="{{ route('users.index', ['username' => $status->user->username]) }}">
                  <img src="/img/avatars/30x30/{{ $status->user->meta->avatar }}" alt="{{ $status->user->name }}">
                </a>
              </div>
              <div class="content">
                <div class="summary">
                  <a href="{{ route('users.index', ['username' => $status->user->username]) }}">
                    {{ $status->user->name }}
                  </a> posted on his page
                  <div class="date">
                    {{ $status->created_at->diffForHumans() }}
                  </div>
                </div>
                <div class="extra text">
                  {{ $status->body }}
                </div>
                <div class="meta">
                  <a class="like">
                    <i class="like icon"></i> {{ $status->likes->count() }} {{ str_plural('like', $status->likes->count()) }}
                  </a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        </div>
      </div>
    @endif
@stop
