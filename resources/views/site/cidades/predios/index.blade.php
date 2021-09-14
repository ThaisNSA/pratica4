@extends('site.layouts.principal')

@section('conteudo-principal')
    <h4>Contratos imobiliários em {{$cidade->nome}}</h4>

    <div class="divider"></div>

    <div style="display: flex; flex-wrap: whap">

    @forelse ($predios as $predio)

        <div class="card" style="width: 290px; margin: 10px;">
            <div class="card-image">

            @if (count($predio->fotos) > 0)
            <img src="{{asset("storage/{$predio->fotos[0]->url}")}}"/>
            @endif

            </div>
            <div class="card-content">
                <p class="card-title">
                    {{$predio->titulo}}
                </p>
                <p>
                    Tipo de Aquisição: <strong>{{$predio->descricao}}</strong>
                </p>
                <p>
                    Preço: <strong>R$ {{$predio->preco}}</strong>
                </p>
            </div>

            <div class="card-action">
                <a href="{{route('cidades.predios.show', [$cidade->id, $predio->id])}}" class="grey-text">
                    Detalhes
                </a>
            </div>

        </div>
    @empty
        <p>Ainda não temos negócios nessa cidade... </p>
    @endforelse

    </div>
    <div class="center">
        {{$predios->links('shared.pagination')}}
    </div>

@endsection
