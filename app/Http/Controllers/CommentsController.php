<?php

declare(strict_types=1);

namespace English\Http\Controllers;

use English\Status;
use English\Http\Requests\PostCommentRequest;

class CommentsController extends Controller
{
	/**
	 * Create a new controller instance.
	 * Pass through the auth middleware
	 * Only authenticated users can reach this controller.
	 *
	 * @return void
	 */
	public function __construct()
	{
		// Apply the auth middleware only on the store method
		$this->middleware('auth', ['only' => ['store']]);
	}

	/**
	 * Store a new comment.
	 *
	 * @return redirect back
	 */
	public function store(Status $status, PostCommentRequest $request)
	{
		$status->addComment(([
			'body'      => $request->body,
			'status_id' => $status->id,
			'user_id'   => auth()->id(),
		]));

		return back();
	}
}
