<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LikeController extends Controller
{
    private $store_rule = [
        'user_id' => 'required|integer|exists:users,id',
        'likable_id' => 'required|integer',
        'likable_type' => 'required|max:255'
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
            'type' => 'required|max:255|exists:likes,likable_type',
            'fid' => 'integer|exists:likes,likable_id',
            'uid' => 'integer|exists:users,id'
        ]);
        if ($v->fails()) {
            return response()->json(['errors' => $v->errors()->toArray()], 400);
        }
        $q = collect($request->query());
        $likes = Like::where('likable_type', $q->get('type'));
        if ($q->has('fid')) {
            $likes->where('likable_id', $q->get('fid'));
        }
        if ($q->has('uid')) {
            $likes->where('user_id', $q->get('uid'));
        }
        $likes = $likes->get()->toArray();
        return response()->json($likes);
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
        $like = Like::create($request->all());
        return response()->json($like->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Like $like)
    {
        $v = Validator::make($request->all(), $this->store_rule);
        if ($v->fails()) {
            return response()->json(['errors' => $v->errors()->toArray()], 400);
        }
        $like->update($request->all())->save();
        return response()->json($like->toArray());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Like $like)
    {
        $like->delete();
        return response()->json($like->toArray());
    }
}
