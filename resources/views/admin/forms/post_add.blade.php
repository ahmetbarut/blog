@extends('admin.home')
@section('title')
    Gönderi Paylaş
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
    <form action="{{route("admin.add_post.save")}}" method="post" class="form-horizontal">
        @csrf
            <div class="row form-group">
                <div class="col col-sm-12">
                    <input type="text" name="title" placeholder="Başlık" class="form-control editor">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-sm-12">
                    <textarea name="content" id="editor" rows="9" placeholder="İçerik" class="form-control"></textarea>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-sm-12">
                    <textarea name="code" id="textarea-input" rows="9" placeholder="Kod" class="form-control"></textarea>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-sm-12">
                    <input type="text" name="tags" placeholder="Taglar" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-sm-6">
                    <label for="image">Kapak Resmi</label>
                    <select name="image" id="image" class="form-control">
                        <option selected>Resim Seç</option>
                        @foreach ($images as $image)
                            <option value="{{$image->url}}">{{$image->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col col-sm-6">
                    <img id="imgs" src="" alt="">
                </div>
            </div>
            <div class="row form-group">
                    <div class="col-12 col-md-9">
                    <label for="select">Kategori</label>
                        <select name="category" id="pdili" class="form-control">
                            <option selected>Kategori Seç</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
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
@section('script')
<script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.js"
integrity="sha256-BTlTdQO9/fascB1drekrDVkaKd9PkwBymMlHOiG+qLI="
crossorigin="anonymous"></script>
    <script>
        // Jquery resim değiştirme
        $("#image").change(function() {
            var img = "";
            $("#image option:selected").each(function() {
                img += $(this).val();
            });
            $("#imgs").attr("src",img);
        });
        // Ckeditor
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
