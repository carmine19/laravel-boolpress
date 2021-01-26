@extends('layouts.dashboard')


@section('content')

    <div id="add_category">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Inserisci un nuovo post</h1>
                    <form method="POST" action="{{route('admin.posts.update', ['post' => $posts->id])}}">
                        @csrf
                        @method('PUT')
                      <div class="form-group mb-5 mt-5">
                        <label for="exampleInputEmail1"></label>
                        <input type="text" name="title" value="{{$posts->title}}" class="form-control">
                      </div>

                        <div class="form-group mb-5 mt-5">
                        <label for="exampleInputEmail1"></label>
                        <input type="text" name="slug" value="{{$posts->slug}}" class="form-control">
                      </div>

                        <div class="form-group mb-5 mt-5">
                        <label for="exampleInputEmail1"></label>
                        <input type="text" name="subtitle" value="{{$posts->subtitle}}" class="form-control">
                      </div>

                        <div class="form-group mb-5 mt-5">
                        <label for="exampleInputEmail1"></label>
                        <input type="text" name="content" value="{{$posts->content}}" class="form-control">
                      </div>

                        <div class="form-group mb-5 mt-5">
                        <label for="exampleInputEmail1"></label>
                        <input type="text" name="img" value="{{$posts->img}}" class="form-control">
                      </div>

                      <button type="submit" class="btn btn-primary">Modifica</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
