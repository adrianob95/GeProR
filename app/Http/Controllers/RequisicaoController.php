<?php

namespace App\Http\Controllers;

use App\Models\Requisicao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequisicaoController extends Controller
{

    public function create(Request $req)
    {
        $req->merge([
            'user_id' =>  Auth::id(),
        ]);
      
        if(Requisicao::create($req->all()))
        return redirect()->route('cadastrarRequisicao')->with('success', 'Requisição de ' . $req->paciente .' para '.$req->procedimento.' cadastrado com sucesso!');
       
    }

    public function update(Request $req, Requisicao $requisicao )
    {
        if ($requisicao->update($req->all()))
            return redirect()->route('editarRequisicao', $requisicao)->with('success', 'Requisição de ' . $req->paciente.' atualizado com sucesso!');
            else return redirect()->route('editarRequisicao', $requisicao)->with('danger', 'Erro, não foi possivel alterar a requisição!');
    }
    public function delete(Requisicao $requisicao =null)
    {
        if ($requisicao->delete())
            return redirect()->route('buscarRequisicao', $requisicao)->with('success', 'Requisição de ' . $requisicao->paciente . ' excluida com sucesso!');
        else return redirect()->route('buscarRequisicao', $requisicao)->with('danger', 'Erro, não foi possivel excluir a requisição!');
    }
}
