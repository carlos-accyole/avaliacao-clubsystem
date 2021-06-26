<?php

namespace Tests\Feature;

use App\Models\Produto;
use App\Services\CriadorDeProduto;
use App\Services\RemovedorDeProdutos;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RemovedorDeProdutosTest extends TestCase
{
    /** @var Produto */
    private $produto;

    protected function setUp(): void
    {
        parent::setUp();
        $criadorDeProduto = new CriadorDeProduto();
        $this->produto = $criadorDeProduto->criaProduto(
            'Descricao do produto',
            200,
            8
        );
    }

    public function testRemoverUmProduto()
    {
        $removedorDeProduto = new RemovedorDeProdutos();
        $nomeProduto = $removedorDeProduto->removerProduto($this->produto->id);
        $this->assertIsString($nomeProduto);
        $this->assertEquals('Descricao do produto', $this->produto->descricao);
        $this->assertDatabaseMissing('produtos', ['id' => $this->produto->id]);
    }
}
