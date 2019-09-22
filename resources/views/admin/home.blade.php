<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield("title") - Admin Paneli</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{url('assets/admin')}}/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('assets/admin')}}/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{url('assets/admin')}}/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{url('assets/admin')}}/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{url('assets/admin')}}/vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="{{url('assets/admin')}}/vendors/jqvmap/dist/jqvmap.min.css">

    <style>.ck-editor__editable_inline {
            min-height: 250px;
        }</style>
<link rel="stylesheet" href="{{url('assets/admin')}}/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button  class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{route("admin.index")}}"><img src="{{url('assets/admin')}}/images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="{{route("admin.index")}}"><img src="{{url('assets/admin')}}/images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <h3 class="menu-title">Blog Element</h3><!-- /.menu-title -->
                    <li class="media"><a href="{{route("admin.add_post")}}">Gönderi Paylaş</a></li>
                    <li class="media"><a href="{{route("admin.add_category")}}">Kategori Ekle</a></li>
                    <li class="media"><a href="{{route("admin.posts")}}">Gönderiler</a></li>
                    <li class="media"><a href="{{route("admin.categories")}}">Kategoriler</a></li>
                    <li class="media"><a href="{{route("admin.settings")}}">Ayarlar</a></li>
                    <li class="media"><a href="{{route("admin.files")}}">Dosya Yükleme</a></li>
                    <li class="media"><a href="{{route("admin.messages")}}">Mesajlar</a></li>
                    <li class="media"><a href="ui-cards">MAİL (İşlevsiz)</a></li>
                    <li class="media"><a href="{{route("admin.galery")}}">Galeri</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{Auth::User()->img}}" alt="Kullanıcı Fotoğrafı">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="{{route("admin.profile")}}"><i class="fa fa-user"></i> Profilim</a>
                            <a class="nav-link" href="{{route("logout")}}"><i class="fa fa-power-off"></i> Çıkış Yap</a>
                        </div>
                    </div>
                </div>
            </div>

        </header><!-- /header -->
        <div class="content mt-3">
            @yield('content')
        </div> <!-- .content -->
        </div><!-- /#right-panel -->

        <!-- Right Panel -->

    <script src="{{url('assets/admin')}}/vendors/jquery/dist/jquery.min.js"></script>
    <script src="{{url('assets/admin')}}/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="{{url('assets/admin')}}/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="{{url('assets/admin/')}}/assets/js/main.js"></script>


    <script src="{{url('assets/admin')}}/vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="{{url('assets/admin/')}}/assets/js/dashboard.js"></script>
    <script src="{{url('assets/admin/')}}/assets/js/widgets.js"></script>
    <script src="{{url('assets/admin')}}/vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="{{url('assets/admin')}}/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="{{url('assets/admin')}}/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="{{url("node_modules/ckeditor")}}/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.js" integrity="sha256-BTlTdQO9/fascB1drekrDVkaKd9PkwBymMlHOiG+qLI=" crossorigin="anonymous"></script>
    <script>
        "use strict";
            (function($) {
        jQuery('#vmap').vectorMap({
            map: 'world_en',
            backgroundColor: null,
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#1de9b6',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: ['#1de9b6', '#03a9f5'],
            normalizeFunction: 'polynomial'
        });
    })(jQuery);
    </script>
    @yield("script")
</body>

</html>
