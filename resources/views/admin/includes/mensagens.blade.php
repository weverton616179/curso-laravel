@if ($mensagem = Session::get('sucesso'))
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