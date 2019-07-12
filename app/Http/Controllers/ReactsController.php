<?php

namespace English\Http\Controllers;

use English\Http\Requests\LikeStatusRequest;
use English\Status;

class ReactsController extends Controller
{
    /**
     * ReactsController Constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * like a status.
     *
     * Store a like record associated with the status
     *
     * @param Status                                  $status  The status model
     * @param English\Http\Requests\LikeStatusRequest $request Valid request object
     *
     * @throws StatusNotFoundException
     *
     * @return Illuminate\Http\Response
     **/
    public function like(Status $status, LikeStatusRequest $request)
    {
        return $status->like();
    }
}
