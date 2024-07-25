@extends('layouts.app')

@section('content')
    <!-- Header -->
    <header id="header" class="header">
        <img class="decoration-star" src="assets/img/decoration-star.svg" alt="alternative">
        <img class="decoration-star-2" src="assets/img/decoration-star.svg" alt="alternative">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-xl-6">
                    <div class="text-container">
                        <h1 class="h1-large">Sistem Pakar Diagnosis ADHD</h1>
                        <p class="p-large">Sistem Pakar Diagnosis ADHD pada Anak - Identifikasi dan Evaluasi Gejala ADHD
                            dengan Akurat dan Mudah.<br>Cek Sekarang untuk Penanganan Tepat</p>
                        <a class="btn-solid-lg" href="{{ route('form-identitas') }}">Diagnosis Sekarang</a>
                    </div>
                </div>
                <div class="col-lg-5 col-xl-6">
                    <div class="image-container">
                        <img class="img-fluid" src="{{ asset('assets/img/header.png') }}" alt="ADHD">
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Statistics -->
    <div class="counter">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <!-- Counter -->
                    <div class="counter-container">
                        <div class="counter-cell">
                            <div data-purecounter-start="0" data-purecounter-end="231" data-purecounter-duration="3"
                                class="purecounter">1</div>
                            <div class="counter-info">Happy Customers</div>
                        </div>
                        <div class="counter-cell">
                            <div data-purecounter-start="0" data-purecounter-end="385" data-purecounter-duration="1.5"
                                class="purecounter">1</div>
                            <div class="counter-info">Issues Solved</div>
                        </div>
                        <div class="counter-cell">
                            <div data-purecounter-start="0" data-purecounter-end="159" data-purecounter-duration="3"
                                class="purecounter">1</div>
                            <div class="counter-info">Good Reviews</div>
                        </div>
                        <div class="counter-cell">
                            <div data-purecounter-start="0" data-purecounter-end="128" data-purecounter-duration="3"
                                class="purecounter">1</div>
                            <div class="counter-info">Case Studies</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Introduction -->
    <div id="introduction" class="basic-1 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-xl-9">
                    <h2>Creating office spaces is our passion and you can see that in our completed projects</h2>
                    <p>Unpleasing has ask acceptance partiality alteration understood two. Worth no tiled my at house
                        added. Married he hearing am it totally removal. Remove but suffer wanted his lively length.
                        Moonlight two applauded conveying end direction old principle but. Are expenses distance
                        weddings perceive</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Details 1 -->
    <div id="details" class="basic-2">
        <img class="decoration-star" src="assets/img/decoration-star.svg" alt="alternative">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-5">
                    <div class="image-container">
                        <img class="img-fluid" src="assets/img/details-1.png" alt="alternative">
                    </div>
                </div>
                <div class="col-lg-6 col-xl-7">
                    <div class="text-container">
                        <h2>Office spaces should be unique they don’t need to look the same</h2>
                        <ul class="list-unstyled li-space-lg">
                            <li class="d-flex">
                                <i class="fas fa-square"></i>
                                <div class="flex-grow-1">At every tiled on ye defer do. No attention suspected oh
                                    difficult. Fond his say</div>
                            </li>
                            <li class="d-flex">
                                <i class="fas fa-square"></i>
                                <div class="flex-grow-1">Old meet cold find come whom. The sir park sake bred. Wonder
                                    matter now</div>
                            </li>
                            <li class="d-flex">
                                <i class="fas fa-square"></i>
                                <div class="flex-grow-1">Can estate esteem assure fat roused. Am performed on existence
                                    as discourse</div>
                            </li>
                            <li class="d-flex">
                                <i class="fas fa-square"></i>
                                <div class="flex-grow-1">existence as discourse is. Pleasure friendly at marriage
                                    blessing or should</div>
                            </li>
                        </ul>
                        <a class="btn-solid-reg" href="article.html">Get started</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Services -->
    <div id="services" class="cards-1 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="text-container">
                        <h2>Services that we offer</h2>
                        <p>Greatly hearted has who believe. Drift allow green son walls years for blush. Sir margaret
                            drawings repeated recurred exercise laughing may you</p>
                        <p>Do repeated whatever to welcomed absolute no. Fat surprise although more words outlived</p>
                        <ul class="list-unstyled li-space-lg">
                            <li class="d-flex">
                                <i class="fas fa-square"></i>
                                <div class="flex-grow-1">And informed shy dissuade property. Musical by</div>
                            </li>
                            <li class="d-flex">
                                <i class="fas fa-square"></i>
                                <div class="flex-grow-1">He drawing savings an. No we stand avoid</div>
                            </li>
                            <li class="d-flex">
                                <i class="fas fa-square"></i>
                                <div class="flex-grow-1">Announcing of invita mrore wo tion principle</div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="card-container">

                        <!-- Card -->
                        <div class="card">
                            <div class="card-icon">
                                <span class="fas fa-rocket"></span>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Space analysis and planning</h5>
                            </div>
                        </div>

                        <!-- Card -->
                        <div class="card">
                            <div class="card-icon">
                                <span class="far fa-clock"></span>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Design and color choosing</h5>
                            </div>
                        </div>

                        <!-- Card -->
                        <div class="card">
                            <div class="card-icon">
                                <span class="far fa-comments"></span>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Materials and delivery</h5>
                            </div>
                        </div>

                        <!-- Card -->
                        <div class="card">
                            <div class="card-icon">
                                <span class="fas fa-tools"></span>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Execute the concept</h5>
                            </div>
                        </div>

                        <!-- Card -->
                        <div class="card">
                            <div class="card-icon">
                                <span class="fas fa-chart-pie"></span>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Creating great atmosphere</h5>
                            </div>
                        </div>

                        <!-- Card -->
                        <div class="card">
                            <div class="card-icon">
                                <span class="far fa-chart-bar"></span>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Evaluation and reporting</h5>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Details 2 -->
    <div class="basic-3">
        <img class="decoration-star" src="assets/img/decoration-star.svg" alt="alternative">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-7">
                    <div class="text-container">
                        <h2>A beautiful and well organized office space increases productivity</h2>
                        <p>On it differed repeated wandered required in. Then girl neat why yet knew rose spot. Moreover
                            property we he kindness greatest be oh striking laughter. In me he at collecting affronting
                            principles apartments. Has visitor law attacks pretend you calling own excited painted.
                            Contented attending</p>
                        <a class="btn-solid-reg" href="article.html">Get started</a>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-5">
                    <div class="image-container">
                        <img class="img-fluid" src="assets/img/details-2.png" alt="alternative">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Invitation -->
    <div class="basic-4 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4>Our team of highly skilled designers and interior construction workers can deliver above your
                        level of expections</h4>
                    <a class="btn-solid-lg" href="#contact">Get quote</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Projects -->
    <div id="projects" class="cards-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="h2-heading">Projects we developed</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">

                    <!-- Card -->
                    <div class="card">
                        <img class="img-fluid" src="assets/img/project-1.jpg" alt="alternative">
                        <div class="card-body">
                            <h5 class="card-title">Office space for banking</h5>
                            <p class="card-text">Suffer should if waited common person little ans words are needed oh
                                <a class="blue no-line" href="article.html">...Read more</a>
                            </p>
                        </div>
                    </div>

                    <!-- Card -->
                    <div class="card">
                        <img class="img-fluid" src="assets/img/project-2.jpg" alt="alternative">
                        <div class="card-body">
                            <h5 class="card-title">Planning and design for startup</h5>
                            <p class="card-text">In to am attended desirous raptures declared diverted confined at
                                collected <a class="blue no-line" href="article.html">...Read more</a></p>
                        </div>
                    </div>

                    <!-- Card -->
                    <div class="card">
                        <img class="img-fluid" src="assets/img/project-3.jpg" alt="alternative">
                        <div class="card-body">
                            <h5 class="card-title">Colors and materials update</h5>
                            <p class="card-text">Instantly remaining up certainly to necessary as over walk dull into
                                son <a class="blue no-line" href="article.html">...Read more</a></p>
                        </div>
                    </div>

                    <!-- Card -->
                    <div class="card">
                        <img class="img-fluid" src="assets/img/project-4.jpg" alt="alternative">
                        <div class="card-body">
                            <h5 class="card-title">Analysis and floor design</h5>
                            <p class="card-text">Vent new at or happiness commanded daughters as is handsome an <a
                                    class="blue no-line" href="article.html">...Read more</a></p>
                        </div>
                    </div>

                    <!-- Card -->
                    <div class="card">
                        <img class="img-fluid" src="assets/img/project-5.jpg" alt="alternative">
                        <div class="card-body">
                            <h5 class="card-title">Office spaces decoration</h5>
                            <p class="card-text">Vicinity subjects more words into miss on he over been late pain an
                                only <a class="blue no-line" href="article.html">...Read more</a></p>
                        </div>
                    </div>

                    <!-- Card -->
                    <div class="card">
                        <img class="img-fluid" src="assets/img/project-6.jpg" alt="alternative">
                        <div class="card-body">
                            <h5 class="card-title">Playground for kinder garden</h5>
                            <p class="card-text">Match round scale now sex style far times your me past and who now
                                much <a class="blue no-line" href="article.html">...Read more</a></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Testimonials -->
    <div class="slider-1 bg-gray">
        <img class="quotes-decoration" src="assets/img/quotes.svg" alt="alternative">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <!-- Card Slider -->
                    <div class="slider-container">
                        <div class="swiper-container card-slider">
                            <div class="swiper-wrapper">

                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <img class="testimonial-image" src="assets/img/testimonial-1.jpg" alt="alternative">
                                    <p class="testimonial-text">“Expense bed any sister depend changer off piqued one.
                                        Contented continued any happiness instantly objection yet her allowance. Use
                                        correct day new brought tedious. By come this been in. Kept easy or sons my it
                                        how about some words here done”</p>
                                    <div class="testimonial-author">Marlene Visconte</div>
                                    <div class="testimonial-position">General Manager - Scouter</div>
                                </div>

                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <img class="testimonial-image" src="assets/img/testimonial-2.jpg" alt="alternative">
                                    <p class="testimonial-text">“Expense bed any sister depend changer off piqued one.
                                        Contented continued any happiness instantly objection yet her allowance. Use
                                        correct day new brought tedious. By come this been in. Kept easy or sons my it
                                        how about some words here done”</p>
                                    <div class="testimonial-author">John Spiker</div>
                                    <div class="testimonial-position">Team Leader - Vanquish</div>
                                </div>

                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <img class="testimonial-image" src="assets/img/testimonial-3.jpg" alt="alternative">
                                    <p class="testimonial-text">“Expense bed any sister depend changer off piqued one.
                                        Contented continued any happiness instantly objection yet her allowance. Use
                                        correct day new brought tedious. By come this been in. Kept easy or sons my it
                                        how about some words here done”</p>
                                    <div class="testimonial-author">Stella Virtuoso</div>
                                    <div class="testimonial-position">Design Chief - Bikegirl</div>
                                </div>

                            </div>

                            <!-- Add Arrows -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Contact -->
    <div id="contact" class="form-1">
        <img class="decoration-star" src="assets/img/decoration-star.svg" alt="alternative">
        <img class="decoration-star-2" src="assets/img/decoration-star.svg" alt="alternative">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="image-container">
                        <img class="img-fluid" src="assets/img/contact.png" alt="alternative">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="text-container">
                        <h2>Contact us for a quote using the following form</h2>

                        <!-- Contact Form -->
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control-input" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control-input" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control-textarea" placeholder="Message" required></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control-submit-button">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
