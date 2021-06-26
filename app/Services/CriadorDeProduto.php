<?php

namespace App\Services;

use App\Models\Produto;

class CriadorDeProduto
{
    public function criaProduto(string $descricao, float $valor, int $quantidade): Produto
    {
        $produto = Produto::create(
            [
                'descricao' => $descricao,
                'valor' => $valor,
                'quantidade' => $quantidade
            ]
        );

        return $produto;
    }
}
