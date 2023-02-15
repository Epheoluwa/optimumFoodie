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
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/fontawesome.min.css" integrity="sha512-cHxvm20nkjOUySu7jdwiUxgGy11vuVPE9YeK89geLMLMMEOcKFyS2i+8wo0FOwyQO/bL8Bvq1KMsqK4bbOsPnA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <title>Optimum Foodie</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: #262626;
        }

        .loader {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(45deg);
            width: 100px;
            height: 100px;
            animation: animate 1s linear infinite;
        }

        .main-loader h2 {
            color: #fff;
            text-align: center;
            margin-top: 15rem;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        .loader-item {
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
        }
    </style>
</head>

<body>
    <div class="main-loader">
        <h2>Creating meal plan...........</h2>
        <div class="loader">
            <div class="loader-item loader-item_1"></div>
            <div class="loader-item loader-item_2"></div>
            <div class="loader-item loader-item_3"></div>
            <div class="loader-item loader-item_4"></div>
        </div>
    </div>

    <div class="main" style="display: none;">
        <section class="hero-section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-7 pt-5 mb-5 align-self-center">
                        <div class="promo pe-md-3 pe-lg-5">
                            <h4 class="subheadline" style="font-weight: 100;">What you eat on a daily basis is the most important aspect to getting the body you’ve always wanted</h4>
                            <h1 class="headline mb-3">
                                FINALLY GET THE BODY <br>YOU’VE BEEN WISHING FOR
                            </h1><!--//headline-->
                            <p>Without Ever Needing To Step In A GYM Or Give Up The Nigerian Meals You Enjoy!</p>
                            <div class="subheadline mb-4">
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

                            <div class="hero-quotes mt-5">
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
                            </div><!--//hero-quotes-->
                        </div><!--//promo-->
                    </div><!--col-->
                    <div class="col-12 col-md-5 mb-5 align-self-center">
                        <div class="book-cover-holder">
                            <iframe width="550" height="445" src="https://www.youtube.com/embed/iiEK6csjMYo">
                            </iframe>
                        </div><!--//book-cover-holder-->
                        <div class="text-center">A custom-made plan provides you with specific details of what to eat, how much to eat, and even if you can’t cook or travel a lot, we guide you on exactly what to buy at restaurants around you! </div>
                    </div><!--col-->
                </div><!--//row-->
            </div><!--//container-->
        </section><!--//hero-section-->

        <section id="content-section" class="content-section mt-5">
            <div class="container">
                <div class="single-col-max mx-auto">
                    <h2 class="section-heading text-center mb-5">Does this sound familiar?</h2>
                    <div class="row">
                        <div class="col-12 col-md-12 mb-5">
                            <div class="key-points mb-4 text-center">
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

                                <div class="" style="background-color: #000; padding: 15px 15px;">
                                    <p style="color: #fff;">Here’s the thing, when it comes to getting fitness results, your diet is KING! This right here is what has made the difference between frustration and absolute success for my clients!</p>
                                </div>

                                <p class="mt-3">And the awesome news is that <b> you don’t have to stop eating your eba, rice, bread, beans and so on to get amazing results! </b> You can eat all your fave Nigerian meals and still crush your body goals!</p>
                                <div class="text-center mt-5">
                                    <a class="btn btn-primary" href="" style="width: 40%; margin-right: 15px;">Get FREE Meal Plan</a>
                                    <a class="btn btn-primary" href="" style="width: 40%;">Get FULL Meal Plan</a>
                                </div>
                            </div>

                        </div><!--//col-12-->
                    </div><!--//row-->
                </div><!--//single-col-max-->
            </div><!--//container-->
        </section><!--//content-section-->

        <section id="reviews-section" class="reviews-section py-5">
            <div class="container">
                <h2 class="section-heading text-center">Review</h2>
                <div class="section-intro text-center single-col-max mx-auto mb-5">Hear from Nigerian Nutrition Expert! </div>
                <div class="row justify-content-center">
                    <div class="item col-12 col-lg-12 p-3 mb-4">
                        <div class="item-inner theme-bg-light rounded p-4">

                            <blockquote class="quote">
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

                            </blockquote>
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
        <section id="audience-section" class="audience-section py-5">
            <div class="container">
                <h2 class="section-heading text-center mb-4">FREQUENTLY ASKED QUESTIONS</h2>
                <div class="section-intro single-col-max mx-auto text-center mb-5">
                    Finally go from frustrated to getting consistent results that will get to you to your ultimate health and body goal!
                </div><!--//section-intro-->
                <div class="audience mx-auto">
                    <div class="item row gx-3">
                        <div class="col">
                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="width: 100%; background: #7FCDB8; border-color: #7FCDB8; display: flex;justify-content: space-between; color: #000;">
                                If I make payment now, when will I get my plan?
                                <span><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
                            </button>
                            <div class="item-desc collapse" id="collapseExample" style="padding: 20px; background-color:#dedfeb;">Following payment, you’ll fill a form where I’ll collect all your personal details, that’ll help me create your own unique plan. You’ll get your plan in your email 3 working days after you fill your form</div>
                        </div><!--//col-->
                    </div><!--//item-->
                    <div class="item row gx-3">
                        <div class="col">
                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample1" style="width: 100%; background: #7FCDB8; border-color: #7FCDB8; display: flex;justify-content: space-between; color: #000;">
                                What if I can’t cook?
                                <span><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
                            </button>
                            <div class="item-desc collapse" id="collapseExample1" style="padding: 20px; background-color:#dedfeb;">Remember the meal plan is customised! We’ll work with the few things you might know how to prepare, stick to more options that require zero cooking, and options you can buy out.</div>
                        </div><!--//col-->
                    </div><!--//item-->
                    <div class="item row gx-3">
                        <div class="col">
                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2" style="width: 100%; background: #7FCDB8; border-color: #7FCDB8; display: flex;justify-content: space-between; color: #000;">
                                Will I really be able to eat swallow and rice?
                                <span><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
                            </button>
                            <div class="item-desc collapse" id="collapseExample2" style="padding: 20px; background-color:#dedfeb;">Yes, you will! Carbs are not the problem, they never were. With the meal plan I’ll create for you, I’ll show you exactly how to enjoy your Nigerian foods and still hit your fitness goals</div>
                        </div><!--//col-->
                    </div><!--//item-->
                    <div class="item row gx-3">

                        <div class="col">
                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample3" style="width: 100%; background: #7FCDB8; border-color: #7FCDB8; display: flex;justify-content: space-between; color: #000;">
                                What if there’s something about the plan I don’t particularly like?
                                <span><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
                            </button>
                            <div class="item-desc collapse" id="collapseExample3" style="padding: 20px; background-color:#dedfeb;">After receiving your plan, you’ll be able to request a review within 2 weeks of receiving it, and I’ll be happy to make any necessary adjustments.</div>
                        </div><!--//col-->
                    </div><!--//item-->
                    <div class="item row gx-3">

                        <div class="col">
                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample4" aria-expanded="false" aria-controls="collapseExample4" style="width: 100%; background: #7FCDB8; border-color: #7FCDB8; display: flex;justify-content: space-between; color: #000;">
                                How much is the meal plan?
                                <span><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
                            </button>
                            <div class="item-desc collapse" id="collapseExample4" style="padding: 20px; background-color:#dedfeb;">
                                The meal plan costs N20,000 per month. Your goal will determine how many months we might be working together.</div>
                        </div><!--//col-->
                    </div><!--//item-->
                </div><!--//audience-->
            </div><!--//container-->
        </section><!--//audience-section-->
    </div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js" integrity="sha512-nO7wgHUoWPYGCNriyGzcFwPSF+bPDOR+NvtOYy2wMcWkrnCNPKBcFEkU80XIN14UVja0Gdnff9EmydyLlOL7mQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(window).on('load', function() {
        setTimeout(function() { // allowing 3 secs to fade out loader
            $('.main-loader').fadeOut('slow');
            $("body").css("background-color", "white");
            $('.main').fadeIn('slow');
        }, 3500);
    });
</script>

</html>