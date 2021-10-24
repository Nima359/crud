<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateCommentsTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up () {
    Schema::create ('comments' , function (Blueprint $table) {
      $table->engine = "InnoDB";
      $table->charset = "utf8";
      $table->collation = "utf8_persian_ci";
      
      $table->increments ('id');
      $table->string ('title')->nullable ();
      $table->longText ('comment');
      $table->string ('user_email');//->unique ();
      $table->bigInteger  ('post_id')->unsigned ();
      $table->bigInteger ('user_id')->unsigned ();
      $table->tinyInteger ('publish');//->default (0);
      
      $table->timestamps ();
      
      
      $table->foreign ('post_id')->references ('id')->on ('posts')->onUpdate ('restrict')->onDelete ('RESTRICT');
//      $table->foreign ('user_id')->references ('id')->on ('users')->onUpdate ('CASCADE')->onDelete ('SET NULL');
      
    });
  }
  
  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down () {
    $table = new Blueprint('comments');
    $table->dropForeign ('comments_post_id_foreign');
//    $table->dropForeign ('comments_user_id_foreign');
    
    Schema::dropIfExists ('comments');
  }
}
