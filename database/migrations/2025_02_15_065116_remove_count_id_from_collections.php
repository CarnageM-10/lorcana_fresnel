<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveCountIdFromCollections extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('collections', function (Blueprint $table) {
            // Suppression de la colonne count_id
            $table->dropColumn('count_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('collections', function (Blueprint $table) {
            // Ajouter à nouveau la colonne count_id dans le cas d'une rollback
            $table->integer('count_id')->default(0);
        });
    }
}
