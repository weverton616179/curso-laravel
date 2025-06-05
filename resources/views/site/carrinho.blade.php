@extends('site.layout')
@section('title', 'Carrinho')
@section('conteudo')

<div class="row container">

    <h5>Carrinho: </h5>

    @foreach ($produtos as $produto)
        
    @endforeach

    

</div>

<div class="row center">
    {{ $produtos->links('custom.pagination') }}
</div>

@endsection