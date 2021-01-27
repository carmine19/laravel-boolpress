@extends('layouts.dashboard')


@section('content')

    <div id="add_category">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Inserisci un nuovo post</h1>
                    <form method="POST" action="{{route('admin.posts.update', ['post' => $post])}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-5 mt-5">
                            <label for="exampleInputEmail1"></label>
                            <input type="text" name="title" value="{{$post->title}}" class="form-control">
                        </div>

                        <div class="form-group mb-5 mt-5">
                            <label for="exampleInputEmail1"></label>
                            <input type="text" name="slug" value="{{$post->slug}}" class="form-control">
                        </div>

                        <div class="form-group mb-5 mt-5">
                            <label for="exampleInputEmail1"></label>
                            <input type="text" name="subtitle" value="{{$post->subtitle}}" class="form-control">
                        </div>

                        <div class="form-group mb-5 mt-5">
                            <label for="exampleInputEmail1"></label>
                            <input type="text" name="content" value="{{$post->content}}" class="form-control">
                        </div>

                        <div class="form-group mb-5 mt-5">
                            <label for="exampleInputEmail1"></label>
                            <input type="text" name="img" value="{{$post->img}}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Categoria</label>
                            <select class="form-control" name="category_id">
                                <option value="">-- seleziona categoria --</option>
                                @foreach ($categories as $category)
                                    <option
                                        value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected=selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Modifica</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
