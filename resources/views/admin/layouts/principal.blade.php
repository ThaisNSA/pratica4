<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="{{asset('css/fotos.css')}}">

    <title>Controle de Filiais</title>
</head>
<body>
    <nav>
        <div class="container">
            <div class="nav-wrapper">
                <a href="/" class="brand-logo">Controle de Filiais</a>
                <ul class="right">
                    <li>
                        <a href="{{route('admin.predios.index')}}">Prédios</a>
                    </li>
                    <li>
                        <a href="{{route('admin.cidades.index')}}">Cidades</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('conteudo-principal')
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        @if (session('sucesso'))
        M.toast({html:"{{session('sucesso')}}"});
    @endif

    document.addEventListener('DOMContentLoaded', function(){
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems);
    });
    </script>

</body>
</html>
