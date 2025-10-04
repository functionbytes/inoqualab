<?php

        namespace App\Exports;

        use App\Models\User;
        use Carbon\Carbon;
        use Illuminate\Contracts\Support\Responsable;
        use Illuminate\Database\Query\Builder;
        use Maatwebsite\Excel\Concerns\Exportable;
        use Maatwebsite\Excel\Concerns\FromQuery;
        use Maatwebsite\Excel\Concerns\WithColumnFormatting;
        use Maatwebsite\Excel\Concerns\WithHeadings;
        use Maatwebsite\Excel\Concerns\WithMapping;
        use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
        use Maatwebsite\Excel\Concerns\WithTitle;
        use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

        class UsersExport implements FromQuery, Responsable, WithMapping, WithHeadings, WithColumnFormatting, WithTitle, WithStrictNullComparison
        {
            use Exportable;

            private $fileName = 'Orders.xlsx';
            private $initial;
            private $end;
            private $type;

            public function __construct($initial,$end,$type,$filter){

                $this->initial = $initial;
                $this->end = $end;
                $this->type = $type;
                $this->filter = $filter;
            }

            /**
             * @return Builder
             */
            public function query() {

                if($this->filter=="0" && $this->type=="0"){
                    return User::take(9999999);
                    //ok
                }elseif($this->filter=="0" && $this->type!="0"){
                    return User::types($this->type)->take(9999999);
                    //ok
                }elseif($this->filter!="0" && $this->type!="0"){
                    return User::filter($this->initial,$this->end)->types($this->type)->take(9999999);
                    //ok
                }elseif($this->filter!="0" && $this->type=="0"){
                    return User::filter($this->initial,$this->end)->take(9999999);
                    //ok
                }

            }

            /**
             * @param mixed $row
             *
             * @return array
             */
            public function map($row): array
            {
                $profile = $row->profile_id;

                if($profile==1){
                    $profile = 'Administradores';
                }elseif($profile==2){
                    $profile = 'Clientes';
                }elseif($profile==3){
                    $profile = 'Arrendadores';
                }elseif($profile==4){
                    $profile = 'Verificadores';
                }

                $available = $row->available;

                if($available==1){
                    $available = 'Activo';
                }else{
                    $available = 'Inactivo';
                }


                $cellphone = strval($row->cellphone);

                $term = $row->terms;

                if($term==1){
                    $term = 'Acepto';
                }else{
                    $term = 'No Acepto';
                }

                $nationality = $row->nationality_id;

                if($nationality==null){
                    $nationality = '';
                }else{
                    $nationality = $row->nationality->title;
                }

                $citie = $row->citie_id;

                if($citie==null){
                    $citie = '';
                }else{
                    $citie = $row->nationality->title;
                }

                $type = $row->type;

                if($type==1){
                    $type = 'Cuenta de Ahorros';
                }elseif($type==2){
                    $type = 'Cuenta Corriente';
                }


                $bank = $row->bank;

                if($bank==1){
                    $bank = 'Banco Agrario de Colombia';
                }elseif($bank==2){
                    $bank = 'Banco AV Villas';
                }elseif($bank==3){
                    $bank = 'Banco Caja Social';
                }elseif($bank==4){
                    $bank = 'Banco de Occidente';
                }elseif($bank==5){
                    $bank = 'Banco Granahorrar';
                }elseif($bank==6){
                    $bank = 'Banco Popular';
                }elseif($bank==7){
                    $bank = 'Bancolombia';
                }elseif($bank==8){
                    $bank = 'BBVA';
                }elseif($bank==9){
                    $bank = 'Banco de Bogotá';
                }elseif($bank==10){
                    $bank = 'Citi Colombia';
                }elseif($bank==11){
                    $bank = 'Colpatria';
                }elseif($bank==12){
                    $bank = 'Corficolombiana';
                }elseif($bank==13){
                    $bank = 'Davivienda';
                }elseif($bank==14){
                    $bank = 'Fondo Nacional del Ahorro';
                }elseif($bank==15){
                    $bank = 'GNB Sudameris';
                }

                $work = $row->work;

                if($work==1){
                    $work = 'Estudia';
                }elseif($work==2){
                    $work = 'Trabaja';
                }

                return [
                    $row->token,
                    $row->firstname,
                    $row->lastname,
                    $cellphone,
                    $row->email,
                    $row->address,
                    $term,
                    $profile,
                    $available,
                    $work,
                    $type,
                    $bank,
                    $row->headline,
                    $row->number,
                    $row->career,
                    $row->semester,
                    $row->revenue,
                    $row->company,
                    $row->overyou,
                    $nationality,
                    $citie,
                    humanize_date($row->birthday_at),
                    humanize_date($row->created_at),
                    humanize_date($row->updated_at),
                ];
            }

            /**
             * @return array
             */
            public function headings(): array
            {
                return [
                    'TOKEN',
                    'NOMBRES',
                    'APELLIDOS',
                    'CELULAR',
                    'EMAIL',
                    'DIRECCIÓN',
                    'TERMINO Y CONDICIONES',
                    'PERFIL',
                    'ESTADO',
                    'QUE HACE',
                    'TIPO CUENTA',
                    'BANCO',
                    'TITULAR',
                    'NUMERO DE CUENTE',
                    'CARRERA',
                    'SEMESTRE',
                    'INGRESOS',
                    'EMPRESA',
                    'SOBRE MI',
                    'PAIS',
                    'CIUDAD',
                    'FECHA CUMPLEAÑOS',
                    'FECHA CREACIÓN',
                    'FECHA ACTUALIZACIÓN',
                ];
            }

            /**
             * @return array
             */
            public function columnFormats(): array
            {
                return [
                ];
            }

            /**
             * @return string
             */
            public function title(): string
            {
                return 'Reporte de usuarios';
            }

        }

