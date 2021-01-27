@extends('layouts.dashboard')


@section('content')

    <div id="add_category">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Inserisci una categoria</h1>
                    <form method="POST" action="{{route('admin.categories.store')}}">
                        @csrf
                        @method('POST')
                        <div class="form-group mb-5 mt-5">
                            <label for="exampleInputEmail1">Nome</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group mb-5 mt-5">
                            <label for="exampleInputEmail1">Slug</label>
                            <input type="text" name="slug" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Aggiungi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
