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
            <input type="hidden" name="id" value="@if(isset($ponto)){{$ponto[0]->id}}@endif" required  autocomplete="off">
            <label class="nomeHide">
                Nome:<br>
            </label>
            <input type="text" name="name" class="form-control nomeHide" value="@if(isset($ponto)){{$ponto[0]->name}}@else{{old('name')}}@endif" required  autocomplete="off">

            <label class="usuarioHide">
                Endereço:<br>
            </label>
            <input type="text" name="address" class="form-control usuarioHide" required  value="@if(isset($ponto)){{$ponto[0]->address}}@else{{old('address')}}@endif" autocomplete="off">

            <label>
                Latitude:<br>
            </label>
            <input type="text" name="lat" class="form-control senhaHide" value="@if(isset($ponto)){{$ponto[0]->lat}}@else{{old('lat')}}@endif" required  autocomplete="off">

            <label>
                Longitude:<br>
            </label>
            <input type="text" name="lng" class="form-control senhaHide" value="@if(isset($ponto)){{$ponto[0]->lng}}@else{{old('lng')}}@endif" required  autocomplete="off">

            <input type="hidden" name="type" required  autocomplete="off" value="0">

            <div>
                <input type="checkbox" id="papel" name="papel" @if(isset($ponto))@if($ponto[0]->papel==1)checked @else @endif @else checked @endif>
                <label for="papel">Papel</label>
            </div>
             <div>
                <input type="checkbox" id="plastico" name="plastico" @if(isset($ponto))@if($ponto[0]->plastico==1)checked @else @endif @else checked @endif>
                <label for="plastico">Plastico</label>
            </div>
             <div>
                <input type="checkbox" id="vidro" name="vidro" @if(isset($ponto))@if($ponto[0]->vidro==1)checked @else @endif @else checked @endif>
                <label for="vidro">Vidro</label>
            </div>
            @if(isset($ponto))
                <button type="submit" class="btn btnUsuario btn-success" style="margin: 10px;">Atualizar</button>
            @else
                <button type="submit" class="btn btnUsuario btn-success" style="margin: 10px;">Cadastro</button>
            @endif
        </form>
    </div>
</div>
@endsection

