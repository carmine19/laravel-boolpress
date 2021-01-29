@extends('layouts.app')

@section('content')

    <section id="post_front_office">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 mx-auto">
                    <div class="card-post">
                        <div class="box-img">
                            <img src="{{$post->img}}" alt="">
                        </div>
                        <div class="box-text">
                            <div class="box-title">
                                <a href="{{ route('posts.show', ['slug' => $post->slug]) }}"><h1>{{$post->title}}</h1>
                                </a>
                            </div>
                            <div class="box-content">
                                <p>{{$post->content}}</p>
                            </div>
                            <div class="box-category">
                                <p>Categoria: {{ $post->category ? $post->category->name : '-' }}</p>
                            </div>
                            <div class="box-tag">
                                <p>Tags:
                                    @forelse ($post->tags as $tag)
                                        {{ $tag->name }}{{ !$loop->last ? ',' : '' }}
                                    @empty
                                        -
                                    @endforelse
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
