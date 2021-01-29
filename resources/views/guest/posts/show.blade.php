@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>{{ $post->title }}</h1>
                <div>
                    {{ $post->content }}
                </div>
                <div class="">
                    <p>Categoria:
                    @if ($post->category)
                        {{ $post->category->name }}
                    @else
                        -
                    @endif
                </p>
                </div>
                <div class="">
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
@endsection
