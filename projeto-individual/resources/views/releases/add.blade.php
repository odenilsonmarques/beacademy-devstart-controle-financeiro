@extends('layouts.template')
@section('title','cadastro')

@section('content')
    <div class="container">
        <h1 class="text-center mt-4">CADASTRO DE LANÇAMENTO</h1>
        <form action="{{route('release.createAction')}}" method="POST">
            @csrf<!--csrf toquem de segurnça padrao do laravel para envio de requisao-->
            <div class="row mt-4">
                <div class="col-sm-6 offset-md-3">
                    <label for="release_type">Tipo de Lançamento</label>
                    <select name="release_type" id="" class="form-select" required autofocus>
                        <option value="">----Selecione----</option>
                        <option value="DESPESA">DESPESA</option>
                        <option value="RECEITA">RECEITA</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 offset-md-3 mt-3">
                    <label for="release_type">Pessoa</label>
                    <input type="text" name="person" class="form-control"  maxlength="30" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 offset-md-3 mt-3">
                    <label for="release_type">Valor</label>
                    <input type="text" name="amount" class="form-control" onKeyPress="return(currencyFormat(this,'','.',event))"  placeholder="R$" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 offset-md-3 mt-3">
                    <label for="release_type">Data</label>
                    <input type="date" name="due_date" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 offset-md-3 mt-3">
                    <label for="release_type">Descrição</label>
                    <input type="text" name="description" class="form-control"  maxlegth="30" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 offset-md-3 mt-4">
                    <button class="btn btn-danger"><a href="#">CANCELAR </a></button>
                    <button type="submit" class="btn btn-success">CADASTRAR</button>
                </div>
            </div>
        </form>
    </div>
@endsection






