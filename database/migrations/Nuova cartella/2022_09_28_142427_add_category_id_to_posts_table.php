<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            //definisco colonna
            //aggiungo colonna category_id alla tabella posts, sarà con valore nullable e inserita dopo colonna id 
            //$table->unsignedBigInteger('category_id')->nullable()->after('id');

            //definisco foreign key
            //questa colonna sarà una foreign key e si riferirà alla colonna id della tabella categories, 
            //in caso di cancellazione della categoria collegata a quel post i post non vengono cancellati 
           // $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');

            //versione compatta definisce colonna e mette chiave
            $table->foreignId('category_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {

          //Elimina relazione //// Nome tabella nome colonna nome constrained
          $table->dropForeign('posts_categoty_id_foreign');  

         //Elimina colonna category_id dopo aver tolto la relazione tra le 2 tabelle
        $table->dropColumn('category_id');

        });
    }
}
