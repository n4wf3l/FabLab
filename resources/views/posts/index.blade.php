@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Alle producten</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   @foreach($posts as $post)
                  <h3>{{$post->title}}</h3>
                  <p>{{ $post->content}}</p>
                  <h4>Prijs {{ $post->prijs }}</h4>
                 
                 @auth
                  @if(auth::user()->is_admin)
                  <a href ="{{ route('posts.edit', $post->id) }}">Edit Product</a>
                  @else
                  <a href="{{ route('like', $post->id)}}">Vink als favoriet</a>
                @endif
                <br>
                @endauth
                  Product heeft {{$post->likes()->count() }} Geïnteresseerden
                  <hr>
                   @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
