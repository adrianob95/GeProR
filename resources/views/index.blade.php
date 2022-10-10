@extends('layouts.template')

@section('title', 'SEProc - Cadastrar Requisição')
@section('pagina', 'Cadastrar Requisição')
@section('pagina2', 'Cadastrar Requisição')
@section('content')
<div style=" text-align:center; align-items: center; margin-top: 3em; margin-bottom: 7.2em; height: 9em;">
    <a href="{{route('cadastrarRequisicao')}}"><button type="button" class="btn btn-primary btn-lg fleft">Cadastrar requisições</button></a>
    <a href="{{route('buscarRequisicao')}}"><button type="button" class="btn btn-secondary btn-lg fleft">Exibir requisições</button></a>
</div>

<style>
    .fleft {
        width: 25%;
        margin: 2%;
        height: 100%;
    }
</style>
@stop