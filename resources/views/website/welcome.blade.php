@extends('layouts.guest')
@section('styles')
@endsection

@section('content')
    <div class="slider-area position-relative">
        <div class="slider-active dot-style">
            @foreach ([['bgClass' => 'slider-bg1', 'title' => 'Transform Lives with Smart Giving', 'description' => 'Join us in making a difference. Donate smarter, impact greater.'], ['bgClass' => 'slider-bg2', 'title' => 'Empower Communities Through Giving', 'description' => 'Your contribution can create lasting change. Support initiatives that uplift communities and create opportunities for those in need.'], ['bgClass' => 'slider-bg3', 'title' => 'Champion Causes Close to Your Heart', 'description' => 'Be a voice for the voiceless. Help drive positive change for causes that matter to you, from health to education and beyond.']] as $slider)
                <div class="single-slider hero-overly {{ $slider['bgClass'] }} slider-height d-flex align-items-center">
                    <div class="container">
                        <div class="row {{ $loop->index % 2 === 0 ? '' : 'justify-content-end' }}">
                            <div class="col-xxl-6 col-xl-7 col-lg-7 col-md-8 col-sm-10">
                                <div class="hero-caption">
                                    <h1 data-animation="fadeInUp" data-delay=".2s">{{ $slider['title'] }}</h1>
                                    <p data-animation="fadeInUp" data-delay=".4s">{{ $slider['description'] }}</p>
                                    <a href="#" class="btn hero-btn" data-animation="fadeInUp" data-delay=".8s">Active
                                        Cases</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    <div class="services-area1 section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 col-sm-11">
                    <div class="section-tittle text-center mb-60">
                        <h2>Causes We Are Serving</h2>
                    </div>
                </div>
            </div>
            <div class="services1-active">
                @foreach ([
            ['img' => 'services-img1.jpg', 'title' => 'Protect Our Ecosystems', 'description' => 'Join us in preserving the environment for future generations. Support initiatives that protect forests, oceans, and wildlife. Your contribution makes a difference.', 'goal' => '$100,000', 'raised' => '$75,000'],
            ['img' => 'services-img2.jpg', 'title' => 'Give a Child a Future', 'description' => 'Help children in need by providing education, healthcare, and basic needs. A brighter future starts with your support. Sponsor a child today.', 'goal' => '$50,000', 'raised' => '$30,000'],
            ['img' => 'services-img3.jpg', 'title' => 'Support Senior Citizens', 'description' => 'Our elderly need care and companionship. Support programs that help senior citizens with healthcare, housing, and social services to live with dignity.', 'goal' => '$60,000', 'raised' => '$45,000'],
            ['img' => 'services-img2.jpg', 'title' => 'Protect Our Ecosystems', 'description' => 'Join us in preserving the environment for future generations. Support initiatives that protect forests, oceans, and wildlife. Your contribution makes a difference.', 'goal' => '$100,000', 'raised' => '$75,000'],
        ] as $service)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="properties pb-30">
                            <div class="properties-card">
                                <div class="properties-img">
                                    <a href="#"><img
                                            src="{{ asset('website/assets/img/gallery/' . $service['img']) }}" alt></a>

                                    <div class="single-skill">
                                        <div class="bar-progress">
                                            <div class="barfiller">
                                                <div class="tipWrap">
                                                    <span class="tip"></span>
                                                </div>
                                                <span class="fill" data-percentage="65"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wrap-wrapper">
                                    <div class="properties-caption">
                                        <h3><a href="#">{{ $service['title'] }}</a></h3>
                                        <p>{{ $service['description'] }}</p>
                                    </div>
                                    <div class="properties-footer d-flex justify-content-between align-items-center">
                                        <div class="class-day">
                                            <a href="#" class="btn">Donate</a>
                                        </div>
                                        <div class="class-day">
                                            <span class="color-font2">{{ $service['goal'] }}</span>
                                            <p>Goal</p>
                                        </div>
                                        <div class="class-day">
                                            <span class="color-font1">{{ $service['raised'] }}</span>
                                            <p>Raised</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <div class="support-company-area section-padding">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-6 col-lg-6 col-md-10">
                    <div class="support-location-img">
                        <img src="{{ asset('website/assets/img/gallery/about.jpg') }}" alt>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 col-md-10">
                    <div class="right-caption">

                        <div class="section-tittle">
                            <h2>Who we are?</h2>
                        </div>
                        <div class="support-caption">
                            <p class="mb-10">
                                JKUAT Red Cross is committed to supporting communities through food, medical aid,
                                and essentials. Our smart donation platform uses technology to enhance donor
                                engagement and maximize impact.
                            </p>
                            <p class="pera-top">

                            </p>
                            <a href="about" class="btn about-btn">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="count-down-area pt-25 section-img-bg2 bg-primary"
        data-background="{{ asset('/website/assets/img/gallery/services-img1.jpg') }}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12">
                    <div class="count-down-wrapper">
                        <div class="row justify-content-between">
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="single-counter d-flex align-items-center">
                                    <div class="counter-img">
                                        <img src="{{ asset('website/assets/img/icon/count-icon1.svg') }}" alt>
                                    </div>
                                    <div class="captions">
                                        <span class="counter">10000</span>
                                        <span class="plus">+</span>
                                        <p class="color-green">Beneficiaries</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="single-counter d-flex align-items-center">
                                    <div class="counter-img">
                                        <img src="{{ asset('website/assets/img/icon/count-icon2.svg') }}" alt>
                                    </div>
                                    <div class="captions">
                                        <span class="counter">1000</span>
                                        <span class="plus">m</span>
                                        <p class="color-green">Volunteers</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="single-counter d-flex align-items-center">
                                    <div class="counter-img">
                                        <img src="{{ asset('website/assets/img/icon/count-icon3.svg') }}" alt>
                                    </div>
                                    <div class="captions">
                                        <span class="counter">5</span>
                                        <span class="plus">m</span>
                                        <p class="color-green">Years Of impact</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="single-counter d-flex align-items-center">
                                    <div class="counter-img">
                                        <img src="{{ asset('website/assets/img/icon/count-icon4.svg') }}" alt>
                                    </div>
                                    <div class="captions">
                                        <span class="counter">3</span>
                                        <p class="color-green">Countries Benefited</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="our-services section-padding position-relative">
        <div class="container">
            <div class="row justify-content-sm-center">
                <div class="col-xl-7 col-lg-8 col-md-11">

                    <div class="section-tittle text-center mb-70">
                        <h2>We serve for peoples</h2>
                        <p>
                            We are committed to supporting communities through food, medical aid, and essentials.
                            Our smart donation platform uses technology to enhance donor engagement and maximize
                            impact.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between">
                <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                    <div class="single-services text-center mb-30">
                        <div class="services-icon">
                            <img src="{{ asset('website/assets/img/icon/services1.svg') }}" alt>
                        </div>
                        <div class="services-cap">
                            <h5><a href="#">Pure Food & Water</a></h5>
                            <p>
                                Your donation towards pure food and water can make a significant impact on the lives
                                of those in need. By contributing, you help provide essential resources to
                                communities struggling with food insecurity and lack of clean water. Every donation
                                ensures that families receive nutritious meals and access to safe drinking water,
                                promoting better health and well-being. Join us in our mission to combat hunger and
                                provide sustainable solutions for clean water, making a lasting difference in the
                                lives of countless individuals.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                    <div class="single-services text-center mb-30">
                        <div class="services-icon">
                            <img src="{{ asset('website/assets/img/icon/services2.svg') }}" alt>
                        </div>
                        <div class="services-cap">
                            <h5><a href="#">Health & Medicine</a></h5>
                            <p>
                                Your donation towards health and medicine can help save lives and improve the
                                well-being of individuals in need. By contributing, you support access to essential
                                medical care, medications, and health services for communities facing health
                                challenges. Your donation can provide critical resources for medical facilities,
                                health programs, and emergency response efforts, ensuring that individuals receive
                                the care they need to thrive. Join us in our mission to promote health and
                                well-being for all, making a positive impact on the lives of those who need it most.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                    <div class="single-services text-center mb-30">
                        <div class="services-icon">
                            <img src="{{ asset('website/assets/img/icon/services1.svg') }}" alt>
                        </div>
                        <div class="services-cap">
                            <h5><a href="#">Education Fee</a></h5>
                            <p>
                                Your donation towards education fees can help provide access to quality education
                                for children and youth in need. By contributing, you support scholarships, school
                                supplies, and educational programs that empower individuals to reach their full
                                potential. Your donation can make a difference in the lives of students, helping
                                them achieve academic success and build a brighter future. Join us in our mission to
                                promote education and learning for all, making a lasting impact on the lives of
                                those who need it most.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="emargency-care section-img-bg2"
        data-background="{{ asset('website/assets/img/gallery/section-bg2.jpg') }}">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-xl-6 col-lg-8 col-md-9 col-sm-12">
                    <div class="single-emargency">
                        <div class="emargency-cap">
                            <h5><a href="#">They need your help</a></h5>
                            <p>
                                Your donation can make a difference in the lives of those affected by emergencies
                                and disasters. By contributing, you support emergency response efforts, relief
                                programs, and recovery initiatives that provide critical resources to communities in
                                crisis. Your donation can help save lives, rebuild communities, and restore hope for
                                those facing emergencies. Join us in our mission to provide emergency care and
                                support for those in need, making a positive impact on the lives of individuals
                                affected by disasters.
                            </p>
                            <p class="emargenc-cap">
                                <i class="fas fa-phone-alt"></i> +254 71234568
                            </p>
                            <a href="#" class="btn loan-btn">Donate in a Case</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="join-us-area section-padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-4 col-lg-5 col-md-10">
                    <div class="joing-details">
                        <div class="section-tittle">
                            <h2>Join with Us</h2>
                        </div>
                        <p>The legal definition of a charitable organization (and of charity) varies between
                            countries and in some
                            instances regions of the country. The regulation, the tax treatment, and the way.</p>
                        <a href="about.html" class="btn about-btn">Join Now</a>
                    </div>
                </div>
                <div class="offset-xl-1 col-xl-4 col-lg-4 col-md-7 col-sm-7">
                    <div class="joning-img">
                        <img src="{{ asset('website/assets/img/gallery/joining1.jpg') }}" alt class="w-100">
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-5 col-sm-5">
                    <div class="joning-img">
                        <img src="{{ asset('website/assets/img/gallery/joining2.jpg') }}" alt class="w-100">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
