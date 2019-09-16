@extends('blog.home')
@section('baslik')
    Anasayfa
@endsection
@section('icerik')
<main class="mt-5">
    <div class="container">
        <section id="gallery">
            <div class="row">
                <div class="col-md-9 mb-4">
                    @foreach ($posts as $post)
                    <div class="row">
                        <div class="col-md-12">
                        <img class="d-block w-100" src="{{$post->img}}" alt="First slide">
                        <h4 class="mb-3 mt-3"><strong>{{$post->title}}</strong></h4>
                        <p style="width:50px !important;">{!! substr($post->content,0,250) !!}</p>
                        <p>by <a><strong>{{$post->author}}</strong></a>, {{substr($post->created_at,0,10)}}</p>
                        <p><?php $tags = explode(',',$post->tags);foreach ($tags as $tag) {?>
                        <a href="{{route("blog.tags",$tag)}}">#{{$tag}}</a>
                        <?php }?></p>
                        <a href="{{route("blog.post",$post->id)}}" class="btn btn-primary btn-md">Okumaya Devam Et</a>
                        </div>
                    </div>
                    @endforeach
                <div class="mx-auto" style="width:150px">{{ $posts->links() }}</div>
            </div>
                <div class="col-md-3">
                    <h4>Kategori</h4>
					<table class="table table-striped">
						<thead>
							<th>Kategori Adı</th>
						</thead>
						<tbody>
							@foreach($categories as $category)
							<tr>
								<th><a href="{{route("blog.category",$category->id)}}">{{$category->title}}</a></th>
							</tr>
							@endforeach
						</tbody>
					</table>
                </div>
            </div>
        </section>
        <hr class="my-5">
    </div>
</main>
@endsection
