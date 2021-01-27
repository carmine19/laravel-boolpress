@extends('layouts.dashboard')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="card-post">
                    <div class="title-category">
                        <h1 class="text-capitalize">{{$categories->name}}</h1>
                    </div>
                </div>
                <div class="action">
                    <a href=""
                       class="btn btn-warning">
                        Modifica
                    </a>
                    <form method="POST" class="d-inline-block"
                          action="">
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
