<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Comment;
use App\Photo;
use Carbon\Carbon;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ActivityController extends EventHandlerController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::accepted()->orderBy('date')->get();
        $act_past = collect([]);
        $act_curr = collect([]);
        $act_fut = collect([]);
        foreach ($activities as $activity)
        {
            $activity->comment_count = $activity->comments->count();
            $activity->comment = $activity->comments->sortBy('created_at')->first();
            $d = Carbon::parse($activity->date);
            if ($d->isToday())
            {
                $act_curr->push($activity);
            }
            elseif ($d->isFuture())
            {
                $act_fut->push($activity);
            }
            elseif ($d->isPast())
            {
                $act_past->push($activity);
            }
        }
        $act_fut = $act_fut->take(3);
        $act_past = $act_past->take(3);
        return $this->view('pages.activity.index',
            compact('act_past', 'act_fut', 'act_curr'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->view('pages.activity.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        return $this->view('pages.activity.show', compact('activity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        $activity = Activity::with('photos')->where('id', $activity->id)->first();
        return $this->view('pages.activity.edit', compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {
        if(!empty($request->file('pics'))){

            $file = $request->file('pics');

            $destinationFolder = 'images/activity/';

            if(isset($file)){

                    $filename = $activity->id .  '-' . Carbon::now()->timestamp .'.' . pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
                    $destinationPath = $destinationFolder . $filename;
                    $toDelete=$activity->photo;

                    try {

                        $file->move($destinationFolder, $filename);
                        $activity->photo = $destinationPath;
                        $activity->save();
                        Storage::delete(asset($toDelete));
                        unlink($toDelete);

                    }
                    catch (\Exception $e){
                        return redirect()->route('activity.edit',$activity)->withErrors(['pics' => $e]);
                    }

                    return redirect()->route('activity.edit', $activity);
            }else{
                return redirect()->route('activity.edit', $activity)->withErrors(['pics' => 'Fichier non selectionné']);
            }
        }
        else{

            $is_accept = ($request->input('is_accept') == 'on') ? true : false;
            $is_proposal = ($request->input('is_proposal') == 'on') ? true : false;
            $can_subscribe = ($request->input('can_subscribe') == 'on') ? true : false;
            $activity->update([
                'name' => $request->input('name'),
                'date' => Carbon::createFromFormat('F j, Y g:i a', $request->input('date')),
                'lieu' => $request->input('lieu'),
                'description' => $request->input('description'),
                'is_accept' => $is_accept,
                'is_proposal' => $is_proposal,
                'can_subscribe' => $can_subscribe
            ]);
            return redirect()->route('activity.show', $activity);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        //
    }

    private function lastComment() {
        return function ($activity) {
            $activity->comment_count = $activity->comments->count();
            $activity->comment = $activity->comments->sortBy('created_at')->first();
            return $activity;
        };
    }

    public function future(){
        $activities = Activity::accepted()->whereDate('date', '>', Carbon::today())->get();
        $activities = $activities->map($this->lastComment());
        $title = 'Activités à venir !';
        return $this->view('pages.activity.time', compact('activities', 'title'));
    }

    public function current(){
        $activities = Activity::accepted()->whereDate('date', '=', Carbon::today())->get();
        $activities = $activities->map($this->lastComment());
        $title = 'Activités en cours !';
        return $this->view('pages.activity.time', compact('activities', 'title'));
    }

    public function past(){
        $activities = Activity::accepted()->whereDate('date', '<', Carbon::today())->get();
        $activities = $activities->map($this->lastComment());
        $title = 'Activités passés !';
        return $this->view('pages.activity.time', compact('activities', 'title'));
    }
}
