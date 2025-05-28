<?php

namespace App\Http\Controllers\Managers;

use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Exports\OrdersExport;
use App\Exports\UsersExport;
use App\Models\Order;
use DB;



class ExportController extends Controller
{

    public function exportsOrders(){
        return Excel::download(new OrdersExport, 'orders.csv');

    }



    public function exportsUsers(){
        return Excel::download(new UsersExport, 'usuarios.csv');

    }


     public function exportVolunteer($citie){
        //dd('entro');


       return Excel::create('Voluntarios', function($excel) use ($citie) {

             //$data = Volunteer::get()->toArray();


            $citie = Citie::id($citie)->toArray();

            //dd($cities);
            // Our first sheet

                //dd();

                    $data  =  Volunteer::latest()->citie($citie["id"])->get()->toArray();

                    $excel->sheet($citie["name"], function($sheet) use ($citie) {



                   $volunteers  =  Volunteer::latest()->citie($citie["id"])->get()->toArray();

                                // Add heading row
                    $data = array('Token', 'Nombre', 'Apellidos', 'Celular', 'Email', 'Organización', 'Punto', 'Talla', 'Quiere ser Lider', 'Otro', 'Notas', 'Fecha');
                    $sheet->fromArray(array($data), null, 'A1', false, false);
                    //dd($data);

                    // Add data rows
                    foreach ($volunteers as $row) {
                        //dd($row);

                        if($row["point_id"]!=null){
                           $point = Point::id($row["point_id"]);
                            $point = $point->name;
                        }else{
                            $point =  "No";
                        }

                         if($row["leader"]!=""){
                            $leader =$row["leader"];
                        }else{
                            $leader =  "No";
                        }


                        $date = array($row["token"], $row["firstname"], $row["lastname"], $row["cellphone"], $row["email"], $row["organization"], $point, $row["shirt"], $leader, $row["others"] ,$row["notes"], $row["created_at"]);
                        //dd($date);
                        $sheet->fromArray(array($date), null, 'A1', false, false);
                    }

                    });








        })->export('xls');

       /*
        return Excel::create('laravelcode', function($excel) use ($data) {

            $excel->sheet('mySheet', function($sheet) use ($data)
            {

                $sheet->sheet('First sheet', function($sheet) {

                $sheet->fromArray($data);
                });

                // Our second sheet
                $sheet->sheet('Second sheet', function($sheet) {
                $sheet->fromArray($data);

                });


            });
        })->download('xls');
*/
        # Export to Excel2007 (xlsx)

    }



public function exportPoint($point){
        //dd('entro');



       $point = Point::id($point)->toArray();

       return Excel::create($point["name"], function($excel) use ($point) {

             //$data = Volunteer::get()->toArray();


            $point = Point::id($point)->toArray();


                    $data  =  Volunteer::latest()->point($point["id"])->get()->toArray();
                    //dd($data);
                    $excel->sheet($point["name"], function($sheet) use ($point) {


                    $volunteers  =  Volunteer::latest()->point($point["id"])->get()->toArray();
                    //dd($volunteers);
                                // Add heading row
                    $data = array('Token', 'Nombre', 'Apellidos', 'Celular', 'Email', 'Organización','Talla', 'Quiere ser Lider', 'Otro', 'Notas', 'Fecha');
                    $sheet->fromArray(array($data), null, 'A1', false, false);
                    //dd($data);

                    // Add data rows
                    foreach ($volunteers as $row) {


                        if($row["leader"]!=""){
                            $leader =$row["leader"];
                        }else{
                            $leader =  "No";
                        }


                        if($row["others"]!=""){
                            $others =$row["others"];
                        }else{
                            $others =  "No";
                        }

                        $date = array($row["token"], $row["firstname"], $row["lastname"], $row["cellphone"], $row["email"], $row["organization"], $row["shirt"], $leader, $others ,$row["notes"], $row["created_at"]);
                        //dd($date);
                        //dd($date);
                        $sheet->fromArray(array($date), null, 'A1', false, false);
                    }

                    });



        })->export('xls');

       /*
        return Excel::create('laravelcode', function($excel) use ($data) {

            $excel->sheet('mySheet', function($sheet) use ($data)
            {

                $sheet->sheet('First sheet', function($sheet) {

                $sheet->fromArray($data);
                });

                // Our second sheet
                $sheet->sheet('Second sheet', function($sheet) {
                $sheet->fromArray($data);

                });


            });
        })->download('xls');
*/
        # Export to Excel2007 (xlsx)

    }


 public function exportPoints(){
        //dd('entro');


       return Excel::create('Puntos', function($excel)  {

             //$data = Volunteer::get()->toArray();


            $points = Point::latest()->toArray();


            //dd($cities);
            // Our first sheet

            foreach($points as $point){
                //dd();

                    $data  =  Volunteer::latest()->point($point["id"])->get()->toArray();
                    //dd($data);
                    $excel->sheet($point["name"], function($sheet) use ($point) {


                    $volunteers  =  Volunteer::latest()->point($point["id"])->get()->toArray();
                    //dd($volunteers);
                                // Add heading row
                    $data = array('Ciudad','Token', 'Nombre', 'Apellidos', 'Celular', 'Email', 'Organización','Talla', 'Quiere ser Lider', 'Otro', 'Notas', 'Fecha');
                    $sheet->fromArray(array($data), null, 'A1', false, false);
                    //dd($data);

                    // Add data rows
                    foreach ($volunteers as $row) {


                        if($row["leader"]!=""){
                            $leader =$row["leader"];
                        }else{
                            $leader =  "No";
                        }


                        if($row["others"]!=""){
                            $others =$row["others"];
                        }else{
                            $others =  "No";
                        }

                        if($row["citie_id"]!=null){
                           $citie = Citie::id($row["citie_id"]);
                            $citie = $citie->name;
                        }else{
                            $citie =  "No";
                        }



                        $date = array($citie,$row["token"],$row["token"], $row["firstname"], $row["lastname"], $row["cellphone"], $row["email"], $row["organization"], $row["shirt"], $leader, $others ,$row["notes"], $row["created_at"]);
                        //dd($date);
                        //dd($date);
                        $sheet->fromArray(array($date), null, 'A1', false, false);
                    }

                    });



            }

        })->export('xls');



    }



    public function viewVolunteers(){
        //dd('entro');

       return view('volunteer.views.volunteers.report', [
            'volunteers' => Volunteer::all()
        ]);

    }

}

?>



