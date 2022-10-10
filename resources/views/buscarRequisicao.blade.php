@extends('layouts.template')

@section('title', 'SEProc - Exibir Requisição')
@section('pagina', 'Exibir Requisição')
@section('pagina2', 'Exibir Requisição')

@section('content')
<div class="container mt-3">
    <h2>Tabela de Requisições Cadastradas</h2>
    <p>
        Digite algo no campo de entrada abaixo para pesquisar na tabela por paciente, procedimento, endereço e etc.:
    </p>
    <input class="form-control" id="myInput" type="text" placeholder="Procurar..">
    <br>
    <table class="table table-bordered table-hover" style="text-align: center;">
        <thead>
            <tr>
                <th>Paciente</th>
                <th>Procedimento</th>
                <th>Documento</th>

                <th>Contato</th>
                <th>Observação</th>
                <th>Recebemos</th>
                <th>Situacao</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody id="myTable">
            @foreach($requisicoes as $item)
            <tr>
                <td> <a href="{{route('situacao.show', $item->id)}}">{{$item->paciente}} </a></td>
                <td> <a href="{{route('situacao.show', $item->id)}}">{{$item->procedimento}} </a></td>
                <td> <a href="{{route('situacao.show', $item->id)}}">{{$item->documento}} </a></td>
                <td> <a href="{{route('situacao.show', $item->id)}}">{{$item->contato}} </a></td>
                <td> <a href="{{route('situacao.show', $item->id)}}">{{ mb_strimwidth($item->obs, 0, 15, "...") }}</a></td>
                <td> <a href="{{route('situacao.show', $item->id)}}">{{ $item->datarecebido}}</a></td>
                <td> <a href="{{route('situacao.show', $item->id)}}">

                        @if($item->latestSituacao)
                        {{ $item->latestSituacao->situacao}}
                        @else
                        Registrado
                        @endif
                    </a></td>
                <td> <a title="Detalhes da Requisição" style="display: inline-block;" href="{{route('situacao.show', $item->id)}}"><i class="bi bi-eye" style="font-size: 1.4rem; color: blue; padding: 0.3rem;"></i></a>
                    <a title="Editar requisição" style="display: inline-block;" href="{{route('editarRequisicao', $item->id)}}"><i class="bi-pencil" style="font-size: 1.4rem; color: green;"></i></a>



                    <button title="Exluir Requisição" data-toggle="modal" data-target="#exampleModal" data-whatever="{{ $item->id}}"><i class="bi-trash" style="font-size: 1.4rem; color: red;"></i></button>
                    <a style="display: inline-block;" title="Alterar a situação" href="{{route('situacao.index', $item->id)}}"><i class="bi bi-list-ol" style="font-size: 1.4rem; color: black;"></i></a>



                </td>
            </tr>

            @endforeach



        </tbody>
    </table>

</div>
<style>
    table button {
        background-color: Transparent;
        background-repeat: no-repeat;
        border: none;
        cursor: pointer;
        overflow: hidden;
    }
</style>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Atenção</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <label for="recipient-name" class="col-form-label"><b>Tem certeza que deseja deletar esta requisição? </b><br>Esta ação não poderá ser desfeita!</label>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form action="{{route('requisicao.delete',  $item->id)}}" id="formmodal" method="post" style="display: inline-block;">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-primary">Excluir Requisicao</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

    $('#exampleModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)

        var ac = "{{route('requisicao.delete')}}"
        $('#formmodal').attr('action', ac + '/' + recipient)
    })
</script>

@stop