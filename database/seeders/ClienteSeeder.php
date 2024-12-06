<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    public function run()
    {
        Cliente::create([
            'nome_cliente' => 'João Silva',
            'email_cliente' => 'joao@gmail.com',
            'endereco_cliente' => 'Rua das Flores, 123',
            'telefone_cliente' => '11987654321',
        ]);
    }
}