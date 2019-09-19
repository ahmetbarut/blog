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
    <form action="{{route("admin.profile.update",Auth::user()->id)}}" method="post" class="form-horizontal">
        @csrf
        <div class="row form-group">
            <div class="col col-sm-12">
                <label for="name">İsim</label>
                <input type="text" name="name" value="{{Auth::user()->name}}" placeholder="İsim" class="form-control editor">
            </div>
        </div>
        <div class="row form-group">
        <div class="col col-sm-12">
            <label for="profile">Profil Resmi</label>
            <input type="text" name="profile" value="{{Auth::user()->profile}}" placeholder="Profil Resmi" class="form-control editor">
        </div>
        </div>
        <div class="row form-group">
            <div class="col col-sm-12">
                <label for="name">email</label>
                <input type="text" name="email" value="{{Auth::user()->email}}" placeholder="E-Posta" class="form-control editor">
            </div>
        </div>
        <div class="row form-group">
                <div class="col col-sm-12">
                    <label for="name">Parola</label>
                    <input type="password" name="password" placeholder="Parola" class="form-control editor">
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
