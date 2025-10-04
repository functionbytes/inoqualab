<?php

namespace App\Mail\Services;

use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailable;

class AlertsMails extends Mailable
{
    use Dispatchable,  InteractsWithQueue, SerializesModels;

    public $service;
    public $date;
    public $names;
    public $email;
    public $cellphone;
    public $company;
    public $module;

    public function __construct($item){
        $this->service = $item;
        $this->names = $item->names;
        $this->email = $item->email;
        $this->cellphone = $item->cellphone;
        $this->company = $item->company;
        $this->module = $item->module;
    }

    public function build(){

        return $this->subject("Respuesta Automatica - Servicio")
                        ->to("revoxservices@gmail.com")
                        ->markdown('mailers.services.alert')
                        ->with([
                            'cellphone' => $this->cellphone,
                            'names' => $this->names,
                            'company' => $this->company,
                            'email' => $this->email,
                            'module' => $this->module
            ]);

    }


}
