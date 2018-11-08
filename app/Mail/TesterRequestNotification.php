<?php

namespace Heisen\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Heisen\Tester;

class TesterRequestNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Tester
     */
    protected $tester;

    /**
     * TesterRequestNotification constructor.
     * @param Tester $tester
     */
    public function __construct(Tester $tester)
    {
        $this->tester = $tester;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.tester-form')
            ->with([
                'data' => $this->tester
            ]);
    }
}
