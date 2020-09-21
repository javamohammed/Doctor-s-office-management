<?php

use Illuminate\Database\Seeder;

class Medicament_selectedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $medicaments = array();

        for ($medicament = 1; $medicament < 204 ; $medicament++) {
           $medicaments[$medicament] = $medicament;
        }
        
        $faker = Faker\Factory::create();

        for ($order = 4; $order < 203 ; $order++) {

            $rand_keys = array_rand($medicaments, 3);

            DB::table('medicament_selecteds')->insert([
                'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                'id_order' =>  $order,
                'id_medicament' =>  $medicaments[$rand_keys[0]],
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);

            DB::table('medicament_selecteds')->insert([
                'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                'id_order' =>  $order,
                'id_medicament' =>  $medicaments[$rand_keys[1]],
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);

            DB::table('medicament_selecteds')->insert([
                'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                'id_order' =>  $order,
                'id_medicament' =>  $medicaments[$rand_keys[2]],
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);

        }
    }
}
