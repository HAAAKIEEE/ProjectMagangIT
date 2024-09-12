<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAshftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ashfts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shipment_id')->constrained('shipments')->onDelete('cascade');
            $table->foreignId('activity_id')->constrained('activities')->onDelete('cascade'); // Foreign key untuk activity_id
            $table->float('idt'); // Initial Deformation Temperature
            $table->float('st');  // Softening Temperature
            $table->float('ht');  // Hemispherical Temperature
            $table->float('ft');  // Fluid Temperature
            $table->float('idt1'); // Initial Deformation Temperature
            $table->float('st1');  // Softening Temperature
            $table->float('ht1');  // Hemispherical Temperature
            $table->float('ft1');  // Fluid Temperature
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ashfts');
    }
}
