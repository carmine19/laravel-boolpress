<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignCategoryPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // qui stiamo creando una relazione 1 a molti con la tabella post, assegando a questa il category_id
       Schema::table('posts', function (Blueprint $table) {
           //qui creiamo la colonna category_id in post assegnato come il suo padre id di category, quindi un bigInteger,
           //poi gli diamo un valore che è nullable e la creaimo dopo l id di posts
            $table->unsignedBigInteger('category_id')->nullable()->after('id');
            //qui bli assegmiamo il suo valore di chiave e gli diciamo da dove viene
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
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
            $table->dropForeign('posts_category_id_foreign');
            $table->dropColumn('category_id');
        });
    }
}
