<?php

namespace App\Http\Controllers;

use App\Association;
use App\Role;
use App\Status;
use App\Subscribe;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class UserController extends EventHandlerController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view');
       return $this->view('pages/user/index', ['Users' => User::get()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('view', $user);
        return $this->view('pages/user/show', ['User' => User::with('subscribes')->find($user->id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return $this->view('pages/user/edit', ['User' => $user,
            'Status' => Status::get(),
            'Role' => Role::get(),
            'Association' => Association::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);
        if($request->input('approved')) {
            $user->update(['is_valid' => true]);
            return redirect(route('user.index'));
        }
        elseif($request->input('approved_all')) {
            User::where('is_valid', '0')->update(['is_valid' => 1]);
            return redirect(route('user.index'));
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('destroy', $user);
        $user->subscribes()->delete();
        $user->delete();
        return redirect(route('user.index'));
    }

    public function store(Request $request){
        $this->authorize('update', Auth::user());
         $u = new User();
         if($u->validate(Input::all())){
             $user = User::find($request['user']);
             $user->name = $request['name'];
             $user->forename = $request['forename'];
             $user->email = $request['email'];
             $user->password = bcrypt($request['password']);
             $user->status_id = Status::where('name',$request['status'])->first()->id;
             $user->role_id = Role::where('name',$request['role'])->first()->id;
             $user->association_id = Association::where('name', $request['association'])->first()->id;
             $user->birthday = $request['birthday'];

             if(! empty($request['avatar'])) {
                $user->avatar = $request['avatar'];
             }
             $user->save();
             return redirect(route('user.edit', $user));
         }
         else{

             return redirect(route('user.edit', $request['user']))->withErrors($u->errors())->withInput(Input::all());
         }
    }
}
