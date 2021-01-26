@extends('layouts.app')

@section('content')

    <section id="post_front_office">
        <div class="container">
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-lg-4">
                        <div class="card-post">
                            <div class="box-img">
                                <img src="{{$post->img}}" alt="">
                            </div>
                            <div class="box-text">
                                <div class="box-title">
                                    <h1>{{$post->title}}</h1>
                                </div>
                                <div class="box-content">
                                    <p>{{$post->content}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection