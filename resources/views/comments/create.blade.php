<form class="ui reply form" role="form" action="#" data-id="{{ $status->id }}">
    {{ csrf_field() }}
    <div class="field">
			<input type="text" name="replyBody-{{ $status->id }}" placeholder="Reply to this status" required>
    </div>
    <button class="ui blue tiny labeled submit icon button replyButton" type="submit">
      <i class="icon edit"></i> Add Reply
    </button>
</form>
