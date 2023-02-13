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

        Schema::create('manufacturers', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->json('name')->comment('translations');
            $table->boolean('active')->default(1);
            $table->timestamps();
        });

        Schema::create('modeles', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->foreignId('manufacturer_id')->constrained('manufacturers')->cascadeOnDelete();
            $table->json('name')->comment('translations');
            $table->boolean('active')->default(1);
            $table->timestamps();
        });

        Schema::create('shopes', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->string('name');
            $table->string('contact_person')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('email')->nullable();
            $table->string('license_no')->nullable();
            $table->string('vat_number')->nullable();
            $table->string('address')->nullable();
            $table->string('logo')->comment('image')->nullable();
            $table->string('seal')->comment('image')->nullable();
            $table->boolean('active')->default(1);
            $table->timestamps();
        });

        Schema::create('spareparts', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('code')->unique();
            $table->foreignId('model_id')->constrained('modeles')->cascadeOnDelete()->nullable();
            $table->double('tax');
            $table->string('image')->comment('image')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('sparepart_shop', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->foreignId('sparepart_id')->constrained('spareparts')->cascadeOnDelete();
            $table->foreignId('shope_id')->constrained('shopes')->cascadeOnDelete();
            $table->double('cost');
            $table->double('price');
            $table->double('lowest_price');
            $table->double('quantity');
            $table->string('location')->nullable();
            $table->double('notify_limit')->default(0);
            $table->double('starting_stock')->default(0);
            $table->timestamps();
        });

        Schema::create('income_expenses_groups', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('income_expenses', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->string('type');
            $table->timestamp('transaction_date');
            $table->foreignId('shope_id')->constrained('shopes')->cascadeOnDelete();
            $table->foreignId('group_id')->constrained('income_expenses_groups')->cascadeOnDelete();
            $table->string('title');
            $table->text('comments')->nullable();
            $table->double('amount');
            $table->double('vat_value')->default(0);
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
        Schema::dropIfExists('income_expenses');
        Schema::dropIfExists('income_expenses_groups');
        Schema::dropIfExists('sparepart_shop');
        Schema::dropIfExists('spareparts');
        Schema::dropIfExists('shopes');
        Schema::dropIfExists('modeles');
        Schema::dropIfExists('manufacturers');
    }
};
