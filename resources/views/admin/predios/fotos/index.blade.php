@extends('admin.layouts.principal')

@section('conteudo-principal')
    <h4>{{$predio->titulo}}</h4>

<section class="section">

    <div class="flex-container">

    @forelse ($fotos as $foto)

        <div class="flex-item">
            <span class="btn-fechar">

                <form action="{{route('admin.predios.fotos.destroy', [$predio->id, $foto->id])}}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')

                    <button style="border:0;background:transparent" type="submit" title="Excluir">
                        <span style="cursor: pointer">
                            <i class="material-icons">delete_forever</i>
                        </span>

                    </button>
                </form>
        </span>
        <img src="{{asset("storage/$foto->url")}}" width="600" height="400"/>

        </div>
    @empty
        <div>Não há fotos desse prédio!</div>
    @endforelse
</div>

    <div class="fixed-action-btn">
        <a href="{{route('admin.predios.fotos.create', $predio->id)}}" class="btn-floating btn-large waves-effect waves-light black">
            <i class="large material-icons">add</i>
        </a>
    </div>

</section>

@endsection
