@extends('blog.home')
@section('baslik')
Etiketler
@endsection
@section('icerik')
<main>
    <div class="container p-2">
    @foreach ($tags as $tag)        
        <div class="card p-3 mb-2 mt-2">
            <div class="card-body">
              <h5 class="card-title">{{$tag->title}}</h5>
              <p class="card-text"> 
                  {{substr($tag->content,0,250)}}
              </p>
            <a href="{{route("blog.gonderi",$tag->id.'#main')}}" class="btn-link">Okumaya Devam Et</a>
            </div>
        </div>
    @endforeach
</main>
@endsection