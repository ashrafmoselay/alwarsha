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
        Schema::table('clients', function (Blueprint $table) {
            $table->string('type')->after('phone');
            $table->dropUnique('clients_username_unique');
            $table->string('contact_name')->after('phone')->nullable();
            $table->string('email')->nullable()->change();
            $table->string('password')->nullable()->change();
        });
        Schema::create('cars', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->foreignId('client_id')->constrained('clients')->cascadeOnDelete();
            $table->foreignId('city_id')->constrained('cities')->cascadeOnDelete();
            $table->foreignId('model_id')->constrained('modeles')->cascadeOnDelete()->nullable();
            $table->string('plateNo');
            $table->string('contactNo')->nullable();
            $table->string('year')->nullable();
            $table->string('color')->nullable();
            $table->string('odoMeterKm');
            $table->string('vin')->nullable();
            $table->string('details')->nullable();
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
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn(['type','contact_name']);
            $table->string('username')->unique()->change();

        });
        Schema::dropIfExists('cars');
    }
};
