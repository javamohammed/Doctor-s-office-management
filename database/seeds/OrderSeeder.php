<?php

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $date_orderDefault = '2020-10-';
        $consultation = 332;
        for ($day = 1; $day < 11 ; $day++) {
            $date_order = $date_orderDefault .$day;
            for ($hour = 10; $hour < 18 ; $hour++) {
                echo "consultation : ", $consultation, " date_order : ",$date_order,":", $hour , "\n";
                DB::table('orders')->insert([
                    'date_order' => $date_order,
                    'id_consultation' =>  $consultation,
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ]);
                $consultation ++;
            }
        }
    }
}
