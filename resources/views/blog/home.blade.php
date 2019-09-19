<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('baslik') - Kişisel Blog</title>
    <link href="{{url('assets')}}/blog/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{url('assets')}}/blog/css/mdb.min.css" rel="stylesheet">
    <link href="{{url('assets')}}/blog/css/style.css" rel="stylesheet">
    <link href="{{url('assets')}}/blog/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="{{url('assets')}}/blog/fontawesome/css/all.min.css" rel="stylesheet">
    <link href="{{url('assets')}}/blog/prism.css" rel="stylesheet">
    <link rel = "icon" type = "image/png" href = "{{$content->logo}}">
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
        <div class="container">
            <a class="navbar-brand" href="{{route("blog.home")}}">{{$content->name}}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="basicExampleNav">
                <ul class="navbar-nav mr-auto smooth-scroll">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route("blog.home")}}">Anasayfa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('blog.about')}}">Hakkımda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('blog.contact')}}">İletişim</a>
                    </li>
                </ul>
                <div class="row">
                    <div class="col-md-12">
                    <form action="{{route("blog.search")}}" class="form-inline" method="get">
                            <div class="row">
                                <div class="md-form mt-0 col-8">
                                    <input class="form-control mr-sm-2 @error('search') {{"is-valid"}} @enderror" type="text" name="search"  placeholder="Search" aria-label="Search">
                                </div>
                                <div class="md-form mt-0 input-group-prepend">
                                    <button type="submit" class="btn btn-sm btn-outline-light mr-2"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <ul class="navbar-nav nav-flex-icons">
            @if ($content->instagram !="")
                <li class="nav-item">
                <a class="nav-link" href="https://instagram.com/{{$content->instagram}}" target="_blank"><i class="fab fa-instagram"></i></a>
                </li>
            @endif
            @if ($content->linkedin !="")
                <li class="nav-item">
                <a class="nav-link" href="https://tr.linkedin.com/in/{{$content->linkedin}}" target="_blank"><i class="fab fa-linkedin"></i></a>
                </li>
            @endif
            @if ($content->github !="")
                <li class="nav-item">
                <a class="nav-link" href="https://github.com/{{$content->github}}" target="_blank"><i class="fab fa-github"></i></a>
                </li>
            @endif
            </ul>
        </div>
    </nav>
<div id="intro" class="view">
  <div id="intro" class="view">
      <div class="mask rgba-black-strong">
          <div class="container-fluid d-flex align-items-center justify-content-center h-100">
          </div>
      </div>
  </div>
</div>
</header>
@yield('icerik')
<footer class="page-footer font-small blue pt-4 mt-4">
    <div class="container mt-5 mb-4 text-center text-md-left">
        <div class="row mt-3">
            <div class="col-md-4 col-lg-3 col-xl-3">
                <h6 class="text-uppercase font-weight-bold">
                    <strong>İletişim</strong>
                </h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    <a href="mailto:{{$content->email}}"><i class="fa fa-envelope mr-3"></i> {{$content->email}}</a>
                </p>
            </div>
            <!--/.Fourth column-->

        </div>
    </div>
    <!--/.Footer Links-->
    <!--Footer-->
    <footer class="page-footer font-small blue">

        <!-- Social buttons -->
        <div class="primary-color">
            <div class="container">
                <div class="row py-4 d-flex align-items-center">

                    <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                        <h6 class="mb-0 white-text">Get connected with us on social networks!</h6>
                    </div>

                    <div class="col-md-6 col-lg-7 text-center text-md-right">
                        <!--Facebook-->
                    @if ($content->instagram !="")
                        <a class="fb-ic ml-0" href="https://instagram.com/{{$content->instagram}}" target="_blank">
                            <i class="fab fa-instagram white-text mr-4"> </i>
                        </a>
                    @endif
                    @if ($content->linkedin !="")
                        <a class="li-ic" href="https://linkedin.com/in/{{$content->linkedin}}" target="_blank">
                            <i class="fab fa-linkedin white-text mr-4"> </i>
                        </a>
                    @endif
                        <!--Instagram-->
                    @if ($content->linkedin !="")
                        <a class="ins-ic" href="https://github.com/{{$content->github}}" target="_blank">
                            <i class="fab fa-github white-text mr-lg-4"> </i>
                        </a>
                    @endif
                    </div>

                </div>
            </div>
        </div>
    <footer class="page-footer unique-color-dark pt-0">
            {{$content->name}}  © {{date("Y")}} Copyright
          </div>
      </footer>
    <script type="text/javascript" src="{{url("assets")}}/blog/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="{{url("assets")}}/blog/js/popper.min.js"></script>
    <script type="text/javascript" src="{{url("assets")}}/blog/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{url("assets")}}/blog/js/mdb.min.js"></script>
    <script type="text/javascript" src="{{url("assets")}}/blog/prism.js"></script>
    <script type="text/javascript" src="{{url("assets")}}/blog/js/main.js"></script>
    <script type="text/javascript" src="{{url("assets")}}/blog/fontawesome/js/all.min.js"></script>
    <script type="text/javascript" src="{{url("assets")}}/blog/fontawesome/js/fontawesome.min.js"></script>
    <script src="https://maps.google.com/maps/api/js"></script>
    <script>
    $('.carousel').carousel({
        interval: 2000,
    })

</script>
</body>

</html>
