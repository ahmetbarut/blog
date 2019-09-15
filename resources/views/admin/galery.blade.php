@extends('admin.home')

@section('title')
    Galeri
@endsection

@section('content')
<div class="row">
    @foreach($galery as $photo)
    <div class="col-lg-4">
        <section class="card">
            <div class="card-body text-secondary">
                    <button type="" class="" data-toggle="modal" data-target="#modal_{{$photo->id}}">
                    <img src="{{$photo->url}}" class="img-fluid">
                </button>
                <div class="modal fade" id="modal_{{$photo->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                            <img src="{{$photo->url}}" class="img-fluid mb-3">
                                <p>Adı : {{$photo->name}}</p>
                                <p>Url : <a href="{{$photo->url}}">{{$photo->url}}</a></p>
                                <p>Boyut : {{$photo->size}}</p>
                            </div>
                        </div>
                      </div>
                    </div>
                    </div>
                  </div>
                </div>   
            </div>
        </section>
    </div>
    @endforeach
</div>
@endsection