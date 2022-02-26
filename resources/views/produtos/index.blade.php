@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a class="btn btn-success mb-5" href="{{route('cadastrar')}}">Cadastro de Novo Produto</a>
            <div class="card"> 
                <div class="card-header">Produtos</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Preço</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produtos as $produto)
                            <tr>
                                <th scope="row">{{$produto->nome}}</th>
                                <td>{{$produto->preco}}</td>
                                <td>
                                    <a name="delete" id="delelte" class="btn btn-danger" href="{{route('delete', $produto->id)}}" role="button">delete</a>
                                    <a name="editar" id="editar" class="btn btn-primary" href="{{route('editar', $produto->id)}}" role="button">editar</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
