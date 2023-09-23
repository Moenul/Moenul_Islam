<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('service_icon')->nullable();
            $table->string('service_name')->nullable();
            $table->string('service_desc')->nullable();
            $table->string('service_title')->nullable();
            $table->string('service_type')->nullable();
            $table->string('service_component_title')->nullable();
            $table->string('service_components')->nullable();
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
}
