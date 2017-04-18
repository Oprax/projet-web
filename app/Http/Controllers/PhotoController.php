<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Activity $activity
     * @return \Illuminate\Http\Response
     */
    public function index(Activity $activity)
    {
        $photos = Photo::all()->where('activity_id', $activity->id)->all();
        return view('pages.photo.index', [
            'activity' => $activity,
            'photos' => $photos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \App\Activity $activity
     * @return \Illuminate\Http\Response
     */
    public function create(Activity $activity)
    {
        return view('pages.photo.create', ['activity' => $activity]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param \App\Activity $activity
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Activity $activity)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Photo $photo
     * @param \App\Activity $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo, Activity $activity)
    {
        return view('pages.photo.show', ['activity' => $activity]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Photo $photo
     * @param \App\Activity $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo, Activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Photo $photo
     * @param \App\Activity $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo, Activity $activity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photo $photo
     * @param \App\Activity $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo, Activity $activity)
    {
        //
    }
}
