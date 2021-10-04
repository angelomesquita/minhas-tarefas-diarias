<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'descricao','arquivada', 'concluida'];

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}   
