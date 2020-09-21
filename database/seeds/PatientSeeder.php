<?php

use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $sex = "M";
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 200; $i++) {

            DB::table('patients')->insert([
	            'firstname' => $faker->firstName,
	            'lastname' => $faker->lastName,
                'birthday' =>$faker->date($format = 'Y-m-d', $max = 'now'),
                'sex' =>  $sex,
                'address' => $faker->address,
                'phone' => $faker->e164PhoneNumber,
                'email' => $faker->email,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);
            if($sex == "M")
                $sex = "F";
            else
                $sex = "M";
            
          }

    }
}
