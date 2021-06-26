<?php

namespace Tests\Feature;

use App\Models\Produto;
use App\Services\CriadorDeProduto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CriadorDeProdutoTest extends TestCase
{
    public function testCriaProduto()
    {
        $criadorDeProduto = new CriadorDeProduto();
        $descricaoProduto = 'Descrição de teste';
        $produtoCriado = $criadorDeProduto->criaProduto($descricaoProduto, 500, 5);

        $this->assertInstanceOf(Produto::class, $produtoCriado);
        $this->assertDatabaseHas('produtos', ['descricao' => $descricaoProduto]);
        $this->assertDatabaseHas('produtos', ['valor' => 500]);
        $this->assertDatabaseHas('produtos', ['quantidade' => 5]);



    }
}
