@extends('layouts.template')
@section('title','lancamentos')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center  mt-5">
                {{-- <h3>Olá {{ Auth::user()->name }}</h3> --}}
            </div>
            <div class="table-responsive mt-3">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>NOME</th>
                            <th>EMAIL</th>
                            <th>DATA</th>
                            <th>POSTAGENS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inforUsers as $inforUser)
                                <tr>
                                    <td>{{$inforUser->name}}</td>
                                    <td>{{$inforUser->email}}</td>
                                    <td>{{date('d/m/Y',strtotime($inforUser->created_at))}}</td>
                                    <td>
                                        <a href="{{route('posts.show', $inforUser->id)}}" class="btn btn-outline-dark">POstagem - {{$inforUser->posts->count()}}</a>
                                    </td>
                                </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection