@extends('layouts.app')
@section('css')
    <style type="text/css">
        .jumbotron{
            background-color: #C4DFE6;
        }
    </style>
@endsection


@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container mb-5">
            <h1 class="display-4">授業管理アプリ</h1><br>
            <p class="lead">授業の履修内容や課題を管理し、みんなで情報を共有するアプリです。</p>
            <p class="lead">自分の時間割表を作成し、課題リストで提出期限を管理しよう！</p>
            <p class="lead">授業についてわからないことがあったら、チャットを使ってクラスメイトに聞いてみよう！</p>
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                 <div class="carousel-item active">
                 <img src="{{asset('img/1.jpg')}}" alt="...">
                 <div class="carousel-caption d-none d-md-block">
                    <h5>...</h5>
                    <p>...</p>
                 </div>
                 </div>                   
                 <div class="carousel-item">
                    <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Second slide"><title>Placeholder</title><rect width="100%" height="100%" fill="#666"/><text x="50%" y="50%" fill="#444" dy=".3em">Second slide</text></svg>
                    </div>
                    <div class="carousel-item">
                    <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Third slide"><title>Placeholder</title><rect width="100%" height="100%" fill="#555"/><text x="50%" y="50%" fill="#333" dy=".3em">Third slide</text></svg>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
@endsection

