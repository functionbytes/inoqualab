<?php

namespace App\Mail\Applications;

use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailable;

class AlertsMails extends Mailable
{
    use Dispatchable,  InteractsWithQueue, SerializesModels;

    public $application;
    public $slack;
    public $date;
    public $names;

    public function __construct($application){
        $this->application = $application;
        $this->slack = $application->slack;
        $this->names = $application->names;
        $this->date = $application->created_at;
    }

    public function build(){

            return $this->subject("Respuesta Automatica - Cotización")
                        ->to("comercial@inoqualab.com")
                        ->markdown('mailers.applications.alert')
                        ->with([
                            'slack' => $this->slack,
                            'date' => $this->date,
                            'names' => $this->names,
            ]);

    }


}
