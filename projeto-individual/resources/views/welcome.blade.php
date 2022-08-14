@extends('layouts.template')
@section('title','Pagina inicial')

@section('content')
    <div class="container hero">
      <div class="row mt-5">
        <div class="col-sm-6 text-center textHero">
          <h1 class="text-center mt-5">Controle de Receitas e Despesas Pessoais</h1>
        </div>
        <div class="col-sm-6 text-right mt-2">
          <img src="{{('assets/img/financial.svg')}}" alt="" width="100%" height="270">
        </div>
      </div>
    </div>
@endsection


