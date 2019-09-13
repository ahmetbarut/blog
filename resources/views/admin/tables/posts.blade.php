@extends('admin.home')
@section('title')
    Gönderiler
@endsection
@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Başlık</th>
                            <th scope="col">Yazar</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Tarih</th>
                            <th scope="col">İşlem</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->title}}</td>
                            <td>{{$post->author}}</td>
                            <td>{{$post->category_id}}</td>
                            <td>{{$post->created_at}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-2">
                                        <form method="post" action="{{route('admin.post.destroy', $post->id)}}">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="rounded-circle btn-sm btn-danger"><i class="fa text-white fa-trash"></i></button>
                                        </form>
                                    </div>
                                    <div class="col-2">
                                    <a href="{{route("admin.post.edit",$post->id)}}" class="rounded-circle btn btn-primary btn-sm"><i class="fa text-white fa-edit"></i></a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$posts->links()}}
            </div>
        </div>
    </div>
@endsection
{{--     --}}
