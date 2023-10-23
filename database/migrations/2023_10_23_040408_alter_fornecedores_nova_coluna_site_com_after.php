<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFornecedoresNovaColunaSiteComAfter extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up(): void
    {
        Schema::table('fornecedors', function (Blueprint $table){
            $table->string('site', 150)->after('nome')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fornecedors', function (Blueprint $table){
            $table->dropColumn('site');
        });
    }
};
