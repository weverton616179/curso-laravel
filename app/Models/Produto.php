<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'imagem',
        'slug',
        'id_categoria',
        'id_user',
    ];

    protected $table = "produtos";

    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function categoria() {
        return $this->belongsTo(Categoria::class,'id_categoria');
    }

    public static function retornaImg(int $id) {
        $produto = Produto::where('id', $id)->first();
        return $produto->imagem;
    }
}
