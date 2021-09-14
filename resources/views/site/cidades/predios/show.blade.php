@extends('site.layouts.principal')

@section('conteudo-principal')

<h4>{{$predio->titulo}}</h4>

<section class="section">
    <div class="row">
        <span class="col s12">
            <h5>Cidade</h5>
            <p>{{$predio->cidade->nome}}</p>
        </span>
    </div>

    <div class="row">
        <span class="col s4">
            <h5>Andares</h5>
            <p>{{$predio->andar}}</p>
        </span>

        <span class="col s4">
            <h5>Salas</h5>
            <p>{{$predio->sala}}</p>
        </span>

        <span class="col s4">
            <h5>Banheiros</h5>
            <p>{{$predio->banheiro}}</p>
        </span>

        <span class="col s4">
            <h5>Auditórios</h5>
            <p>{{$predio->auditorio}}</p>
        </span>

        <span class="col s4">
            <h5>Vagas no estacionamento</h5>
            <p>{{$predio->estvag}}</p>
        </span>

        <span class="col s4">
            <h5>Preço</h5>
            <p>{{$predio->preco}}</p>
        </span>
    </div>

    <div class="row">
        <span class="col s12">
            <h5>Tipo de aquisição</h5>
            <p>{{$predio->descricao}}</p>
        </span>
    </div>

    <div class="row">
        <span class="col s12">
            <h5>Endereço</h5>
            <p>{{$predio->endereco->rua}}, Nº {{$predio->endereco->numero}}, {{$predio->endereco->bairro}},
            {{$predio->endereco->complemento}}, {{$predio->endereco->pontoref}}.</p>
        </span>
    </div>
<section class="setion">
    <h4 class="center">
        <span class="teal-text">Imagens</span> do Prédio
    </h4>

    <div style="display: flex; flex-wrap: wrap; justify-content: space-around">

        @foreach ($predio->fotos as $foto)

        <img style="margin: 5px" width="195" height="130" src="{{asset("storage/{$foto->url}")}}"
        class="materialboxed"/>

        @endforeach

    </div>
{{----}}
</section>


</section>

<div class="right-align">
    <a href="{{url()->previous()}}" class="btn-flat waves-effect white-text black">Voltar</a>
</div>

@endsection
