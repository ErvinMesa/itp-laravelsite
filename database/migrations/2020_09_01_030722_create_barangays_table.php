<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangay', function (Blueprint $table) {
            $table->id();
            $table->text("bname");
            $table->text("blevel");
            $table->decimal("latitude",11,6);
            $table->decimal("longitude",11,6);
            $table->unsignedBigInteger("idcm");
            $table->unsignedBigInteger("estpop");
            $table->text("remarks")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangay');
    }
}
