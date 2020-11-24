@extends('site.templates.dashboard')
@section("dashboard")
@push('css')
<link rel="stylesheet" type="text/css" href="/css/dashboard.css">
@endpush
<div class="container-fluid" id="dados" style="height: 100%;">
    <form id="dados" method="POST" action="/novo/ponto">
       @if(session()->has('SUCESSO'))
            <div class="alert alert-success">
                {{ session()->get('SUCESSO') }}
            </div>
        @endif
        @if(session()->has('ERRO'))
            <div class="alert alert-danger">
                {{ session()->get('ERRO') }}
            </div>
        @endif
        @csrf
            <label class="nomeHide">
                Nome:<br>
            </label>
            <input type="text" name="name" class="form-control nomeHide" value="{{old('name')}}" required  autocomplete="off">

            <label class="usuarioHide">
                Endereço:<br>
            </label>
            <input type="text" name="address" class="form-control usuarioHide" required  value="{{old('address')}}" autocomplete="off">

            <label class="senhaHide">
                Latitude:<br>
            </label>
            <input type="text" name="lat" class="form-control senhaHide" value="{{old('lat')}}" required  autocomplete="off">

            <label class="senhaHide">
                Longitude:<br>
            </label>
            <input type="text" name="lng" class="form-control senhaHide" value="{{old('lng')}}" required  autocomplete="off">

            <input type="hidden" name="type" class="form-control senhaHide" required  autocomplete="off" value="0">

            <div>
                <input type="checkbox" id="papel" name="papel" checked>
                <label for="papel">Papel</label>
            </div>
             <div>
                <input type="checkbox" id="plastico" name="plastico" checked>
                <label for="plastico">Plastico</label>
            </div>
             <div>
                <input type="checkbox" id="vidro" name="vidro" checked>
                <label for="vidro">Vidro</label>
            </div>

            <button type="submit" class="btn btnUsuario btn-success" style="margin: 10px;">Cadastro</button>
        </form>
    </div>
</div>
@endsection

