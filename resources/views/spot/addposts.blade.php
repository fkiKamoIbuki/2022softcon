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
                        @else
                        <li class="nav-item"><a class="nav-link" href="{{route('spot.signin')}}">ログイン</a></li>
                        @endif
                        <li class="nav-item"><a class="nav-link" href="{{ route('spot.index') }}">Home</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="form-info">
            <body class="masthead">
              @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
              @endif
              <form action="{{route('spot.addposts')}}" method="post" enctype="multipart/form-data">
              <table>
                @csrf 
                <input type="hidden" value="{{$spot_id}}" name="spot_id">
                <tr><th>コメント</th><td><textarea name="comment" cols="20" rows="5" placeholder="コメント"></textarea></td></tr>
                <tr><th>画像</th><td><input id="image" type="file" name="image"></td></tr>
                <tr><th></th><td><button type="submit">追加投稿</button></td></tr>
              </table> 
              </form>
              <br>
                <!-- Bootstrap core JS-->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
                <!-- Core theme JS-->
                <script src="../../js/script.js"></script>
                <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
                <!-- * *                               SB Forms JS                               * *-->
                <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
                <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
                <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
                <script src="{{ url('/') }}/dist/js/vendor/jquery.min.js"></script>
                <script src="{{ url('/') }}/dist/js/vendor/video.js"></script>
                <script src="{{ url('/') }}/dist/js/flat-ui.min.js"></script>
                <script src="{{ url('/') }}/assets/js/prettify.js"></script>
                <script src="{{ url('/') }}/assets/js/application.js"></script>
            </body>
        </div>
        <footer class="footer py-4">
            <div class="footer-margin">
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
            </div>
        </footer>
</html>