<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Photo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

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

        $files = $request->file('pics');
        // Making counting of uploaded images
        $file_count = count($files);
        // start count how many uploaded
        $uploadcount = 0;
        $destinationFolder = 'images/activity/photos/';

        if(isset($files)){
            foreach($files as $file) {

                $photo = Photo::create([
                    'activity_id' => $activity->id,
                    'user_id' => Auth::user()->id,
                    'path' => '',
                    'like' => 0
                ]);

                $filename = $photo->id . '-' .Carbon::now()->timestamp .'.' . pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
                $destinationPath = $destinationFolder . $filename;

                try {
                    $file->move($destinationFolder, $filename);
                    $photo->path = $destinationPath;
                    $photo->save();
                    $uploadcount++;
                }
                catch (\Exception $e){
                    return redirect()->route('activity.show')->withErrors(['pics' => $e]);
                }
            }
            if($uploadcount == $file_count){
                //return Redirect::to('upload');
                return redirect()->route('activity.show', $activity);
            }
            else {
                return redirect('activity.show', $activity)->withErrors(['pics' => 'Upload incomplet']);
            }
        }else{
            return redirect()->route('activity.show', $activity)->withErrors(['pics' => 'No File Selected']);
        }
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
