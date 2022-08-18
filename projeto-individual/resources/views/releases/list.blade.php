@extends('layouts.template')
@section('title','lancamentos')
@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-lg-6 mt-5">
                <div class="input-group">
                    <form action="{{route('search.filter')}}" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" name="release_type" class="form-control">
                            <div class="input-group-append">
                              <button type="submit" class="btn btn-outline-secondary" style="background-color:#6c63ff;color:#fff" >Buscar</button>
                            </div>
                          </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                @if(session('messageRegister'))
                    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        <strong>{{session('messageRegister')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if(session('messageEdit'))
                    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        <strong>{{session('messageEdit')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if(session('messageDelete'))
                    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        <strong>{{session('messageDelete')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table" style="background-color:#6c63ff;" >
                            <tr>
                                <th>Lançamento</th>
                                <th>Pessoa</th>
                                <th>Valor</th>
                                <th>Data do Lançamento</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($releases as $release)
                                @if($release->release_type == 'DESPESA')
                                    <tr class="lineRed">
                                        <td>{{$release->release_type}}</td>
                                        <td>{{$release->person}}</td>
                                        <td>{{number_format($release->amount, 2, ',', '.')}}</td>
                                        <td>{{date('d/m/Y',strtotime($release->due_date))}}</td>
                                        <td>
                                            <a href="{{route('release.edit',[$release->id])}}" class="btn btn-dark btn-sm">Editar</a>
                                            <a href="{{route('release.destroy', [$release->id])}}" class="btn btn-danger btn-sm">excluir</a>
                                        </td>
                                    </tr>
                                @else
                                    <tr class="lineDark">
                                        <td>{{$release->release_type}}</td>
                                        <td>{{$release->person}}</td>
                                        <td>{{$release->amount}}</td>
                                        <td>{{date('d/m/Y',strtotime($release->due_date))}}</td>
                                        <td>
                                            <a href="{{route('release.edit',[$release->id])}}" class="btn btn-dark btn-sm">Editar</a>
                                            <a href="{{route('release.destroy', [$release->id])}}" class="btn btn-danger btn-sm">excluir</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    <div class="justify-content-center pagination">
                        {{-- {{$releases->links('pagination::bootstrap-4')}} --}}
                        @if (isset($dataForm))
                            {!! $releases->appends($dataForm)->links('pagination::bootstrap-4') !!}
                        @else
                            {!! $releases->links('pagination::bootstrap-4') !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection