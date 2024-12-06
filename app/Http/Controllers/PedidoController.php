<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Cliente;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::with('cliente')->get();
        return view('pedidos.index', compact('pedidos'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        return view('pedidos.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'data_pedido' => 'required|date',
            'status_pedido' => 'required|string',
            'valor_total' => 'required|numeric',
            'forma_pagamento' => 'required|string',
            'endereco_entrega' => 'required|string',
        ]);

        Pedido::create($data);

        return redirect()->route('pedidos.index')->with('success', 'Pedido criado com sucesso!');
    }

    public function edit(Pedido $pedido)
    {
        $clientes = Cliente::all();
        return view('pedidos.edit', compact('pedido', 'clientes'));
    }

    public function update(Request $request, Pedido $pedido)
    {
        $data = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'data_pedido' => 'required|date',
            'status_pedido' => 'required|string',
            'valor_total' => 'required|numeric',
            'forma_pagamento' => 'required|string',
            'endereco_entrega' => 'required|string',
        ]);

        $pedido->update($data);

        return redirect()->route('pedidos.index')->with('success', 'Pedido atualizado com sucesso!');
    }

    public function destroy(Pedido $pedido)
    {
        $pedido->delete();

        return redirect()->route('pedidos.index')->with('success', 'Pedido deletado com sucesso!');
    }
}