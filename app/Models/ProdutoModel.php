<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdutoModel extends Model
{
    protected $fillable = ["nome", "preco_uni", "quantidade"];
    protected $table = "produtos";
    protected $primarykey = "id";
    public $timestamps = false;
}
