<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined&display=swap">
<link rel="stylesheet" href="/css/style.css">
<link rel="icon" type="image/x-icon" href="/ico.ico">
<title>Cadastrar Cuidados - ZooMed</title>
</head>
<body>
    <div class="container" role="main">
        <a href="{{ route('home') }}" class="link" style="color: var(--font-black);"><h1>❖ Zoo<spam style="color: var(--color1);">Med</spam></h1></a>
        <h4>Cadastrar Cuidados</h4>
                 {{--Sessões para retornar erros--}}
        @if (session('success'))
    <p style="color: green">
        {{ session('success') }}
    </p>
    @endif

    @if (session('error'))
    <p style="color: red">
        {{ session('error') }}
    </p>
    @endif

    @if ($errors->any())
        <p style="color: red">
            @foreach ($errors->all() as $error)
            {{ $error }}<br>
            @endforeach
        </p>
    @endif
        <form action="{{ route('care.store') }}" method="POST">
            @csrf
          <div>
            <label for="name">Nome</label>
            <input type="text" id="name" name="name" placeholder="Nome do Cuidado" required />
          </div>

          <div>
            <label for="description">Descrição</label>
            <textarea id="description" name="description" placeholder="Descrição do Cuidado"></textarea>
          </div>

            <div>
            <label for="frequency">Frequência</label>
            <select id="frequency" name="frequency">
                <option value="Diária" selected>Diária</option>
                <option value="Semanal">Semanal</option>
                <option value="Mensal">Mensal</option>
            </select>
          </div>

          <button type="submit" class="button_form">Cadastrar</button>

        </form>
        <h4>voltar para <a href="{{ route('home') }}" class="link_">Home</a></h4>

    </div>
</body>