@extends('blog.home')
@section('baslik')
    Hakkımda
@endsection
@section('icerik')
    <main class="mt-5">
        <div class="container">
            <section id="gallery">
                <div class="row">
                    <p class="justify">
                        {!! $content->about !!}
                    </p>
                </div>
            </section>
        </div>
    </main>
@endsection