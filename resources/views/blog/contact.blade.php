@extends('blog.home')
@section('baslik')
    İletişim
@endsection
@section('icerik')
<main class="mt-5">
    <div class="container">
        <h2 class="mb-5 font-weight-bold text-center">İletişim</h2>
            <div class="row justify-content-md-center">
                <div class="col-lg-8 col-md-8">
                    @if(Session::has('success'))
                        <p class="alert {{ Session::get('alert-class', 'alert-success') }}">
                           {{ Session::get('success') }}
                       </p>
                   @endif
                    <form method="POST" action="{{route('blog.contact.save')}}">
                        @csrf
                        <div class="md-form form-sm"> <i class="fa fa-user prefix grey-text"></i>
                            <input type="text" name="name" id="form3" class="@error('name') is-invalid @enderror form-control form-control-sm">
                            <label for="form3">Ad Soyda</label>
                        </div>
                        <div class="md-form form-sm"><i class="fa fa-at prefix grey-text" aria-hidden="true"></i>
                            <input type="text" name="email" id="form2" class="@error('email') is-invalid @enderror form-control form-control-sm">
                            <label for="form2">E-posta</label>
                        </div>
                        <div class="md-form form-sm"> <i class="fa fa-tag prefix grey-text"></i>
                            <input type="text" name="subject" id="form32" class="@error('subject') is-invalid @enderror form-control form-control-sm">
                            <label for="form34">Konu</label>
                        </div>
                        <div class="md-form form-sm"> <i class="fa fa-envelope prefix grey-text" aria-hidden="true"></i>
                            <textarea type="text" name="message" id="form8" class="@error('message') is-invalid @enderror md-textarea form-control form-control-sm" rows="4"></textarea>
                            <label for="form8">Mesaj</label>
                        </div>
                        <div class="text-center mt-4">
                            <button class="btn btn-primary">Gönder <i class="fa fa-paper-plane ml-1"></i></button>
                        </div>
                   </form>
                </div>
            </div>
        </section>
    </div>
</main>
@endsection