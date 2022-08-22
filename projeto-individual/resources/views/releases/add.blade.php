@extends('layouts.template')
@section('title','cadastro')

@section('content')
    <div class="container ">
        {{-- <h1 class="text-center mt-4">Cadastro de Lançamento</h1> --}}
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
                <img src="{{asset('assets/img/boy.svg')}}" alt="logo"  width="" height="" class="d-inline-block align-text-center mb-2">
            </div>

            <div class="col-sm-6 mt-5">
                <div class="card">
                    <div class="card-header">
                        Cadastro de Lançamento
                    </div>
                    <div class="card-body">
                        <form action="{{route('release.createAction')}}" method="POST">
                            @csrf<!--csrf toquem de segurnça padrao do laravel para envio de requisao-->
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="release_type">Tipo de Lançamento</label>
                                    <select name="release_type" id="release_type" class="form-select" autofocus>
                                        <option value="">----Selecione----</option>
                                        <option value="DESPESA">DESPESA</option>
                                        <option value="RECEITA">RECEITA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 mt-3">
                                    <label for="person">Pessoa</label>
                                    <input type="text" name="person" value="{{old('person')}}" class="form-control"  maxlength="30" placeholder="Digite o Nome">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 mt-3">
                                    <label for="amount">Valor</label>
                                    <input type="text" name="amount" id="amount" value="{{old('amount')}}" class="form-control" onkeyup="formatCoin();" placeholder="R$" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 mt-3">
                                    <label for="due_date">Data</label>
                                    <input type="date" name="due_date" value="{{old('due_date')}}" class="form-control" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 mt-3">
                                    <label for="description">Descrição</label>
                                    <input type="text" name="description" value="{{old('description')}}" class="form-control"  maxlegth="30" placeholder="Digite a descrição">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 mt-4">
                                    <button class="btn btn-danger"><a href="{{route('home')}}">CANCELAR </a></button>
                                    <button type="submit" class="btn btn-success">CADASTRAR</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection






