<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PedidosModel extends Model
{
    protected $fillable = ["nome_cliente", "quant_pedido","preco_total","fk_produtos"];
    protected $table = "pedidos";
    protected $primarykey = "id";
    public $timestamps = false;
}
