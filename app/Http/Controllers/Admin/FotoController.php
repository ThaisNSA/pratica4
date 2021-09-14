<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FotoRequest;
use App\Models\Foto;
use App\Models\Predio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idPredio)
    {
        $predio = Predio::find($idPredio);
        $fotos = Foto::where('predio_id', $idPredio)->get();

        return view('admin.predios.fotos.index', compact('predio', 'fotos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idPredio)
    {
        $predio = Predio::find($idPredio);
        return view('admin.predios.fotos.form', compact('predio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FotoRequest $request, $idPredio)
    {
        if ($request->hasFile('foto')) {

            if ($request->foto->isValid()) {

                $fotoURL = $request->foto->hashName("predios/$idPredio");

                $imagem = Image::make($request->foto)->fit(env('FOTO_ALTURA'), env('FOTO_LARGURA'));

                Storage::disk('public')->put($fotoURL, $imagem->encode());

                $foto = new Foto();
                $foto->url = $fotoURL;
                $foto->predio_id = $idPredio;
                $foto->save();
            }
        }
        $request->session()->flash('sucesso', 'Foto incluída com sucesso!');
        return redirect()->route('admin.predios.fotos.index', $idPredio);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $idPredio, $idFoto)
    {
        $foto = Foto::find($idFoto);

        Storage::disk('public')->delete($foto->url);

        $foto->delete();
        $request->session()->flash('sucesso', 'Foto excluída com sucesso!');
        return redirect()->route('admin.predios.fotos.index', $idPredio);
    }
}
