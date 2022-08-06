@extends('layouts.template')
@section('title','lancamentos')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Postagens do {{$user->name}}</h1>
                @foreach($posts as $post)
                    <div class="mt-3">
                        <label for="form-label">Identificação nº:{{$post->id}}</label><br>

                        <label for="form-label">Status:{{$post->active?'ativo':'inativo'}}</label><br>

                        <label for="form-label">Titulo:{{$post->title}}</label><br>

                        <label for="form-label">POstagem:{{$post->post}}</label><br>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection