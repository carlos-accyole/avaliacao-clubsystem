<?php

namespace App\Services;

use App\Models\Produto;
use Illuminate\Support\Facades\DB;

class RemovedorDeProdutos
{
    public function removerProduto(int $produtoId): string
    {
        $nomeProduto = '';
        DB::transaction(function () use ($produtoId, &$nomeProduto){
            $produto = Produto::find($produtoId);
            $nomeProduto = $produto->descricao;
            $produto->delete($produto);
        });

        return $nomeProduto;
    }
}
