<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DateTimeZone;

class Utilities
{

    public static function random(){

            $incluye=true;
            $longitud=20;
            $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";

            if($incluye) {
                $arrPassResult="";
                for($i=0;$i<$longitud;$i++){
                    $arrPassResult.=$caracteres[rand(0,strlen($caracteres)-1)];
                }
            }

            return $arrPassResult;
    }


    public static function token(){

            $incluye=true;
            $longitud=10;
            $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";

            if($incluye) {
                $arrPassResult="";
                for($i=0;$i<$longitud;$i++){
                    $arrPassResult.=$caracteres[rand(0,strlen($caracteres)-1)];
                }
            }
            return $arrPassResult;
    }




    public static function currentDate(){
       $create = Carbon::now(new DateTimeZone('America/Bogota'));
       return Carbon::createFromTimestamp(strtotime($create));

   }

   public static function initiationDate(){
       $create = Carbon::now(new DateTimeZone('America/Bogota'));
       return Carbon::createFromTimestamp(strtotime($create));

   }

   public static function finishDate($initiation, $time){
        $initiation = Carbon::createFromTimestamp(strtotime($initiation));
        return $initiation->addDays($time);
   }

   public static function validateDate($create){
        return Carbon::createFromFormat('d/m/Y',$create, 'America/Bogota');
       //// return Carbon::createFromTimestamp(strtotime($create));
       //return Carbon::createFromFormat('Y-m-d', $create, 'America/Bogota')->toDateTimeString();
   }


   public static function validateDates($create){
        //dd(Carbon::createFromTimestamp(strtotime($create)));
    // return Carbon::createFromTimestamp(strtotime($create));
        return Carbon::createFromFormat('d-m-Y', $create)->toDateTimeString();
    }

   public static function validateTime($hour){
        $hour =  Carbon::parse($hour);
        return $hour->toTimeString();
   }


   public static function configurationDate($create){
      if ($create==null) {
           return null;
      }else{
            return Carbon::createFromTimestamp(strtotime($create));
      }

   }

}
