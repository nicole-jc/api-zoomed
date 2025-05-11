<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined&display=swap">
<link rel="stylesheet" href="/css/style.css">
<link rel="icon" type="image/x-icon" href="/ico.ico">
<title>Cadastrar Animal - ZooMed</title>
</head>
<body>
    <div class="container" role="main">
        <a href="{{ route('home') }}" class="link" style="color: var(--font-black);"><h1>❖ Zoo<spam style="color: var(--color1);">Med</spam></h1></a>
        <h4>Cadastrar Animal</h4>
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
        <form action="{{ route('animal.store') }}" method="POST">
          @csrf
          <div>
            <label for="name">Nome</label>
            <input type="text" id="name" name="name" placeholder="Nome do Animal" required />
          </div>

          <div>
            <label for="description">Descrição</label>
            <textarea id="description" name="description" placeholder="Descrição do Animal"></textarea>
          </div>

           <div>
            <label for="birthdate">Data de Nascimento</label>
            <input type="date" id="birthdate" name="birthdate" required />
          </div>

          <div>
            <label for="class">Classe</label>
            <select id="class" name="class_id">
                @foreach ($classes as $class)
                <option value="{{ $class->id }}">{{ $class->name }}</option>      
                @endforeach
            </select>
          </div>

          {{--Espécie é uma combobox, a partir da escolha da classe do animal, a combobox filtra as espécies relacionadas a classe escolhida--}}
           <div>
            <label for="specie">Espécie</label>
            <select id="specie" name="specie_id">
                <option value="default">Espécie</option>
            </select>
          </div>

            <div>
            <label for="habitat">Habitat</label>
            <select id="habitat" name="habitat">
                <option value="Cerrado">Cerrado</option>
                <option value="Costas Rochosas">Costas Rochosas</option>
                <option value="Floresta Temperada">Floresta Temperada</option>
                <option value="Floresta Tropical">Floresta Tropical</option>
                <option value="Savana">Savana</option>
            </select>
          </div>

            <div>
            <label for="country">País de Origem</label>
            <select id="country" name="country">
                <option value="Africa">África</option>
                <option value="America do Norte">América do Norte</option>
                <option value="America do Sul">América do Sul</option>
                <option value="Brasil">Brasil</option>
            </select>
          </div>

          <button type="submit" class="button_form">Cadastrar</button>
        </form>

        <h4>voltar para <a href="{{ route('home') }}" class="link_">Home</a></h4>

    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      var filterSpeciesUrl = "{{ route('filter.species') }}"
        $(document).ready(function() {
            $('#class').on('change', function() {
                var classId = $(this).val();
                console.log('Classe selecionada:', classId);

                if (classId) { 
                    console.log('Enviando requisição AJAX para:', filterSpeciesUrl);
                    $.ajax({
                        url: filterSpeciesUrl, 
                        method: 'GET',
                        data: { class_id: classId }, 
                        success: function(response) {
                            console.log('Resposta da requisição:', response); 

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