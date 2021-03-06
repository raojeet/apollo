<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
      Schema::create('suppliers', function (Blueprint $table) {
          $table->increments('id');

          $table->string('name');
          $table->string('telephone')->nullable();
          $table->string('email');
          $table->text('address')->nullable();
          $table->text('address_2')->nullable();
          $table->text('city')->nullable();
          $table->text('province')->nullable();
          $table->text('country')->nullable();
          $table->integer('lead_time')->default(0);

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
      Schema::dropIfExists('suppliers');
  }
}
