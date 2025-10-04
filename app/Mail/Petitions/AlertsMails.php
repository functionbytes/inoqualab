<?php

namespace App\Mail\Petitions;


use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;
use Illuminate\Http\File;


class AlertsMails extends Mailable
{
    use Dispatchable,  InteractsWithQueue, SerializesModels;

    public $petition;
    public $slack;
    public $date;
    public $firstname;
    public $lastname;
    public $dependencie;    
    public $number;


    public function __construct($petition)
    {
        $this->petition = $petition;
        $this->number = $petition->number;
        $this->slack = $petition->slack;
        $this->date = $petition->created_at;
        $this->firstname = $petition->firstname;
        $this->lastname = $petition->lastname;
        $this->dependencie = $petition->dependencie->email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
   public function build()
   {
       $dependencie = $this->dependencie;
       $slack= $this->slack;
       $date= $this->date;
       $number = $this->number;
       $lastname= $this->lastname;
       $firstname= $this->firstname;

        return $this->subject("Se ha registrado una PQRSF, codigo $number")
                     ->to("calidad@inoqualab.com")
                    ->markdown('mailers.petitions.alert')
                    ->with([
                        'slack' => $slack,
                        'number' => $number,
                        'date' => $date,
                        'names' => ucwords($firstname)." ".ucwords($lastname),
                    ]);


    }


}
