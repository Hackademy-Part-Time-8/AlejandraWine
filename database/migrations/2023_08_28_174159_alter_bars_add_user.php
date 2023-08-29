<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\QueryException;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::table('bars',function(Blueprint $table){
            $table->foreignId('user_id') //nombre tabla en singular_campo
            ->after('description')//donde quiero que vaya
            ->nullable()
            ->constrained('users')//al final de todo lo modificable, si fuera antes del nullable o cualquier otro, daria un error
            ->cascadeOnUpdate()//o modificacion.
            ->nullOnDelete()//que hago en caso de borrado  Aqui tiro cuando no haya usuario, podria poner ->cascadeOnDelete() y ahi lo dejaria para q lo use otro
            ;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('bars', function(Blueprint $table)
        {
            $table->dropForeign('bars_user_id_foreign');//tabla en la que me encuentro, nombre que he creado y decir que es una foreign
        });
    }
};
