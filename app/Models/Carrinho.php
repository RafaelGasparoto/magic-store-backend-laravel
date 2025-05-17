<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model
{
    protected $fillable = [
        'usuario_id',
        'total'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function items()
    {
        return $this->hasMany(ItemCarrinho::class);
    }
}
