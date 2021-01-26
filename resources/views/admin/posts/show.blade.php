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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
