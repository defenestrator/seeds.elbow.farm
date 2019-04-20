<?php

namespace Heisen\Http\Controllers;

use Illuminate\Http\Request;
use Heisen\Http\Requests\ContactRequest;
use Heisen\Mail\ContactMail;
use Illuminate\Contracts\Mail\Mailer;

class ContactController extends Controller
{
    public function __construct(Mailer $mail)
    {
        return $this->mail = $mail;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact', ['contact_subject' => '']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        $toAddress = 'heisen@heisenbeans.com';
        if ($request->contact_subject == 'technical support') {
            $toAddress = 'mike@elbowfarm.com';
        }
        $data =[
            'name' => $request->get('contact_name'),
            'message' => $request->get('contact_message'),
            'subject' => $request->get('contact_subject'),
            'email_address' => $request->get('contact_email')
            ];

        $this->mail->to($toAddress)->send(new ContactMail($data));
        return view('thanks')->with('message', 'We will get back to you as quick as we can!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
