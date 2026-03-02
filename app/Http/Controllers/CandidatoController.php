<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use Illuminate\Http\Request;
use App\Imports\CandidatosImport;
use Maatwebsite\Excel\Facades\Excel;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //

        $resultado = 'inicio';
        $success = null;
        if ($request->has('codigo')) {
            $resultado = Candidato::where('codigo', $request->codigo)->first();

        }
        if($resultado && $resultado!='inicio'){
            // dd('oo');
            $success = 'Candidato localizado. Boa sorte!';
            return view('resultados', compact(['resultado','success']));
        }
        if($resultado==null){
            return view('resultados', compact(['resultado','success']))->withErrors(['error'=>'O candidato informado não foi localizado. Verifique o seu código, por favor.']);
        }
        if($resultado=='inicio'){
             $resultado = null;
        return view('resultados', compact(['resultado','success']));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
     public function importar(Request $request)
    {
        // 1. Valida se o arquivo é um Excel
        $request->validate([
            'ficheiro' => 'required|mimes:xlsx,xls,csv'
        ]);

        // 2. Opcional: Limpar a tabela antes de importar novos dados
       Candidato::truncate(); 

        try {
            // 3. Executa a importação
            Excel::import(new CandidatosImport, $request->file('ficheiro'));
            // dd('ola');
            return back()->with('success', 'Dados importados com sucesso!');
        } catch (\Exception $e) {
            return back()->withErrors('error', 'Erro ao importar: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidato $candidato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidato $candidato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Candidato $candidato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidato $candidato)
    {
        //
    }
}
