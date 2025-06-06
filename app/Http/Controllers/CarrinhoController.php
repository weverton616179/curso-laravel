<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Produto;


class CarrinhoController extends Controller
{
    public function carrinhoLista() {
        $itens = Cart::content();
        
        return view('site.carrinho', compact('itens'));
    }

    public function adicionaCarrinho(Request $request) {
        Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'qty' => abs($request->qty),
            'price' => $request->price,
            // 'options' => $request->image,
        ]);

        return redirect()->route('site.carrinho')->with('successo','Produto adicionado com sucesso!');
    }

    public function removeCarrinho(Request $request) {
        $item = Cart::content()->firstWhere('id', $request->id);
        Cart::remove($item->rowId);
        return redirect()->route('site.carrinho')->with('successo','Produto removido com sucesso!');
    }

    public function atualizaCarrinho(Request $request) {
        $item = Cart::content()->firstWhere('id', $request->id);
        Cart::update($item->rowId, abs($request->qty));
        return redirect()->route('site.carrinho')->with('successo','Produto editado com sucesso!');
    }

    public function limparCarrinho() {
        Cart::destroy();
        return redirect()->route('site.carrinho')->with('aviso','Carrinho limpo com sucesso!');
    }
}
