<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>ParTRI</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../../assets/favicon.png"/>
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../../css/styles.css" rel="stylesheet" />

    </head>
    <body id="page-top">

        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="{{ route('spot.index') }}"><img src="../../assets/img/top_logo.png" alt="..."/></a>
                @if(Auth::check())
                <a class="nav-item"><a class="nav-link">ようこそ、{{ Auth::user()->name }}さん</a></li>
                @endif
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        @if(Auth::check())
                        <li class="nav-item"><a class="nav-link" href="{{ route('spot.logout') }}">ログアウト</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('spot.posts')}}">投稿</a></li>
                        @else
                        <li class="nav-item"><a class="nav-link" href="{{route('spot.signup')}}">新規登録</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('spot.signin')}}">ログイン</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header>
                <div class="mv">
                <!--  メイン全体を囲うdiv  -->
                <div class="mv-wrap">
                <!--   薄いレイヤー   -->
                <div class="mv-bg"></div>
                <!--   videoタグ   -->
                <video id="video" webkit-playsinline="" playsinline="" muted="" autoplay="" loop=""
                src="data:video/mp4;base64,{{$videos[0]->getVideo()}}"></video>
                <!--   動画の上に載せるテキスト   -->
                    <div class="text-center">
                    <div class="mv-txt">隠れたスポットの共有</div>
                    <div class="mv-txt1">P a r T R I</div>
                    <a class="btn btn-primary btn-xl" href="{{route('spot.support')}}">アプリの使い方</a>
                    </div>
                </div>
                </div>
        </header>
        <!-- gallery Grid-->
        <section class="page-section-index bg-light " id="gallery">
            <div class="searchform-margin">
                <form method="GET" action="{{ route('spot.search') }}">
                    <input type="search" placeholder="スポット名を入力" name="search" value="@if (isset($search)) {{ $search }} @endif">
                        <button type="submit">検索</button>
                </form>
            </div>
            <div class="container">
                <div class="row">
                    @foreach ($images as $image)
                        <div class="col-lg-4 col-sm-6 mb-4">
                            <!-- gallery item 1-->
                            <div class="gallery-item">
                                <div class="gallery-size">
                                    <!-- <a class="gallery-link" data-bs-toggle="modal" href="#galleryModal1"> -->
                                        <form method="GET" action="{{ route('spot.gallery') }}">
                                            <div> 
                                                <input type="hidden" value="{{$image->id}}" name="spot_id">
                                                <button type="submit"><img class="img-thumbnail" src="data:image/png;base64,{{$image->getImage()}}" alt="image"></button>
                                            </div>
                                        </form>
                                        <!-- <img class="img-fluid" src="../../assets/img/gallery/you.jpg" alt="..." /> -->
                                    <!-- </a> -->
                                    <div class="gallery-caption" data-bs-toggle="modal">
                                        <div class="gallery-caption-heading">{{$image->getSpotName()}}</div>
                                        <div class="gallery-caption-subheading text-muted">{{$image->getName()}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- paginate -->
            <div class="paginate-center">
                    @if ( $images->hasPages() )
                        @if ($images->lastPage() > 1)
                        <ul class="pagination">
                            <li class="page-item {{ ($images->currentPage() == 1) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $images->url(1) }}">First Page</a>
                            </li>
                            <li class="page-item {{ ($images->currentPage() == 1) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $images->url(1) }}">
                                    <span aria-hidden="true">«</span>
                                    {{-- Previous --}}
                                </a>
                            </li>
                            @for ($i = 1; $i <= $images->lastPage(); $i++)
                                <li class="page-item {{ ($images->currentPage() == $i) ? ' active' : '' }}">
                                    <a class="page-link" href="{{ $images->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="page-item {{ ($images->currentPage() == $images->lastPage()) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $images->url($images->currentPage()+1) }}" >
                                    <span aria-hidden="true">»</span>
                                    {{-- Next --}}
                                </a>
                            </li>
                            <li class="page-item {{ ($images->currentPage() == $images->lastPage()) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $images->url($images->lastPage()) }}">Last Page</a>
                            </li>
                        </ul>
                        @endif
                    @else
                        <ul class="pagination">
                            <li class="page-item {{ ($images->currentPage() == 1) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $images->url(1) }}">First Page</a>
                            </li>
                            <li class="page-item {{ ($images->currentPage() == 1) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $images->url(1) }}">
                                    <span aria-hidden="true">«</span>
                                    {{-- Previous --}}
                                </a>
                            </li>
                            @for ($i = 1; $i <= $images->lastPage(); $i++)
                                <li class="page-item {{ ($images->currentPage() == $i) ? ' active' : '' }}">
                                    <a class="page-link" href="{{ $images->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="page-item {{ ($images->currentPage() == $images->lastPage()) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $images->url($images->currentPage()+1) }}" >
                                    <span aria-hidden="true">»</span>
                                    {{-- Next --}}
                                </a>
                            </li>
                            <li class="page-item {{ ($images->currentPage() == $images->lastPage()) ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $images->url($images->lastPage()) }}">Last Page</a>
                            </li>
                        </ul>
                    @endif
            </div>
        </section>
        

        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; Your Website 2022</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                        <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>
        
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../../assets/js/script.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        
    </body>
</div>
</html>
