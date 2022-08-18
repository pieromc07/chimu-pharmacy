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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->nullable(true);
            $table->string('dni')->unique()->nullable(true);
            $table->string('address')->nullable(true);
            $table->string('workstation')->nullable(true);
            $table->string('age')->nullable(true);
            $table->string('phone')->unique()->nullable(true);
            $table->date('contract_start')->nullable(true);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('employees');
    }
};
