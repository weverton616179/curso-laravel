<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;


class CarrinhoController extends Controller
{
    public function carrinhoLista() {
        $itens = Cart::content();
        dd($itens);
    }

    public function adicionaCarrinho(Request $request) {
        Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'qty' => $request->qnt,
            'price' => $request->price,
            // 'options' => $request->image,
        ]);
    }
}
