<?php

namespace Heisen\Http\Controllers;

use Heisen\Profile;
Use Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index(Profile $profile)
    {
        return view('user.profile',
        ['profile' => $profile->whereUserId(Auth::user()->id)->first()]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \Heisen\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile, $id)
    {
        return $profile->whereUserId($id);
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
