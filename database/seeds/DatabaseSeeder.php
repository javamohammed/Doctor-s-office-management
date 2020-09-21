<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(PatientSeeder::class);
        // $this->call(AppointmentSeeder::class);
        // $this->call(ConsultationSeeder::class);
        // $this->call(OrderSeeder::class);
        // $this->call(MedicamentSeeder::class);
        $this->call(Medicament_selectedSeeder::class);
    }
}
