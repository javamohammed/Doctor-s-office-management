<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicamentSelectedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicament_selecteds', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->bigInteger('id_order')->unsigned();
            $table->bigInteger('id_medicament')->unsigned();
            $table->timestamps();
            $table->foreign('id_order')->references('id')->on('orders');
            $table->foreign('id_medicament')->references('id')->on('medicaments');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicament_selecteds');
    }
}
