<?php

namespace Heisen\Http\Controllers;

use Illuminate\Http\Request;
use Heisen\Tester;
use Heisen\Mail\TesterRequestNotification;
use Illuminate\Contracts\Mail\Mailer;

class TesterController extends Controller
{

    private $mail;

    public function __construct(Mailer $mail)
    {
        return $this->mail = $mail;
    }

    public function index() {
        return view('testers');
    }

    public function create(Request $request)
    {
        // Data to be used on the email view
        $request->validate([
            'contact-name' => 'required|min:2',
            'contact-email' => 'required|email',
            'contact-msg' => 'required|min:7'
        ]);

//        if (config('app.env') !== 'testing' ||config('app.env') !== 'local') {
//            $request->validate([
//                'g-recaptcha-response' => 'required|recaptcha'
//            ]);
//        }

        // Save the message to DB
        $data = Tester::create([
            'name' => $request
                ->get('contact-name'),
            'email_address' => $request->get('contact-email'),
            'message' => $request->get('contact-msg'),
        ]);

        $this->mail->to('heisen@heisenbeans.com')->send(new TesterRequestNotification($data));
        return view('thanks')->with('message', 'We will get back to you as quick as we can!');
    }
}
