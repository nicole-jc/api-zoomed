<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined&display=swap">
<link rel="stylesheet" href="/css/style.css">
<link rel="icon" type="image/x-icon" href="/ico.ico">
<title>Editar Animal - ZooMed</title>
</head>
<body>
    <div class="container" role="main">
        <a href="{{ route('home') }}" class="link" style="color: var(--font-black);"><h1>❖ Zoo<spam style="color: var(--color1);">Med</spam></h1></a>
        <h4>Editar Animal "{{ $animal->name }}"</h4>
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
        <form action="{{ route('animal.update', $animal->id) }}" method="POST">
            @csrf
            @method('PUT')
          <div>
            <label for="name">Nome</label>
            <input type="text" id="name" name="name" value="{{ $animal->name }}" required/>
          </div>

          <div>
            <label for="description">Descrição</label>
            <textarea id="description" name="description">{{ $animal->description }}</textarea>
          </div>

           <div>
            <label for="birthdate">Data de Nascimento</label>
            <input type="date" id="birthdate" name="birthdate" value="{{ $animal->birthdate }}" />
          </div>

          <div>
            <label for="class">Classe</label>
            <select id="class" name="class_id">
            @foreach($classes as $class)
                <option value="{{ $class->id }}" {{ $class->id == $animal->class_id ? 'selected' : '' }}>
                  {{ $class->name }}
            </option>
  @endforeach
            </select>
          </div>

           <div>
            <label for="specie">Espécie</label>
            <select id="specie" name="specie_id">
              <option value="{{ $animal->specie_id }}">{{ $animal->specie_name }}</option>
            </select>
          </div>

            <div>
            <label for="habitat">Habitat</label>
            <select id="habitat" name="habitat">
      <option value="Cerrado" {{ $animal->habitat == 'Cerrado' ? 'selected' : '' }}>Cerrado</option>
    <option value="Costas Rochosas" {{ $animal->habitat == 'Costas Rochosas' ? 'selected' : '' }}>Costas Rochosas</option>
    <option value="Floresta Temperada" {{ $animal->habitat == 'Floresta Temperada' ? 'selected' : '' }}>Floresta Temperada</option>
    <option value="Floresta Tropical" {{ $animal->habitat == 'Floresta Tropical' ? 'selected' : '' }}>Floresta Tropical</option>
    <option value="Savana" {{ $animal->habitat == 'Savana' ? 'selected' : '' }}>Savana</option>
            </select>
          </div>

            <div>
            <label for="country">País de Origem</label>
            <select id="country" name="country">
                <option value="Africa" {{ $animal->country == 'Africa' ? 'selected' : '' }}>África</option>
                <option value="America do Norte" {{ $animal->country == 'America do Norte' ? 'selected' : '' }}>América do Norte</option>
                <option value="America do Sul" {{ $animal->country == 'America do Sul' ? 'selected' : '' }}>América do Sul</option>
                <option value="Brasil" {{ $animal->country == 'Brasil' ? 'selected' : '' }}>Brasil</option>
            </select>
          </div>
          
    <div class="button_group">
    <button type="submit" class="button_form save">Salvar</button>
    </form>
    <form action="{{ route('animal.destroy', $animal->id) }}" method="POST" onsubmit="return confirm('Você tem certeza que deseja apagar este animal?')">
      @csrf
      @method('DELETE')
    <button type="submit" class="button_form delete">Apagar</button>
    </form>
  </div>

        <h4>voltar para <a href="{{ route('animal.list') }}" class="link_">Animais</a></h4>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      var filterSpeciesUrl = "{{ route('filter.species') }}"
        $(document).ready(function() {
            $('#class').on('change', function() {
                var classId = $(this).val();
                console.log('Classe selecionada:', classId);

                if (classId) { // debugando
                    console.log('Enviando requisição AJAX para:', filterSpeciesUrl);
                    $.ajax({
                        url: filterSpeciesUrl, // Usando a rota da variavel
                        method: 'GET',
                        data: { class_id: classId },
                        success: function(response) {
                            console.log('Resposta da requisição:', response); // debugando 

                            var options = '<option value="">Escolha uma espécie</option>'; // Opcao padrao

                            response.forEach(function(specie) {
                                options += '<option value="' + specie.id + '">' + specie.name + '</option>';
                            });

                            $('#specie').html(options);
                        },
                        error: function() {
                            alert('Erro ao carregar as espécies.');
                        }
                    });
                } else {

                    $('#specie').html('<option value=""></option>');
                }
            });
        });
    </script>
</body>