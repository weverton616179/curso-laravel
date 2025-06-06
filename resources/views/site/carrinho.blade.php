@extends('site.layout')
@section('title', 'Carrinho')
@section('conteudo')

<div class="row container">

    

    @if($itens->count() > 0)

        @if ($mensagem = Session::get('successo'))
            <div class="row">
                <div class="col s12 m6">
                    <div class="card green">
                        <div class="card-content white-text">
                            <span class="card-title">Parabéns</span>
                            <p>{{$mensagem}}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($mensagem = Session::get('aviso'))
            <div class="row">
                <div class="col s12 m6">
                    <div class="card red">
                        <div class="card-content white-text">
                            <span class="card-title">Tudo bem</span>
                            <p>{{$mensagem}}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    
        <h5>Seu carrinho possui {{$itens->count()}} prdoutos.</h5>
        <table class="striped">
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Item Name</th>
                    <th>Item Price</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($itens as $item)
                    <tr>
                        <td><img src="{{App\Models\Produto::retornaImg($item->id)}}" alt="" width="70" class="responsive-img circle"></td>
                        <td>{{$item->name}}</td>
                        <td>R$ {{number_format($item->price, 2, ',', '.')}}</td>

                        <form action="{{ route('site.atualizacarrinho')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$item->id}}">
                        <td><input style="width: 40px; font-weight:900;" class="white center" min="1" type="number" name="qty" value="{{$item->qty}}"></td>
                        <td>
                            <button class="btn-floating waves-effect waves-light orange"><i class="material-icons">refresh</i></button>
                            </form>

                            <form action="{{ route('site.removecarrinho')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$item->id}}">
                                <button class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="card orange">
            <div class="card-content white-text">
                <span class="card-title">Valor total do Carrinho: R$ {{Gloudemans\Shoppingcart\Facades\Cart::total(2, ',', '.')}}</span>
                <p>Page em 12x sem juros!</p>
            </div>
        </div>
        
        <div class="row container center">
            <a href="{{ route('site.index')}}" class="btn waves-effect waves-light blue">Continuar comprando<i class="material-icons right">arrow_back</i></a>
            <a href="{{ route('site.limparcarrinho')}}" class="btn waves-effect waves-light red">Limpar carrinho<i class="material-icons right">clear</i></a>
            <td><button class="btn waves-effect waves-light green">Finalizar compra<i class="material-icons right">check</i></button></td>
        </div>

    @else        
        <div class="card orange">
            <div class="card-content white-text">
                <span class="card-title">Seu carrinho está vazio!</span>
                <p>Aproveite nossas promoções</p>
            </div>
        </div>
    @endif    
    {{-- {{App\Models\Produto::retornaImg(2)}} --}}
</div>

@endsection