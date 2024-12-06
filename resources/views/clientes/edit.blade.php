@extends('layouts.app')

@section('title', 'Editar Cliente')

@section('content')
    <h1 class="title">Editar Cliente</h1>
    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nome_cliente">Nome:</label>
        <input type="text" name="nome_cliente" id="nome_cliente" value="{{ $cliente->nome_cliente }}" required><br>

        <label for="email_cliente">Email:</label>
        <input type="email" name="email_cliente" id="email_cliente" value="{{ $cliente->email_cliente }}" required><br>

        <label for="endereco_cliente">Endereço:</label>
        <input type="text" name="endereco_cliente" id="endereco_cliente" value="{{ $cliente->endereco_cliente }}" required><br>

        <label for="telefone_cliente">Telefone:</label>
        <input type="text" name="telefone_cliente" id="telefone_cliente" value="{{ $cliente->telefone_cliente }}" required><br>

        <button type="submit">Salvar</button>
    </form>
@endsection