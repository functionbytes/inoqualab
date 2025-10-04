<?php

namespace App\Mail\Petitions;


use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;
use App\Models\Configuration;
use App\Models\Quote;
use Illuminate\Http\File;


class SolutionsMails extends Mailable
{
    use Dispatchable,  InteractsWithQueue, SerializesModels;

    public $petition;
    public $slack;
    public $email;
    public $lastname;
    public $firstname;
    public $cellphone;
    public $response;
    public $date;
    public $number;
    public $pdf;
    public $path;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($petition)
    {
        $this->cellphone = Configuration::first()->cellphone;
        $this->petition = $petition;
        $this->slack = $petition->slack;
        $this->email = $petition->email;
        $this->firstname = $petition->firstname;
        $this->lastname = $petition->lastname;
        $this->response = $petition->response;
        $this->number = $petition->number;
        $this->date = $petition->created_at;

        if ($petition->answers()!=null){
            $urlanswers =  public_path() .'/pages/imgs/answers/'.$petition->answers()->filename;
            $this->path = $urlanswers;
        }else{
            $urlanswers = "";
        }

    }

    /**
     * Build the message.
     *
     * @return $this
     */
   public function build()
   {
        if ($this->petition->answers()!=null){

            return $this->subject("Tu solicitud ha sido solucionada bajo el codigo #$this->number")
            ->to($this->email)
            ->markdown('mailers.petitions.solution')
            ->with([
                'names' => ucwords($this->firstname)." ".ucwords($this->lastname),
                'email' => $this->email,
                'date' => $this->date,
                'slack' => $this->slack,
                'number' => $this->number,
                'cellphone' => $this->cellphone,
                'response' => $this->response,
            ])->attach($this->path, [
                'as' => 'PQRS #'.$this->number,
            ]);

        }else{

            return $this->subject("Tu solicitud ha sido solucionada bajo el codigo #$this->number")
            ->to($this->email)
            ->markdown('mailers.petitions.solution')
            ->with([
                'names' => ucwords($this->firstname)." ".ucwords($this->lastname),
                'email' => $this->email,
                'date' => $this->date,
                'slack' => $this->slack,
                'number' => $this->number,
                'cellphone' => $this->cellphone,
                'response' => $this->response,
            ]);
        }



    }


}

