
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentsTable extends Migration
{
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->id(); // unsignedBigInteger secara otomatis
            $table->foreignId('activity_id')->constrained('activities')->onDelete('cascade');
            $table->string('gar');
            $table->string('type');
            $table->string('mv')->nullable();
            $table->string('bg')->nullable();
            $table->string('sp');
            $table->string('fv');
            $table->string('fd');
            $table->string('bf');
            $table->string('rc');
            $table->string('ss');
            $table->date('arrival_date');
            $table->date('departure_date');
            $table->string('Bl1')->nullable();
            $table->string('pr1');
            $table->string('Bl2')->nullable();
            $table->string('pr2');
            $table->string('Bl3')->nullable();
            $table->string('pr3');
            $table->string('Bl4')->nullable();
            $table->string('pr4');
            $table->string('Bl5')->nullable();
            $table->string('pr5');
            $table->string('ttl');
            $table->string('ssn')->nullable();
            $table->string('pr6');
            $table->string('inc')->nullable();
            $table->string('pr7');
            $table->string('company_id');
            $table->string('dt');
            $table->string('tg');
            $table->string('sv');
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('shipments');
    }
}
