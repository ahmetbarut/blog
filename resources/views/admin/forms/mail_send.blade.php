@extends('admin.home')
@section('title')
    E-Posta Gönder
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
                <input type="text" name="title" placeholder="Başlık" value="Yanıt : {{$reply}}" class="form-control editor">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-sm-12">
                <input type="text" name="title" placeholder="Mail" value="{{$mail}}" class="form-control editor">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-sm-12">
                    <textarea name="content" id="editor" rows="9" placeholder="Mesaj" class="form-control"></textarea>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-sm-3">
                    <button type="reset" class="btn btn-outline-danger btn-lg btn-block">İptal Et</button>
                </div>
                <div class="col col-sm-4 ml-auto">
                    <button type="submit" class="btn btn-outline-primary btn-lg btn-block">Mesajı Gönder</button>
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
