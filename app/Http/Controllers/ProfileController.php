<?php

namespace Heisen\Http\Controllers;

Use Auth;
use Heisen\Profile;
use Heisen\User;
use Illuminate\Http\Request;


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
        if(Auth::user()->id == $user_id) {
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
    public function update(Request $request, Profile $profile)
    {
        if ($request->public === "true" || $request->public === "1") {
            $request->public = 1;
        } elseif ($request->public === "false" || $request->public === "0") {
            $request->public = 0;
        }

        $new = $profile->whereUserId(Auth::user()->id)->update([
            'avatar' => $request->avatar,
            'public' => $request->public,
            'riu_username' => $request->riu_username,
            'facebook_url' => $request->facebook_url,
            'chuckers_paradise' => $request->chuckers_paradise,
            'instagram_handle' => $request->instagram_handle,
            'user_title' => $request->user_title
        ]);
        return $new;
    }

}
