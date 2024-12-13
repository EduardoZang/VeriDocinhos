<?php

namespace Database\Seeders;

use App\Models\Produto;
use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    public function run()
    {
        Produto::create([
            'nome_produto' => 'Notebook',
            'descricao_produto' => 'Notebook Dell com 16GB de RAM',
            'preco_produto' => 4500.00,
            'categoria_produto' => 'Bolos',
            'imagem_produto' => null,
            'status'=> true,
        ]);
    }
}