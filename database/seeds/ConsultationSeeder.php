<?php

use Illuminate\Database\Seeder;

class ConsultationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $date_consultationDefault = '2020-10-';
        $patient = 122 ;
        $faker = Faker\Factory::create();

        for ($day = 1; $day < 11 ; $day++) {
            $date_consultation = $date_consultationDefault .$day;
            for ($hour = 10; $hour < 18 ; $hour++) {
                echo "Patient : ", $patient, " Consultation : ",$date_consultation,":", $hour , "\n";
            DB::table('consultations')->insert([
                'date_consultation' => $date_consultation,
                'diagnostic' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true) ,
                'id_patient' =>  $patient,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);
            $patient ++;
            }
        }

    }



}
