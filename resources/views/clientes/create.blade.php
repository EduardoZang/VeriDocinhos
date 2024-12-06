@extends('layouts.app')

@section('title', 'Adicionar Cliente')

@section('content')
    <h1 class="title">Adicionar Cliente</h1>
    <form action="{{ route('clientes.store') }}" method="POST">
        @csrf
        <label for="nome_cliente">Nome:</label>
        <input type="text" name="nome_cliente" id="nome_cliente" required><br>

        <label for="email_cliente">Email:</label>
        <input type="email" name="email_cliente" id="email_cliente" required><br>

        <label for="endereco_cliente">Endereço:</label>
        <input type="text" name="endereco_cliente" id="endereco_cliente" required><br>

        <label for="telefone_cliente">Telefone:</label>
        <input type="text" name="telefone_cliente" id="telefone_cliente" required><br>

        <button type="submit">Salvar</button>
    </form>
@endsection