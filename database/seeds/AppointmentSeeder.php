<?php

use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date_appmntDefault = '2020-10-';
        $patient = 122 ;
        for ($day = 1; $day < 11 ; $day++) {
            $date_appmnt = $date_appmntDefault .$day;
            for ($hour = 10; $hour < 18 ; $hour++) {
                echo "Patient : ", $patient, " Appointment : ",$date_appmnt,":", $hour , "\n";
                DB::table('appointments')->insert([
                    'date_appmnt' => $date_appmnt,
                    'hour' => $hour,
                    'validate' =>'0',
                    'id_patient' =>  $patient,
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ]);
                $patient ++;
            }

        }

    }
}
