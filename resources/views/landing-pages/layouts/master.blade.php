<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="DCSoftBD" />
    <meta name="generator" content="" />

    <title>Virtual Doctor</title>

    <link rel="canonical" href="{{asset('')}}" />
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{asset('apple-touch-icon.png')}}" sizes="180x180" />
    <link rel="icon" href="{{asset('favicon-32x32.png')}}" sizes="32x32" type="image/png" />
    <link rel="icon" href="{{asset('favicon-16x16.png')}}" sizes="16x16" type="image/png" />
    <link rel="manifest" href="{{asset('mix-manifest.json')}}" />
    <link rel="mask-icon" href="{{asset('safari-pinned-tab.svg')}}" color="#563d7c" />
    <link rel="icon" href="{{asset('favicon.ico')}}" />
    <meta name="msapplication-config" content="browserconfig.xml" />
    <meta name="theme-color" content="#563d7c" />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@getbootstrap" />
    <meta name="twitter:creator" content="@getbootstrap" />
    <meta name="twitter:title" content="title-of-this-page" />
    <meta name="twitter:description" content="" />
    <meta name="twitter:image" content="social-logo.png" />

    <!-- Facebook -->
    <meta property="og:url" content="" />
    <meta property="og:title" content="title-of-this-page" />
    <meta property="og:description" content="" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="social.png" />
    <meta property="og:image:secure_url" content="social.png" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{asset('css/styles.css')}}" />

    <script data-search-pseudo-elements defer src="{{asset('js/all.min.js')}}" crossorigin="anonymous"></script>
    <script src="{{asset('js/feather.min.js')}}"> </script>

    <link rel="stylesheet" href="{{asset('dist/css/preloader.css')}}" />
    <link rel="stylesheet" href="{{asset('dist/css/custom.css')}}" />
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->

    <div id="layoutDefault_content">
        <main>
            <!-- Navbar-->
            @include('landing-pages.partial.navbar')
            <!-- Page Header-->
            @yield('content')
        </main>
    </div>
    <div id="layoutDefault_footer">
        @include('landing-pages.partial.footer')
    </div>
    </div>
    <script src="{{asset('js/jquery-3.5.1.min.js')}}" crossorigin="anonymous"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}" crossorigin="anonymous">
    </script>
    <script src="{{asset('js/scripts.js')}}"></script>
    <!-- <script src="js/sb-customizer.js"></script> -->

    <script>
        $(".preloader").hide();
    </script>
</body>

</html>