<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined&display=swap">
<link rel="stylesheet" href="/css/style.css">
<link rel="icon" type="image/x-icon" href="ico.ico">
<title>Animais - ZooMed</title>
</head>
<body>
<header>
  <nav aria-label="Primary">
    <a href="{{ route('home') }}" tabindex="0"><span class="material-symbols-outlined">home_health</span></a>
    <a href="{{ route('animal.list') }}" tabindex="0" style="background-color: var(--white); color: var(--font-black);">Animais</a>
    <a href="{{ route('care.list') }}" tabindex="0">Cuidados</a>
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
  <h2>Todos os animais</h2>
  <table>
    <thead>
      <tr>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Data de Nascimento</th>
        <th>Classe</th>
        <th>Espécie</th>
        <th>Habitat</th>
        <th>País de Origem</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>

        @foreach ($animals as $animal)
        <tr>
        <td data-label="Nome">{{ $animal->name }}</td>
        <td data-label="Descrição">{{ $animal->description }}</td>
        <td data-label="Data de Nascimento">{{ $animal->birthdate }}</td>
        <td data-label="Classe">{{ $animal->class_name }}</td>
        <td data-label="Espécie">{{ $animal->specie_name }}</td>
        <td data-label="Habitat">{{ $animal->habitat }}</td>
        <td data-label="País de Origem">{{ $animal->country }}</td>
        <td><a href="{{ route('animal.update.view', $animal->id) }}"><button class="button_table">Editar</button></a></td>
        </tr>
        @endforeach
      
    </tbody>
  </table>
</body>