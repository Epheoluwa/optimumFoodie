<!doctype html>
<html>

<head>
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Success</title>
    <link rel="stylesheet" href="{{ url('assets/frontend') }}/css/animate.min.css">
    <link rel="stylesheet" href="{{ url('assets/frontend') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('assets/frontend') }}/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ url('assets/frontend') }}/css/templatemo-style.css">
    <script src="{{ url('assets/frontend') }}/js/jquery.js"></script>
    <script src="{{ url('assets/frontend') }}/js/bootstrap.min.js"></script>
    <script src="{{ url('assets/frontend') }}/js/jquery.singlePageNav.min.js"></script>
    <script src="{{ url('assets/frontend') }}/js/typed.js"></script>
    <script src="{{ url('assets/frontend') }}/js/wow.min.js"></script>
    <script src="{{ url('assets/frontend') }}/js/custom.js"></script>
    <style>
        /* .container {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    } */

        .whom-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            justify-items: center;
            outline-color: none;
            height: 40px;
            border-radius: 5px;
            background-color: #05a1c4;
            color: #fff;
            cursor: pointer;
            margin-top: 20px;
            width: 240px;
            border: 1px solid #05a1c4;
        }

        .whom-btn:hover,
        .whom-btn:active,
        .whom-btn:focus {
            outline-color: none;
            border-radius: 5px;
            outline: none;
            box-shadow: none;
        }

        .head2 {
            text-align: center;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        .screen {
            cursor: pointer;
            position: absolute;
            left: 50%;
            top: 40%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            overflow: hidden;
            width: 500px;
            height: 400px;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 2 12px 0 rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .screen #topIcon {
            position: absolute;
            left: 50%;
            top: 30%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .screen .border-top {
            position: absolute;
            top: 0;
            height: 10px;
            width: 100%;
            background-color: #05a1c4;
        }

        .screen h3 {
            font-weight: 700;
            font-size: 24px;
            color: #606060;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            letter-spacing: 0;
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .screen p {
            font-weight: 400;
            font-size: 16px;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            color: #616161;
            letter-spacing: 0.18px;
            position: absolute;
            left: 50%;
            top: 68%;
            width: 90%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .screen button {
            background: #05a1c4;
            border: 1px solid #0094ff;
            box-shadow: 0 3px 20px 0 #0094ff;
            border-radius: 100px;
            letter-spacing: 1.5px;
            font-weight: 500;
            color: #fff;
            padding-top: 2px;
            width: 186px;
            height: 40px;
            position: absolute;
            bottom: 1%;
            left: 30%;

            /* -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        opacity: 0; */
            font-size: 16px;
            cursor: pointer;
        }

        .screen button:focus {
            outline: 0;
        }

        #Bubbles {
            visibility: hidden;
        }

        .tr {
            -webkit-transition: all 0.2s ease-in;
            -moz-transition: all 0.2s ease-in;
            -ms-transition: all 0.2s ease-in;
            -o-transition: all 0.2s ease-in;
            transition: all 0.2s ease-in;
        }

        .btn-overlay {

            background-color: #43d0f1;
            border: 0;
            color: #fff;
            opacity: 0.6;
            padding: 10px 15px;
            border-radius: 100px;
            font-size: 12px;
            letter-spacing: 0.8px;
            z-index: 999;
            width: 100px
        }

        .btn-overlay:hover {
            opacity: 1;
        }

        #restart {
            position: fixed;
            right: 10px;
            top: 10px;
        }

        #invert {
            position: fixed;
            right: 10px;
            top: 55px;
        }

        :root {
            --color-blue: #0094ff;
            --color-white: #fff;
            --curve: cubic-bezier(0.42, 0, 0.275, 1.155);
        }

        *,
        *:before,
        *:after {
            box-sizing: border-box;
        }

        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: var(--color-white);
        }

        .star {
            position: absolute;
            animation: grow 3s infinite;
            fill: var(--color-blue);
            opacity: 0;
        }

        .star:nth-child(1) {
            width: 12px;
            height: 12px;
            left: 12px;
            top: 16px;
        }

        .star:nth-child(2) {
            width: 18px;
            height: 18px;
            left: 168px;
            top: 84px;
        }

        .star:nth-child(3) {
            width: 10px;
            height: 10px;
            left: 32px;
            top: 162px;
        }

        .star:nth-child(4) {
            width: 20px;
            height: 20px;
            left: 82px;
            top: -12px;
        }

        .star:nth-child(5) {
            width: 14px;
            height: 14px;
            left: 125px;
            top: 162px;
        }

        .star:nth-child(6) {
            width: 10px;
            height: 10px;
            left: 16px;
            top: 16px;
        }

        .star:nth-child(1) {
            animation-delay: 1.5s;
        }

        .star:nth-child(2) {
            animation-delay: 3s;
        }

        .star:nth-child(3) {
            animation-delay: 4.5s;
        }

        .star:nth-child(4) {
            animation-delay: 6s;
        }

        .star:nth-child(5) {
            animation-delay: 7.5s;
        }

        .star:nth-child(6) {
            animation-delay: 9s;
        }

        .checkmark {
            position: relative;
            padding: 30px;
            animation: checkmark 5m var(--curve) both;
        }

        .checkmark__check {
            position: absolute;
            top: 50%;
            left: 50%;
            z-index: 10;
            transform: translate3d(-50%, -50%, 0);
            fill: var(--color-white);
        }

        .checkmark__background {
            fill: var(--color-blue);
            animation: rotate 35s linear both infinite;
        }

        @keyframes rotate {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes grow {

            0%,
            100% {
                transform: scale(0);
                opacity: 0;
            }

            50% {
                transform: scale(1);
                opacity: 1;
            }
        }

        @keyframes checkmark {

            0%,
            100% {
                opacity: 0;
                transform: scale(0);
            }

            10%,
            50%,
            90% {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
</head>

<body>
    <section>
        <!-- <div class="screen un">
        <div class="border-top">
        </div>
        <div class="checkmark" id="topIcon">
            <svg class="star" height="19" viewBox="0 0 19 19" width="19" xmlns="http://www.w3.org/2000/svg">
                <path d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                </path>
            </svg>
            <svg class="star" height="19" viewBox="0 0 19 19" width="19" xmlns="http://www.w3.org/2000/svg">
                <path d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                </path>
            </svg>
            <svg class="star" height="19" viewBox="0 0 19 19" width="19" xmlns="http://www.w3.org/2000/svg">
                <path d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                </path>
            </svg>
            <svg class="star" height="19" viewBox="0 0 19 19" width="19" xmlns="http://www.w3.org/2000/svg">
                <path d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                </path>
            </svg>
            <svg class="star" height="19" viewBox="0 0 19 19" width="19" xmlns="http://www.w3.org/2000/svg">
                <path d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                </path>
            </svg>
            <svg class="star" height="19" viewBox="0 0 19 19" width="19" xmlns="http://www.w3.org/2000/svg">
                <path d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                </path>
            </svg>
            <svg class="checkmark__check" height="36" viewBox="0 0 48 36" width="48" xmlns="http://www.w3.org/2000/svg">
                <path d="M47.248 3.9L43.906.667a2.428 2.428 0 0 0-3.344 0l-23.63 23.09-9.554-9.338a2.432 2.432 0 0 0-3.345 0L.692 17.654a2.236 2.236 0 0 0 .002 3.233l14.567 14.175c.926.894 2.42.894 3.342.01L47.248 7.128c.922-.89.922-2.34 0-3.23">
                </path>
            </svg>
            <svg class="checkmark__background" height="115" viewBox="0 0 120 115" width="120" xmlns="http://www.w3.org/2000/svg">
                <path d="M107.332 72.938c-1.798 5.557 4.564 15.334 1.21 19.96-3.387 4.674-14.646 1.605-19.298 5.003-4.61 3.368-5.163 15.074-10.695 16.878-5.344 1.743-12.628-7.35-18.545-7.35-5.922 0-13.206 9.088-18.543 7.345-5.538-1.804-6.09-13.515-10.696-16.877-4.657-3.398-15.91-.334-19.297-5.002-3.356-4.627 3.006-14.404 1.208-19.962C10.93 67.576 0 63.442 0 57.5c0-5.943 10.93-10.076 12.668-15.438 1.798-5.557-4.564-15.334-1.21-19.96 3.387-4.674 14.646-1.605 19.298-5.003C35.366 13.73 35.92 2.025 41.45.22c5.344-1.743 12.628 7.35 18.545 7.35 5.922 0 13.206-9.088 18.543-7.345 5.538 1.804 6.09 13.515 10.696 16.877 4.657 3.398 15.91.334 19.297 5.002 3.356 4.627-3.006 14.404-1.208 19.962C109.07 47.424 120 51.562 120 57.5c0 5.943-10.93 10.076-12.668 15.438z">
                </path>
            </svg>
        </div>

        <h3>Yaaay! Your FREE Meal Plan is ready!!  </h3>
        <p>We’ve just created your fully CUSTOMIZED 4 week meal plan!.</p>

        <button>GET PLAN!</button>

    </div> -->

        {{$userDetails['status']}}

        @if ($userDetails['status']== 'free')
        <div class="screen un">
            <div class="border-top">
            </div>
            <div class="checkmark" id="topIcon">
                <svg class="star" height="19" viewBox="0 0 19 19" width="19" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                    </path>
                </svg>
                <svg class="star" height="19" viewBox="0 0 19 19" width="19" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                    </path>
                </svg>
                <svg class="star" height="19" viewBox="0 0 19 19" width="19" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                    </path>
                </svg>
                <svg class="star" height="19" viewBox="0 0 19 19" width="19" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                    </path>
                </svg>
                <svg class="star" height="19" viewBox="0 0 19 19" width="19" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                    </path>
                </svg>
                <svg class="star" height="19" viewBox="0 0 19 19" width="19" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                    </path>
                </svg>
                <svg class="checkmark__check" height="36" viewBox="0 0 48 36" width="48" xmlns="http://www.w3.org/2000/svg">
                    <path d="M47.248 3.9L43.906.667a2.428 2.428 0 0 0-3.344 0l-23.63 23.09-9.554-9.338a2.432 2.432 0 0 0-3.345 0L.692 17.654a2.236 2.236 0 0 0 .002 3.233l14.567 14.175c.926.894 2.42.894 3.342.01L47.248 7.128c.922-.89.922-2.34 0-3.23">
                    </path>
                </svg>
                <svg class="checkmark__background" height="115" viewBox="0 0 120 115" width="120" xmlns="http://www.w3.org/2000/svg">
                    <path d="M107.332 72.938c-1.798 5.557 4.564 15.334 1.21 19.96-3.387 4.674-14.646 1.605-19.298 5.003-4.61 3.368-5.163 15.074-10.695 16.878-5.344 1.743-12.628-7.35-18.545-7.35-5.922 0-13.206 9.088-18.543 7.345-5.538-1.804-6.09-13.515-10.696-16.877-4.657-3.398-15.91-.334-19.297-5.002-3.356-4.627 3.006-14.404 1.208-19.962C10.93 67.576 0 63.442 0 57.5c0-5.943 10.93-10.076 12.668-15.438 1.798-5.557-4.564-15.334-1.21-19.96 3.387-4.674 14.646-1.605 19.298-5.003C35.366 13.73 35.92 2.025 41.45.22c5.344-1.743 12.628 7.35 18.545 7.35 5.922 0 13.206-9.088 18.543-7.345 5.538 1.804 6.09 13.515 10.696 16.877 4.657 3.398 15.91.334 19.297 5.002 3.356 4.627-3.006 14.404-1.208 19.962C109.07 47.424 120 51.562 120 57.5c0 5.943-10.93 10.076-12.668 15.438z">
                    </path>
                </svg>
            </div>

            <h3>Yaaay! Your FREE Meal Plan is ready!! </h3>
            <p>We’ve just created your fully CUSTOMIZED 4 week meal plan!.</p>
            <form action="{{ url('sendmail') }}" method="post">
                {!! csrf_field() !!}
                <input type="hidden" name="userId" value="{{$userDetails['id']}}">
                <input type="hidden" name="cusType" value="free">
                <button type="submit">GET FREE PLAN!</button>
            </form>
            

        </div>
        @else
        <div class="screen un">
            <div class="border-top">
            </div>
            <div class="checkmark" id="topIcon">
                <svg class="star" height="19" viewBox="0 0 19 19" width="19" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                    </path>
                </svg>
                <svg class="star" height="19" viewBox="0 0 19 19" width="19" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                    </path>
                </svg>
                <svg class="star" height="19" viewBox="0 0 19 19" width="19" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                    </path>
                </svg>
                <svg class="star" height="19" viewBox="0 0 19 19" width="19" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                    </path>
                </svg>
                <svg class="star" height="19" viewBox="0 0 19 19" width="19" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                    </path>
                </svg>
                <svg class="star" height="19" viewBox="0 0 19 19" width="19" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z">
                    </path>
                </svg>
                <svg class="checkmark__check" height="36" viewBox="0 0 48 36" width="48" xmlns="http://www.w3.org/2000/svg">
                    <path d="M47.248 3.9L43.906.667a2.428 2.428 0 0 0-3.344 0l-23.63 23.09-9.554-9.338a2.432 2.432 0 0 0-3.345 0L.692 17.654a2.236 2.236 0 0 0 .002 3.233l14.567 14.175c.926.894 2.42.894 3.342.01L47.248 7.128c.922-.89.922-2.34 0-3.23">
                    </path>
                </svg>
                <svg class="checkmark__background" height="115" viewBox="0 0 120 115" width="120" xmlns="http://www.w3.org/2000/svg">
                    <path d="M107.332 72.938c-1.798 5.557 4.564 15.334 1.21 19.96-3.387 4.674-14.646 1.605-19.298 5.003-4.61 3.368-5.163 15.074-10.695 16.878-5.344 1.743-12.628-7.35-18.545-7.35-5.922 0-13.206 9.088-18.543 7.345-5.538-1.804-6.09-13.515-10.696-16.877-4.657-3.398-15.91-.334-19.297-5.002-3.356-4.627 3.006-14.404 1.208-19.962C10.93 67.576 0 63.442 0 57.5c0-5.943 10.93-10.076 12.668-15.438 1.798-5.557-4.564-15.334-1.21-19.96 3.387-4.674 14.646-1.605 19.298-5.003C35.366 13.73 35.92 2.025 41.45.22c5.344-1.743 12.628 7.35 18.545 7.35 5.922 0 13.206-9.088 18.543-7.345 5.538 1.804 6.09 13.515 10.696 16.877 4.657 3.398 15.91.334 19.297 5.002 3.356 4.627-3.006 14.404-1.208 19.962C109.07 47.424 120 51.562 120 57.5c0 5.943-10.93 10.076-12.668 15.438z">
                    </path>
                </svg>
            </div>

            <h3>Yaaay! Your Meal Plan is ready!! </h3>
            <p>We’ve just created your fully CUSTOMIZED 4 week meal plan!.</p>

            <form action="{{ url('sendmail') }}" method="post">
                {!! csrf_field() !!}
                <input type="hidden" name="userId" value="{{$userDetails['id']}}">
                <input type="hidden" name="cusType" value="paid">
                <button type="submit">GET PLAN!</button>
            </form>
           

        </div>
        @endif


    </section>
</body>
<html>