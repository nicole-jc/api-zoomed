<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined&display=swap">
<link rel="stylesheet" href="/css/style.css">
<link rel="icon" type="image/x-icon" href="/ico.ico">
<title>Editar Cuidado - ZooMed</title>
</head>
<body>
    <div class="container" role="main">
        <a href="homepetcare.html" class="link" style="color: var(--font-black);"><h1>❖ Zoo<spam style="color: var(--color1);">Med</spam></h1></a>
        <h4>Editar Cuidado "{{ $care->name }}"</h4>
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
        <form action="{{ route('care.update', $care->id) }}" method="POST">
            @csrf
            @method('PUT')
          <div>
            <label for="name">Nome</label>
            <input type="text" id="name" name="name" value="{{ $care->name }}" required />
          </div>

          <div>
            <label for="description">Descrição</label>
            <textarea id="description" name="description">{{ $care->description }}</textarea>
          </div>

            <div>
            <label for="frequency">Frequência</label>
            <select id="frequency" name="frequency">
                <option value="{{ $care->frequency }}" selected>{{ $care->frequency }}</option>
                <option value="Diary">Diária</option>
                <option value="Weekly">Semanal</option>
                <option value="Monthly">Mensal</option>
            </select>
          </div>

    <div class="button_group">
    <button type="submit" class="button_form save">Salvar</button>
</form>
<form action="{{ route('care.destroy', $care->id) }}" method="POST" 
onsubmit="return confirm('Você tem certeza que deseja apagar este cuidado?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="button_form delete">Apagar</button>
  </div>
        </form>

        <h4>voltar para <a href="{{ route('care.list') }}" class="link_">Cuidados</a></h4>

    </div>
</body>