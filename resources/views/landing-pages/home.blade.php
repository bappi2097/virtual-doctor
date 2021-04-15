@extends('landing-pages.layouts.master')
@section('content')
<!-- Page Header-->
<header class="page-header page-header-light py-lg-5 bg-light">
    <div class="page-header-content">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-12">
                    <h1 class="page-header-title">Find care you need</h1>
                    <p class="page-header-text mb-5">
                        The health and well-being of our patients and their health
                        care team will always be our priority, so we follow the
                        best practices for cleanliness.
                    </p>
                    <a class="btn btn-primary bg-gradient-primary-to-secondary font-weight-500 mr-2"
                        href="{{route('register')}}">SIGN UP<i class="ml-2" data-feather="arrow-right"></i></a><a
                        class="btn btn-outline-primary font-weight-500" href="#!">Learn More</a>
                </div>
                <div class="col-lg-5 col-md-12 d-lg-block">
                    <img class="img-fluid pl-xl-5" src="dist/image/undraw_medicine_b1ol.svg" />
                </div>
            </div>
        </div>
    </div>
    <div class="svg-border-rounded text-white">
        <!-- Rounded SVG Border--><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 17.34"
            preserveAspectRatio="none" fill="currentColor">
            <path d="M144.54,17.34H0V0H144.54ZM0,0S32.36,17.34,72.27,17.34,144.54,0,144.54,0" />
        </svg>
    </div>
</header>
<section class="bg-white py-10">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4">
                    <i data-feather="heart"></i>
                </div>
                <h3>Health assessments</h3>
                <p class="mb-0">
                    Regular Health assessments by best doctor in our country and
                    we provide consultancy anytime.
                </p>
            </div>
            <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4">
                    <i data-feather="activity"></i>
                </div>
                <h3>Home medicine review</h3>
                <p class="mb-0">
                    Have any confusion of your daily medicine? Please contact
                    with our doctor and you can use live chat to communicate
                    with doctor.
                </p>
            </div>
            <div class="col-lg-4">
                <div class="icon-stack icon-stack-xl bg-gradient-primary-to-secondary text-white mb-4">
                    <i data-feather="smartphone"></i>
                </div>
                <h3>Appointment & Ambulance</h3>
                <p class="mb-0">
                    We provide 24/7 online appointment booking and for any
                    emergency you can call Ambulance anytime.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection