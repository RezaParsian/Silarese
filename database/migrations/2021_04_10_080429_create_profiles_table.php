<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained();
            $table->boolean("is_male");
            $table->unsignedInteger("height")->default(0);
            $table->unsignedInteger("weight")->default(0);
            $table->unsignedInteger("age")->default(0);
            $table->unsignedInteger("sitDaily")->default(0);
            $table->unsignedInteger("backPain")->default(0);
            $table->unsignedInteger("posture")->default(0);
            $table->macAddress("mac")->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
