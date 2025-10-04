<?php

namespace App\Mail\Petitions;


use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;
use App\Models\Quote;
use Illuminate\Http\File;


class ResponseMails extends Mailable
{
    use Dispatchable,  InteractsWithQueue, SerializesModels;

    public $petition;
    public $slack;
    public $number;
    public $response;
    public $email;
    public $lastname;
    public $firstname;
    public $date;
    public $dependence;

    public function __construct($petition)
    {
        $this->petition = $petition;
        $this->slack = $petition->slack;
        $this->number = $petition->number;
        $this->firstname = $petition->firstname;
        $this->email = $petition->email;
        $this->lastname = $petition->lastname;
        $this->dependence = $petition->dependencie->title;
        $this->date = $petition->created_at;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
   public function build()
   {
        return $this->subject("Tu solicitud ha sido registrada bajo el codigo: $this->number")
                    ->to($this->email)
                    ->markdown('mailers.petitions.response')
                    ->with([
                        'names' => ucwords($this->firstname)." ".ucwords($this->lastname),
                        'slack' => $this->slack,
                        'number' => $this->number,
                        'dependence' => $this->dependence,
                        'date' => $this->date
                    ]);

    }


}
