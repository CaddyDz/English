<?php

declare(strict_types=1);

namespace English\Http\Controllers;

use English\Tag;
use English\Status;
use Illuminate\Http\Request;
use English\Filters\StatusFilters;

class StatusesController extends Controller
{
	/**
	 * StatusesController constructor.
	 * Restrict access to write methods
	 * for authenticated users only.
	 *
	 * @param none
	 *
	 * @throws Illuminate\Auth\AuthenticationException
	 *
	 * @return English\Http\Middleware\RedirectIfAuthenticated
	 */
	public function __construct()
	{
		$this->middleware('auth')->except(['index', 'show']);
	}

	/**
	 * Display a listing of the statuses.
	 *
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Tag $tag, StatusFilters $filters)
	{
		$statuses = $this->getStatuses($tag, $filters);

		return view('statuses.index', compact('statuses'));
	}

	/**
	 * Store a newly created status in storage.
	 *
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			'body'   => 'required',
			'tags'   => 'required|between:1,5',
			'tags.*' => 'exists:tags,id|distinct',
		], [
			'tags.between'  => 'You can only choose up to 5 tags',
			'tags.required' => 'You must pick at least 1 tag',
			'body.required' => 'Can\'t post an empty status',
		]);

		$status = Status::create([
			'user_id' => auth()->id(),
			'body'    => $request->body,
		]);

		return redirect($status->path());
	}

	/**
	 * Display the specified status.
	 *
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show(Status $status)
	{
		return view('statuses.show', compact('status'));
	}

	protected function getStatuses(Tag $tag, StatusFilters $filters)
	{
		$statuses = Status::latest()->filter($filters);
		if ($tag->exists) {
			$statuses = $tag->statuses();
		}

		return $statuses->get();
	}
}
