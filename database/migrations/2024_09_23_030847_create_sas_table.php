<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shipment_id')->constrained('shipments')->onDelete('cascade');
            $table->foreignId('activity_id')->constrained('activities')->onDelete('cascade');
            $table->string('70_mm');
            $table->string('50_mm');
            $table->string('50_315_mm');
            $table->string('315_224_mm');
            $table->string('315_16_mm');
            $table->string('224_112_mm');
            $table->string('112_63_mm');
            $table->string('8_mm');
            $table->string('164_75_mm');
            $table->string('63_475_mm');
            $table->string('475_2_mm');
            $table->string('2_1_mm');
            $table->string('1_05_mm');
            $table->string('05_mm');
            $table->string('total');
            $table->string('size1');
            $table->string('size2');
            $table->string('050_mm_persen');
            $table->string('070_mm_persen');
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
        Schema::dropIfExists('sas');
    }
}
