<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountOperationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_operation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('operation_id')->unsigned();
            $table->bigInteger('account_id')->unsigned();
            $table->string('side');
            $table->string('sign');
            $table
                ->foreign('operation_id')
                ->references('id')
                ->on('operations')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table
                ->foreign('account_id')
                ->references('id')
                ->on('accounts')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('account_operation');
    }
}
