@extends('admin.layouts.principal')

@section('conteudo-principal')

    <section class="section">
        <form action="{{$action}}" method="POST">
        @csrf

            @isset($predio)
                @method('PUT')
            @endisset

        <div class="row">
            <div class="input-field col s12">
                <input type="text" name="titulo" id="titulo" value="{{old('titulo', $predio->titulo ?? '')}}"/>
                <label for="titulo">Título</label>
                @error('titulo')
                <span class="red-text text-accent-3"><small>{{$message}}</small></span>
            @enderror
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <select name="cidade_id" id="cidade_id">
                    <option value="" disabled selected></option>

                    @foreach ($cidades as $cidade)
                        <option value="{{$cidade->id}}"
                            {{old('cidade_id', $predio->cidade->id ?? '') == $cidade->id ? 'selected' : ''}}
                            >{{$cidade->nome}}</option>
                    @endforeach
                </select>
                <label for="cidade_id">Cidade</label>
                @error('cidade_id')
                <span class="red-text text-accent-3"><small>{{$message}}</small></span>
            @enderror
        </div>
        </div>



        <div class="row">
            <div class="input-field col s4">
                <input type="number" name="andar" id="andar" value="{{old('andar', $predio->andar ?? '')}}"/>
                <label for="andar">Quantidade de andares</label>
                @error('andar')
                <span class="red-text text-accent-3"><small>{{$message}}</small></span>
            @enderror
            </div>
        <div class="row">
            <div class="input-field col s4">
                <input type="number" name="sala" id="sala" value="{{old('sala', $predio->sala ?? '')}}"/>
                <label for="sala">Quantidade de salas</label>
                @error('sala')
                <span class="red-text text-accent-3"><small>{{$message}}</small></span>
            @enderror
            </div>
        <div class="row">
            <div class="input-field col s4">
                <input type="number" name="banheiro" id="banheiro" value="{{old('banheiro', $predio->banheiro ?? '')}}"/>
                <label for="banheiro">Quantidade de Banheiros</label>
                @error('banheiro')
                <span class="red-text text-accent-3"><small>{{$message}}</small></span>
            @enderror
            </div>
        <div class="row">
            <div class="input-field col s4">
                <input type="number" name="auditorio" id="auditorio" value="{{old('auditorio', $predio->auditorio ?? '')}}"/>
                <label for="auditorio">Quantidade de auditórios</label>
                @error('auditorio')
                <span class="red-text text-accent-3"><small>{{$message}}</small></span>
            @enderror
            </div>
        <div class="row">
            <div class="input-field col s4">
                <input type="number" name="estvag" id="estvag" value="{{old('estvag', $predio->estvag ?? '')}}"/>
                <label for="estvag">Quantidade de vagas no Estacionamento</label>
                @error('estvag')
                <span class="red-text text-accent-3"><small>{{$message}}</small></span>
            @enderror
            </div>
        <div class="row">
            <div class="input-field col s4">
                <input type="number" name="preco" id="preco" value="{{old('preco', $predio->preco ?? '')}}"/>
                <label for="preco">Preço</label>
                @error('preco')
                <span class="red-text text-accent-3"><small>{{$message}}</small></span>
            @enderror
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <textarea name="descricao" id="descricao" class="materialize-textarea">{{old('descricao', $predio->descricao ?? '')}}</textarea>
                <label for="descricao">Este prédio foi alugado ou comprado?</label>
                @error('descricao')
                <span class="red-text text-accent-3"><small>{{$message}}</small></span>
            @enderror
            </div>
        </div>


        <div class="row">
            <div class="input-field col s4">
                <input type="text" name="rua" id="rua" value="{{old('rua', $predio->endereco->rua ?? '')}}"/>
                <label for="rua">Rua</label>
                @error('rua')
                <span class="red-text text-accent-3"><small>{{$message}}</small></span>
            @enderror
            </div>
        <div class="row">
            <div class="input-field col s2">
                <input type="text" name="numero" id="numero" value="{{old('numero', $predio->endereco->numero ?? '')}}"/>
                <label for="numero">Número</label>
                @error('numero')
                <span class="red-text text-accent-3"><small>{{$message}}</small></span>
            @enderror
            </div>
        <div class="row">
            <div class="input-field col s4">
                <input type="text" name="bairro" id="bairro" value="{{old('bairro', $predio->endereco->bairro ?? '')}}"/>
                <label for="bairro">Bairro</label>
                @error('bairro')
                <span class="red-text text-accent-3"><small>{{$message}}</small></span>
            @enderror
            </div>
        <div class="row">
            <div class="input-field col s2">
                <input type="text" name="complemento" id="complemento" value="{{old('complemento', $predio->endereco->complemento ?? '')}}"/>
                <label for="complemento">Complemento</label>
                @error('complemento')
                <span class="red-text text-accent-3"><small>{{$message}}</small></span>
            @enderror
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <textarea name="pontoref" id="pontoref" class="materialize-textarea">{{old('pontoref', $predio->endereco->pontoref ?? '')}}</textarea>
                <label for="pontoref">Ponto de referencia</label>
                @error('pontoref')
                <span class="red-text text-accent-3"><small>{{$message}}</small></span>
            @enderror
            </div>
        </div>

        <div class="right-align">
            <a class="btn waves-effect transparent black-text" href="{{route('admin.predios.index')}}">Cancelar</a>
            <button class="btn waves-effect waves-light black" type="submit">
                Salvar
            </button>
        </div>
        </form>
    </section>

@endsection
