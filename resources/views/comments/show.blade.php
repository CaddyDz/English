<div class="comment">
  <a class="avatar">
    <img src="{{ asset('img/avatars/35x35/'.$comment->user->meta->avatar.'') }}" alt="{{ $comment->user->name }}">
  </a>
  <div class="content">
    <a class="author" href="{{ route('users.show', ['username' => $comment->user->name]) }}">{{ $comment->user->name }}</a>
  </div>
  <div class="metadata">
    <span class="date">{{ $comment->created_at->diffForHumans() }}</span>
  </div>
  <div class="text">
    {{ $comment->body }}
  </div>
  <div class="actions">
    <a class="reply" href="#">Reply</a>
    @if (!Auth::user()->reactedToStatus($status))
      @if ($status->user->id !== Auth::user()->id)
        <li><a href="{{ route('statuses.like', ['status_id' => $comment->id]) }}">Like</a></li>
      @endif
    @endif
  </div>
</div>
