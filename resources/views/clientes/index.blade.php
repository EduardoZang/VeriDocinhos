@extends('layouts.app')

@section('title', 'Clientes')

@section('content')
    <h1 class="title">Lista de Clientes</h1>
    <a href="{{ route('clientes.create') }}">Adicionar Cliente</a>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nome_cliente }}</td>
                    <td>{{ $cliente->email_cliente }}</td>
                    <td>{{ $cliente->telefone_cliente }}</td>
                    <td>
                        <a href="{{ route('clientes.edit', $cliente->id) }}">Editar</a>
                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display: inline;">
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