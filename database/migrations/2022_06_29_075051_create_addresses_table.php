<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Ramsey\Uuid\v1;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->string('name',100)->nullable();
            $table->text('address1',100)->nullable();
            $table->text('address2',100)->nullable();
            $table->string('country_name',100)->nullable();
            $table->string('city_name',100)->nullable();
            $table->string('zip_code',100)->nullable();
            $table->string('phone',100)->nullable();
            $table->string('mobile',100)->nullable();
            $table->text('comment',100)->nullable();
            $table->string('creator', 100)->nullable();
            $table->string('slug', 100)->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('addresses');
    }
}
