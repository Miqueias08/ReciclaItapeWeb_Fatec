@extends("site.templates.dashboard")
@push("head_scripts")

@endpush
@section("conteudo")
<h1 class="page-title">Listagem das Cooperativas</h1>

<div class="container-fluid listar-pontos">
    <table id="mytable" class="table table-bordred table-striped" style="text-align: center;">
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
        </thead>
        <tbody>
           @forelse($cooperativas as $coope)
            <tr>
                <td>{{$coope->id_cooperativa}}</td>
                <td>{{$coope->razao_social}}</td>
                <td>{{$coope->tipo_documento}}</td>
                <td>{{$coope->cnpj}}</td>
                <td>{{$coope->cpf}}</td>
                <td>{{$coope->endereco}}</td>
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
@endpush