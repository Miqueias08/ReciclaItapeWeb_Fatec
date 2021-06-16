@extends("site.templates.administrador")
@push("head_scripts")

@endpush
@section("conteudo-admin")
<h1 class="page-title">Listagem dos Tutorias</h1>

<div class="container-fluid listar-pontos" style="display: grid;">
    <table id="mytable" class="table table-bordred table-striped" style="text-align: center;width: auto;overflow-x: auto;">
        <thead>
            <th>id_tutorial</th>
            <th>titulo</th>
            <th>subtitulo</th>
            <th>data e hora</th>
            <th>autor</th>
            <th>atualizar</th>
            <th>excluir</th>
        </thead>
        <tbody>
           @forelse($tutoriais as $tuto)
            <tr>
                <td>{{$tuto->id_tutorial}}</td>
                <td>{{$tuto->titulo}}</td>
                <td>{{$tuto->subtitulo}}</td>
                <td>{{$tuto->dataHora}}</td>
                <td>{{$tuto->autor}}</td>
                <td><a href="/administrador/atualizar/tutorial/{{$tuto->id_tutorial}}" id="editar"><p data-placement="Atualizar" title="Atualizar"><button class="btn btn-success btn-xs" data-title="Atualizar"><span class="glyphicon glyphicon-pencil">Atualizar</span></button></p></a></td>


                <td><a href="/administrador/excluir/cooperativa/{{$tuto->id_tutorial}}" id="excluir"><p data-placement="Excluir" title="Excluir"><button class="btn btn-danger btn-xs" data-title="Excluir"><span class="glyphicon glyphicon-pencil">Excluir</span></button></p></a></td>
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