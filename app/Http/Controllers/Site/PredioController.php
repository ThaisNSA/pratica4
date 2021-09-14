<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Cidade;
use App\Models\Predio;
use Illuminate\Http\Request;

class PredioController extends Controller
{
    public function index($idCidade)
    {
        $cidade = Cidade::find($idCidade);
        $predios = Predio::with(['fotos'])
            ->where('cidade_id', $idCidade)
            ->paginate(env('PAGINACAO'));
        return view('site.cidades.predios.index', compact('cidade', 'predios'));
    }

    public function show($idCidade, $idPredio)
    {
        $predio = Predio::find($idPredio);

        return view('site.cidades.predios.show', compact('predio'));
    }
}
