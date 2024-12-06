<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view('produtos.index', compact('produtos'));
    }

    public function create()
    {
        return view('produtos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome_produto' => 'required|string|max:255',
            'preco_produto' => 'required|numeric',
            'categoria_produto' => 'required|string',
            'imagem_produto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $produto = new Produto();
        $produto->nome_produto = $request->input('nome_produto');
        $produto->descricao_produto = $request->input('descricao_produto');
        $produto->preco_produto = $request->input('preco_produto');
        $produto->categoria_produto = $request->input('categoria_produto');

        if ($request->hasFile('imagem_produto')) {
            $produto->imagem_produto = $request->file('imagem_produto')->store('produtos', 'public');
        }

        $produto->save();

        return redirect()->route('produtos.index');
    }

    public function edit(Produto $produto)
    {
        return view('produtos.edit', compact('produto'));
    }

    public function update(Request $request, Produto $produto)
    {
        $data = $request->validate([
            'nome_produto' => 'required|string|max:255',
            'descricao_produto' => 'required|string',
            'preco_produto' => 'required|numeric',
            'categoria_produto' => 'required|string',
            'imagem_produto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('imagem_produto')) {
            $data['imagem_produto'] = $request->file('imagem_produto')->store('produtos', 'public');
        }

        $produto->update($data);

        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Produto $produto)
    {
        if ($produto->imagem_produto) {
            \Storage::delete('public/' . $produto->imagem_produto);
        }
        $produto->delete();

        return redirect()->route('produtos.index')->with('success', 'Produto deletado com sucesso!');
    }
}