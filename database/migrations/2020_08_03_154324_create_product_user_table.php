<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateProductUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_user', function (Blueprint $table) {
            $table->id();
            $table->Integer('user_id');
            $table->Integer('product_id');
            $table->Integer('weight');
            $table->timestamp('created_at')->useCurrent();
            //$table->text('date')->default(Carbon::now()->format('Y-m-d'));
            //$table->dateTime('date')->default(Carbon::now()->format('Y-m-d'));
            //$table->timestamp('created_at')->default(Carbon::now()->format('Y-m-d'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_user');
    }
}
