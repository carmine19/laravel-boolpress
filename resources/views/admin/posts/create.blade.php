@extends('layouts.dashboard')


@section('content')

    <div id="add_category">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Inserisci un nuovo post</h1>
                    <form method="POST" action="{{route('admin.posts.store')}}">
                        @csrf
                        @method('POST')
                        <div class="form-group mb-5 mt-5">
                            <label for="exampleInputEmail1">Titolo</label>
                            <input type="text" name="title" class="form-control">
                        </div>

                        <div class="form-group mb-5 mt-5">
                            <label for="exampleInputEmail1">Slug</label>
                            <input type="text" name="slug" class="form-control">
                        </div>

                        <div class="form-group mb-5 mt-5">
                            <label for="exampleInputEmail1">Sottotitolo</label>
                            <input type="text" name="subtitle" class="form-control">
                        </div>

                        <div class="form-group mb-5 mt-5">
                            <label for="exampleInputEmail1">Contenuto</label>
                            <input type="text" name="content" class="form-control">
                        </div>

                        <div class="form-group mb-5 mt-5">
                            <label for="exampleInputEmail1">Link immagine</label>
                            <input type="text" name="img" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Categoria</label>
                            <select class="form-control" name="category_id">
                                <option value="">-- seleziona categoria --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <p>Seleziona i tag:</p>
                            @foreach ($tags as $tag)
                                <div class="form-check">
                                    <!-- con le chekbox ci dobbiamo ricordare di passare il name come array -->
                                    <input name="tags[]" class="form-check-input" type="checkbox"
                                           value="{{ $tag->id }}">
                                    <label class="form-check-label">
                                        {{ $tag->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        <button type="submit" class="btn btn-primary">Aggiungi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
