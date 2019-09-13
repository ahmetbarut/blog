@extends('admin.home')

@section('title')
    Dosya Yükleme
@endsection

@section('content')
<div class="col-sm-12">
        @if (Session::has("success"))
        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
            <span class="badge badge-pill badge-success">Başarılı</span>
                {{ Session::get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
        </div>
        @endif
        @if (Session::has("fail"))
        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
            <span class="badge badge-pill badge-danger">Başarısız</span>
                {{ Session::get('fail') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
        </div>
        @endif
    <h3><a class="btn btn-outline-success btn-lg btn-block mb-3" href="{{route("admin.file.upload")}}">Dosya Yükle <i class="fa fa-upload" aria-hidden="true"></i></a></h3>
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Adı</th>
                        <th scope="col">Uzantı</th>
                        <th scope="col">Boyut</th>
                        <th scope="col">Tip</th>
                        <th scope="col">Url</th>
                        <th scope="col">Yüklenme Tarihi</th>
                        <th scope="col">İşlem</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($files as $file)
                    <tr>
                        <td>{{$file->name}}</td>
                        <td>{{$file->extension}}</td>
                        <td>{{App\Helper\AdminHelper::fileSize($file->size)}}</td>
                        <td>{{$file->type}}</td>
                        <td>{{$file->url}}</td>
                        <td>{{$file->created_at}}</td>
                        <td>
                            <div class="row">
                                <div class="col-2">
                                    <form method="post" action="{{route('admin.file.destroy', $file->id)}}">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="rounded-circle btn-sm btn-danger"><i class="fa text-white fa-trash"></i></button>
                                    </form>
                                </div>
                                <div class="col-2">
                                    <button type="button" class="rounded-circle btn-sm btn btn-primary" data-toggle="modal" data-target="#dosya_{{$file->id}}">
                                        <i class="fa fa-edit"></i>
                                      </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <div class="modal fade" id="dosya_{{$file->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            </div>
                            <div class="modal-body">
                            <form action="{{route("admin.file.update",$file->id)}}" method="post">
                                @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="text" name="fileName" value="{{$file->name}}" class="form-control">
                                        </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">İptal Et</button>
                                        <button type="submit" class="btn btn-primary">Dosya Adını Değiştir</button>
                                    </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
            {{$files->links()}}
        </div>
    </div>
</div>
@endsection