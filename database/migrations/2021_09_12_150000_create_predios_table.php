<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrediosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('predios', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 100);
            $table->integer('andar');
            $table->integer('sala');
            $table->integer('banheiro');
            $table->integer('auditorio');
            $table->integer('estvag');
            $table->text('descricao');
            $table->decimal('preco', 20, 2);

            $table->foreignId('cidade_id')->constrained()->onDelete('cascade');

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
        Schema::dropIfExists('predios');
    }
}
