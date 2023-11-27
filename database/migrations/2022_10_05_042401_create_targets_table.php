<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('targets', function (Blueprint $table) {
             $table->id();
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('username')->nullable();
            $table->string('program')->nullable();
            $table->string('tarikhA')->nullable();
            $table->string('tarikhB')->nullable();
            $table->string('tempat')->nullable();
            $table->string('anjuran')->nullable();
            $table->string('logopath')->nullable();
            $table->string('sainpath')->nullable();
            $table->string('logo')->nullable();
            $table->string('jawatansain')->nullable();
            $table->string('jabatansain')->nullable();
            $table->string('peserta')->nullable();
            $table->string('ic')->nullable();
            $table->string('kodsekolah')->nullable();
            $table->string('sekolah')->nullable();
            $table->string('jsijil')->nullable();
            $table->string('sn')->nullable();
            $table->string('state1')->nullable();
            $table->string('state2')->nullable();
            $table->string('state3')->nullable();
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
        Schema::dropIfExists('targets');
    }
}
