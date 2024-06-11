<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('no_handphone')->nullable();
            $table->text('alamat_lengkap')->nullable();
            $table->enum('jenis_kelamin', ['male', 'female'])->nullable();
            $table->boolean('alergi_obat')->default(false);
            $table->text('keterangan_alergi')->nullable();
            $table->date('tanggal_lahir')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['no_handphone', 'alamat_lengkap', 'jenis_kelamin', 'alergi_obat', 'keterangan_alergi', 'tanggal_lahir']);
        });
    }
}
