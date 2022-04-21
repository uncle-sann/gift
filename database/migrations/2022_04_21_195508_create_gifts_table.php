<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiftsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('gifts', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')->nullable()->constrained("users")->onDelete('cascade');
      $table->string('name');
      $table->foreignId('parent_id')->nullable()->constrained("gifts")->onDelete('cascade');
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
    Schema::dropIfExists('gifts');
  }
}
