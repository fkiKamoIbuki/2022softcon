<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Agency - Start Bootstrap Theme</title>
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
                        <!-- <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#team">Team</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li> -->
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">隠れた絶景の共有</div>
                <div class="masthead-heading text-uppercase">P a r T R I</div>
                <a class="btn btn-primary btn-xl text-uppercase" href="{{route('spot.support')}}">アプリの使い方</a>
            </div>
        </header>
        <!--Login-->
        <!-- <section class="page-section" id="post">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">投稿する</h2> -->
                    <!-- <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3> -->
                    <!-- <a class="btn btn-primary btn-xl text-uppercase" href="post.html">投稿画面へいく</a>

                </div>
            </div>
        </section> -->
        <!-- gallery Grid-->
        <section class="page-section bg-light" id="gallery">
            <div class="container">
                <div class="text-center">
                    <!-- <h2 class="section-heading text-uppercase">gallery</h2> -->
                    <!-- <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3> -->
                </div>
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
                                                <button type="submit"><img class="img-thumbnail" src="data:image/png;base64,{{$image->getImage()}}" alt="image">
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
                    <!-- <div class="col-lg-4 col-sm-6 mb-4"> -->
                        <!-- gallery item浩 2-->
                        <!-- <div class="gallery-item">
                            <a class="gallery-link" data-bs-toggle="modal" href="#galleryModal2">
                                <div class="gallery-hover">
                                    <div class="gallery-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <video class="img-fluid" src="../../assets/movie/スライドショー_養浩館.mp4" alt="..." ></video>
                            </a>
                            <div class="gallery-caption">
                                <div class="gallery-caption-heading">Explore</div>
                                <div class="gallery-caption-subheading text-muted">Graphic Design</div>
                            </div>
                        </div> -->
                    <!-- </div> -->
                    <!-- <div class="col-lg-4 col-sm-6 mb-4"> -->
                        <!-- gallery item 3-->
                        <!-- <div class="gallery-item">
                            <a class="gallery-link" data-bs-toggle="modal" href="#galleryModal3">
                                <div class="gallery-hover">
                                    <div class="gallery-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="../../assets/img/gallery/3.jpg" alt="..." />
                            </a>
                            <div class="gallery-caption">
                                <div class="gallery-caption-heading">Finish</div>
                                <div class="gallery-caption-subheading text-muted">Identity</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0"> -->
                        <!-- gallery item 4-->
                        <!-- <div class="gallery-item">
                            <a class="gallery-link" data-bs-toggle="modal" href="#galleryModal4">
                                <div class="gallery-hover">
                                    <div class="gallery-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="../../assets/img/gallery/4.jpg" alt="..." />
                            </a>
                            <div class="gallery-caption">
                                <div class="gallery-caption-heading">Lines</div>
                                <div class="gallery-caption-subheading text-muted">Branding</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4 mb-sm-0"> -->
                        <!-- gallery item 5-->
                        <!-- <div class="gallery-item">
                            <a class="gallery-link" data-bs-toggle="modal" href="#galleryModal5">
                                <div class="gallery-hover">
                                    <div class="gallery-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="../../assets/img/gallery/5.jpg" alt="..." />
                            </a>
                            <div class="gallery-caption">
                                <div class="gallery-caption-heading">Southwest</div>
                                <div class="gallery-caption-subheading text-muted">Website Design</div>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="col-lg-4 col-sm-6"> -->
                        <!-- gallery item 6-->
                        <!-- <div class="gallery-item">
                            <a class="gallery-link" data-bs-toggle="modal" href="#galleryModal6">
                                <div class="gallery-hover">
                                    <div class="gallery-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="../../assets/img/gallery/6.jpg" alt="..." />
                            </a>
                            <div class="gallery-caption">
                                <div class="gallery-caption-heading">Window</div>
                                <div class="gallery-caption-subheading text-muted">Photography</div>
                            </div>
                        </div> -->
                    <!-- </div> -->
                </div>
            </div>
        </section>

               
        <!-- <section class="page-section" id="logout">
            <div class="container">
                <div class="text-center"> -->
                    <!-- <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3> -->
                    <!-- <a class="btn btn-primary btn-xl text-uppercase" href="logout.html">ログアウト</a>
                </div>
            </div>
        </section> -->

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


        <!-- gallery Modals-->
        <!-- gallery item 1 modal popup-->
        
        <div class="gallery-modal modal fade" id="galleryModal1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="../../assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">養浩館</h2>
                                    <p class="item-intro text-muted"></p>
                                    <video class="img-fluid d-block mx-auto" src="../../movie/スライドショー_養浩館.mp4" loop controls></video>
                                    <p>福井県福井市にある美しい庭園、「養浩館庭園」は、アメリカの庭園専門誌"Sukiya Living Magazine"の2020年日本庭園全国ランキングで第8位に選ばれております。養浩館庭園は2007年にランクインしてから、14年連続でトップ10以内に入っています。この庭園にはまさに、『侘び寂び』という言葉が似合います。</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>撮影日:</strong>
                                            2022/9/16
                                        </li>
                                        <li>
                                            <strong>アクセス:</strong>
                                            福井県 福井市 宝永3丁目11-36
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        戻る
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- gallery item 2 modal popup-->
        <!-- <div class="gallery-modal modal fade" id="galleryModal2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="../../assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body"> -->
                                    <!-- Project details-->
                                    <!-- <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="../../assets/img/gallery/2.jpg" alt="..." />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Client:</strong>
                                            Explore
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            Graphic Design
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- gallery item 3 modal popup-->
        <!-- <div class="gallery-modal modal fade" id="galleryModal3" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="../../assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body"> -->
                                    <!-- Project details-->
                                    <!-- <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="../../assets/img/gallery/3.jpg" alt="..." />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Client:</strong>
                                            Finish
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            Identity
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- gallery item 4 modal popup-->
        <!-- <div class="gallery-modal modal fade" id="galleryModal4" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="../../assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body"> -->
                                    <!-- Project details-->
                                    <!-- <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="../../assets/img/gallery/4.jpg" alt="..." />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Client:</strong>
                                            Lines
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            Branding
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- gallery item 5 modal popup-->
        <!-- <div class="gallery-modal modal fade" id="galleryModal5" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="../../assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body"> -->
                                    <!-- Project details-->
                                    <!-- <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="../../assets/img/gallery/5.jpg" alt="..." />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Client:</strong>
                                            Southwest
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            Website Design
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- gallery item 6 modal popup-->
        <!-- <div class="gallery-modal modal fade" id="galleryModal6" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="../../assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body"> -->
                                    <!-- Project details-->
                                    <!-- <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="../../assets/img/gallery/6.jpg alt="..." />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Client:</strong>
                                            Window
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            Photography
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

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
