@extends('layouts.dashboard')


@section('content')

    <div id="add_category">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Inserisci un nuovo post</h1>
                    <!-- questa è la direttiva blade che ci restituisce tutti gli errori -->
                    <div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <!-- fine direttiva  -->
                    <form method="POST" action="{{route('admin.posts.store')}}">
                        @csrf
                        @method('POST')
                        <div class="form-group mb-5 mt-5">
                            <label for="exampleInputEmail1">Titolo</label>
                            <input type="text" name="title" class="form-control" value="{{old('title')}}">
                            @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-5 mt-5">
                            <label for="exampleInputEmail1">Slug</label>
                            <input type="text" name="slug" class="form-control" value="{{old('slug')}}">
                            @error('slug')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-5 mt-5">
                            <label for="exampleInputEmail1">Sottotitolo</label>
                            <input type="text" name="subtitle" class="form-control" value="{{old('text')}}">
                            @error('subtitle')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-5 mt-5">
                            <label for="exampleInputEmail1">Contenuto</label>
                            <input type="text" name="content" class="form-control" value="{{old('content')}}">
                            @error('content')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-5 mt-5">
                            <label for="exampleInputEmail1">Link immagine</label>
                            <input type="text" name="img" class="form-control" value="{{old('text')}}">
                            @error('img')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Categoria</label>
                            <select class="form-control" name="category_id">
                                <option value="">-- seleziona categoria --</option>
                                @foreach ($categories as $category)
                                    <option
                                        value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected=selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <p>Seleziona i tag:</p>
                            @foreach ($tags as $tag)
                                <div class="form-check">
                                    <!-- con le chekbox ci dobbiamo ricordare di passare il name come array -->
                                    <input name="tags[]" class="form-check-input" type="checkbox" value="{{ $tag->id }}"
                                        {{ in_array($tag->id, old('tags', [])) ? 'checked=checked' : '' }}>
                                    <label class="form-check-label">
                                        {{ $tag->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        @error('tags')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <button type="submit" class="btn btn-primary">Aggiungi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
