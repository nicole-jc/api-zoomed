<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined&display=swap">
<link rel="stylesheet" href="/css/style.css">
<link rel="icon" type="image/x-icon" href="/ico.ico">
<title>Cuidados - ZooMed</title>
<style>
  table {
   width: 900px;
  }
</style>
</head>
<body>
<header>
  <nav aria-label="Primary">
    <a href="{{ route('home') }}" tabindex="0"><span class="material-symbols-outlined">home_health</span></a>
    <a href="{{ route('animal.list') }}" tabindex="0">Animais</a>
    <a href="{{ route('care.list') }}" tabindex="0" style="background-color: var(--white); color: var(--font-black);">Cuidados</a>
  </nav>
  <form class="search-form" role="search" aria-label="Site search" action="#" method="GET">
    <input type="search" name="q" placeholder="Pesquisar..." aria-label="Search" />
  </form>
</header>
    @if (session('success'))
    <script>
    alert("{{ session('success') }}");
    </script>
    @endif
  <h2>Todos os cuidados</h2>
  <table>
    <thead>
      <tr>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Frequência</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>

    @foreach ($cares as $care)
        <tr>
        <td data-label="Nome">{{ $care->name }}</td>
        <td data-label="Descrição">{{ $care->description }}</td>
        <td data-label="Frequência">{{ $care->frequency }}</td>
        <td><a href="{{ route('care.update.view', $care->id) }}"><button class="button_table">Editar</button></a></td>
      </tr>
    @endforeach
      
    </tbody>
  </table>
</body>