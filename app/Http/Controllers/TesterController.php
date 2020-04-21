<?php

namespace Cheeba\Http\Controllers;

use Illuminate\Http\Request;
use Cheeba\Tester;
use Cheeba\Mail\TesterRequestNotification;
use Illuminate\Contracts\Mail\Mailer;

class TesterController extends LocationController
{

    private $mail;
    private $country = 'United States';

    public function __construct(Mailer $mail)
    {
        return $this->mail = $mail;
    }

    public function index() {
        return view('testers')->with(['states' => $this->states, 'provinces' => $this->provinces]);
    }

    public function create(Request $request)
    {
        // Data to be used on the email view
        $request->validate([
            'contact-name' => 'required|min:2',
            'contact-email' => 'required|email',
            'contact-address-1' => 'required|min:6',
            'contact-state' => 'required|min:2',
            'contact-city' => 'required|min:2',
            'journal-link' => 'required|url'
        ]);

//        if (config('app.env') !== 'testing' ||config('app.env') !== 'local') {
//            $request->validate([
//                'g-recaptcha-response' => 'required|recaptcha'
//            ]);
//        }

        if (in_array($request->get('postcode'), $this->provinces)) {
            $this->country = 'Canada';
        }
        // Save the message to DB
        $data = Tester::create([
            'name' => $request->get('contact-name'),
            'email_address' => $request->get('contact-email'),
            'address_1' => $request->get('contact-address-1'),
            'address_2' => $request->get('contact-address-2'),
            'city' => $request->get('contact-city'),
            'state' => $request->get('contact-state'),
            'country' => $this->country,
            'postcode' => $request->get('postcode'),
            'message' => $request->get('contact-msg'),
            'journal_link' => $request->get('journal-link')
        ]);

        $this->mail->to('cheeba@thecheebashack.com')->queue(new TesterRequestNotification($data));
        return view('thanks')->with('message', 'We will get back to you as quick as we can!');
    }

    public function preview()
    {
        $data = new Tester ([
            'name' => 'Contact Name',
            'email_address' => 'contact-email@example.com',
            'address_1' => 'contact-address-1',
            'address_2' => 'contact-address-2',
            'city' => 'Citytown',
            'state' => 'Tittyland',
            'country' => $this->country,
            'postcode' => '66669',
            'message' => 'This is a silly test message',
            'journal_link' => 'https://thecheebashack.com'
        ]);
        return new TesterRequestNotification($data);
    }
}
