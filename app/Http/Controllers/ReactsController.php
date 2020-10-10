<?php

declare(strict_types=1);

namespace English\Http\Controllers;

use English\Http\Requests\ReactToStatusRequest;
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
     * react to a status.
     *
     * Store a reaction record associated with the status
     *
     * @param Status                                     $status  The status model
     * @param English\Http\Requests\ReactToStatusRequest $request Valid request object
     *
     * @throws StatusNotFoundException
     *
     * @return Illuminate\Http\Response
     **/
    public function react(Status $status, ReactToStatusRequest $request)
    {
        $reacter = $request->user()->viaLoveReacter();
        $reacter->reactTo($status, $request->reaction_type);
    }
}
