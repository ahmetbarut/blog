@extends('blog.home')
@section('baslik')
    {{$post->title}}
@endsection
@section('icerik')
    <main class="mt-5" id="">
        <div class="container">
            <section id="gallery">
                <div class="row">
                    <h3>{{$post->title}}</h3>
                    <p class="justify p-5">{!! $post->content !!}</p>
                    <p class="justify"><b>Yazar</b>: {{$post->author}} {{$post->created_at}} </p>
                </div>
            </section>
        </div>
    </main>
@endsection
