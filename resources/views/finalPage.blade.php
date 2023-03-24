<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('assets/frontend') }}/css/theme.css">
    <script src="{{ url('assets/frontend') }}/js/popper.min.js"></script>
    <script src="{{ url('assets/frontend') }}/js/smoothscroll.min.js"></script>
    <link rel="stylesheet" href="{{ url('assets/frontend') }}/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/fontawesome.min.css" integrity="sha512-cHxvm20nkjOUySu7jdwiUxgGy11vuVPE9YeK89geLMLMMEOcKFyS2i+8wo0FOwyQO/bL8Bvq1KMsqK4bbOsPnA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <title>Optimum Foodie</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: #212121;
        }

        /* .loader {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(45deg);
            width: 100px;
            height: 100px;
            animation: animate 1s linear infinite;
        } */

        .main-loader .textp {
            color: #fff;
            text-align: center;
            position: absolute;
            top: 42%;
            left: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            text-transform: lowercase;
            font-weight: 500;
            font-size: 16px;
            font-family: 'Be Vietnam Pro', sans-serif;
            letter-spacing: 0.2px;
            animation: text-animation76 3.6s ease infinite;

        }

        @keyframes text-animation76 {
            0% {
                clip-path: inset(0 100% 0 0);
            }

            50% {
                clip-path: inset(0);
            }

            100% {
                clip-path: inset(0 0 0 100%);
            }
        }

        /* .loader-item {
            position: absolute;
            width: 50px;
            height: 50px;
            background: #f00;
            box-shadow: 2px 2px 5px 1px #000;
            animation: rotate 1s linear infinite;
        }

        .loader-item_1 {
            top: 0;
            left: 0;
            background: #f79f1f;
        }

        .loader-item_2 {
            top: 0;
            right: 0;
            background: #12cbc4;
        }

        .loader-item_3 {
            bottom: 0;
            left: 0;
            background: #ed4c67;
        }

        .loader-item_4 {
            bottom: 0;
            right: 0;
            background: #a3cb38;
        } */

        /* .alert-styling {
            width: 50%;
            padding: 20px;
            text-align: center;
            align-self: center;
            position: absolute;
            top: 50%;
            left: 25%;
        }

        .logout-style {
            position: fixed;
            right: 1%;
            top: 2%;
        }

        @keyframes animate {
            0% {
                width: 100px;
                height: 100px;
            }

            10% {
                width: 100px;
                height: 100px;
            }

            50% {
                width: 150px;
                height: 150px;
            }

            90% {
                width: 100px;
                height: 100px;
            }

            100% {
                width: 100px;
                height: 100px;
            }
        }

        @keyframes rotate {
            0% {
                transform: rotate(0deg);
            }

            10% {
                transform: rotate(0deg);
            }

            60% {
                transform: rotate(90deg);
            }

            90% {
                transform: rotate(90deg);
            }

            100% {
                transform: rotate(90deg);
            }
        } */
        .alert-styling {
            width: 50%;
            padding: 20px;
            text-align: center;
            align-self: center;
            position: absolute;
            top: 50%;
            left: 25%;
        }

        .logout-style {
            position: fixed;
            right: 1%;
            top: 2%;
        }

        .typewriter {
            --blue: #5C86FF;
            --blue-dark: #275EFE;
            --key: #fff;
            --paper: #EEF0FD;
            --text: #D3D4EC;
            --tool: #FBC56C;
            --duration: 3s;
            /* position: relative; */
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-animation: bounce05 var(--duration) linear infinite;
            animation: bounce05 var(--duration) linear infinite;
        }

        .typewriter .slide {
            width: 92px;
            height: 20px;
            border-radius: 3px;
            margin-left: 14px;
            transform: translateX(14px);
            background: linear-gradient(var(--blue), var(--blue-dark));
            -webkit-animation: slide05 var(--duration) ease infinite;
            animation: slide05 var(--duration) ease infinite;
        }

        .typewriter .slide:before,
        .typewriter .slide:after,
        .typewriter .slide i:before {
            content: "";
            position: absolute;
            background: var(--tool);
        }

        .typewriter .slide:before {
            width: 2px;
            height: 8px;
            top: 6px;
            left: 100%;
        }

        .typewriter .slide:after {
            left: 94px;
            top: 3px;
            height: 14px;
            width: 6px;
            border-radius: 3px;
        }

        .typewriter .slide i {
            display: block;
            position: absolute;
            right: 100%;
            width: 6px;
            height: 4px;
            top: 4px;
            background: var(--tool);
        }

        .typewriter .slide i:before {
            right: 100%;
            top: -2px;
            width: 4px;
            border-radius: 2px;
            height: 14px;
        }

        .typewriter .paper {
            position: absolute;
            left: 24px;
            top: -26px;
            width: 40px;
            height: 46px;
            border-radius: 5px;
            background: var(--paper);
            transform: translateY(46px);
            -webkit-animation: paper05 var(--duration) linear infinite;
            animation: paper05 var(--duration) linear infinite;
        }

        .typewriter .paper:before {
            content: "";
            position: absolute;
            left: 6px;
            right: 6px;
            top: 7px;
            border-radius: 2px;
            height: 4px;
            transform: scaleY(0.8);
            background: var(--text);
            box-shadow: 0 12px 0 var(--text), 0 24px 0 var(--text), 0 36px 0 var(--text);
        }

        .typewriter .keyboard {
            width: 120px;
            height: 56px;
            margin-top: -10px;
            z-index: 1;
            position: relative;
        }

        .typewriter .keyboard:before,
        .typewriter .keyboard:after {
            content: "";
            position: absolute;
        }

        .typewriter .keyboard:before {
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border-radius: 7px;
            background: linear-gradient(135deg, var(--blue), var(--blue-dark));
            transform: perspective(10px) rotateX(2deg);
            transform-origin: 50% 100%;
        }

        .typewriter .keyboard:after {
            left: 2px;
            top: 25px;
            width: 11px;
            height: 4px;
            border-radius: 2px;
            box-shadow: 15px 0 0 var(--key), 30px 0 0 var(--key), 45px 0 0 var(--key), 60px 0 0 var(--key), 75px 0 0 var(--key), 90px 0 0 var(--key), 22px 10px 0 var(--key), 37px 10px 0 var(--key), 52px 10px 0 var(--key), 60px 10px 0 var(--key), 68px 10px 0 var(--key), 83px 10px 0 var(--key);
            -webkit-animation: keyboard05 var(--duration) linear infinite;
            animation: keyboard05 var(--duration) linear infinite;
        }

        @keyframes bounce05 {

            85%,
            92%,
            100% {
                transform: translateY(0);
            }

            89% {
                transform: translateY(-4px);
            }

            95% {
                transform: translateY(2px);
            }
        }

        @keyframes slide05 {
            5% {
                transform: translateX(14px);
            }

            15%,
            30% {
                transform: translateX(6px);
            }

            40%,
            55% {
                transform: translateX(0);
            }

            65%,
            70% {
                transform: translateX(-4px);
            }

            80%,
            89% {
                transform: translateX(-12px);
            }

            100% {
                transform: translateX(14px);
            }
        }

        @keyframes paper05 {
            5% {
                transform: translateY(46px);
            }

            20%,
            30% {
                transform: translateY(34px);
            }

            40%,
            55% {
                transform: translateY(22px);
            }

            65%,
            70% {
                transform: translateY(10px);
            }

            80%,
            85% {
                transform: translateY(0);
            }

            92%,
            100% {
                transform: translateY(46px);
            }
        }

        @keyframes keyboard05 {

            5%,
            12%,
            21%,
            30%,
            39%,
            48%,
            57%,
            66%,
            75%,
            84% {
                box-shadow: 15px 0 0 var(--key), 30px 0 0 var(--key), 45px 0 0 var(--key), 60px 0 0 var(--key), 75px 0 0 var(--key), 90px 0 0 var(--key), 22px 10px 0 var(--key), 37px 10px 0 var(--key), 52px 10px 0 var(--key), 60px 10px 0 var(--key), 68px 10px 0 var(--key), 83px 10px 0 var(--key);
            }

            9% {
                box-shadow: 15px 2px 0 var(--key), 30px 0 0 var(--key), 45px 0 0 var(--key), 60px 0 0 var(--key), 75px 0 0 var(--key), 90px 0 0 var(--key), 22px 10px 0 var(--key), 37px 10px 0 var(--key), 52px 10px 0 var(--key), 60px 10px 0 var(--key), 68px 10px 0 var(--key), 83px 10px 0 var(--key);
            }

            18% {
                box-shadow: 15px 0 0 var(--key), 30px 0 0 var(--key), 45px 0 0 var(--key), 60px 2px 0 var(--key), 75px 0 0 var(--key), 90px 0 0 var(--key), 22px 10px 0 var(--key), 37px 10px 0 var(--key), 52px 10px 0 var(--key), 60px 10px 0 var(--key), 68px 10px 0 var(--key), 83px 10px 0 var(--key);
            }

            27% {
                box-shadow: 15px 0 0 var(--key), 30px 0 0 var(--key), 45px 0 0 var(--key), 60px 0 0 var(--key), 75px 0 0 var(--key), 90px 0 0 var(--key), 22px 12px 0 var(--key), 37px 10px 0 var(--key), 52px 10px 0 var(--key), 60px 10px 0 var(--key), 68px 10px 0 var(--key), 83px 10px 0 var(--key);
            }

            36% {
                box-shadow: 15px 0 0 var(--key), 30px 0 0 var(--key), 45px 0 0 var(--key), 60px 0 0 var(--key), 75px 0 0 var(--key), 90px 0 0 var(--key), 22px 10px 0 var(--key), 37px 10px 0 var(--key), 52px 12px 0 var(--key), 60px 12px 0 var(--key), 68px 12px 0 var(--key), 83px 10px 0 var(--key);
            }

            45% {
                box-shadow: 15px 0 0 var(--key), 30px 0 0 var(--key), 45px 0 0 var(--key), 60px 0 0 var(--key), 75px 0 0 var(--key), 90px 2px 0 var(--key), 22px 10px 0 var(--key), 37px 10px 0 var(--key), 52px 10px 0 var(--key), 60px 10px 0 var(--key), 68px 10px 0 var(--key), 83px 10px 0 var(--key);
            }

            54% {
                box-shadow: 15px 0 0 var(--key), 30px 2px 0 var(--key), 45px 0 0 var(--key), 60px 0 0 var(--key), 75px 0 0 var(--key), 90px 0 0 var(--key), 22px 10px 0 var(--key), 37px 10px 0 var(--key), 52px 10px 0 var(--key), 60px 10px 0 var(--key), 68px 10px 0 var(--key), 83px 10px 0 var(--key);
            }

            63% {
                box-shadow: 15px 0 0 var(--key), 30px 0 0 var(--key), 45px 0 0 var(--key), 60px 0 0 var(--key), 75px 0 0 var(--key), 90px 0 0 var(--key), 22px 10px 0 var(--key), 37px 10px 0 var(--key), 52px 10px 0 var(--key), 60px 10px 0 var(--key), 68px 10px 0 var(--key), 83px 12px 0 var(--key);
            }

            72% {
                box-shadow: 15px 0 0 var(--key), 30px 0 0 var(--key), 45px 2px 0 var(--key), 60px 0 0 var(--key), 75px 0 0 var(--key), 90px 0 0 var(--key), 22px 10px 0 var(--key), 37px 10px 0 var(--key), 52px 10px 0 var(--key), 60px 10px 0 var(--key), 68px 10px 0 var(--key), 83px 10px 0 var(--key);
            }

            81% {
                box-shadow: 15px 0 0 var(--key), 30px 0 0 var(--key), 45px 0 0 var(--key), 60px 0 0 var(--key), 75px 0 0 var(--key), 90px 0 0 var(--key), 22px 10px 0 var(--key), 37px 12px 0 var(--key), 52px 10px 0 var(--key), 60px 10px 0 var(--key), 68px 10px 0 var(--key), 83px 10px 0 var(--key);
            }
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p {
            font-family: 'Be Vietnam Pro', sans-serif;
        }

        .left-firststyle {
            border: 1px solid;
        }

        .left-firststyle h3 {
            text-align: center;
            padding: 20px 20px;
            margin-top: 20px;
        }

        .left-firststyle .divvvv {
            font-family: 'Be Vietnam Pro', sans-serif;
            text-align: center;
            padding: 20px 20px;
            margin-top: 50px;
        }

        .meailplanpart {
            /* background-color: #d0d0d0; */
            display: flex;
            justify-content: center;
            height: 430px;
        }
    </style>
</head>

<body>
    @if(Session::get('time'))
    <div class="alert alert-{{Session::get('alert')}} alert-styling" role="alert">
        {{Session::get('message')}}
    </div>
    @else
    <div class="main-loader">
        <!-- <h2>Creating meal plan...........</h2>
        <div class="loader">
            <div class="loader-item loader-item_1"></div>
            <div class="loader-item loader-item_2"></div>
            <div class="loader-item loader-item_3"></div>
            <div class="loader-item loader-item_4"></div>
        </div> -->
        <p class="textp">Creating meal plan....</p>
        <!-- <div class="textp" data-text="Creating meal plan..."></div> -->
        <div class="typewriter">
            <div class="slide"><i></i></div>
            <div class="paper"></div>
            <div class="keyboard"></div>
        </div>

    </div>
    @endif


    <div class="main" style="display: none;">
        @if(isset(Auth::user()->email))
        <div class="logout-style">
            <a class="btn btn-primary" style="background: #ed4c67; width:100px; border-color: #ed4c67;" href="{{ url('/logout') }}">Logout</a>
        </div>
        @endif
        <section class="hero-section mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12" style="text-align: center;">
                        <p class="subheadline" style="font-weight: 100; font-family: 'Be Vietnam Pro', sans-serif;">What you eat on a daily basis is the most important aspect to getting the body you’ve always wanted</p>
                        <h1 class="headline mb-3">
                            FINALLY GET THE BODY <br>YOU’VE BEEN WISHING FOR
                        </h1>
                    </div>
                    <div class="col-12 col-md-6 align-self-center" style="height: 560px;">
                        <div class="promo left-firststyle" style="height: 440px;">
                            <!--//headline-->
                            <h3>Without Ever Needing To Step In A GYM Or Give Up The Nigerian Meals You Enjoy!</h3>
                            <div class="subheadline mb-4 divvvv">
                                Get access to your own customized meal timetable! Specially created based for YOU based on your food likes, health and fitness goals, daily schedule, food allergies and so on!
                            </div><!--//subheading-->

                            <!-- <div class="cta-holder row gx-md-3 gy-3 gy-md-0">
                            <div class="col-12 col-md-auto">
                                <a class="btn btn-primary w-100" href="https://themes.3rdwavemedia.com/bootstrap-templates/startup/devbook-free-bootstrap-5-book-ebook-landing-page-template-for-developers/">Buy for $29</a>
                            </div>
                            <div class="col-12 col-md-auto">
                                <a class="btn btn-secondary scrollto w-100" href="#benefits-section">Learn More</a>
                            </div>
                        </div>//cta-holder -->

                            <!-- <div class="hero-quotes mt-5">
                                <div class="container">
                                    <h2 class="text-center">Progress report</h2>
                                    <div class="row">
                                        <div class="col-12 col-md-4">
                                            <div>
                                                <img src="{{ url('assets/frontend/images/cmpw1.png') }}" class="img-responsive" width="100%" />
                                            </div>

                                        </div>
                                        <div class="col-12 col-md-4">
                                            <img src="{{ url('assets/frontend/images/cmpw3.png') }}" class="img-responsive" width="100%" />
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <img src="{{ url('assets/frontend/images/cmpw3.jpeg') }}" class="img-responsive" width="100%" />
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div><!--//promo-->
                    </div><!--col-->
                    <div class="col-12 col-md-6 mb-5 align-self-center">
                        <div class="book-cover-holder">
                            <iframe width="550" height="445" src="https://www.youtube.com/embed/iiEK6csjMYo">
                            </iframe>
                        </div><!--//book-cover-holder-->
                        <div class="text-center" style="font-family: 'Be Vietnam Pro', sans-serif;">A custom-made plan provides you with specific details of what to eat, how much to eat, and even if you can’t cook or travel a lot, we guide you on exactly what to buy at restaurants around you! </div>
                    </div><!--col-->
                </div><!--//row-->
            </div><!--//container-->
        </section><!--//hero-section-->

        <section id="content-section" class="content-section mt-5">
            <div class="" style="background-color: #d0d0d0;">
                <div class="container mt-5">
                    <div class="single-col-max mx-auto">

                        <div class="row">
                            <div class="col-12 col-md-12 mb-5 mt-5">
                                <div class="key-points mb-4 text-center">
                                    <h1 class="section-heading text-center mb-5" style="font-weight: 900;">Does this sound familiar?</h1>
                                    <ul class="key-points-list list-unstyled mb-4 mx-auto d-inline-block text-start">
                                        <li><i class="fa fa-check-circle me-2"></i>You only eat may be once or twice a day....</li>
                                        <li><i class="fa fa-check-circle me-2"></i>You exercise 3, 4, 5 times a week, may be even lift weights.</li>
                                        <li><i class="fa fa-check-circle me-2"></i>You are religiously taking your lemon water or apple cider vinegar or slimming tea....</li>
                                        <li><i class="fa fa-check-circle me-2"></i>You've started eating healthier, including more fruits, healthier swaps from coconut flour to couscous.</li>
                                        <li><i class="fa fa-check-circle me-2"></i>In fact, you've painstakingly stopped eating past 7pm, still nothing is happening! You can't see the results of your labour. . </li>
                                        <li><i class="fa fa-check-circle me-2"></i>Kindle curabitur fermentum.</li>
                                        <li><i class="fa fa-check-circle me-2"></i>Kindle curabitur fermentum.</li>
                                        <li><i class="fa fa-check-circle me-2"></i>Kindle curabitur fermentum.</li>
                                    </ul>

                                </div>

                            </div><!--//col-12-->
                        </div><!--//row-->
                    </div><!--//single-col-max-->
                </div><!--//container-->
            </div>

        </section><!--//content-section-->

        <section>
            <div class="meailplanpart">
                <div class="">
                    <div class="" style="padding: 20px 20px;">
                        <p class="text-center" style="font-size: 20px;">Here’s the thing, when it comes to getting fitness results, <br> your diet is KING! This right here is what has made the difference between frustration and absolute success for my clients!</p>
                    </div>
                    <p class="mt-3 text-center" style="font-size: 20px;">And the awesome news is that <b> you don’t have to stop eating your eba, rice, bread, beans and so on to get amazing results! <br> </b> You can eat all your fave Nigerian meals and still crush your body goals!</p>
                    <div class="text-center" style=" justify-content: space-between; display: flex; margin-top: 100px;">
                        @if ($userDetails['status']== 'free')
                        <form action="{{ url('sendmail') }}" method="post" style="width: 50%;">
                            {!! csrf_field() !!}
                            <input type="hidden" name="userId" value="{{$userDetails['id']}}">
                            <input type="hidden" name="cusType" value="{{$userDetails['status']}}">
                            <button type="submit" class="btn btn-primary" style="width: 90%; margin-right: 15px; background-color:#000; border-color:#000; font-family: 'Be Vietnam Pro', sans-serif; height: 50px;">Get FREE Meal Plan</button>
                        </form>

                        <form id="paymentForm" style="width: 50%;">
                            <input type="hidden" id="name" name="name" value="{{$userDetails['name']}}" placeholder="Name:">
                            <input type="hidden" id="email-address" name="email-address" value="{{$userDetails['email']}}" placeholder="Email:" required>
                            <input type="hidden" id="amount" name="amount" placeholder="Amount:" value="20000" required>
                            <button type="submit" onclick="payWithPaystack(event)" class="btn btn-primary" style="width: 90%; background-color:#ff0000;  border-color:#ff0000;  font-family: 'Be Vietnam Pro', sans-serif; height: 50px;">Get FULL Meal Plan</button>
                            <p id="success-div" style="display:none;">Your complete meal plan has been sent to your mail</p>
                            <p style="color:#FF9494; display: none;" id="error-div">Please contact us to make complain. <a href="mailto:support@cmp.com" target="_blank">Contant us</a></p>
                        </form>

                        @else
                        <form action="{{ url('sendmail') }}" method="post" style="width: 100%;">
                            {!! csrf_field() !!}
                            <input type="hidden" name="userId" value="{{$userDetails['id']}}">
                            <input type="hidden" name="cusType" value="{{ $userDetails['status']}}">
                            <button type="submit" class="btn btn-primary" style="width: 70%; background-color:#ff0000; border-color:#ff0000; height: 50px;">Get Meal Plan</button>
                        </form>
                        @endif

                    </div>
                </div>


            </div>

        </section>

        <section id="reviews-section" class="reviews-section py-5" style="background-color: #d0d0d0;">
            <div class="container">
                <h2 class="section-heading text-center">Review</h2>
                <div class="section-intro text-center single-col-max mx-auto mb-5 ">
                    <h4>Hear from Nigerian Nutrition Expert!</h4>
                </div>
                <div class="row justify-content-center">
                    <div class="item col-12 col-lg-6 col-md-6 p-3 mb-4">
                        <div class="item-inner theme-bg-light rounded p-4">

                            <blockquote class="quote" style="font-family: 'Be Vietnam Pro', sans-serif;">
                                "
                                I’m Odunayo Abdulai, a pharmacist, and US certified integrative nutrition coach! <b> I specialise in helping individuals like you smash their fitness goals eating the Nigerian meals they love!</b>

                                And today I’m bringing my years of experience to <b>help you create a meal timetable that’s as unique as you are!</b> That makes sense for your schedule, your food likes and your specific health and fitness goals!

                                But before I create yours, I want to tell the backstory of how I started creating them for my clients…
                            </blockquote>
                            <blockquote class="quote mt-4">
                                <b>I’ve spent OVER 4 YEARS researching, practicing and honing the skills that have made my meal plans so result driven! </b>

                                Years ago, I started getting conscious about my belly, I hated how my clothes fit

                                At first, I’ll just suck belle, but damn, it was not enough…

                                Then one day my ex makes this “not so funny” joke about me looking pregnant"

                                <h5 class="mt-3" style="color:#4c527d;">“Arrrrghhh” that was it! Something had to be done!</h5>


                                So the first thing I did…

                                <b>I worked out like crazy,</b> I was doing at least 45min, 6 times a week!

                                <b>I tried to fix my diet,</b> started including more fruits in general, then I added yoghurt too, threw in some sandwiches as well.

                                <h4 class="mt-3" style="color:#4c527d;">But you see, after 15 months of not getting results I was fed up. I had given it my all, what was going on?</h4>
                                That’s where the journey to me becoming the Calorie Queen started!

                                <div class="icon-holder"><i class="fa fa-quote-right"></i></div>
                        </div><!--//inner-->
                    </div><!--//item-->
                    <div class="item col-12 col-lg-6 col-md-6 p-3 mb-4">
                        <div class="item-inner theme-bg-light rounded p-4">
                            <blockquote class="quote mt-4">
                                <h5 class="text-center" style="color:#4c527d;">I found out my biggest mistake ever!</h5>
                                <b>My diet was whack! </b>

                                I discovered that I was not achieving something a CALORIE DEFICIT!

                                Simply put, I was eating too many calories - and apparently, if you are consuming more calories than your body needs… <b>You’ll NEVER GET RESULTS </b>. There’s no magic you want to do.

                                <b>It was honestly that simple!</b>

                                <h6 class="mt-3" style="color: #4c527d;">MY MIND WAS BLOWN!</h6>
                                <b>I could totally see why I had been struggling </b> and became so obsessed with nutrition and later became a US certified nutrition coach.

                                Since then<b> I’ve perfected the process using Nigerian foods,</b> and even used it to <b> my dad reverse his pre-diabetes!</b> And his blood sugar has been normal ever since!

                                This meal plan I’ll create for you will become your one stop for everything regarding your diet.

                                You share your goals with me, <b>tell me the specific foods you enjoy eating,</b> and I’ll tell you exactly how to cook them and <b>how much to eat.</b> And that<b> includes snack time too!</b>

                                I’m giving sharing the opportunity to reach your body goals, <b>along with the freedom to eat the foods you actually like, without ever stepping in a gym!</b>

                                <ul class="mt-3">
                                    <li><i class="fa fa-check-circle me-2"></i> <b>Don’t</b> make the same mistakes I did</li>
                                    <li><i class="fa fa-check-circle me-2"></i> <b>Don’t</b> mscramble around wondering what is wrong, or what to do</li>
                                    <li><i class="fa fa-check-circle me-2"></i> <b>Don’t</b> waste precious time figuring out all the details</li>

                                </ul>
                                Let me help you achieve your fitness and health goals

                                I’ll see you on the inside."
                            </blockquote>
                            <div class="source row gx-md-3 gy-3 gy-md-0">
                                <div class="col-12 col-md-auto source-info text-center text-md-start">
                                    <div class="source-name">Odunayo Abdulai</div>
                                    <div class="soure-title">Your Nigerian Nutrition Expert!</div>
                                </div><!--//col-->
                            </div><!--//source-->
                            <div class="icon-holder"><i class="fa fa-quote-right"></i></div>
                        </div><!--//inner-->
                    </div><!--//item-->
                </div><!--//row-->
            </div><!--//container-->
        </section><!--//reviews-section-->
        <section id="benefits-section" class="benefits-section theme-bg-light-gradient py-5">
            <div class="container py-5">
                <h2 class="section-heading text-center mb-3">Here’s everything waiting for you when you order your own Meal Plan:</h2>
                <div class="section-intro single-col-max mx-auto text-center mb-5">Section intro goes here. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer blandit consequat consequat. Orci varius natoque penatibus et magnis. </div>
                <div class="row text-center">
                    <div class="item col-12 col-md-6 col-lg-4">
                        <div class="item-inner p-3 p-lg-4">
                            <div class="item-header mb-3">
                                <div class="item-icon"> <i class="fa fa-cutlery"></i></div>

                                <div class="item-desc">
                                    A new meal timetable every 2 weeks with new meal options to keep things interesting, and ensure you are consistently making progress
                                </div>
                            </div><!--//item-heading-->
                        </div><!--//item-inner-->
                    </div><!--//item-->
                    <div class="item col-12 col-md-6 col-lg-4">
                        <div class="item-inner p-3 p-lg-4">
                            <div class="item-header mb-3">
                                <div class="item-icon"><i class="fa fa-lemon-o"></i></div>
                                <div class="item-desc">
                                    Your plan will specifically help you with your problem areas, for example your belly, if you are hypertensive or diabetic, your meal plan will do wonders in helping you get them under control!
                                </div>

                            </div><!--//item-heading-->
                        </div><!--//item-inner-->
                    </div><!--//item-->
                    <div class="item col-12 col-md-6 col-lg-4">
                        <div class="item-inner p-3 p-lg-4">
                            <div class="item-header mb-3">
                                <div class="item-icon"><i class="fa fa-cutlery"></i></div>
                                <div class="item-desc">
                                    Breakfast, lunch, dinner and snack options (or whatever other meal schedule works for you, for example, some people don’t do breakfast!)
                                </div>
                            </div><!--//item-heading-->
                        </div><!--//item-inner-->
                    </div><!--//item-->
                    <div class="item col-12 col-md-6 col-lg-4">
                        <div class="item-inner p-3 p-lg-4">
                            <div class="item-header mb-3">
                                <div class="item-icon"><i class="fa fa-users"></i></div>
                                <div class="item-desc">
                                    Tasty Nigerian meal options with details on how much of each food item to have
                                </div>
                            </div><!--//item-heading-->
                        </div><!--//item-inner-->
                    </div><!--//item-->
                    <div class="item col-12 col-md-6 col-lg-4">
                        <div class="item-inner p-3 p-lg-4">
                            <div class="item-header mb-3">
                                <div class="item-icon"><i class="fa fa-step-forward"></i></div>

                                <div class="item-desc">
                                    Step-by-step recipe guide to help you eliminate any guess-work
                                </div>
                            </div><!--//item-heading-->
                        </div><!--//item-inner-->
                    </div><!--//item-->
                    <div class="item col-12 col-md-6 col-lg-4">
                        <div class="item-inner p-3 p-lg-4">
                            <div class="item-header mb-3">
                                <div class="item-icon"><i class="fa fa-arrows-alt"></i></div>

                                <div class="item-desc">
                                    Our Eat out guide to help you stay on track even when you are on the move or travelling
                                </div>
                            </div><!--//item-heading-->
                        </div><!--//item-inner-->
                    </div><!--//item-->
                    <div class="item col-12 col-md-6 col-lg-4">
                        <div class="item-inner p-3 p-lg-4">
                            <div class="item-header mb-3">
                                <div class="item-icon"><i class="fa fa-glass"></i></div>
                                <div class="item-desc">
                                    The list won’t be complete if I don’t ...guide you on your alcohol consumption for those night’s out with the girls and guys! So I’ll be helping you lay down simple rules to ensure your nights out don’t sabotage your results!
                                </div>
                            </div><!--//item-heading-->
                        </div><!--//item-inner-->
                    </div><!--//item-->
                    <div class="item col-12 col-md-6 col-lg-4">
                        <div class="item-inner p-3 p-lg-4">
                            <div class="item-header mb-3">
                                <div class="item-icon"><i class="fa fa-thumbs-o-up"></i></div>
                                <div class="item-desc">
                                    Tips on how to stay full, when to eat and measure your progress
                                </div>
                            </div><!--//item-heading-->
                        </div><!--//item-inner-->
                    </div><!--//item-->
                </div><!--//row-->
            </div><!--//container-->
        </section><!--//benefits-section-->
        <section id="audience-section" class="audience-section py-5" style="background-color: #d0d0d0;">
            <div class="container">
                <h2 class="section-heading text-center mb-4">FREQUENTLY ASKED QUESTIONS</h2>
                <div class="section-intro single-col-max mx-auto text-center mb-5">
                    Finally go from frustrated to getting consistent results that will get to you to your ultimate health and body goal!
                </div><!--//section-intro-->
                <div class="audience mx-auto">
                    <div class="item row gx-3">
                        <div class="col">
                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="width: 100%; background: white; border-color: #ff0000; display: flex;justify-content: space-between; color: #000;">
                                If I make payment now, when will I get my plan?
                                <span><i class="fa fa-plus-circle" style="color: #ff0000;" aria-hidden="true"></i></span>
                            </button>
                            <div class="item-desc collapse" id="collapseExample" style="padding: 20px; background-color:#dedfeb;">Following payment, you’ll fill a form where I’ll collect all your personal details, that’ll help me create your own unique plan. You’ll get your plan in your email 3 working days after you fill your form</div>
                        </div><!--//col-->
                    </div><!--//item-->
                    <div class="item row gx-3">
                        <div class="col">
                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample1" style="width: 100%; background: white; border-color: #ff0000; display: flex;justify-content: space-between; color: #000;">
                                What if I can’t cook?
                                <span><i class="fa fa-plus-circle" style="color: #ff0000;" aria-hidden="true"></i></span>
                            </button>
                            <div class="item-desc collapse" id="collapseExample1" style="padding: 20px; background-color:#dedfeb;">Remember the meal plan is customised! We’ll work with the few things you might know how to prepare, stick to more options that require zero cooking, and options you can buy out.</div>
                        </div><!--//col-->
                    </div><!--//item-->
                    <div class="item row gx-3">
                        <div class="col">
                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2" style="width: 100%; background: white; border-color: #ff0000; display: flex;justify-content: space-between; color: #000;">
                                Will I really be able to eat swallow and rice?
                                <span><i class="fa fa-plus-circle" style="color: #ff0000;" aria-hidden="true"></i></span>
                            </button>
                            <div class="item-desc collapse" id="collapseExample2" style="padding: 20px; background-color:#dedfeb;">Yes, you will! Carbs are not the problem, they never were. With the meal plan I’ll create for you, I’ll show you exactly how to enjoy your Nigerian foods and still hit your fitness goals</div>
                        </div><!--//col-->
                    </div><!--//item-->
                    <div class="item row gx-3">

                        <div class="col">
                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample3" style="width: 100%; background: white; border-color: #ff0000; display: flex;justify-content: space-between; color: #000;">
                                What if there’s something about the plan I don’t particularly like?
                                <span><i class="fa fa-plus-circle" style="color: #ff0000;" aria-hidden="true"></i></span>
                            </button>
                            <div class="item-desc collapse" id="collapseExample3" style="padding: 20px; background-color:#dedfeb;">After receiving your plan, you’ll be able to request a review within 2 weeks of receiving it, and I’ll be happy to make any necessary adjustments.</div>
                        </div><!--//col-->
                    </div><!--//item-->
                    <div class="item row gx-3">

                        <div class="col">
                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample4" aria-expanded="false" aria-controls="collapseExample4" style="width: 100%; background: white; border-color: #ff0000; display: flex;justify-content: space-between; color: #000;">
                                How much is the meal plan?
                                <span><i class="fa fa-plus-circle" style="color: #ff0000;" aria-hidden="true"></i></span>
                            </button>
                            <div class="item-desc collapse" id="collapseExample4" style="padding: 20px; background-color:#dedfeb;">
                                The meal plan costs N20,000 per month. Your goal will determine how many months we might be working together.</div>
                        </div><!--//col-->
                    </div><!--//item-->
                </div><!--//audience-->
            </div><!--//container-->
        </section><!--//audience-section-->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div id="success-div">
                            <h4 style="color: #ff0000;">Well done!!! 🎉</h4>
                            <P>Your meal plan has been created and our Nutrition experts are now giving it one last look before we ship it off to your email! </P>
                            <P>You can expect your customised meal plan in your inbox in one working day or less!
                            </P>

                            <h3><strong>Cheers to your future fitness! 🙌🏽</strong></h3>

                        </div>
                        <p id="error" style="color: #ed4c67;">Error while trying to process your payment please try again or contact our support team</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="https://js.paystack.co/v1/inline.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js" integrity="sha512-nO7wgHUoWPYGCNriyGzcFwPSF+bPDOR+NvtOYy2wMcWkrnCNPKBcFEkU80XIN14UVja0Gdnff9EmydyLlOL7mQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(window).on('load', function() {
        setTimeout(function() { // allowing 3 secs to fade out loader
            $('.main-loader').fadeOut('slow');
            $('.alert').fadeOut('slow');
            $("body").css("background-color", "white");
            $('.main').fadeIn('slow');
        }, 3500);
    });

    const paymentForm = document.getElementById('paymentForm');
    // const error_div = document.getElementById('error-div');
    // const success_div = document.getElementById('success-div');
    paymentForm.addEventListener("submit", payWithPaystack, false);

    function payWithPaystack(e) {
        e.preventDefault();

        let handler = PaystackPop.setup({
            key: 'pk_test_35053dedc279e268b2132443c3ca9500ebe4b77a', // Replace with your public key
            email: document.getElementById("email-address").value,
            amount: document.getElementById("amount").value * 100,
            // ref: '' + Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
            // // label: "Optional string that   replaces customer email"
            onClose: function() {
                alert('Window closed.');
            },
            callback: function(response) {
                let reference = response.reference

                $.ajax({
                    type: "GET",
                    url: "{{URL::to('verify-payment')}}/" + reference,

                    success: function(response) {
                        console.log(response)
                        if (response == 1) {
                            paymentForm.style.display = 'none'
                            $('#exampleModal').modal('show');
                            $('#error').hide();
                            setTimeout(function() {
                                location.reload();
                            }, 6000);
                        } else {
                            paymentForm.style.display = 'none'
                            $('#exampleModal').modal('show');
                            $('#success-div').hide();
                            setTimeout(function() {
                                location.reload();
                            }, 6000);

                        }
                    }
                });
            }
        });

        handler.openIframe();
    }
</script>

</html>