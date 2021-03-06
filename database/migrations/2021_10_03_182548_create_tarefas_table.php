<?php

use App\Models\Tag;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarefasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarefas', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->foreignIdFor(Tag::class)->nullable()->constrained();
            $table->string('titulo')->charset('utf8');
            $table->string('descricao')->nullable()->charset('utf8');
            $table->boolean('arquivada')->default(false);
            $table->boolean('concluida')->default(false);
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
        Schema::dropIfExists('tarefas');
    }
}
