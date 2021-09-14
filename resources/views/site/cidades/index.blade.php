@extends('site.layouts.principal')

@section('conteudo-principal')

<section class="section lighten-$ center">
    <div style="display: flex; flex-wrap; justify-content: space-around">

        @foreach ($cidades as $cidade)
            <a href="{{route('cidades.predios.index', $cidade->id)}}">

                <div class="card-panel black" style="width: 230px; height: 80%">
                    <i class="material-icons medium white-text">room</i>
                    <h4 class="white-text">{{$cidade->nome}}</h4>
                </div>

            </a>
        @endforeach

    </div>
</section>

@endsection

{{--site--}}

@section('slider')
<section class="slider">
    <ul class="slides">
        <li>
            <img src="https://source.unsplash.com/cvsjWwPGjm8/800x600"/>
            <div class="caption center-align">
                <h2 style="text-shadow: 2px 2px 8px black">Organização é tudo!</h2>
            </div>
        </li>
        <li>
            <img src="https://source.unsplash.com/_7RcjLpEgmM/800x600"/>
            <div class="caption left-align">
                <h2 style="text-shadow: 2px 2px 8px black">Qualidade!</h2>
            </div>
        </li>
        <li>
            <img src="https://source.unsplash.com/sszyKJ3Jr0g/800x600"/>
            <div class="caption right-align">
                <h2 style="text-shadow: 2px 2px 8px black">Aqui tem!</h2>
            </div>
        </li>
    </ul>
</section>
@endsection
