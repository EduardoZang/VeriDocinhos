<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Veri Docinhos')</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            color: #333;
        }

        h1, h2, h3 {
            color: #fff;
            font-weight: 700;
        }

        .title{
            color: black;
            font-weight: 700;
        }

        h2, h3 {
            color: #000;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            flex-grow: 1;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }

        header {
            background-color: #343a40;
            color: #fff;
            padding: 15px 0;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 2rem;
        }

        nav {
            background-color: #007bff;
            padding: 10px;
            text-align: center;
        }

        nav a {
            color: #fff;
            margin: 0 15px;
            font-weight: bold;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .back-button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 15px 0;
            text-align: center;
        }

        .back-button:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table th, table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        table th {
            background-color: #343a40;
            color: #fff;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        button, .btn {
            background-color: #007bff;
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover, .btn:hover {
            background-color: #0056b3;
        }

        input[type="text"], input[type="email"], input[type="password"], input[type="number"], textarea, select {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            margin-bottom: 10px;
            font-size: 1rem;
        }

        img {
            max-width: 100px;
            max-height: 100px;
            object-fit: cover;
            border-radius: 5px;
        }

        footer {
            background-color: #343a40;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            margin-top: 20px;
        }

        .alert {
            padding: 10px;
            margin: 15px 0;
            border-radius: 5px;
        }

        .alert-success {
            background-color: #28a745;
            color: white;
        }

        .alert-danger {
            background-color: #dc3545;
            color: white;
        }

        .alert-warning {
            background-color: #ffc107;
            color: white;
        }
    </style>
</head>
<body>
    <header>
        <h1>@yield('title')</h1>
    </header>
    
    <nav>
        <a href="{{ route('produtos.index') }}">Produtos</a>
        <a href="{{ route('clientes.index') }}">Clientes</a>
        <a href="{{ route('pedidos.index') }}">Pedidos</a>
    </nav>

    <div class="container">
        <a href="{{ route('home') }}" class="back-button">Voltar para a Tela Inicial</a>

        @yield('content')
    </div>

    <footer>
        <p>&copy; {{ date('Y') }} Veri Docinhos</p>
    </footer>
</body>
</html>