<?php

namespace Heisen\Http\Controllers;

Use Auth;
use Heisen\Profile;
use Heisen\User;
use Heisen\Http\Requests\UpdateProfileRequest;


class ProfileController extends Controller
{
    public function index(Profile $profile)
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  \Heisen\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, User $user, Profile $profile, $id)
    {
        $currentUser = $user->whereId(Auth::user()->id)->first();
        if($request->path() === 'user/profile/'.$id) {
            return view('user.profile',
            [
                'profile'   => $profile->whereUserId($id)->first(),
                'user'      => $currentUser
            ]);
        }

        return view('user.profile',[
            'profile' => $profile->whereId($id)->first(),
            'user'    => $currentUser
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Heisen\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile, $user_id)
    {
        if(Auth::user()->id === $user_id) {
            return $profile->whereUserId($user_id);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Heisen\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(updateProfileRequest $request, Profile $profile)
    {
        $new = $profile->whereUserId($request->user_id)->update($request->except('user_id'));
        return $new;
    }

}
