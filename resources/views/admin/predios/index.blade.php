@extends('admin.layouts.principal')

@section('conteudo-principal')

<section class="section">

    <form action="{{route('admin.predios.index')}}" method="GET">
        <div class="row valign-wrapper">

            <div class="input-field col s6">
                <select name="cidade_id" id="cidade">
                    <option value="">Selecione uma cidade</option>

                    @foreach ($cidades as $cidade)
                        <option value="{{$cidade->id}}" {{$cidade->id == $cidade_id ? 'selected' : ''}}>{{$cidade->nome}}</option>
                    @endforeach

                </select>
            </div>
                <div class="input-field col s6">
                    <input type="text" name="titulo" id="titulo" value="{{$titulo}}"/>
                    <label for="titulo">Título</label>
                 </div>
        </div>

                <div class="row right-align">
                    <a href="{{route('admin.predios.index')}}" class="btn waves-effect  waves-light transparent black-text">
                    Mostrar Todos
                    </a>
                    <button type="submit" class="btn waves-effect waves-light black">
                        Pesquisar
                    </button>
                </div>

    </form>
</section>

<section class="section">

    <table class="highlight">
        <thead>
            <tr>
                <th>Cidade</th>
                <th>Bairro</th>
                <th>Título</th>
                <th class="right-align">Opções</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($predios as $predio)
            <tr>
                <td>{{$predio->cidade->nome}}</td>
                <td>{{$predio->endereco->bairro}}</td>
                <td>{{$predio->titulo}}</td>
                <td class="right-align">

                    <a href="{{route('admin.predios.fotos.index', $predio->id)}}" title="Fotos">
                        <span>
                            <i class="material-icons black-text">insert_photo</i>
                        </span>
                    </a>

                    <a href="{{route('admin.predios.show', $predio->id)}}" title="Ver">
                        <span>
                            <i class="material-icons black-text">remove_red_eye</i>
                        </span>
                    </a>

                    <a href="{{route('admin.predios.edit', $predio->id)}}" title="Editar">
                        <span>
                            <i class="material-icons black-text">edit</i>
                        </span>
                    </a>

                    <form action="{{route('admin.predios.destroy', $predio->id)}}" method="POST" style="display: inline">
                        @csrf
                        @method('DELETE')

                        <button style="border:0;background:transparent" type="submit" title="Excluir">
                            <span style="cursor: pointer">
                                <i class="material-icons">delete_forever</i>
                            </span>

                        </button>
                    </form>
                </td>
            </tr>

            @empty
            <tr>
                <td colspan="4">Não há prédios correspondentes a essa busca!</td>
            </tr>

            @endforelse
        </tbody>
    </table>

    <div class="center">
        {{$predios->links('shared.pagination')}}
    </div>

    <div class="fixed-action-btn">
        <a class="btn-floating btn-large waves-effect waves-light black" href="{{route('admin.predios.create')}}">
            <i class="large material-icons">add</i>
        </a>
    </div>

</section>

@endsection
