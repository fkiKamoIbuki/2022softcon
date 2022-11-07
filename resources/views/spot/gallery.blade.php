
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

        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="{{ route('spot.index') }}"><img src="../../assets/img/top_logo.png" alt="..." /></a>
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
                        
                            <form method="GET" name="addposts" action="{{ route('spot.addposts') }}">
                                <input type="hidden" value="{{$images[0]->spot_id}}" name="spot_id">
                                <li class="nav-item"><a class="nav-link" href="javascript:addposts.submit()">追加投稿</a></li>
                            </form>      
                        @else
                        <li class="nav-item"><a class="nav-link" href="{{route('spot.signup')}}">新規登録</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('spot.signin')}}">ログイン</a></li>
                        @endif
                        <li class="nav-item"><a class="nav-link" href="{{ route('spot.index') }}">Home</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- gallery Grid-->
        <section class="page-section bg-light" id="gallery">
            <div class="container"> 
                <div class="row">
                    <div class="text-center">
                        <h1>{{$spots[0]->getSpotName()}}</h1>
                    </div>
                        <div class="btn-container-address">
                            <button id="btn3">所在地</button>
                            </div>
                        <div id="mask" class="hidden-address"></div>
                        <section id="modal" class="hidden-address">   
                            <iframe src="https://maps.google.com/maps?output=embed&q={{$spots[0]->getaddress_lat()}},{{$spots[0]->getaddress_lng()}}&t=h&hl=ja&z=18" width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                        </section>
                        <script>
                            const btn3 = document.getElementById('btn3');
                            const mask = document.getElementById('mask');
                            const modal = document.getElementById('modal');

                            btn3.addEventListener('click', () => {
                            mask.classList.remove('hidden-address');
                            modal.classList.remove('hidden-address');
                            });

                            mask.addEventListener('click', () => {
                            mask.classList.add('hidden-address');
                            modal.classList.add('hidden-address');
                            });
                            </script>
                    </div>
                    
                    <div class="button011">
                        <form method="GET" name="viewvideo" action="{{ route('spot.viewvideo') }}">
                            <input type="hidden" value="{{$images[0]->spot_id}}" name="spot_id">
                            <a href="javascript:viewvideo.submit()">ショート動画で見る</a>
                        </form>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Comment</th>
                            <th scope="col">CreateTime</th>
                            <th scope="col">Picture</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($images as $image)
                                <tr>
                                    <th scope="row">{{$image->getName()}}</th>
                                    <td>{{$image->getComment()}}</td>
                                    <td>{{$image->getDateTime()}}</td>
                                    <td>
                                        @if(is_null($image->pic_content))
                                            <img class="img-thumbnail" src="../../assets/img/noimage.png">
                                        @else
                                            <img class="img-thumbnail" src="data:image/png;base64,{{ $image->pic_content }}" alt="image">
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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
<script>
</div>
</html>
