<?php

namespace App\Http\Controllers;

use App\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscribeController extends Controller
{
    private $store_rule = [
        'user_id' => 'required|integer|exists:users,id',
        'activity_id' => 'required|integer|exists:activities,id'
    ];

    public function __construct()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $v = Validator::make($request->query(), [
            'fid' => 'required|integer|exists:activities,id',
            'uid' => 'integer|exists:users,id'
        ]);
        if ($v->fails()) {
            return response()->json(['errors' => $v->errors()->toArray()], 400);
        }
        $q = collect($request->query());
        $subscribes = Subscribe::where('activity_id', $q->get('fid'));
        if ($q->has('uid')) {
            $subscribes = $subscribes->where('user_id', $q->get('uid'));
        }
        return response()->json($subscribes->get()->toArray());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = Validator::make($request->all(), $this->store_rule);
        if ($v->fails()) {
            return response()->json(['errors' => $v->errors()->toArray()], 400);
        }
        $subscribe = Subscribe::create($request->all());
        return response()->json($subscribe->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subscribe  $subscribe
     * @return \Illuminate\Http\Response
     */
    public function show(Subscribe $subscribe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subscribe  $subscribe
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscribe $subscribe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subscribe  $subscribe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscribe $subscribe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subscribe  $subscribe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscribe $subscribe)
    {
        $subscribe->delete();
        return response()->json($subscribe->toArray());
    }
}
