<?php

namespace Lojinha\Http\Controllers;

use Illuminate\Http\Request;
use Lojinha\Produto;
// use Illuminate\Support\Facades\DB;

class ProdutosController extends Controller
{
    function lista() {
      // $Produtos = DB::table('produtos')->get();
      $produtos = Produto::all();
      return view('produto/lista')->with('todos', $produtos);
    }

    function form() {
      return view('produto/formulario');
    }

    function salvar(Request $request) {
      $parametros = $request->except('_token');
      // DB::table('produtos')->insert($parametros);
      $produtos = Produto::create($parametros);

      return redirect('/produtos');
    }

    function excluir(Request $request) {
      $id = $request->input('id');
      $produto = $request->input('nome');
      Produto::destroy($id);
      return redirect('/produtos')->with('msg', 'Produto "' . $produto . '" removido com sucesso.');
    }

    function editar($id) {
      $produto = Produto::find($id);
      return view('/produto/formulario')->with('produto', $produto);
    }

    function alterar(Request $request) {
      $produto = Produto::find($request->input('id'));
      $produto->update($request->except('_token'));

      return redirect('/produtos')->with('msg', 'Produto alterado com sucesso');
    }

}
