@extends('template')

@section('conteudo')
<h1>Formulário de cadastro</h1>
<form action="/produtos" method="post">
  {{csrf_field()}}

  @if(isset($produto->id))
  <input type="hidden" name="id" value="{{$produto->id}}">
  <input type="hidden" name="_method" value="put">
  @endif
    <div class="form-group">
        <label for="nome">Nome:
        <input type="text" id="nome" name="nome" value="{{$produto->nome}}" class="form-control"></label>
    </div>
    <div class="form-group">
        <label for="preco">Preco:
        <input type="number" id="preco" name="preco" value="{{$produto->preco}}" class="form-control"></label>
    </div>
    <div class="form-group">
        <label for="preco">Descrição:
        <textarea type="text" id="descricao" name="descricao" value="" class="form-control">{{$produto->descricao}}</textarea></label>
    </div>




    <button type="submit" value="ENVIAR" class="btn btn-primary">ENVIAR</button>
  </form>


@endsection
