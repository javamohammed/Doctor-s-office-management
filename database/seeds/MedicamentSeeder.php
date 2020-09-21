<?php

use Illuminate\Database\Seeder;

class MedicamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 200; $i++) {

            DB::table('medicaments')->insert([
	            'name' => $faker->sentence($nbWords = 3, $variableNbWords = true) ,
	            'type_sick' => $faker->sentence($nbWords = 6, $variableNbWords = true) ,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);
          
          }

    }
}
