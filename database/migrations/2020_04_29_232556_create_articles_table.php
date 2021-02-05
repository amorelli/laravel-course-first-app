<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('articles', function (Blueprint $table) {
      $table->id(); // Unsigned Primary Key with type BigInt
      $table->unsignedBigInteger('user_id'); // Foreign key (should match type of PK)
      $table->string('title');
      $table->text('excerpt');
      $table->text('body');
      $table->timestamps();

      // Foreign Key constraint (If this user is deleted, also delete their articles)
      $table->foreign('user_id')
        ->references('id')
        ->on('users')
        ->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('articles');
  }
}
