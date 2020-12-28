<?php

namespace English\Http\Controllers;

use English\Http\Requests\StatusCreateRequest;
use English\Http\Requests\StatusUpdateRequest;
use English\Models\Status;
use English\Services\StatusService;
use Illuminate\Http\Request;

class StatusesController extends Controller
{
    public function __construct(StatusService $status_service)
    {
        $this->service = $status_service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $statuses = $this->service->paginated();

        return view('statuses.index')->with('statuses', $statuses);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $statuses = $this->service->search($request->search);

        return view('statuses.index')->with('statuses', $statuses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('statuses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\StatusCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StatusCreateRequest $request)
    {
        if ($request->ajax()) {
            $this->validate($request, [
                'body'  => 'required|max:1000',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $id = \Auth::user()->statuses()->create($request->only('body', 'image'))->id;
            if ($id) {
                // return the ID of the created status
                return $id;
            }
        }
    }

    /**
     * Display the status.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (request()->ajax()) {
            $status = $this->service->find($id);

            return view('statuses.show', compact('status'))->render();
        }
    }

    /**
     * Show the form for editing the status.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $status = $this->service->find($id);

        return view('statuses.edit')->with('status', $status);
    }

    /**
     * Update the statuses in storage.
     *
     * @param \Illuminate\Http\StatusUpdateRequest $request
     * @param int                                  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(StatusUpdateRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));
        if ($result) {
            return back()->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the statuses from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);
        if ($result) {
            return redirect(route('statuses.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('statuses.index'))->with('message', 'Failed to delete');
    }

    public function react($status_id)
    {
        $status = Status::find($status_id);
        if (!$status) {
            return redirect()->route('/');
        }
        if (Auth::user()->hasLikedStatus($status)) {
            return redirect()->back();
        }
        $like = $status->likes()->create([]);
        Auth::user()->likes()->save($like);

        return redirect()->back();
    }

    public function postComment(Request $request)
    {
        if ($request->ajax()) {
            $status = Status::find($request->status_id);
            $this->validate($request, [
                'replyBody' => 'required|max:1000',
            ]);
            // Check if the status being replied to exists
            $status = Status::find($request->status_id);
            if (!$status) {
                return Response::json(['errors' => 'Status doesn\'t exist']);
            }
            $comment = $status->comments()->create([
                'body'    => $request->replyBody,
                'user_id' => \Auth::user()->id,
            ]);

            return view('comments.show')->with([
                'comment' => $comment,
                'status'  => $status,
            ])->render();
        }
    }
}
