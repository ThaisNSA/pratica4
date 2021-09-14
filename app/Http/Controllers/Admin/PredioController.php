<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PredioRequest;
use Illuminate\Http\Request;
use App\Models\Cidade;
use App\Models\Predio;
use Illuminate\Support\Facades\DB;

class PredioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $predios = Predio::with(['cidade', 'endereco'])
            ->orderBy('titulo', 'asc');
        //$predios = Predio::join('cidade', 'cadades.id', '=', 'predios.cidade_id')
        //  ->join('enderecos', 'enderecos.predio_id', '=', 'predios.id')
        // ->orderBy('cidades.nome', 'asc')
        //  ->orderBy('enderecos.bairro', 'asc')
        // ->orderBy('titulo', 'asc')
        // ->get();

        $cidade_id = $request->cidade_id;
        $titulo = $request->titulo;

        if ($request->cidade_id) {
            $predios->where('cidade_id', $cidade_id);
        }
        if ($request->titulo) {
            $predios->where('titulo', 'like', "%$titulo%");
        }

        $predios = $predios->paginate(env('PAGINACAO'))->withQueryString();

        $cidades = Cidade::orderBy('nome')->get();

        return view('admin.predios.index', compact('predios', 'cidades', 'titulo', 'cidade_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cidades = Cidade::all();

        $action = route('admin.predios.store');
        return view('admin.predios.form', compact('action', 'cidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PredioRequest $request)
    {
        DB::beginTransaction();
        $predio = Predio::create($request->all());
        $predio->endereco()->create($request->all());
        DB::Commit();

        $request->session()->flash('sucesso', 'Dados incluídos com sucesso!');
        return redirect()->route('admin.predios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $predio = Predio::with(['cidade', 'endereco'])->find($id);

        return view('admin.predios.show', compact('predio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $predio = Predio::with(['cidade', 'endereco'])->find($id);
        $cidades = Cidade::all();

        $action = route('admin.predios.update', $predio->id);
        return view('admin.predios.form', compact('predio', 'action', 'cidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $predio = Predio::find($id);

        DB::beginTransaction();
        $predio->update($request->all());
        $predio->endereco->update($request->all());
        DB::Commit();

        $request->session()->flash('sucesso', 'Dados editados com sucesso!');
        return redirect()->route('admin.predios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        DB::beginTransaction();
        $predio = Predio::find($id);
        $predio->endereco->delete();
        $predio->delete();
        DB::Commit();

        $request->session()->flash('sucesso', 'Dados excluídos com sucesso!');
        return redirect()->route('admin.predios.index');
    }
}
