<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUndanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('undangans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('alamat');
            $table->text('ucapan')->nullable();
            $table->enum('kehadiran', ['hadir', 'tidak_hadir', 'belum_pasti'])->default('belum_pasti');
            $table->string('userid')->default('yh280424');
            $table->string('ket')->default('yuli_hendi_280424');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('undangans');
    }
};
