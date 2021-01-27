@extends('layouts.dashboard')


@section('content')

    <div id="add_category">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Inserisci un nuovo post</h1>
                    <form method="POST" action="{{route('admin.categories.update', ['category' => $category])}}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>Categoria</label>
                            <select class="form-control" name="name">
                                <option value="">-- seleziona categoria --</option>
                                @foreach ($categories as $ele)
                                    <option value="{{$ele->name }}" {{ $ele->id == $ele->id ? 'selected=selected' : '' }}>
                                        {{ $ele->name }}
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

