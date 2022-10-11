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
        Schema::create('invoices', function (Blueprint $table) {
           $table->bigIncrements('id');
           $table->string('invoice_number');
           $table->date('invoice_Date')->nullable();
           $table->date('Due_date')->nullable();
           $table->string('product' , 50);
           $table->foreignId('section_id')->unsigned()->constrained('sections')->onDelete('cascade');
           $table->decimal('Amount_collection' , 8, 2)->nullable();
           $table->decimal('Amount_Commission', 8, 2);
           $table->decimal('Discount');
           $table->decimal('Value_VAT', 8, 2);
           $table->string('Rate_VAT');
           $table->decimal('Total', 8, 2);
           $table->string('Status', 50);
           $table->integer('Value_Status');
           $table->text('note')->nullable();
           $table->date('Payment_Date')->nullable();
           $table->softDeletes();
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
        Schema::dropIfExists('invoices');
    }
};


