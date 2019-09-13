@extends('admin.home')
@section('title')
    Kategori Ekle
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
        <h4>Kategori Ekle</h4>
        <form action="{{route("admin.add_category.save")}}" method="post" class="form-horizontal">
            @csrf
            <div class="row form-group">
                <div class="col col-sm-12">
                    <input type="text" name="title" placeholder="Başlık" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-sm-12">
                    <input type="text" name="description" placeholder="Açıklama" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-sm-3">
                    <button type="" class="btn btn-outline-danger btn-lg btn-block">İptal Et</button>
                </div>
                <div class="col col-sm-3 ml-auto">
                    <button type="submit" class="btn btn-outline-primary btn-lg btn-block">Paylaş</button>
                </div>
            </div>
        </form>
    </div>
@endsection
