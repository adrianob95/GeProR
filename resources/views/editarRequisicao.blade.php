@extends('layouts.template')

@section('title', 'SeGePr - Editar Requisição')
@section('pagina', 'Editar Requisição')
@section('pagina2', 'Editar Requisição')
@section('content')
<script>
    $('.alert').alert();
</script>

<form action="{{route('editandoRequisicao', $requisicao)}}" method="post">
    @method('PUT')
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="paciente" class="required">Paciente</label>
            <input type="paciente" value="{{$requisicao->paciente}}" class="form-control" required name="paciente" id="paciente" placeholder="Nome do Usuario">
        </div>
        <div class="form-group col-md-6">
            <label for="sus">Cartão SUS</label>
            <input type="text" name="sus" value="{{$requisicao->sus}}" class="form-control" id="sus" placeholder="Numero do cartão do SUS">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="endereco" class="required">Endereço</label>
            <input type="text" required name="endereco" value="{{$requisicao->endereco}}" class="form-control" name="endereco" id="endereco" placeholder="Rua dos Bobos, nº 0">
        </div>
        <div class="form-group col-md-2">
            <label for="bairro" class="required">Bairro</label>
            <input type="text" class="form-control" required name="bairro" id="bairro" value="{{$requisicao->bairro}}" placeholder="Seu bairro">
        </div>
        <div class="form-group col-md-2">
            <label for="cidade" class="required">Cidade</label>
            <input type="text" class="form-control" required name="cidade" id="cidade" placeholder="Cidade" value="{{$requisicao->cidade}}" value="Santo Amaro">
        </div>
        <div class="form-group col-md-2">
            <label for="cep" class="required">CEP</label>
            <input type="text" placeholder="44200000" name="cep" value="{{$requisicao->cep}}" required class="form-control" value="44200000" id="cep">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="datanascimento">Data de Nascimento</label>
            <input type="date" value="{{$requisicao->datanascimento}}" class="form-control" name="datanascimento" id="datanascimento">
        </div>
        <div class="form-group col-md-4">
            <label for="documento">N° Documento</label>
            <input type="text" class="form-control" value="{{$requisicao->documento}}" id="documento" name="documento" placeholder="Numero do documento">
        </div>
        <div class="form-group col-md-6">
            <label for="indicacao">Indicação</label>
            <input type="text" class="form-control" id="indicacao" value="{{$requisicao->indicacao}}" name="indicacao" placeholder="Indicação/Motivo">
        </div>
        <div class="form-group col-md-6">
            <label for="procedimento" class="required">Procedimento</label>
            <input type="text" list="procedimentos" id="procedimento" value="{{$requisicao->procedimento}}" name="procedimento" required class="form-control">
            <datalist id="procedimentos">
                @foreach($procedimentos as $item)

                <option value="{{$item->procedimento}}">
                    @endforeach


            </datalist>
        </div>
        <div class="form-group col-md-6">
            <label for=" paciente" class="">Se outro procedimento, qual?</label>
            <input type="paciente" disabled class="form-control" required name="outroprocedimento" id="outroprocedimento" placeholder="">
        </div>


        <div class="form-group col-md-6">
            <label for="contato" class="required">Contato</label>
            <input type="tel" required name="contato" value="{{$requisicao->contato}}" class="form-control" pattern="[0-9]{11}$" id="contato" placeholder="Celular">
        </div>
        <div class="form-group col-md-6">
            <label for="contato2">Contato 2</label>
            <input type="tel" name="contato2" class="form-control" value="{{$requisicao->contato2}}" pattern="[0-9]{11}$" id="contato2" placeholder="">

        </div>

    </div>



    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="obs">Observação</label>
            <textarea rows="5" class="form-control" name="obs" id="obs">{{$requisicao->obs}}</textarea>
        </div>
    </div>


    <button type="submit" class="btn btn-primary">Salvar alteração</button>
</form>

@stop