<?php

namespace App\Mail\Applications;

use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailable;


class ResponseMails extends Mailable
{
    use Dispatchable,  InteractsWithQueue, SerializesModels;

    public $application;
    public $slack;
    public $date;
    public $names;
    public $email;
    public $lastname;

    public function __construct($application){
        $this->application = $application;
        $this->slack = $application->slack;
        $this->email = $application->email;
        $this->names = $application->names;
        $this->date = $application->created_at;
    }

    public function build(){
                return $this->subject("Respuesta Automatica - Cotización")
                        ->to($this->email)
                        ->markdown('mailers.applications.response')
                        ->with([
                            'names' => ucwords($this->names),
                            'slack' => $this->slack,
                            'date' => $this->date
            ]);


    }


}
