@extends('admin.home')
@section('title')
    Mesajlar
@endsection
@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">İsim</th>
                            <th scope="col">Konu</th>
                            <th scope="col">E-Posta</th>
                            <th scope="col">Tarih</th>
                            <th scope="col">İşlem</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($messages as $message)
                        <tr>
                            <td>{{$message->name}}</td>
                            <td>{{$message->subject}}</td>
                            <td><a href="{{route("admin.mail.send",[$message->subject,$message->email])}}">Cevapla <i class="fa fa-reply" aria-hidden="true"></i></a></td>
                            <td>{{$message->created_at}}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#message_{{$message->id}}">
                                    Mesajı Göster
                                  </button>
                            </td>
                        </tr>
                        <div class="modal fade" id="message_{{$message->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLongTitle">{{$message->subject}}</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                        {{$message->message}}
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-warning" data-dismiss="modal">Çık</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        @endforeach
                    </tbody>
                </table>
                {{$messages->links()}}
                <!-- Button trigger modal -->

      
      <!-- Modal -->
      
        </div>
    </div>
</div>
@endsection
{{--     --}}
