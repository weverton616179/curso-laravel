@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{$error}} <br>
    @endforeach
@endif

<form action="{{ route('users.store')}}" method="POST">
@csrf
Nome: <br><input type="text" name="firstName"><br>
Sobrenome: <br><input type="text" name="lastName"><br>
Email: <br><input type="email" name="email"><br>
Senha: <br><input type="password" name="password"><br>
<button type="submit">Entrar</button>
</form>