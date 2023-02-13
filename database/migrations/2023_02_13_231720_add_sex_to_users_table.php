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
        Schema::table('users', function (Blueprint $table) {
            $table->integer('role')->default('2')->after('email');
            $table->string('sex')->nullable();
            $table->integer('age')->nullable();
            $table->integer('height')->nullable();
            $table->string('weight')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('sex');
            $table->dropColumn('age');
            $table->dropColumn('height');
            $table->dropColumn('weight');
            $table->dropColumn('role');
        });
    }
};
