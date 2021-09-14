@extends('admin.layouts.principal')

@section('conteudo-principal')
    <section class="section">
        <form action="{{route('admin.predios.fotos.store', $predio->id)}}" enctype="multipart/form-data" method="POST">
        @csrf

        <div class="file-fiel input-field">
            <div class="btn">
                <span>Selecionar Foto</span>
                <input type="file" name="foto"/>
            </div>

            <div class="file-path-wrapper">
                <input type="text" class="file-path validate"/>
            </div>
            @error('foto')
                <span class="red-text text-accent-3"><small>{{$message}}</small></span>
            @enderror
        </div>

        <div class="right-align">
            <a href="{{url()->previous()}}" class="btn waves-effect transparent black-text">Cancelar</a>
            <button class="btn waves-effect waves-light black" type="submit">Salvar</button>
        </div>

        </form>
    </section>
@endsection
