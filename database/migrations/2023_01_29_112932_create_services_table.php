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
        Schema::create('services', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->double('durationPeriodValue')->nullable();
            $table->string('durationPeriodType')->nullable();
            $table->string('warrantyPeriodValue')->nullable();
            $table->string('warrantyPeriodType')->nullable();
            $table->double('service_price')->nullable();
            $table->double('min_price')->nullable();
            $table->boolean('active')->comment('0=unactive , 1=active')->default(1);
            $table->boolean('allowPriceChangeInTicket')->comment('0=notallow , 1=allow')->default(1);
            $table->foreignId('department_id')->constrained('departments')->cascadeOnUpdate()->cascadeOnDelete() ;
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
        Schema::dropIfExists('services');
    }
};
