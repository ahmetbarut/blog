@extends('blog.home')
@section('baslik')
    Kategori adı
@endsection
@section('icerik')
    <main>
        <div class="container">
            <table class="table table-striped">
                <thead class="thead-inverse">
                    <tr>
                        <th>Başlık</th>
                        <th>Tarih</th>
                        <th>Yazar</th>
                    </tr>
                    </thead>
                    <tbody>
                       @foreach ($posts as $post)
                        <tr>
                            
                            <td scope="row"><a href="{{route("blog.post",$post->id)}}" class="text-primary">{{$post->title}}</a></td>
                            <td><a href="{{route("blog.post",$post->id)}}" class="text-primary">{{$post->created_at}}</a></td>
                            <td><a href="{{route("blog.post",$post->id)}}" class="text-primary">{{$post->author}}</a></td>
                            
                        </tr>
                       @endforeach
                    </tbody>
            </table>
        </div>
    </main>
@endsection
