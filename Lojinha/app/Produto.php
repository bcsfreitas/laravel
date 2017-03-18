<?php

namespace Lojinha;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
  // protected $table = 'produtos';
  public $fillable = ['nome', 'preco', 'descricao'];
  public $timestamps = false;
}
