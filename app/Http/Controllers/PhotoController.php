<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PhotoController extends EventHandlerController
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Activity $activity
     * @return \Illuminate\Http\Response
     */
    public function index(Activity $activity)
    {
        $photos = Photo::where('activity_id', $activity->id)->get();
        $photos = $photos->map(function ($photo) {
            $photo->comment_count = $photo->comments->count();
            $photo->comment = $photo->comments->sortBy('created_at')->first();
            return $photo;
        });
        return $this->view('pages.photo.index', [
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
        return $this->view('pages.photo.create', ['activity' => $activity]);
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
    public function show(Activity $activity, Photo $photo)
    {
        return $this->view('pages.photo.show', [
            'activity' => $activity,
            'photo' => $photo
        ]);
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
