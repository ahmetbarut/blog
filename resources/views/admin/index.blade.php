@extends('admin.home')
@section('title')
    Anasayfa
@endsection
@section('content')
            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">
                        <h4 class="mb-0">
                            <span class="count">{{$visits}}</span>
                        </h4>
                        <p class="text-light">Toplam Ziyaretçi</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                        </div>
                    </div>
                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-2">
                    <div class="card-body pb-0">
                        <h4 class="mb-0">
                            <span class="count">{{$posts}}</span>
                        </h4>
                        <p class="text-light">Toplam Konu</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                        </div>
                    </div>
                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-3">
                    <div class="card-body pb-0">
                        <h4 class="mb-0">
                            <span class="count">{{$categories}}</span>
                        </h4>
                        <p class="text-light">Toplam Kategori</p>

                    </div>

                    <div class="chart-wrapper px-0" style="height:70px;" height="70">
                    </div>
                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-4">
                    <div class="card-body pb-0">
                        <h4 class="mb-0">
                            <span class="count">{{$files}}</span>
                        </h4>
                        <p class="text-light">Toplam Dosya</p>
                        <div class="chart-wrapper px-3" style="height:70px;" height="70">
                        </div>
                    </div>
                </div>
            </div>
            <!--/.col-->
@endsection