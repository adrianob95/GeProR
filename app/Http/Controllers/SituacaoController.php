<?php

namespace App\Http\Controllers;

use App\Models\Requisicao;
use App\Models\Situacao;
use Illuminate\Http\Request;

class SituacaoController extends Controller
{
    public function create(Request $req, Requisicao $requisicao)
    {
        $req->merge([
            'requisicao_id' =>  $requisicao->id,
        ]);

        if (Situacao::create($req->all()))
            return redirect()->route('situacao.show', $requisicao)->with('success', 'Situação da requisição de ' . $req->paciente . ' Atualizada com sucesso!');
    }

    public function show(Request $req, Requisicao $requisicao)
    {
        
        return view('historico-show', ['requisicao' => $requisicao]);
        // $req->merge([
        //     'requisicao_id' =>  $requisicao->id,
        // ]);

        // if (Situacao::create($req->all()))
        //     return redirect()->route('buscarRequisicao')->with('success', 'Situação da requisição de ' . $req->paciente . ' Atualizada com sucesso!');
    }



}
