@extends('layouts.dashboard')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="card-post">
                    <div class="box-img">
                        <img src="{{$posts->img}}" alt="">
                    </div>
                    <div class="box-text">
                        <div class="box-title">
                            <h1>{{$posts->title}}</h1>
                        </div>
                        <div class="box-content">
                            <p>{{$posts->content}}</p>
                        </div>
                        <div class="box-category">
                            <p> Categoria: {{$posts->category ? $posts->category->name : '-'}}</p>
                        </div>
                    </div>
                </div>
                <div class="action">
                    <a href="{{route('admin.posts.edit', ['post' => $posts->id])}}"
                       class="btn btn-warning">
                        Modifica
                    </a>
                    <form method="POST" class="d-inline-block"
                          action="{{route('admin.posts.destroy', ['post' =>$posts->id])}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            Cancella
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
