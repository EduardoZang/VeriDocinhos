<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_produto',
        'descricao_produto',
        'preco_produto',
        'categoria_produto',
        'imagem_produto',
    ];

    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class, 'pedido_produto')->withPivot('quantidade', 'preco_unitario');
    }
}