@extends('admin.home')
@section('title')
    Ayarlar
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
    <form action="{{route("admin.settings.update",$content->id)}}" method="post" class="form-horizontal">
        @csrf
        <div class="row form-group">
            <div class="col col-sm-12">
                <input type="text" name="name" value="{{$content->name}}" placeholder="İsim" class="form-control editor">
            </div>
        </div>
        <div class="row form-group">
        <div class="col col-sm-12">
            <input type="text" name="logo" value="{{$content->logo}}" placeholder="Logo" class="form-control editor">
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-sm-12">
                <input type="text" name="instagram" value="{{$content->instagram}}" placeholder="İnstagram" class="form-control editor">
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-sm-12">
                <input type="text" name="github" value="{{$content->github}}" placeholder="Github" class="form-control editor">
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-sm-12">
                <textarea type="text" name="about" value="{{$content->about}}" placeholder="Hakkımda" class="form-control editor"></textarea>
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-sm-12">
                <input type="text" name="linkedin" value="{{$content->linkedin}}" placeholder="Linkedin" class="form-control editor">
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-sm-12">
                <input type="text" name="email" value="{{$content->email}}" placeholder="E-Posta" class="form-control editor">
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-sm-3">
                <button type="reset" class="btn btn-outline-danger btn-lg btn-block">İptal Et</button>
            </div>
            <div class="col col-sm-3 ml-auto">
                <button type="submit" class="btn btn-outline-primary btn-lg btn-block">Güncelle</button>
            </div>
        </div>
    </form>
</div>

@endsection
@section('script')
    <script>
        CKEDITOR.replace( 'about' );
    </script>
@endsection