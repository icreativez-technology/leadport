<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('tsk_id');
            $table->string('transport_type')->nullable();
            $table->string('equipment')->nullable();
            $table->string('load_type')->nullable();
            $table->string('quantity')->nullable();
            $table->string('pickup_index')->nullable();
            $table->string('pickup_county')->nullable();
            $table->string('pickup_city')->nullable();
            $table->string('pickup_address')->nullable();
            $table->date('pickup_date')->nullable();
            $table->string('delivery_index')->nullable();
            $table->string('delivery_county')->nullable();
            $table->string('delivery_city')->nullable();
            $table->string('delivery_address')->nullable();
            $table->date('delivery_date')->nullable();
            $table->string('incoterms_location')->nullable();
            $table->string('un_code')->nullable();
            $table->string('temperature_range')->nullable();
            $table->string('adr_carriage')->nullable();
            $table->string('fargile_carriage')->nullable();
            $table->string('remarks')->nullable();
            $table->string('transport_price')->nullable();
            $table->string('transit_time')->nullable();
            $table->string('status')->default('draft');
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
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
}
