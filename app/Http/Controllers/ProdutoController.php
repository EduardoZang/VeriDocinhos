<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;

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
        $produto->status = $request->true; //Questão 04

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

    //Questão 1 do trabalho:

    public function search(Request $request) { //Essa função filtrará os dados na tela
        $validator = Validator::make($request->all(), [
            'tipo' => 'required|string|in:nome_produto,categoria_produto',
            'valor' => 'nullable|string|max:255',
        ], [
            'tipo.required' => 'O tipo de busca é obrigatório.',
            'tipo.string' => 'O tipo de busca deve ser um texto.',
            'tipo.in' => 'O tipo de busca selecionado é inválido.',
            'valor.string' => 'O valor da busca deve ser um texto.',
            'valor.max' => 'O valor da busca não pode exceder 255 caracteres.',
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('produtos.index')->withErrors($validator)->withInput();
        }
    
        $query = Produto::query();
    
        if (!empty($request->valor)) {
            if ($request->tipo === 'nome_produto') {
                $query->where('nome_produto', 'like', '%' . $request->valor . '%');
            } elseif ($request->tipo === 'categoria_produto') {
                $query->where('categoria_produto', 'like', '%' . $request->valor . '%');
            }
        }

        $produtos = $query->get();

        return view('produtos.index', compact('produtos'));
    }

    //Questão 03:

    public function gerarRelatorio()
    {
        $produtos = Produto::all();
        $pdf = Pdf::loadView('produtos.relatorio', compact('produtos'));

        return $pdf->download('relatorio_produtos.pdf');
    }

    public function show()
    {
        $produtos = Produto::all();
        $pdf = Pdf::loadView('produtos.relatorio', compact('produtos'));

        return $pdf->download('relatorio_produtos.pdf');
    }

    //Questão 04:
    public function alterarStatus(Produto $produto)
    {
        $produto->status = !$produto->status;
        $produto->save();

        return redirect()->route('produtos.index')->with('success', 'Status do produto atualizado com sucesso!');
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