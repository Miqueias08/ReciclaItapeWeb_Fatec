@extends("site.templates.administrador")
@push("head_scripts")

@endpush
@section("conteudo-admin")
<h1 class="page-title">Listagem das Cooperativas</h1>

<div class="container-fluid listar-pontos">
    <table id="mytable" class="table table-hover table-striped 
          table-condensed tasks-table" style="text-align: center;width: auto;overflow-x: auto;">
        <thead>
            <th>id_cooperativa</th>
            <th>razao_social</th>
            <th>tipo_documento</th>
            <th>cnpj</th>
            <th>cpf</th>
            <th>endereco</th>
            <th>latitude</th>
            <th>longitude</th>
            <th>descrição</th>
            <th>status</th>
            <th>editar</th>
            <th>Material Aceito</th>
            <th>excluir</th>
        </thead>
        <tbody>
           @forelse($cooperativas as $coope)
            <tr>
                <td>{{$coope->id_cooperativa}}</td>
                <td>{{$coope->razao_social}}</td>
                <td>{{$coope->tipo_documento}}</td>
                <td>{{$coope->cnpj}}</td>
                <td>{{$coope->cpf}}</td>
                <td>{{ Str::limit($coope->endereco,10,'...')}}</td>
                <td>{{$coope->lat}}</td>
                <td>{{$coope->lng}}</td>
                <td>{{$coope->descrição}}</td>
                <td>
                    @if($coope->status==0)
                        Desativado
                    @else
                        Atividado
                    @endif
                </td>
                <td><a href="/administrador/atualizar/cooperativa/{{$coope->id_cooperativa}}" id="editar"><p data-placement="Atualizar" title="Atualizar"><button class="btn btn-success btn-xs" data-title="Atualizar"><span class="glyphicon glyphicon-pencil">Atualizar</span></button></p></a></td>

                <td><a href="/administrador/cooperativa/material-aceito/{{$coope->id_cooperativa}}" id="material-aceito"><p data-placement="material aceito" title="material aceito"><button class="btn btn-warning btn-xs" data-title="material aceito"><span class="glyphicon glyphicon-pencil"><i class="fas fa-recycle"></i> Material Aceito</span></button></p></a></td>

                <td><a href="/administrador/excluir/cooperativa/{{$coope->id_cooperativa}}" id="excluir"><p data-placement="Excluir" title="Excluir"><button class="btn btn-danger btn-xs" data-title="Excluir"><span class="glyphicon glyphicon-pencil">Excluir</span></button></p></a></td>

            </tr>

           @empty
           @endforelse
        </tbody>
    </table>

</div>
@endsection
@push('footer_scripts')
<link rel="stylesheet" href="/css/jquery-confirm.min.css">
<script src="/js/jquery-confirm.min.js"></script>
@if(session('COOPERATIVA_DELETADA'))
        <script type="text/javascript">
         $.confirm({
                title: 'Sucesso',
                content: 'A Cooperativa foi Deletada',
                type: 'green',
                typeAnimated: true,
                buttons: {
                    voltar: function () {
        
                }
            }
          });
        </script>
    @endif
    @if(session('COOPERATIVA_DELETADA_FALHA'))
        <script type="text/javascript">
            $.confirm({
                title: 'Falha',
                content: 'Ocorreu alguma falha!',
                type: 'red',
                typeAnimated: true,
                buttons: {
                    fechar: function () {
                }
            }
          });
        </script>
    @endif     
@endpush