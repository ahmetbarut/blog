@extends('admin.home')
@section('title')
    Dosya Yükle
@endsection

@section('content')
    <div class="col-sm-8">
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
    @error("file")
    <div class="sufee-alert alert with-close alert-warning alert-dismissible fade show">
        <span class="badge badge-pill badge-warning">Hatalı</span>
            Geçersiz Dosya Uzantısı
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
    </div>
    @enderror
    <form action="{{route("admin.file.upload.save")}}" method="post" class="form-horizontal" enctype="multipart/form-data">
        @csrf
        <div class="row form-group">
            <div class="col-12 col-md-9">
                <div class="btn btn-block btn-lg btn-@error("file")danger @enderror btn-primary btn-sm float-left">
                    <input type="file" name="file" class="form-group ">
                  </div>
            </div>
        </div>
            <div class="row form-group">
                <div class="col col-sm-3">
                    <button type="reset" class="btn btn-outline-danger btn-lg btn-block">İptal Et</button>
                </div>
                <div class="col col-sm-3 ml-auto">
                    <button type="submit" class="btn btn-outline-success btn-lg btn-block">Yükle</button>
                </div>
            </div>
        </form>
    </div>
@endsection