<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined&display=swap">
<link rel="stylesheet" href="/css/style.css">
<link rel="icon" type="image/x-icon" href="ico.ico">
<title>Home - ZooMed</title>
</head>
<body>
<header>
  <nav aria-label="Primary">
    <a href="{{ route('home') }}" tabindex="0" style="background-color: var(--white); color: var(--font-black);"><span class="material-symbols-outlined">home_health</span></a>
    <a href="{{ route('animal.list') }}" tabindex="0">Animais</a>
    <a href="{{ route('care.list') }}" tabindex="0">Cuidados</a>
  </nav>
  <form class="search-form" role="search" aria-label="Site search" action="#" method="GET">
    <input type="search" name="q" placeholder="Pesquisar..." aria-label="Search" />
  </form>
</header>
<div class="main">
    <!--Card para cadastrar animais-->
    <div class="gallery">
       <div class="desc">Cadastrar Animais<br>
       <span class="material-symbols-outlined icon-icons">
        sound_detection_dog_barking
        </span>
       <br>
       <a href="{{ route('animal.create.view') }}">
       <button type="button" class="button">
        Cadastrar
       </button></a>
    </div>
    </div>
    <!--Card para listar animais-->
    <div class="gallery">
        <div class="desc">Ver todos os Animais<br>
        <span class="material-symbols-outlined icon-icons">pet_supplies</span>
        <br>
        <a href="{{ route('animal.list') }}">
        <button type="button" class="button">
            Ver
        </button></a>
        </div>
     </div>
     <!--Card para cadastrar cuidados-->
     <div class="gallery">
        <div class="desc">Cadastrar Cuidados<br>
        <span class="material-symbols-outlined icon-icons">vaccines</span>
        <br>
        <a href="{{ route('care.create.view') }}">
        <button type="button" class="button">
        Cadastrar
        </button></a>
        </div>
     </div>
     <!--Card para listar cuidados-->
     <div class="gallery">
        <div class="desc">Ver todos os Cuidados<br>
        <span class="material-symbols-outlined icon-icons">medical_services</span>
        <br>
        <a href="{{ route('care.list') }}">
        <button type="button" class="button">
        Ver
        </button></a>
        </div>
     </div>
</div>
</body>
</html>
