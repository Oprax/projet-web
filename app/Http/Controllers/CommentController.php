<?php

namespace App\Http\Controllers;

use App\Comment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    private $store_rule = [
        'content' => 'required',
        'user_id' => 'required|integer|exists:users,id',
        'commentable_id' => 'required|integer',
        'commentable_type' => 'required|max:255'
    ];

    private $update_rule = [

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
            'type' => 'required|max:255|exists:comments,commentable_type',
            'fid' => 'integer|exists:comments,commentable_id'
        ]);
        if ($v->fails()) {
            return response()->json(['errors' => $v->errors()->toArray()], 400);
        }
        $q = collect($request->query());
        $comments = Comment::where('commentable_type', $q->get('type'));
        if ($q->has('fid')) {
            $comments->where('commentable_id', $q->get('fid'));
        }
        $comments = $comments->get()->toArray();
        for ($i = 0; $i < count($comments); $i++)
        {
            $comments[$i]['user'] = User::find($comments[$i]['user_id'])->toArray();
        }
        return response()->json($comments);
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
        $comment = Comment::create($request->all());
        return response()->json($comment->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        return response()->json($comment->toArray());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $v = Validator::make($request->all(), array_merge($this->store_rule, $this->update_rule));
        if ($v->fails()) {
            return response()->json(['errors' => $v->errors()->toArray()], 400);
        }
        $comment->update($request->all())->save();
        return response()->json($comment->toArray());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $data = $comment->toArray();
        $comment->delete();
        return response()->json($data);
    }
}
