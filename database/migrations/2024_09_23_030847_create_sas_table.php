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
            $table->string('mm_70');
            $table->string('mm_50');
            $table->string('mm_50_315');
            $table->string('mm_315_224')->nullable();
            $table->string('mm_315_16');
            $table->string('mm_224_112');
            $table->string('mm_112_63');
            $table->string('mm_8')->nullable();
            $table->string('mm_164_75')->nullable();
            $table->string('mm_63_475');
            $table->string('mm_475_2');
            $table->string('mm_2_1');
            $table->string('mm_1_05');
            $table->string('mm_05');
            $table->string('total');
            $table->string('size1');
            $table->string('size2');
            $table->string('mm_050_persen');
            $table->string('mm_070_persen');
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
