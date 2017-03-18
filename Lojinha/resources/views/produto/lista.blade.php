@extends('template')

@section('conteudo')
<h1>Lista de produtos</h1>

<table class="table table-bordered table-striped table-hover">
  <thead>
    <tr>
      <th>ID</th>
      <th>NOME</th>
      <th>PREÇO</th>
      <th>EXCLUIR</th>
    </tr>
  </thead>
  <tbody>
    @foreach($todos as $produto)
    <tr>
      <td>{{$produto->id}}</td>
      <td>{{$produto->nome}}</td>
      <td>{{$produto->preco}}</td>
      <td>
        <a class="btn btn-warning" href="/produtos/{{$produto->id}}">Editar</a>
        <form style="display: inline-block" class="" action="/produtos" method="post">
          <input type="hidden" name="_method" value="delete" />
          {{csrf_field()}}
          <input type="hidden" name="id" value="{{$produto->id}}" />
          <input type="hidden" name="nome" value="{{$produto->nome}}" />
          <button type="submit" style="font-size: 0.9em" class="btn btn-danger js-btn-excluir" name="button"><i style="margin-right: 4px" class="glyphicon glyphicon-trash m-l-sm"></i> EXCLUIR</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<script type="text/javascript">
  var btn = $('.js-btn-excluir').on('click', function(evt) {
    if(!confirm('Cê qué s-cluí?')) {
      evt.preventDefault();
    }
  });
</script>
@endsection
