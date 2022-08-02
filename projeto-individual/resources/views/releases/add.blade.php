@extends('layouts.template')
@section('title','cadastro')

@section('content')
    <div class="container">
        <h1 class="text-center mt-4">CADASTRO DE LANÇAMENTO</h1>
            <div class="row">
                <div class="col-sm-6 offset-md-3">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>
                                        {{$error}}<br/>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        <form action="{{route('release.createAction')}}" method="POST">
            @csrf<!--csrf toquem de segurnça padrao do laravel para envio de requisao-->
            <div class="row mt-4">
                <div class="col-sm-6 offset-md-3">
                    <label for="release_type">TIPO DE LANÇAMENTO</label>
                    <select name="release_type" id="release_type" class="form-select" autofocus>
                        <option value="">----Selecione----</option>
                        <option value="DESPESA">DESPESA</option>
                        <option value="RECEITA">RECEITA</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 offset-md-3 mt-3">
                    <label for="person">PESSOA</label>
                    <input type="text" name="person" value="{{old('person')}}" class="form-control"  maxlength="30" placeholder="Digite o Nome">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 offset-md-3 mt-3">
                    <label for="amount">VALOR</label>
                    <input type="number" name="amount" id="amount" step="0.01" value="{{old('amount')}}" class="form-control" onKeyPress="return(currencyFormat(this,'','.',event))"  placeholder="R$" >
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 offset-md-3 mt-3">
                    <label for="due_date">DATA</label>
                    <input type="date" name="due_date" value="{{old('due_date')}}" class="form-control" >
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 offset-md-3 mt-3">
                    <label for="description">DESCRIÇÃO</label>
                    <input type="text" name="description" value="{{old('description')}}" class="form-control"  maxlegth="30" placeholder="Digite a descrição">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 offset-md-3 mt-4">
                    <button class="btn btn-danger"><a href="{{route('home')}}">CANCELAR </a></button>
                    <button type="submit" class="btn btn-success">CADASTRAR</button>
                </div>
            </div>
        </form>
    </div>
@endsection






