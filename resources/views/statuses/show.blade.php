<div class="ui inverted raised segment media" id="{{ $status->id }}">
  <a class="ui big image label" href="{{ route('users.show', ['username' => $status->user->name]) }}">
    <img src="{{ asset('img/avatars/39x39/'.$status->user->meta->avatar.'') }}" alt="{{ $status->user->name }}">
    {{ $status->user->name }}
  </a> {{ $status->created_at->diffForHumans() }}
  <div class="media-body">
    <h1>{{ $status->body }}</h1>
      {{-- if the currently authenticated user has not liked the status --}}
        {{-- if the owner of the status is not the authenticated user --}}
        <div class="interaction">
          <div class="ui labeled button like" tabindex="0">
            <div class="ui tiny red button" href="{{ route('status.like', ['status_id' => $status->id]) }}">
              <i class="heart icon"></i>Love
            </div>
            <a class="ui basic red left pointing label">
              {{ $status->likes->count() }} {{ str_plural('like', $status->likes->count()) }}
            </a>
          </div>
          <div class="ui labeled button like" tabindex="0">
            <div class="ui tiny red button" href="{{ route('status.like', ['status_id' => $status->id]) }}">
              <i class="heartbeat icon"></i>Hate
            </div>
            <a class="ui basic red left pointing label">
              {{ $status->likes->count() }} {{ str_plural('dislike', $status->likes->count()) }}
            </a>
          </div>
          @if (Auth::user()->id == $status->user->id)
            <a class="deleteStatus" data-id="{{ $status->id }}" href="#">Delete</a>
          @endif
        </div>
    <div class="ui comments" id="repliesBlock{{ $status->id }}">
      <h3 class="ui inverted dividing header">Comments</h3>
      @foreach ($status->comments as $comment)
        @include('comments.show', ['comment' => $comment])
      @endforeach
    </div>
    @include('comments.create')
  </div>
</div>
