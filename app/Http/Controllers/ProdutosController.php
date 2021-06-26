<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutosFormRequest;
use App\Models\Produto;
use App\Services\CriadorDeProduto;
use App\Services\RemovedorDeProdutos;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function __construct()
    {
        $this->middleware('autenticador');
    }

    public function index(Request $request) {

        $produtos = Produto::query()->orderBy('descricao')->get();
        $mensagem = $request->session()->get('mensagem');
        $request->session()->remove('mensagem');

        return view('produtos.index', compact('produtos', 'mensagem'));
    }

    public function create()
    {
        return view('produtos.create');
    }

    public function store(ProdutosFormRequest $request, CriadorDeProduto $criadorDeProduto)
    {
        $produto = $criadorDeProduto->criaProduto(
            $request->descricao,
            $request->valor,
            $request->quantidade,
        );

        $request->session()
            ->flash(
                'mensagem',
                "Produto {$produto->id} criado com sucesso {$produto->descricao}"
            );

        return redirect()->route('listar_produtos');
    }

    public function destroy(Request $request, RemovedorDeProdutos $removedorDeProdutos)
    {
        $nomeProduto = $removedorDeProdutos->removerProduto($request->id);

        $request->session()
            ->flash(
                'mensagem',
                "Produto $nomeProduto removido com sucesso"
            );

        return redirect()->route('listar_produtos');
    }

    public function editaNome(int $id, Request $request)
    {
        $novaDescricao = $request->descricao;
        $produto = Produto::find($id);
        $produto->descricao = $novaDescricao;
        $produto->save();
    }
}
