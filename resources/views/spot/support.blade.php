<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Agency - Start Bootstrap Theme</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../../css/styles.css" rel="stylesheet" />
    </head>
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
                        <li class="nav-item"><a class="nav-link" href="{{route('spot.posts')}}">投稿</a></li>
                        @else
                        <li class="nav-item"><a class="nav-link" href="{{route('spot.signup')}}">新規登録</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('spot.signin')}}">ログイン</a></li>
                        @endif
                        <li class="nav-item"><a class="nav-link" href="{{ route('spot.index') }}">Home</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="text-margin">
            <body class="masthead">
                <h2 class="section-heading text-uppercase">投稿方法</h2>

                        <hr class="divider-w mt-10 mb-20">

                        <p>TOP画面のMENUにある【投稿】を押し、投稿欄に<br>

                        ・場所名 <br>

                        ・場所の情報 <br>

                        ・写真 <br>
                        を入力し、「投稿」のボタンを押すと、投稿完了
                        となります。<br>

                        ※仮に場所の名称が分からない場合は、そこから最も近い目印 <br>
                        になる場所の所在地を書き、その場所から目的の位置まで行く <br>
                        方法を「場所の情報」に書いてください。</p>
            </body>
        </div>

        <div class="text-margin">
            <h2 class="section-heading text-uppercase">使用上の注意事項</h2>
            <hr class="divider-w mt-10 mb-20">
            <blockquote>
                <p> <li>スライドショーを作成するには、５枚の画像が必要となります。</li><br>
                <li>投稿は、投稿者自身の責任において行ってください。</li><br>
                <li>投稿内容に係る苦情・異議申し立て、並びに、トラブルや損失・損害があった場合は、すべて投稿者の責任において対応してください。</li><br>
                <li>投稿された写真に使用される著作物、肖像については、投稿者本人が著作権・肖像権等一切の権利を有するもの、または権利者から事前に使用承諾を得たものとします。被写体に人物が含まれている場合は、事前にその方の承諾を得るなど、肖像権の侵害等が生じないように投稿者本人の責任においてご確認ください。被写体が未成年の場合は、その保護者の許可も得たものに限ります。</li><br>
                <li>神社・仏閣、商業施設などが写り込んでいる場合も、撮影・投稿許諾を得たうえでご応募ください。被写体に看板・ネオンサイン・ブランドロゴ等が含まれる場合や公序良俗に反すると判断される作品のご投稿はご遠慮ください。住所情報が写り込んでいる作品のご投稿もご遠慮ください。</li><br>
                <li>掲載されている写真を見た第三者から著作権・肖像権の侵害・プライバシーの侵害等の申告があった際には、協議のうえ、掲載を取り下げとさせていただく場合があります。</li><br>
                <li>第三者の著作物を撮影し、それを素材にして加工や合成をしますと、著作権等知的財産権の侵害にあたる揚合がありますので、事前に権利者の許諾を得てください。</li><br>
                <li>他の閲覧者が不快に思われるような不適切や、犯罪に結びつく、または助長させる画像の投稿はご遠慮ください。</li><br>
                <li>投稿画像に対するコメントにおいて、名誉を毀損、または投稿者を誹謗中傷するようなコメントの投稿はご遠慮ください。</li></p>
            </blockquote>
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
        </div>    
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
</html>

