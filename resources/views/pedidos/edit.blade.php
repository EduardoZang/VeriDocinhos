@extends('layouts.app')

@section('title', 'Editar Pedido')

@section('content')
    <h1 class="title">Editar Pedido</h1>
    <form action="{{ route('pedidos.update', $pedido->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="cliente_id">Cliente:</label>
        <select name="cliente_id" id="cliente_id" required>
            @foreach ($clientes as $cliente)
                <option value="{{ $cliente->id }}" {{ $cliente->id == $pedido->cliente_id ? 'selected' : '' }}>
                    {{ $cliente->nome_cliente }}
                </option>
            @endforeach
        </select><br>

        <label for="data_pedido">Data:</label>
        <input type="date" name="data_pedido" id="data_pedido" value="{{ $pedido->data_pedido }}" required><br>

        <label for="status_pedido">Status:</label>
        <select name="status_pedido" id="status_pedido" required>
            <option value="Pendente" {{ $pedido->status_pedido == 'Pendente' ? 'selected' : '' }}>Pendente</option>
            <option value="Concluído" {{ $pedido->status_pedido == 'Concluído' ? 'selected' : '' }}>Concluído</option>
            <option value="Cancelado" {{ $pedido->status_pedido == 'Cancelado' ? 'selected' : '' }}>Cancelado</option>
        </select><br>

        <label for="valor_total">Valor Total:</label>
        <input type="number" name="valor_total" id="valor_total" step="0.01" value="{{ $pedido->valor_total }}" required><br>

        <label for="forma_pagamento">Forma de Pagamento:</label>
        <select name="forma_pagamento" id="forma_pagamento" required>
            <option value="Cartão de Crédito" {{ $pedido->forma_pagamento == 'Cartão de Crédito' ? 'selected' : '' }}>Cartão de Crédito</option>
            <option value="Boleto" {{ $pedido->forma_pagamento == 'Boleto' ? 'selected' : '' }}>Boleto</option>
            <option value="Pix" {{ $pedido->forma_pagamento == 'Pix' ? 'selected' : '' }}>Pix</option>
        </select><br>

        <label for="endereco_entrega">Endereço de Entrega:</label>
        <input type="text" name="endereco_entrega" id="endereco_entrega" value="{{ $pedido->endereco_entrega }}" required><br>

        <button type="submit">Salvar</button>
    </form>
@endsection