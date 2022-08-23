@extends('layouts.template')
@section('title','editar lançamento')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 mt-5">
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
                <img src="{{asset('assets/img/edit.svg')}}" alt="logo"  width="" height="" class="d-inline-block align-text-center mb-2">
            </div>
            <div class="col-sm-6 mt-5">
                <div class="card">
                    <div class="card-header">Alteração de Lançamento</div>
                    <div class="card-body">
                        <form action="{{route('release.editAction',$data->id)}}" method="POST">
                            @csrf<!--csrf toquem de segurnça padrao do laravel para envio de requisao-->
                            @method('PUT')<!--essa directiva é usada por causa do verdo put declarado na rota-->
            
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="release_type">Tipo de Lançamento</label>
                                    <!--para carregar esse campo preenchido, verifica-se se existe um pet para edicao($data) se existir e for igual ao tipo de pet selecionado é carregado o campo preenchido com valor escolhido-->
                                    <select name="release_type" id="" class="form-select">
                                        <option value="">----Selecione----</option>
                                        @foreach($typeReleases as $typeRelease)
                                            <option value="{{$typeRelease}}" @if( isset($data) && $data -> release_type == $typeRelease) selected @endif>{{$typeRelease}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 mt-3">
                                    <label for="person">Pessoa</label>
                                    <input type="text" name="person" id="person" value="{{$data->person}}" class="form-control"  maxlength="30" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 mt-3">
                                    <label for="amount">Valor</label>
                                    <input type="text" name="amount" id="amount" value="{{$data->amount}}" class="form-control" onkeyup="formatCoin();"  placeholder="R$" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 mt-3">
                                    <label for="due_date">Data</label>
                                    <input type="date" name="due_date" id="due_date" value="{{$data->due_date}}" class="form-control" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 mt-3">
                                    <label for="description">Descrição</label>
                                    <input type="text" name="description" id="description" value="{{$data->release_type}}" class="form-control"  maxlegth="30" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 mt-4">
                                    <button class="btn btn-danger"><a href="{{route('releases.list')}}">CANCELAR </a></button>
                                    <button type="submit" class="btn btn-success">SALVAR</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection






