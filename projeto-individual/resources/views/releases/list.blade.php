@extends('layouts.template')
@section('title','lancamentos')
@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table caption-top">
                        <caption>LISTA DE LANCAMENTO</caption>
                        <thead class="table-dark">
                            <tr>
                                <th>LANÇAMENTO</th>
                                <th>PESSOA</th>
                                <th>VALOR</th>
                                <th>DATA DO LANÇAMENTO</th>
                                <th>AÇÕES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($releases as $release)
                                @if($release->release_type === 'DESPESA')
                                    <tr class="despesas">
                                        <td>{{$release->release_type}}</td>
                                        <td>{{$release->person}}</td>
                                        <td>{{$release->amount}}</td>
                                        <td>{{date('d/m/Y',strtotime($release->due_date))}}</td>
                                        <td>
                                            <a href="" class="btn btn-dark btn-sm">Editar</a>
                                            <a href="" class="btn btn-danger btn-sm">excluir</a>
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td>{{$release->release_type}}</td>
                                        <td>{{$release->person}}</td>
                                        <td>{{$release->amount}}</td>
                                        <td>{{date('d/m/Y',strtotime($release->due_date))}}</td>
                                        <td>
                                            <a href="" class="btn btn-dark btn-sm">Editar</a>
                                            <a href="" class="btn btn-danger btn-sm">excluir</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection