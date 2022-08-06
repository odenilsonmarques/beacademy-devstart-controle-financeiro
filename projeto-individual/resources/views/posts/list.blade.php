@extends('layouts.template')
@section('title','lancamentos')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Listagem de postagens</h3>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Usuário</th>
                                <th>Titulo</th>
                                <th>POST</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                    <tr>
                                        <td>{{$post->id}}</td>
                                        <td>{{$post->user->name}}</td>
                                        <td>{{$post->title}}</td>
                                        <td>{{$post->post}}</td>
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection