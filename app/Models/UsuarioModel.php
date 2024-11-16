<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioModel extends Model
{
    protected $fillable = ["email", "senha"];
    protected $table = "usuarios";
    protected $primarykey = "id";
    public $timestamps = false;
}
