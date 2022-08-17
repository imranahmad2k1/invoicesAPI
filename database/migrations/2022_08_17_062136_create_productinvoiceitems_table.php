<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productinvoiceitems', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('productinvoice_id')->unsigned();
            $table->date('Dated');
            $table->string('ItemDescription');
            $table->float('Amount',8,2);
            $table->timestamps();

            $table->foreign('productinvoice_id')->references('id')->on('productinvoices')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productinvoiceitems');
    }
};
