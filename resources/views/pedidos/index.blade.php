@extends('layouts.app')

@section('title', 'Pedidos')

@section('content')
    <h1 class="title">Lista de Pedidos</h1>
    <a href="{{ route('pedidos.create') }}">Adicionar Pedido</a>
    <table>
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Data</th>
                <th>Status</th>
                <th>Valor Total</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->cliente->nome_cliente }}</td>
                    <td>{{ $pedido->data_pedido }}</td>
                    <td>{{ $pedido->status_pedido }}</td>
                    <td>R$ {{ number_format($pedido->valor_total, 2, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('pedidos.edit', $pedido->id) }}">Editar</a>
                        <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection