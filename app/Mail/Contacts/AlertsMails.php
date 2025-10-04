<?php

namespace App\Mail\Contacts;

use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailable;

class AlertsMails extends Mailable
{
    use Dispatchable,  InteractsWithQueue, SerializesModels;

    public $contact;
    public $slack;
    public $date;
    public $firstname;
    public $lastname;

    public function __construct($contact){
        $this->contact = $contact;
        $this->slack = $contact->slack;
        $this->date = $contact->created_at;
        $this->names = $contact->names;
        $this->email = $contact->email;
        $this->cellphone = $contact->cellphone;
        $this->subject = $contact->subject;
        $this->message = $contact->message;
    }

    public function build(){

            return $this->subject("Respuesta Automatica - Contacto")
                        ->to("servicioalcliente@inoqualab.com")
                        ->markdown('mailers.contacts.alert')
                        ->with([
                            'slack' => $this->slack,
                            'date' => $this->date,
                            'names' => $this->names,
                            'email' => $this->email,
                            'cellphone' => $this->cellphone,
                            'subject' => $this->subject,
                            'message' => $this->message,
            ]);

    }


}
