@extends('layouts.template')
@section('title','editar')

@section('content')
    <div class="container">
        <h1 class="text-center mt-4">EDIÇÃO DE LANÇAMENTO</h1>
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
        <form action="{{route('release.editAction',$data->id)}}" method="POST">
            @csrf<!--csrf toquem de segurnça padrao do laravel para envio de requisao-->
            {{-- {{csrf_token()}} --}}
            @method('PUT')<!--essa directiva é usada por causa do verdo put declarado na rota-->
            <div class="row mt-4">
                <div class="col-sm-6 offset-md-3">
                    <label for="release_type">Tipo de Lançamento</label>
                    <!--para carregar esse campo preenchido, verifica-se se existe um pet para edicao($data) se existir e for igual ao tipo de pet selecionado é carregado o campo preenchido com valor escolhido-->
                    <select name="release_type" id="" class="form-select"  autofocus>
                        <option value="">----Selecione----</option>
                        @foreach($typeReleases as $typeRelease)
                            <option value="{{$typeRelease}}" @if( isset($data) && $data -> release_type == $typeRelease) selected @endif>{{$typeRelease}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 offset-md-3 mt-3">
                    <label for="release_type">Pessoa</label>
                    <input type="text" name="person" value="{{$data->person}}" class="form-control"  maxlength="30" >
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 offset-md-3 mt-3">
                    <label for="release_type">Valor</label>
                    <input type="text" name="amount" value="{{$data->amount}}" class="form-control" onKeyPress="return(currencyFormat(this,'','.',event))"  placeholder="R$" >
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 offset-md-3 mt-3">
                    <label for="release_type">Data</label>
                    <input type="date" name="due_date" value="{{$data->due_date}}" class="form-control" >
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 offset-md-3 mt-3">
                    <label for="release_type">Descrição</label>
                    <input type="text" name="description" value="{{$data->release_type}}" class="form-control"  maxlegth="30" >
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 offset-md-3 mt-4">
                    <button class="btn btn-danger"><a href="#">CANCELAR </a></button>
                    <button type="submit" class="btn btn-success">SALVAR</button>
                </div>
            </div>
        </form>
    </div>
@endsection






