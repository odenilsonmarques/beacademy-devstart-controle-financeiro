@extends('layouts.template')
@section('title','lancamentos')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-6">
                <div class="input-group">
                    <form action="{{route('releases.list')}}" method="GET">
                        <div class="input-group mb-3">
                            <input type="search" name="search" class="form-control">
                            <div class="input-group-append">
                              <button type="submit" class="btn btn-outline-secondary">BUSCAR</button>
                            </div>
                          </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
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
                                            <a href="{{route('release.destroy', [$release->id])}}" class="btn btn-danger btn-sm">excluir</a>
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
                                            <a href="{{route('release.destroy', [$release->id])}}" class="btn btn-danger btn-sm">excluir</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    <div class="justify-content-center pagination">
                        {{$releases->links('pagination::bootstrap-4')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection