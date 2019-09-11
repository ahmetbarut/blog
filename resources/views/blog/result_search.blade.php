@extends('blog.home')
@section('baslik')
Arama Sonuçları
@endsection
@section('icerik')
<main>
    <div class="container p-2">
@if ($results->count() !=0)
    <div class="alert alert-success" role="alert">
		<h3> <i class="far fa-check-circle"></i> <u>{{@$word}}</u> ile İlgili Sonuçlar</h3>
    </div>
    @foreach ($results as $result)        
        <div class="card p-3 mb-2 mt-2">
            <div class="card-body">
              <h5 class="card-title">{{$result->title}}</h5>
              <p class="card-text"> 
                  {{substr($result->content,0,250)}}
              </p>
            <a href="{{route("blog.gonderi",$result->id.'#main')}}" class="btn-link">Okumaya Devam Et</a>
            </div>
        </div>
    @endforeach
    @else
    <div class="alert alert-danger" role="alert">
        <h3> <i class="fas fa-times"></i> <u></i>{{@$word}}</u> ile İlgili Sonuç Bulunamadı</h3>
    </div>
@endif
    </div>
</main>
@endsection