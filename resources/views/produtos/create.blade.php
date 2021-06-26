@extends('layout')

@section('cabecalho')
    Adicionar Produtos
@endsection

@section('conteudo')
    @include('erros', ['errors' => $errors])

    <form method="post">
        @csrf
        <div class="row">
            <div class="col col-8">
                <label for="nome">Descrição</label>
                <input type="text" class="form-control" name="descricao" id="descricao">
            </div>

            <div class="col col-2">
                <label for="valor">Valor</label>
                <input type="text" class="form-control" name="valor" id="valor">
            </div>

            <div class="col col-2">
                <label for="quantidade">Quantidade</label>
                <input type="number" class="form-control" name="quantidade" id="quantidade">
            </div>
        </div>

        <button class="btn btn-primary mt-2">Adicionar</button>
    </form>
@endsection
