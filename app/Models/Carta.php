<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carta extends Model
{
    protected $fillable = [
        'nome',
        'descricao',
        'imagem_url',
        'quantidade',
        'preco',
        'tipo_id',
    ];

    public function tipo()
    {
        return $this->belongsTo(CartaTipo::class);
    }
}
