@extends('layouts.template')
@section('title','lancamentos')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mt-5">
                <div class="input-group">
                    <form action="{{route('search.filter')}}" method="POST" class="form-horizontal">
                        @csrf
                        <div class="input-group mb-3">
                            <select name="release_type" id="release_type" class="form-select  inputSearch">
                                <option value="">--- Selecione ---</option>
                                <option value="DESPESA">DESPESA</option>
                                <option value="RECEITA">RECEITA</option>
                            </select>
                            <input type="text" name="person" class="form-control inputSearch" placeholder="Pessoa">
                            <input type="date" name="due_date" class="form-control inputSearch">
                            <div class="input-group-append ml-3">
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
                                <tr>
                                    <td>{{$release->release_type}}</td>
                                    <td>{{$release->person}}</td>
                                    <td>R$ {{number_format($release->amount, 2, ',', '.')}}</td>
                                    <td>{{date('d/m/Y',strtotime($release->due_date))}}</td>
                                    <td>
                                        <a href="{{route('release.edit',[$release->id])}}" class="btn btn-dark btn-sm">Editar</a>
                                        <a href="{{route('release.destroy', [$release->id])}}" class="btn btn-danger btn-sm">excluir</a>
                                    </td>
                                </tr>
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