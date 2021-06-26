@extends('layout')

@section('cabecalho')
    Produtos
@endsection

@section('conteudo')

@include('mensagem', ['mensagem' => $mensagem])

<a href="{{ route('form_criar_produto') }}" class="btn btn-dark mb-2">Adicionar</a>

<ul class="list-group">
    @foreach ($produtos as $produto)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <span id="descricao-produto-{{ $produto->id }}">{{ $produto->descricao }}</span>

            <div class="input-group w-50" hidden id="input-descricao-produto-{{ $produto->id }}">
                <input type="text" class="form-control" value="{{ $produto->descricao }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" onclick="editarProduto({{ $produto->id }})">
                        <i class="fas fa-check"></i>
                    </button>
                    @csrf
                </div>
            </div>

            <span class="d-flex">
        <button class="btn btn-info btn-sm mr-1" onclick="toggleInput( {{ $produto->id }} )">
            <i class="fas fa-edit"></i>
        </button>
        <form method="post" action="/produtos/{{ $produto->id }}"
            onsubmit="return confirm('Tem certeza que deseja remover o produto {{ addslashes($produto->descricao) }}?')">
            @csrf
            @method("DELETE")
            <button class="btn btn-danger btn-sm">
                 <i class="far fa-trash-alt"></i>
            </button>
        </form>
    </span>
     </li>
    @endforeach
</ul>

    <script>
        function toggleInput(produtoId) {
            const descricaoProduto = document.getElementById(`descricao-produto-${produtoId}`);
            const inputProduto = document.getElementById(`input-descricao-produto-${produtoId}`);
            if (descricaoProduto.hasAttribute('hidden')) {
                descricaoProduto.removeAttribute('hidden');
                inputProduto.hidden = true;
            }else {
                inputProduto.removeAttribute('hidden');
                descricaoProduto.hidden = true;
            }
        }

        function editarProduto(produtoId) {
            let formData = new FormData();
            const descricao = document.querySelector(`#input-descricao-produto-${produtoId} > input`).value;
            const token =document.querySelector('input[name="_token"]').value;
            formData.append('descricao', descricao);
            formData.append('_token', token);

            const url =  `/produtos/${produtoId}/editaNome`;
            fetch(url, {
                body: formData,
                method: 'POST'
            }).then(() => {
                toggleInput(produtoId);
                document.getElementById(`descricao-produto-${produtoId}`).textContent = descricao;
            });
        }
    </script>
@endsection
