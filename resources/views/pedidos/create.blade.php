@extends('layouts.app')

@section('title', 'Adicionar Pedido')

@section('content')
    <h1 class="title">Adicionar Pedido</h1>
    <form action="{{ route('pedidos.store') }}" method="POST">
        @csrf
        <label for="cliente_id">Cliente:</label>
        <select name="cliente_id" id="cliente_id" required>
            @foreach ($clientes as $cliente)
                <option value="{{ $cliente->id }}">{{ $cliente->nome_cliente }}</option>
            @endforeach
        </select><br>

        <label for="data_pedido">Data:</label>
        <input type="date" name="data_pedido" id="data_pedido" required><br>

        <label for="status_pedido">Status:</label>
        <select name="status_pedido" id="status_pedido" required>
            <option value="Pendente">Pendente</option>
            <option value="Concluído">Concluído</option>
            <option value="Cancelado">Cancelado</option>
        </select><br>

        <label for="valor_total">Valor Total:</label>
        <input type="number" name="valor_total" id="valor_total" step="0.01" required><br>

        <label for="forma_pagamento">Forma de Pagamento:</label>
        <select name="forma_pagamento" id="forma_pagamento" required>
            <option value="Cartão de Crédito">Cartão de Crédito</option>
            <option value="Boleto">Boleto</option>
            <option value="Pix">Pix</option>
        </select><br>

        <label for="endereco_entrega">Endereço de Entrega:</label>
        <input type="text" name="endereco_entrega" id="endereco_entrega" required><br>

        <button type="submit">Salvar</button>
    </form>
@endsection