<?php

namespace English\Http\Controllers\Api;

use English\Http\Controllers\Controller;
use English\Http\Requests\StatusRequest;
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

        return response()->json($statuses);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $statuses = $this->service->search($request->search);

        return response()->json($statuses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\StatusRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StatusRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return response()->json($result);
        }

        return response()->json(['error' => 'Unable to create status'], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $status = $this->service->find($id);

        return response()->json($status);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\StatusRequest $request
     * @param int                            $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(StatusRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            return response()->json($result);
        }

        return response()->json(['error' => 'Unable to update status'], 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return response()->json(['success' => 'Status was deleted'], 200);
        }

        return response()->json(['error' => 'Unable to delete status'], 500);
    }
}
