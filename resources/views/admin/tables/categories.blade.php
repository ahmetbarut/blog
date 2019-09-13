@extends('admin.home')
@section('title')
    Kategoriler
@endsection
@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Başlık</th>
                            <th scope="col">İçerik</th>
                            <th scope="col">İşlem</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->title}}</td>
                            <td>{{$category->description}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-2">
                                        <form method="post" action="{{route('admin.category.destroy', $category->id)}}">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="rounded-circle btn-sm btn-danger"><i class="fa text-white fa-trash"></i></button>
                                        </form>
                                    </div>
                                    <div class="col-2">
                                    <a href="{{route("admin.category.edit",$category->id)}}" class="rounded-circle btn btn-primary btn-sm"><i class="fa text-white fa-edit"></i></a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$categories->links()}}
            </div>
        </div>
    </div>
@endsection
{{--     --}}
