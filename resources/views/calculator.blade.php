<?php
$perc = 20;
?>
@extends('master')

@section('main_content')

<style type="text/css">
    #myCarousel .item .container {
        min-height: 86vh;
        width: 100%;
    }

    .h1,
    h1 {
        font-size: 32px;
        font-family: 'Be Vietnam Pro', sans-serif;
    }

    .btn-dark {
        background-color: #000 !important;
        color: #fff !important;
        border: 1px solid #000 !important;
        font-family: 'Be Vietnam Pro', sans-serif;
    }

    .btn-dark:hover {
        background-color: #fff !important;
        color: #000 !important;
        border: 1px solid #000 !important;
        border-radius: 5px;
    }

    .btn-dark-outline {
        background-color: #ff0000 !important;
        /* background-color: #ff0000 !important; */
        color: #fff !important;
        border: 1px solid #ff0000 !important;
        /* border: 1px solid #ff0000 !important; */
        border-radius: 5px;
        font-family: 'Be Vietnam Pro', sans-serif;
    }

    .btn-dark-outline:hover {
        background-color: #fff !important;
        color: #ff0000 !important;
        border: 1px solid #ff0000 !important;
        border-radius: 5px;
    }

    .whom-btn {
        margin-bottom: 30px;
    }

    .whom-btn,
    .sex-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        justify-items: center;
        outline-color: none;
        /* width: 200px; */
        height: 40px;
        border-radius: 5px;
        background-color: #ff0000;
        color: #fff;
        font-family: 'Be Vietnam Pro', sans-serif;
    }

    .whom-btn:hover,
    .whom-btn:active,
    .whom-btn:focus {
        outline-color: none;
        border-radius: 5px;
        outline: none;
        box-shadow: none;
    }

    #age {
        margin-bottom: 5px;
        height: 50px;
        width: 200px;
        font-size: 25px;
        font-family: 'Be Vietnam Pro', sans-serif;
        text-align: center;
        font-weight: bold;
        outline: none;
        background-color: #f2f2f2;
        border-radius: 7px;
        border: none;
        margin-top: 15px;
    }

    #age:focus {
        outline: none;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=checkbox] {
        visibility: hidden;
    }

    input[type=number] {
        -moz-appearance: textfield;
    }

    .ft-cm {
        display: inline;
        width: 60px;
        height: 50px;
        background-color: #666;
        color: #fff;
        align-items: center;
        justify-items: center;
        justify-content: center;
        margin: -2px;
        border: 0px;
        font-weight: bold;
        font-family: 'Be Vietnam Pro', sans-serif;
    }

    .ft-cm.activer {
        background-color: #ff0000;
    }

    #ftBtn {
        border-radius: 5px 0 0 5px;
    }

    #cmBtn {
        border-radius: 0 5px 5px 0;
    }

    .height {
        height: 60px;
        width: 200px;
        font-size: 120px;
        font-family: 'Be Vietnam Pro', sans-serif;
        text-align: center;
        font-weight: bold;
        outline: none;
        display: block;
        border-radius: 5px;
        border: 1px solid;
    }

    .input-group {
        /* margin-bottom: 12px; */
        margin: 12px;
        justify-content: center;
        display: flex;
    }

    .heightHide {
        display: none;
    }

    #heightMsg,
    #weightMsg,
    #weightMsg_aim {
        font-weight: bold;
        font-family: 'Be Vietnam Pro', sans-serif;
    }

    .lbs-kg {
        display: inline;
        width: 60px;
        height: 60px;
        background-color: #666;
        color: #fff;
        align-items: center;
        justify-items: center;
        justify-content: center;
        margin: -2px;
        border: 0px;
        font-weight: bold;
        font-family: 'Be Vietnam Pro', sans-serif;
    }

    .lbs-kg.activer {
        background-color: #ff0000;
    }

    .lbs-kg.activeree {
        background-color: #ff0000;
    }

    #lbsBtn,
    #lbsBtn_aim {
        border-radius: 0 5px 5px 0;
    }

    #kgBtn,
    #kgBtn_aim {
        border-radius: 5px 0 0 5px;
    }

    div.goal-cards {
        border: 1px solid #ccc;
        cursor: pointer;
        border-radius: 10px;
        margin: 15px;
        height: 100%;
        padding: 15px;
    }

    div.goal-cards.greyed-bg {
        background-color: #d0d0d0;
    }

    div.food-cards {
        border: 1px solid #ccc;
        cursor: pointer;
        border-radius: 10px;
        margin: 15px;
        height: 100%;
        padding: 15px;
    }

    div.food-cards.greyed-bg {
        background-color: #d0d0d0;
    }

    .ratio-btn,
    .sex-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        justify-items: center;
        outline-color: none;
        width: 130px;
        height: 40px;
        border-radius: 5px;
    }

    .ratio-btn:hover,
    .ratio-btn:active,
    .ratio-btn:focus {
        outline-color: none;
        border-radius: 0px;
        outline: none;
        box-shadow: none;
    }

    #meals_count {
        margin-bottom: 15px;
        height: 140px;
        width: 230px;
        font-size: 120px;
        text-align: center;
        font-family: 'Be Vietnam Pro', sans-serif;
        font-weight: bold;
        outline: none;
        background-color: #f2f2f2;
        border-radius: 7px;
        border: none;
    }

    #meals_count:focus {
        outline: none;
    }

    div.activity-cards {
        border: 1px solid #ccc;
        cursor: pointer;
        border-radius: 10px;
        margin: 15px 0px;
        height: 160px;
        padding: 7px;
    }

    div.activity-cards.greyed-bg {
        background-color: #d0d0d0;
    }

    div.workout-cards {
        border: 1px solid #ccc;
        cursor: pointer;
        border-radius: 10px;
        margin: 15px 0px;
        height: 120px;
        padding: 7px;
        overflow: hidden;
    }

    div.workout-cards div {
        height: 120px;
        overflow: hidden;
        font-size: 11px;
        font-family: 'Be Vietnam Pro', sans-serif;
    }

    div.workout-cards div h4 {
        font-size: 13px;
        font-family: 'Be Vietnam Pro', sans-serif;
    }

    div.workout-cards div img {
        max-height: 100px;
        max-width: 80%;
        margin: 7px 0px 5px;
    }

    div.workout-cards.greyed-bg {
        background-color: #d0d0d0;
    }

    .myprogress .table>tbody>tr>td,
    .myprogress .table>tbody>tr>th,
    .myprogress .table>tfoot>tr>td,
    .myprogress .table>tfoot>tr>th,
    .myprogress .table>thead>tr>td,
    .myprogress .table>thead>tr>th {
        border-top: none !important;
        /* background-color: #d0d0d0; */
        border-radius: 5px;
    }

    .table-container {
        background-color: #f4f4f4;
        border-radius: 20px;
    }

    .progress-bar {
        border-radius: 20px;
        background-image:url("{{ url('assets/frontend/images/progress2.png') }}");
        /* background-color: #ff0000; */
        height: 33.14px;
        position: absolute;
    }

    .myprogress .table td {
        text-align: center;
        font-size: 12px;
        font-family: 'Be Vietnam Pro', sans-serif;
        color: #c3c0c0;
        font-weight: bold;
    }

    .myprogress .table td.active-bar {
        color: #000000;
        /* background-color: #ff0000; */
    }

    .myprogress .table td.inactive-bar {
        color: #000000;
        /* color: #d8d8d8; */
        /* background-color: #ff0000; */
    }

    small.direction-right img,
    small.direction-left img {
        display: block;
        margin-bottom: 5px;
    }

    small.direction-right {
        display: inline-block;
        font-size: 9px;
        font-family: 'Be Vietnam Pro', sans-serif;
        text-align: center;
        float: right;
    }

    small.direction-left {
        display: inline-block;
        font-size: 9px;
        font-family: 'Be Vietnam Pro', sans-serif;
        text-align: center;
        float: left;
        color: black;
    }

    .input-group-addon:last-child {
        border-top: 1px solid #000;
        border-right: 1px solid #000;
        border-bottom: 1px solid #000;
        border-left: 1px solid #000000;
        background: #000000;
        color: #fff;
        font-weight: bold;
        font-family: 'Be Vietnam Pro', sans-serif;
    }

    .triggerInfo {
        font-weight: bold;
        color: #ff0000;
        font-size: 12px;
        font-family: 'Be Vietnam Pro', sans-serif;
    }

    .calory-box {
        margin: 4px;
        text-align: center;
        padding: 3px 6px;
        background: #f2f2f2;
        border-radius: 10px;
    }

    .calory-box.active {
        background: #ff0000;
        color: #fff;
    }

    .calory-box h2 {
        text-align: center;
        font-size: 22px;
        font-family: 'Be Vietnam Pro', sans-serif;
        padding-bottom: 0px;
        margin-bottom: 0px;
        margin-top: 10px;
        text-decoration: underline;
    }

    .calory-box small {
        margin-bottom: 20px;
        margin-top: 0px;
        display: inline-block;
        text-decoration: underline;
    }

    #main-meal,
    #snack-meal {
        font-size: 45px;
        font-family: 'Be Vietnam Pro', sans-serif;
        width: 120px;
        text-align: center;
        margin-bottom: 60px;
        margin-top: 70px;
        border: 2px solid #b3b3b3;
        border-radius: 10px;
    }

    div.food-options {
        box-shadow: -5px -5px 15px rgb(255 255 255 / 80%), 5px 5px 15px rgb(0 0 0 / 10%);
        /* border-radius: 20px; */
        border: 1px solid #ccc;
        cursor: pointer;
        border-radius: 10px;
        margin: 10px 0px;
        height: 40px;
        padding: 7px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    div.food-options.greyed-bg {
        background-color: #d0d0d0;
    }

    .bestest {
        text-align: center;
        color: black;
        font-size: 18px;
        font-family: 'Be Vietnam Pro', sans-serif;
        height: 45px;
        width: 250px;
        margin-top: 15px;
    }

    .lds-ripple {
        display: inline-block;
        position: relative;
        width: 80px;
        height: 80px;
    }

    .lds-ripple div {
        position: absolute;
        border: 4px solid #000;
        opacity: 1;
        border-radius: 50%;
        animation: lds-ripple 1s cubic-bezier(0, 0.2, 0.8, 1) infinite;
    }

    .lds-ripple div:nth-child(2) {
        animation-delay: -0.5s;
    }

    .error-color {
        color: #FF9494;
        display: none;
    }

    .error-input-border {
        border: 3px solid #FF9494 !important;
    }

    select {
        width: 300px;
        overflow-y: auto;
        cursor: pointer;
        padding: 15px 25px;
        -webkit-appearance: none;
        -moz-appearance: none;
        border: none;
        outline: none;
        border-radius: 12px;
        color: #444;
        font-size: 18px;
        font-family: 'Be Vietnam Pro', sans-serif;
        box-shadow: -3px 3px 5px 0px rgba(0, 0, 0, 0.10);
        margin-top: 3rem;
        margin-bottom: 3rem;
    }

    select option {
        padding: 10px 20px;
        margin-bottom: 8px;
        border-radius: 12px;
        background-color: rgb(238, 238, 238);
        white-space: pre-wrap;
    }

    select option:hover {
        background-color: rgb(223, 223, 223);
    }

    select option:checked {
        box-shadow: 0 0 10px 100px #595959 inset;
    }

    select::-webkit-scrollbar-track {
        background-color: #F5F5F5;
        border-radius: 12px;
    }

    select::-webkit-scrollbar {
        width: 8px;
        background-color: #F5F5F5;
    }

    select::-webkit-scrollbar-thumb {
        background-color: rgb(225, 225, 225);
        border-radius: 12px;
        background-image: -webkit-linear-gradient(90deg,
                rgba(160, 160, 160, 0.2) 25%,
                transparent 25%,
                transparent 50%,
                rgba(160, 160, 160, 0.2) 50%,
                rgba(160, 160, 160, 0.2) 75%,
                transparent 75%,
                transparent)
    }

    select.fadeIn {
        animation: fadeInDown 0.2s;
    }

    select.fadeOut {
        animation: fadeInUp 0.2s;
    }

    @keyframes lds-ripple {
        0% {
            top: 36px;
            left: 36px;
            width: 0;
            height: 0;
            opacity: 0;
        }

        4.9% {
            top: 36px;
            left: 36px;
            width: 0;
            height: 0;
            opacity: 0;
        }

        5% {
            top: 36px;
            left: 36px;
            width: 0;
            height: 0;
            opacity: 1;
        }

        100% {
            top: 0px;
            left: 0px;
            width: 72px;
            height: 72px;
            opacity: 0;
        }
    }

    .physical-actw {
        width: 50%;
    }

    .physical-actM {
        margin-left: 15px;
    }

    @media only screen and (max-width: 600px) {
        .physical-actw {
            width: 80%;
        }

        .physical-actM {
            margin-left: 5px;
        }
    }
</style>

<section id="home">
    <div class="container">
        <div style="display:flex;align-items:center;justify-content:center;justify-items:center;min-height:60%;">
            <div style="display:inline-block;" align="center">
                <hr class="valid-result">
                <div class="row valid-result">
                    <!-- <div class="col-md-2"></div> -->

                    <div >
                        <h2 align="left" style="font-family: 'Be Vietnam Pro', sans-serif; padding-bottom: 5px;">Trying to get fit and healthy?
                        </h2>
                        <h5 style="width: 40%; font-family: 'Be Vietnam Pro', sans-serif; margin-bottom:10px;line-height: inherit; ">WWhat if I told you that you could achieve optimal health, and finally look and feel your best, while still eating African meals 😋 </h5>
                    </div>

                    <div class="col-md-12" style="margin-top: 10px;" align="center">
                        <h3 style="margin-bottom: 2rem; font-family: 'Be Vietnam Pro', sans-serif;">Here's what we have to do:</h3>
                        <table class="table table-striped" style="border-collapse: separate; border-spacing: 1em;">
                            <tr>
                                <td> Step 1:</td>
                                <td style="font-family: 'Be Vietnam Pro', sans-serif;">Using our free calorie allowance calculator, we'll calculate how many calories you should be eating per day to reach your goal</td>

                            </tr>
                            <tr>
                                <td>Step 2:</td>
                                <td style="font-family: 'Be Vietnam Pro', sans-serif;">You'll select which foods you enjoy eating</td>

                            </tr>
                            <tr>
                                <td>Step 3: </td>
                                <td style="font-family: 'Be Vietnam Pro', sans-serif;">We'll use your food selection and calculated calorie allownace to create a CUSTOMISED meal plan for you!</td>

                            </tr>
                            <tr>
                                <td>Step 4:</td>
                                <td style="font-family: 'Be Vietnam Pro', sans-serif;">The best part? .... We'll be sending you 2 days out of your 4 week plan to you absolutely FREE!</td>

                            </tr>
                            <tr>
                                <td> Step 5:</td>
                                <td style="font-family: 'Be Vietnam Pro', sans-serif;">And if you'd like to get the complete plan, all you have to do is subscribe!</td>
                            </tr>
                        </table>
                    </div>
                    <!-- <div class="col-md-2"></div> -->
                </div>
                <a data-scroll href="javascript:void(0)" style="width: 60%; margin-top: 3rem;" class="btn btn-dark-outline whom-btn" data-toggle="modal" data-target="#calculatorModal">GET STARTED</a>
            </div>
        </div>
    </div>

    <!-- <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <h1 class="">We make body weight <span>awesome</span></h1>
                <div class="element">
                    <div class="sub-element">Hello, This is a CMP Generator Website.</div>
                    <div class="sub-element">Awesome for generating Custom Meal Plans.</div>
                    <div class="sub-element">If you need more info, Please contact us.</div>
                </div>
                <a data-scroll href="javascript:void(0)" class="btn btn-default" data-toggle="modal" data-target="#calculatorModal">GET STARTED</a>
            </div>
        </div>
    </div> -->
</section>

<form action="{{ url('post-calculator-data') }}" method="POST" id="calcForm">
    {!! csrf_field() !!}
    <div class="modal" tabindex="-1" role="dialog" id="calculatorModal">
        <div class="modal-dialog" role="document" style="height:100vh;width:100vw;margin:0px;">
            <div class="modal-content" style="height:100vh;border-radius:0px;border:none;overflow:auto;">
                <div class="modal-body" style="padding:0px !important">
                    <div class="container">
                        <div class="pt-3">
                            <h3 class="text-center text-dark" style="color:#000; margin-top:40px;">
                                <a href="#myCarousel" id="backBtn">
                                    <small class="direction-left">
                                        <img src="{{ url('assets/frontend/images/back.png') }}" style="height:34px;" />
                                        Previous
                                    </small>
                                </a>
                                <p style="font-size: 40px; font-weight:800; font-family: 'Be Vietnam Pro', sans-serif;">{{ env('APP_NAME') }}</p>

                                <!-- <a href="javascript:void(0)" data-dismiss="modal">
                                    <small class="direction-right">
                                        <img src="{{ url('assets/frontend/images/cancel.png') }}" style="height:34px;" />
                                        Cancel
                                    </small>
                                </a> -->
                            </h3>

                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner" style="color:#000 !important;text-align:center;padding-top:4vh;">
                                    <div class="item active firstest">
                                        <div class="container">
                                            <div style="display:flex;align-items:center;justify-content:center;justify-items:center;min-height:60%;">
                                                <div style="display:inline-block;" align="center">
                                                    <hr class="valid-result">
                                                    <div class="row valid-result">
                                    
                                                        <div style="display: flex; justify-content: center;">
                                                            <h2 align="left" style="font-family: 'Be Vietnam Pro', sans-serif;">Become The Better Version Of Yourself
                                                            </h2>
                                                            <!-- <h5 style="width: 40%; font-family: 'Be Vietnam Pro', sans-serif;">What if I told you you could achieve your best body and maintain it, while still eating Nigerian meals 😋 </h5> -->
                                                        </div>

                                                        <!-- <div class="col-md-12" style="margin-top: 10px;" align="center">
                                                            <h3 style="margin-bottom: 2rem; font-family: 'Be Vietnam Pro', sans-serif;">Here's what we have to do:</h3>
                                                            <table class="table table-striped">
                                                                <tr>
                                                                    <td> <i class="fa fa-circle" style="color:#ff0000; font-size: 10px;margin: 2px 2px; "></i>Step 1:</td>
                                                                    <td style="font-family: 'Be Vietnam Pro', sans-serif;">Using our free calorie allowance calculator, we'll calculate how many calories you should be eating per day to reach your goal</td>

                                                                </tr>
                                                                <tr>
                                                                    <td><i class="fa fa-circle" style="color:#ff0000; font-size: 10px;margin: 2px 2px"></i>Step 2:</td>
                                                                    <td style="font-family: 'Be Vietnam Pro', sans-serif;">You'll select which foods you enjoy eating</td>

                                                                </tr>
                                                                <tr>
                                                                    <td><i class="fa fa-circle" style="color:#ff0000; font-size: 10px;margin: 2px 2px"></i>Step 3: </td>
                                                                    <td style="font-family: 'Be Vietnam Pro', sans-serif;">We'll use your food selection and calculated calorie allownace to create a CUSTOMISED meal plan for you!</td>

                                                                </tr>
                                                                <tr>
                                                                    <td><i class="fa fa-circle" style="color:#ff0000; font-size: 10px;margin: 2px 2px"></i>Step 4:</td>
                                                                    <td style="font-family: 'Be Vietnam Pro', sans-serif;">The best part? .... We'll be sending you 2 days out of your 4 week plan to you absolutely FREE!</td>

                                                                </tr>
                                                                <tr>
                                                                    <td><i class="fa fa-circle" style="color:#ff0000; font-size: 10px;margin: 2px 2px"></i> Step 5:</td>
                                                                    <td style="font-family: 'Be Vietnam Pro', sans-serif;">And if you'd like to get the complete plan, all you have to do is subscribe!</td>
                                                                </tr>
                                                            </table>
                                                        </div> -->
                                                        <!-- <div class="col-md-2"></div> -->
                                                    </div>
                                                    <a href="#myCarousel" style="width: 60%; margin-top: 3rem;" class="btn btn-dark-outline whom-btn" data-slide="next">GET STARTED</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="item" style="height:100%;overflow-y:auto;">
                                        <div class="container">
                                            @include('progress')

                                            <h4 style="font-family: 'Be Vietnam Pro', sans-serif;">Very good. Let's keep moving...</h4>
                                            <h1 style="font-weight:bold; font-family: 'Be Vietnam Pro', sans-serif;">What’s your gender?</h1>

                                            <div style="display:flex;align-items:center;justify-content:center;justify-items:center;min-height:60%; margin-top:3rem;">

                                                <div style="display:inline-block;" align="center">
                                                    <input type="hidden" name="sex">
                                                    <div class="row">
                                                        <div class="col-xs-6" align="center">
                                                            <img src="{{ url('assets/frontend/images/m3.png') }}" class="img-responsive" style="max-height:200px;" />

                                                            &nbsp;&nbsp;&nbsp;
                                                            <br>
                                                            <a href="#myCarousel" class="btn btn-dark-outline sex-btn" onclick="clickSexBtn(this, 'male')" data-slide="next">Male</a>
                                                        </div>
                                                        <div class="col-xs-6" align="center">
                                                            <img src="{{ url('assets/frontend/images/w3.png') }}" class="img-responsive" style="max-height:200px;" />

                                                            &nbsp;&nbsp;&nbsp;
                                                            <br>
                                                            <a href="#myCarousel" class="btn btn-dark-outline sex-btn" onclick="clickSexBtn(this, 'female')" data-slide="next">Female</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item" style="height:100%;overflow-y:auto;">
                                        <div class="container">
                                            @include('progress')

                                            <h5 style="font-family: 'Be Vietnam Pro', sans-serif;">Don’t worry we won’t tell 😉</h5>
                                            <h3 style="font-weight:bold; font-size:30px; font-family: 'Be Vietnam Pro', sans-serif;">How old are you?</h3>

                                            <div style="display:flex;align-items:center;justify-content:center;justify-items:center;min-height:60%;">

                                                <div style="display:inline-block;" align="center">
                                                    <input id="age" type="number" name="age" min="18" max="120">
                                                    <p id="error-p-tag" class="error-color error-p-tag"> </p>
                                                    <p style="font-weight:bold; margin-top:3rem; font-family: 'Be Vietnam Pro', sans-serif;">Valid age is between 18years - 120years</p>
                                                    <br>

                                                    <a href="#myCarousel" class="btn btn-dark-outline whom-btn" onclick="nextSlide($('#age'), 'Please enter your age!')">Next</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item" style="height:100%;overflow-y:auto;">
                                        <div class="container">
                                            @include('progress')

                                            <h4 style="font-family: 'Be Vietnam Pro', sans-serif;">Got it. Next question...</h4>
                                            <h1 style="font-weight:bold; font-family: 'Be Vietnam Pro', sans-serif;">What’s your height?</h1>

                                            <div style="display:flex;align-items:center;justify-content:center;justify-items:center;min-height:60%;">

                                                <div style="display:inline-block; width: 60%;margin-top: 3rem;" align="center">
                                                    <div style="display:inline-block;margin:25px;">
                                                        <button type="button" class="ft-cm activer" id="ftBtn" onclick="clickTallBtn(this)">ft</button>
                                                        <button type="button" class="ft-cm" id="cmBtn" onclick="clickTallBtn(this)">cm</button>

                                                        <input id="height" type="hidden" name="height" min="60" max="300">
                                                    </div>

                                                    <div id="ft-con" style="margin-bottom:10px; display:flex;justify-content: center;">
                                                        <div class="input-group" id="heightFTcon">
                                                            <input id="heightFT" type="number" id="weightIN" class="height" style="font-size:50px;margin-right:-5px; font-family: 'Be Vietnam Pro', sans-serif;" onkeyup="keyPressTall()" min="2" max="9">
                                                            <span class="input-group-addon" style="padding-left: 15px; padding-top: 20px;padding-right: 20px;  font-size:16px; font-family: 'Be Vietnam Pro', sans-serif;">ft</span>
                                                        </div>
                                                        <div class="input-group" id="heightINcon">
                                                            <input id="heightIN" type="number" class="height" style="font-size:50px;margin-right:-5px; font-family: 'Be Vietnam Pro', sans-serif;" onkeyup="keyPressTall()" min="0" max="11">
                                                            <span class="input-group-addon" style="padding-left: 15px; padding-top: 20px; padding-right: 20px;font-size:16px; font-family: 'Be Vietnam Pro', sans-serif;">in</span>
                                                        </div>


                                                        <div class="input-group" id="heightCMcon">
                                                            <input id="heightCM" type="number" class="height heightHide" style="font-size:50px;margin-right:-5px; font-family: 'Be Vietnam Pro', sans-serif;" onkeyup="keyPressTall()" min="60" max="300">
                                                            <span class="input-group-addon" style="padding-left: 10px; padding-top: 20px; padding-right: 30px;font-size:16px; font-family: 'Be Vietnam Pro', sans-serif;">cm</span>
                                                        </div>

                                                    </div>
                                                    <br>
                                                    <p id="heightMsg">Valid height is 2'-9'11"</p>
                                                    <p id="error-p-tag2" class="error-color"> </p>


                                                    <br>
                                                    <a href="#myCarousel" style="width: 225px; height: 40px;" class="btn btn-dark-outline whom-btn" onclick="nextSlide($('#height'), 'Please enter your height in feets or centimeter!')">Next</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item" style="height:100%;overflow-y:auto;">
                                        <div class="container">
                                            @include('progress')

                                            <h4 style="font-family: 'Be Vietnam Pro', sans-serif;">Great. Last personal detail...</h4>
                                            <h1 style="font-weight:bold; font-family: 'Be Vietnam Pro', sans-serif;">How much do you weigh right now?</h1>

                                            <div style="display:flex;align-items:center;justify-content:center;justify-items:center;min-height:60%;">

                                                <div style="display:inline-block;" align="center">
                                                    <div style="display:inline-block;margin-bottom:30px;">
                                                    </div>

                                                    <div id="ft-con" style="margin-bottom:10px">
                                                        <input id="weight" type="hidden" name="weight" min="23" max="227">

                                                        <input type="number" id="weightIN" class="height" style="display:initial;font-size:50px;text-align:right;padding-right:15px;width:150px; font-family: 'Be Vietnam Pro', sans-serif;" onkeyup="keyPressFat()" min="25" max="230">
                                                        <div style="display:inline;top:-13.5px;left:-7px;position:relative;">
                                                            <button type="button" class="lbs-kg activer" id="kgBtn" onclick="clickFatBtn(this)">kg</button>
                                                            <button type="button" class="lbs-kg" id="lbsBtn" onclick="clickFatBtn(this)">lbs</button>
                                                        </div>

                                                        <p id="weightMsg" style="margin-top: 2rem;">Valid weight is 25kg - 230kg</p>
                                                        <p id="error-p-tag3" class="error-color"> </p>
                                                    </div>

                                                    <br>
                                                    <a href="#myCarousel" class="btn btn-dark-outline whom-btn" onclick="nextSlide($('#weight'), 'We need to know what you weigh! Kindly enter your weight.')">Next</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item" style="height:100%;overflow-y:auto;">
                                        <div class="container">
                                            @php $perc = 50; @endphp
                                            @include('progress')

                                            <h4 style="font-family: 'Be Vietnam Pro', sans-serif;">Now tell us what you want to achieve...</h4>
                                            <h1 style="font-weight:bold; font-family: 'Be Vietnam Pro', sans-serif;">What do you want to achieve?</h1>
                                            <p id="error-p-tag4" class="error-color" style="font-size: 16px; font-family: 'Be Vietnam Pro', sans-serif;"> </p>
                                            <div style="display:flex;align-items:center;justify-content:center;justify-items:center;min-height:60%; margin-top: 2rem">

                                                <div style="display:inline-block;" align="center">
                                                    <!-- <input type="hidden" name="goal"> -->

                                                    <div class="row">
                                                        <div class="col-md-4 col-sm-6" align="center">
                                                            <div class="goal-cards" align="center" onclick="clickGoalBtn(this, 'Lose Weight')" id="LoseWeight">
                                                                <input type="checkbox" name="goal[]" value="Lose Weight">

                                                                <div class="goal-cards3">
                                                                    <img src="{{ url('assets/frontend/images/weight-loss.png') }}" class="img-responsive" style="max-height:100px;" />
                                                                    <h4>Lose Weight</h4>

                                                                    <p>They'd like to lose at least 10 to 15 pounds (or more).</p>
                                                                </div>
                                                                <a href=".goal-cards3" class="triggerInfo">...learn more</a>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-6" align="center">
                                                            <div class="goal-cards" align="center" onclick="clickGoalBtn(this, 'Maintain Weight')" id="MaintainWeight">
                                                                <input type="checkbox" name="goal[]" value="Maintain Weight">

                                                                <div class="goal-cards2">
                                                                    <img src="{{ url('assets/frontend/images/weight-scale.png') }}" class="img-responsive" style="max-height:100px;" />
                                                                    <h4>Maintain Weight</h4>

                                                                    <p>You want to maintain optimal health to support long and intense athletic training. (Minimal to no weight change desired.)</p>
                                                                </div>
                                                                <a href=".goal-cards2" class="triggerInfo">...learn more</a>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-6" align="center">
                                                            <div class="goal-cards" align="center" onclick="clickGoalBtn(this, 'Improve Health')">
                                                                <input type="checkbox" name="goal[]" value="Improve Health">

                                                                <div class="goal-cards1">
                                                                    <img src="{{ url('assets/frontend/images/health.png') }}" class="img-responsive" style="max-height:100px;" />
                                                                    <h4>Improve Health</h4>

                                                                    <p>They want to improve their nutrition and overall health, while maintaining their current weight.</p>
                                                                </div>
                                                                <a href=".goal-cards1" class="triggerInfo">...learn more</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <br>
                                                    <a href="#myCarousel" id="goalNext" class="btn btn-dark-outline whom-btn" onclick="nextGoal($(this))" style="width: 300px;">Next</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item" style="height:100%;overflow-y:auto;">
                                        <div class="container">
                                            @include('progress')

                                            <h4 style="font-family: 'Be Vietnam Pro', sans-serif;">Let's get really specific on this....</h4>
                                            <h1 style="font-weight:bold; font-family: 'Be Vietnam Pro', sans-serif;">What’s your target weight?</h1>
                                            <p id="error-p-tag6" class="error-color" style="font-size: 16px; font-family: 'Be Vietnam Pro', sans-serif;"> </p>
                                            <div style="display:flex;align-items:center;justify-content:center;justify-items:center;min-height:60%;padding-top:25px;">

                                                <div style="display:inline-block;" align="center">
                                                    <div id="ft-con_aim" style="margin-bottom:10px;">
                                                        <input id="weight_aim" type="hidden" name="weight_aim" min="25" max="230">


                                                        <input type="number" id="weightIN_aim" class="height" style="display:initial;font-size:50px;text-align:right;padding-right:15px;width:150px; font-family: 'Be Vietnam Pro', sans-serif;" onkeyup="keyPressFat_aim()" min="23" max="227">
                                                        <div style="display:inline;top:-13.5px;left:-5px;position:relative;">
                                                            <button type="button" class="lbs-kg activeree" id="kgBtn_aim" onclick="clickFatBtn_aim(this)">kg</button>
                                                            <button type="button" class="lbs-kg" id="lbsBtn_aim" onclick="clickFatBtn_aim(this)">lbs</button>
                                                        </div>

                                                        <p id="weightMsg_aim">Valid weight is 25kg - 230kg</p>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-2"></div>
                                                        <div class="col-lg-8">
                                                            <h3 style="font-weight:bold;margin-top:42px; font-family: 'Be Vietnam Pro', sans-serif;">In how many months will you like to achieve this goal?</h3>
                                                        </div>
                                                        <div class="col-lg-2"></div>
                                                    </div>

                                                    <div id="ft-con_aim" style="margin-bottom:10px;padding-top:15px;">

                                                        <input type="number" name="weight_time_aim" class="height" style="display:initial;font-size:30px;text-align:center;padding-right:15px;width:170px; font-family: 'Be Vietnam Pro', sans-serif;">
                                                        <small style="display:block;margin-top:15px;width:70vw;font-size:16px;font-weight:bold; font-family: 'Be Vietnam Pro', sans-serif;">Please let's be realistic here. Extreme weight loss is not usually sustainable. We recommend a target of 4 - 5kg per month.</small>
                                                    </div>

                                                    <div id="myModalInfo" class="modal fade" role="dialog">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <br>
                                                    <a href="#myCarousel" class="btn btn-dark-outline whom-btn" onclick="nextGoal($(this))" style="width: 300px;">Next</a><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item" style="height:100%;overflow-y:auto;">
                                        <div class="container">
                                            @php $perc = 75; @endphp
                                            @include('progress')

                                            <h4 style="font-family: 'Be Vietnam Pro', sans-serif;">Cool. Let's go a little deeper on exercise...</h4>
                                            <h1 style="font-weight:bold; font-family: 'Be Vietnam Pro', sans-serif;">How physically active are you?</h1>
                                            <p id="error-p-tag5" class="error-color" style="font-size: 16px; font-family: 'Be Vietnam Pro', sans-serif;"> </p>
                                            <div style="display:flex;align-items:center;justify-content:center;justify-items:center;min-height:60%;">

                                                <div style="display:inline-block;" align="center">
                                                    <input type="hidden" name="workout">

                                                    <div class="row">
                                                        <div class="col-md-1"></div>

                                                        <div class="col-md-12 col-sm-6" align="center">
                                                            <div class="physical-actw">
                                                                <div class="workout-cards" align="center" onclick="clickWorkoutBtn(this, 'Sedentary')">
                                                                    <div class="workout-cards0" style="display: flex; justify-content:space-between;">
                                                                        <div class="physical-actM" style="width: 60%;">
                                                                            <h4>Sedentary</h4>
                                                                            <p>Little to no regular exercise.</p>
                                                                            <a href=".workout-cards0" class="triggerInfo">...learn more</a>
                                                                        </div>
                                                                        <img src="{{ url('assets/frontend/images/_Very Light.png') }}" class="img-responsive" style="max-height:100px;" />
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-12 col-sm-6" align="center">
                                                            <div class="physical-actw">
                                                                <div class="workout-cards" align="center" onclick="clickWorkoutBtn(this, 'Mildly Active')">
                                                                    <div class="workout-cards1" style="display: flex; justify-content:space-between;">
                                                                        <div class="physical-actM">
                                                                            <h4>Mild Activity</h4>
                                                                            <p style="
    font-size: 9px;">Intense exercise for at least 20 minutes 1-3 times per week. This may include things like brisk walking, bicycling, jogging, basketball, swimming etc. If you do not exercise regularly, but you maintain a busy life that requires you to walk frequently for long periods, you meet the requirements for this level.</p>
                                                                            <a href=".workout-cards1" class="triggerInfo">...learn more</a>
                                                                        </div>
                                                                        <img src="{{ url('assets/frontend/images/_Light.png') }}" class="img-responsive" style="max-height:100px;" />


                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-12 col-sm-6" align="center">
                                                            <div class="physical-actw">
                                                                <div class="workout-cards" align="center" onclick="clickWorkoutBtn(this, 'Moderately Active')">
                                                                    <div class="workout-cards2" style="display: flex; justify-content:space-between;">
                                                                        <div class="physical-actM">
                                                                            <h4>Moderate Activity</h4>
                                                                            <p>Intense exercise for 60min 3 to 4 times per week. Any of the activities listed above will qualify.</p>
                                                                            <a href=".workout-cards2" class="triggerInfo">...learn more</a>
                                                                        </div>
                                                                        <img src="{{ url('assets/frontend/images/_Moderate.png') }}" class="img-responsive" style="max-height:100px;" />


                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-12 col-sm-6" align="center">
                                                            <div class="physical-actw">
                                                                <div class="workout-cards" align="center" onclick="clickWorkoutBtn(this, 'Heavily Active')">
                                                                    <div class="workout-cards3" style="display: flex; justify-content:space-between;">
                                                                        <div class="physical-actM">
                                                                            <h4>Heavy or Labour Intensive Activity</h4>
                                                                            <p>Intense exercise for 60min or greater, 5 to 7 days per week. Labour intensive occupations also qualify for this level, such as bricklaying, carpentry, general labour, farming etc.</p>
                                                                            <a href=".workout-cards3" class="triggerInfo">...learn more</a>
                                                                        </div>
                                                                        <img src="{{ url('assets/frontend/images/_Intense.png') }}" class="img-responsive" style="max-height:100px;" />


                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-12 col-sm-6" align="center">
                                                            <div class="physical-actw">
                                                                <div class="workout-cards" align="center" onclick="clickWorkoutBtn(this, 'Extremely Active')">
                                                                    <div class="workout-cards4" style="display: flex; justify-content:space-between;">
                                                                        <div class="physical-actM">
                                                                            <h4>Extreme Activity</h4>
                                                                            <p style="
    font-size: 9px;">Exceedingly active and/ or very demanding activities, such as athlete with an almost unstoppable training schedule, very demanding jobs such as shovelling coal or working long hours on an assembly line.</p>
                                                                            <a href=".workout-cards4" class="triggerInfo">...learn more</a>
                                                                        </div>
                                                                        <img src="{{ url('assets/frontend/images/_Very Intense.png') }}" class="img-responsive" style="max-height:100px;" />


                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="col-md-1"></div>
                                                    </div>

                                                    <br>
                                                    <a href="#myCarousel" class="btn btn-dark-outline whom-btn" onclick="nextGoal($(this))" style="width: 300px;">Next</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item" style="height:100%;overflow-y:auto;">
                                        <div class="container">
                                            @include('progress')

                                            <h4 style="font-family: 'Be Vietnam Pro', sans-serif;">Now tell us what you want to achieve...</h4>
                                            <h1 style="font-weight:bold; font-family: 'Be Vietnam Pro', sans-serif;">Are you managing any of this health conditions?</h1>

                                            <div>
                                                <!-- <div style="display:flex;align-items:center;justify-content:center;justify-items:center;min-height:60%; margin-top:2rem"> -->

                                                <div align="center">

                                                    <div class="row">
                                                        <div class="col-md-1"></div>

                                                        <div class="col-md-2 col-sm-6" align="center">
                                                            <div class="activity-cards" align="center" onclick="clickActivityBtn(this, 'Very Light')">
                                                                <input type="checkbox" name="activity[]" value="High Cholesterol">

                                                                <img src="{{ url('assets/frontend/images/blood-vessel.png') }}" class="img-responsive" style="max-height:100px; height: 60px;" />
                                                                <h4 style="font-size: 15px;">High Cholesterol</h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 col-sm-6" align="center">
                                                            <div class="activity-cards" align="center" onclick="clickActivityBtn(this, 'Light')">
                                                                <input type="checkbox" name="activity[]" value="Hypertension">

                                                                <img src="{{ url('assets/frontend/images/hypertension.png') }}" class="img-responsive" style="max-height:100px;  height: 60px;" />
                                                                <h4 style="font-size: 12px;">Hypertension</h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 col-sm-6" align="center">
                                                            <div class="activity-cards" align="center" onclick="clickActivityBtn(this, 'Moderate')">
                                                                <input type="checkbox" name="activity[]" value="Diabetes">

                                                                <img src="{{ url('assets/frontend/images/blood-test.png') }}" class="img-responsive" style="max-height:100px; height: 60px;" />
                                                                <h4 style="font-size: 15px;">Diabetes</h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 col-sm-6" align="center">
                                                            <div class="activity-cards" align="center" onclick="clickActivityBtn(this, 'Heavy')">
                                                                <input type="checkbox" name="activity[]" value="Pre-diabetes">

                                                                <img src="{{ url('assets/frontend/images/glucosemeter.png') }}" class="img-responsive" style="max-height:100px; height: 60px;" />
                                                                <h4 style="font-size: 15px;">Pre-diabetes</h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 col-sm-6" align="center">
                                                            <div class="activity-cards" align="center" onclick="clickActivityBtn(this, 'None')">
                                                                <input type="checkbox" name="activity[]" value="None">

                                                                <img src="{{ url('assets/frontend/images/cancel.png') }}" class="img-responsive" style="max-height:100px; height: 60px;" />
                                                                <h4 style="font-size: 15px;">None</h4>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-1"></div>
                                                    </div>

                                                    <br>
                                                    <a href="#myCarousel" class="btn btn-dark-outline whom-btn" onclick="submitForm()" style="width: 300px;">Next</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item" style="height:100%;overflow-y:auto;">
                                        <div class="container">
                                            @php $perc = 100; @endphp
                                            @include('progress')

                                            <div style="display:flex;align-items:center;justify-content:center;justify-items:center;min-height:60%;">
                                                <div style="display:inline-block;" align="center">

                                                    <div class="row invalid-result">
                                                        <div class="col-md-3"></div>
                                                        <div class="col-md-6" align="center" id="invalid-msg">
                                                        </div>
                                                        <div class="col-md-3"></div>
                                                    </div>
                                                    <hr class="valid-result" style="margin-top: 0px; margin-bottom: 0px">
                                                    <div class="row valid-result">
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-8" align="center">
                                                            <h2 align="left" style="font-family: 'Be Vietnam Pro', sans-serif;">Brief Summary</h2>
                                                            <table class="table table-striped">
                                                                <tr>
                                                                    <td><span> <img src="{{ url('assets/frontend/images/age-group.png') }}" class="img-responsive" style="width: 20px" /></span></td>
                                                                    <td style="font-family: 'Be Vietnam Pro', sans-serif;">Age</td>
                                                                    <td style="font-family: 'Be Vietnam Pro', sans-serif;" id="res-age"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span><img src="{{ url('assets/frontend/images/weight.png') }}" class="img-responsive" style="width: 20px" /></span></td>
                                                                    <td style="font-family: 'Be Vietnam Pro', sans-serif;"> Current Weight</td>
                                                                    <td id="res-weight" style="font-family: 'Be Vietnam Pro', sans-serif;"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span><img src="{{ url('assets/frontend/images/height.png') }}" class="img-responsive" style="width: 20px" /></span></td>
                                                                    <td style="font-family: 'Be Vietnam Pro', sans-serif;">Height</td>
                                                                    <td id="res-height" style="font-family: 'Be Vietnam Pro', sans-serif;"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span><img src="{{ url('assets/frontend/images/exercise.png') }}" class="img-responsive" style="width: 20px" /></span></td>
                                                                    <td style="font-family: 'Be Vietnam Pro', sans-serif;">Level of Activity</td>
                                                                    <td id="res-activity" style="font-family: 'Be Vietnam Pro', sans-serif;"></td>
                                                                </tr>
                                                            </table>

                                                            <div class="weightMaintainResult">
                                                                <p style="font-family: 'Be Vietnam Pro', sans-serif;">
                                                                    Here’s the number of calories you need to consume to maintain your current weight::
                                                                </p>

                                                                <h3>
                                                                    <span class="calories" style="font-family: 'Be Vietnam Pro', sans-serif;"></span>cal<br>
                                                                    <small class="min-calory" style="font-family: 'Be Vietnam Pro', sans-serif;">The recommended minimum is <b>1200cal</b> per day to meet your body’s nutritional needs.</small>
                                                                    <br>
                                                                    <small class="min-calory" style="font-family: 'Be Vietnam Pro', sans-serif;">So you here are your options, you can increase the time it’ll take to reach your goal, and/ or increase your level of physical activity.</small>
                                                                    <br>
                                                                    <small class="min-calory" style="font-family: 'Be Vietnam Pro', sans-serif;">With this in mind, kindly click the button below to recalculate your calorie needs</small>
                                                                    <br>
                                                                </h3>
                                                                <div class="">
                                                                    <p style="font-family: 'Be Vietnam Pro', sans-serif;">See how the number changes based on your level of activity.</p>
                                                                    <table cellpadding="2" cellspacing="2">
                                                                        <tr>
                                                                            <td id="SedentaryCalory">
                                                                                <div class="calory-box">
                                                                                    <h2>1200</h2>
                                                                                    <small>calories</small>
                                                                                    <p>Sedentary</p>
                                                                                </div>
                                                                            </td>
                                                                            <td id="MildCalory">
                                                                                <div class="calory-box">
                                                                                    <h2>1200</h2>
                                                                                    <small>calories</small>
                                                                                    <p>Mild</p>
                                                                                </div>
                                                                            </td>
                                                                            <td id="ModerateCalory">
                                                                                <div class="calory-box">
                                                                                    <h2>1200</h2>
                                                                                    <small>calories</small>
                                                                                    <p>Moderate</p>
                                                                                </div>
                                                                            </td>
                                                                            <td id="HeavyCalory">
                                                                                <div class="calory-box">
                                                                                    <h2>1200</h2>
                                                                                    <small>calories</small>
                                                                                    <p>Heavy</p>
                                                                                </div>
                                                                            </td>
                                                                            <td id="ExtremeCalory">
                                                                                <div class="calory-box">
                                                                                    <h2>1200</h2>
                                                                                    <small>calories</small>
                                                                                    <p>Extreme</p>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>

                                                            <div class="weightLossResult"><br>
                                                                <p style="font-family: 'Be Vietnam Pro', sans-serif;">
                                                                    To lose <b id="res-weight-text">28kg</b> over the next <b id="res-period-text">28kg</b>, at your current level of activity and weight, you’ll need to consume:
                                                                </p>

                                                                <h3 style="font-family: 'Be Vietnam Pro', sans-serif;">
                                                                    <span class="calories"></span>cal per day<br>
                                                                    <small class="min-calory" style="color:#FF9494;">The recommended minimum is <b>1200cal</b> per day to meet your body’s nutritional needs.</small>
                                                                    <br>
                                                                    <small class="min-calory" style="color:#FF9494;">So you here are your options, you can increase the time it’ll take to reach your goal, and/ or increase your level of physical activity.</small>
                                                                    <br>
                                                                    <small class="min-calory" style="color:#FF9494;">With this in mind, kindly click the button below to recalculate your calorie needs</small>
                                                                </h3>

                                                                <p class="recalc-next" style="font-family: 'Be Vietnam Pro', sans-serif;">
                                                                    Now that we’ve established your calorie needs to achieve your goal, let’s set-up your food preferences, and eating pattern.
                                                                </p>
                                                                <p>
                                                                    <a href="javascript:void(0)" onclick="$('#myCarousel').carousel(6);" class="btn btn-dark valid-result" onclick="">Recalculate</a>&nbsp;&nbsp;

                                                                    <span class="recalc-next">
                                                                        <a href="#myCarousel" class="btn btn-dark valid-result" onclick="nextGoal($(this))">Next</a>
                                                                    </span>

                                                                    <br>
                                                                    <br>
                                                                    <br>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2"></div>
                                                    </div>

                                                    <div class="weightMaintainResult" style="margin-top: 3rem">
                                                        <p style="font-family: 'Be Vietnam Pro', sans-serif;">
                                                            Now that we’ve established your calorie needs to achieve your goal, let’s set-up your food preferences, and eating pattern.
                                                        </p>
                                                        <br>

                                                        <a href="#myCarousel" class="btn btn-dark-outline valid-result" onclick="nextGoal($(this))" style="width: 300px;">Next</a><br><br><br><br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" name="calories" id="caloriesField">
                                    </div>

                                    <div class="item" style="height:100%;overflow-y:auto;">
                                        <div class="container">
                                            <h1 style="font-weight:bold; font-family: 'Be Vietnam Pro', sans-serif;">How many main meals do you eat a day?</h1>

                                            <div style="display:flex;align-items:center;justify-content:center;justify-items:center;min-height:60%;">

                                                <div style="display:inline-block;" align="center">
                                                    <select name="main_meal">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                    </select>

                                                    <a href="#myCarousel" class="btn btn-dark-outline whom-btn" onclick="" data-slide="next">Next</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item" style="height:100%;overflow-y:auto;">
                                        <div class="container">
                                            <h1 style="font-weight:bold; font-family: 'Be Vietnam Pro', sans-serif;">And how many times do you snack?</h1>

                                            <div style="display:flex;align-items:center;justify-content:center;justify-items:center;min-height:60%;">

                                                <div style="display:inline-block;" align="center">
                                                    <select name="snack_meal">
                                                        <option>0</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                    </select>

                                                    <a href="#myCarousel" class="btn btn-dark-outline whom-btn" onclick="" data-slide="next">Next</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php $rf = 0; ?>
                                    @foreach($food_options as $typ=>$fts)
                                    <?php $rf++; ?>
                                    <div class="item" style="height:100%;overflow-y:auto;">
                                        <div class="container">
                                            <h4 style="font-weight:bold; font-size: 15px; font-family: 'Be Vietnam Pro', sans-serif;">Now it’s time to choose the foods you enjoy, and have easy access to. Don’t worry if you consider them healthy or not, let us worry about that. If you like it, and it's available around you, tick it!</h4>
                                            <!-- <h4 style="font-weight:bold; font-size: 15px; font-family: 'Be Vietnam Pro', sans-serif;">Don’t worry if you consider them healthy or not, just choose the options you enjoy eating</h4> -->
                                            <h1>{{ $typ }}</h1><br>

                                            <div style="display:flex;align-items:center;justify-content:center;justify-items:center;min-height:60%;">

                                                <div style="display:inline-block;width:100%;" align="center">
                                                    <div class="row">
                                                        @foreach($fts as $ft)
                                                        <div class="col-md-3">
                                                            <div class="food-options" align="center" onclick="clickFoodsBtn(this)">
                                                                <input type="checkbox" name="food_options[]" value="{{ '['.$ft.']' }}"> {{ $ft }}
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>

                                                    @if($typ=='Sweetners and Others')
                                                    <div style="display:inline-block;" align="center">
                                                        <br><br>
                                                        <p style="font-weight:bold; font-family: 'Be Vietnam Pro', sans-serif;">
                                                            Others (List any other food you would like me to include)
                                                        </p>
                                                        <textarea style="margin-top:20px;width:350px;height:155px;font-size:18px;padding:8px;resize:none; font-family: 'Be Vietnam Pro', sans-serif;" name="food_options[]"></textarea>
                                                    </div>
                                                    @endif

                                                    <br><br>
                                                    @if($rf==count($food_options))
                                                    <p id="proceed-msg" align="center"></p>
                                                    <a href="#myCarousel" class="btn btn-dark-outline whom-btn" onclick="proceedVal('last')" style="width: 300px;">Next</a>
                                                    @else
                                                    <a href="#myCarousel" class="btn btn-dark-outline whom-btn" onclick="proceedVal('')" style="width: 300px;">Next</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                    <div class="item" style="height:100%;overflow-y:auto;">
                                        <div class="container">
                                            <h1 style="font-weight:bold; font-family: 'Be Vietnam Pro', sans-serif;">Yaaay! Your FREE Meal Plan is ready!</h1>
                                            <h3 align="center" style="font-family: 'Be Vietnam Pro', sans-serif;">We have just created your fully CUSTOMIZED 30 day meal plan!</h3>

                                            <h4 style="font-family: 'Be Vietnam Pro', sans-serif;">Enter your name and best email below to get 2 FULL days of the meal plan completely FREE!</h4>

                                            <div style="display:flex;align-items:center;justify-content:center;justify-items:center;min-height:60%;">

                                                <div style="display:inline-block;" align="center">
                                                    <br><br>
                                                    <input class="bestest" placeholder="Full Name" type="text" name="best_name">
                                                    <br>
                                                    <input class="bestest" placeholder="Best Email" type="email" name="best_email">
                                                    <br>
                                                    <br>
                                                    <label for="suggestions" style="font-family: 'Be Vietnam Pro', sans-serif;">List any other food option you will like us to add </label>
                                                    <br>
                                                    <input class="bestest" type="text" name="suggestions">


                                                    <button type="submit" style="width:240px;border-radius:3px;margin-top:20px;" class="btn btn-dark-outline whom-btn" onclick="">Save </button>

                                                    <!-- <a href="#myCarousel" style="width:200px;border-radius:3px;margin-top:20px;" class="btn btn-dark-outline whom-btn" >Send me my FREE PLAN</a> -->
                                                    <!-- data-slide="next" onclick="sendEmailPost()"-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item" style="height:100%;overflow-y:auto;">
                                        <div class="container">
                                            <h4>Yay! Your 2-day FREE PLAN has been sent to your provided email.</h4>
                                            <h1 style="font-weight:bold; font-family: 'Be Vietnam Pro', sans-serif;">If you would like to get the complete 30-day plan, click below</h1>

                                            <div style="display:flex;align-items:center;justify-content:center;justify-items:center;min-height:60%;">

                                                <div style="display:inline-block;" align="center">
                                                    <!-- <button type="submit" style="width:240px;border-radius:3px;margin-top:20px;" class="btn btn-dark-outline whom-btn" onclick="">I want the complete PLAN</button> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<div id="infoModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="border-bottom:0px;">
                <a href="javascript:void(0)" onclick="$('#infoModal').modal('hide')" style="color:#000">
                    <small class="direction-right" id="closeInfo">
                        <img src="{{ url('assets/frontend/images/cancel.png') }}" style="height:24px;" />
                        Cancel
                    </small>
                </a>
            </div>
            <div class="modal-body" id="infoContent" style="min-height:200px;color:#000 !important;" align="center">
                Content coming soon...
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer_js')
<script type="text/javascript">
    $('#backBtn').hide();
    $('#backBtn').click(function() {
        var goals = $('input[name="goal[]"]:checked').map(function() {
            return $(this).val();
        }).get();

        var ind = $('#myCarousel').find('.active').index();
        if (goals.includes("Maintain Weight") && ind == 7) {
            $('#myCarousel').carousel(5);
        } else {
            $('#myCarousel').carousel('prev');
        }
    });
    $('#heightCMcon').hide();

    $('.carousel').carousel({
        interval: false,
    }).on('slid.bs.carousel', function() {
        curSlide = $('.active');
        var ind = parseInt($('#myCarousel').find('.active').index());
        var frst = $('#myCarousel').find('.active').attr('class').split(/\s+/);

        if (frst.includes('firstest')) {
            $('#backBtn').hide();
        } else {
            $('#backBtn').show();
        }
    });
    $.fn.serializeObject = function() {
        var o = {};
        var a = this.serializeArray();
        $.each(a, function() {
            if (o[this.name]) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };
    $('.triggerInfo').click(function(e) {
        e.preventDefault();
        $('#infoModal').modal('show');

        var rf = $(this).attr('href');
        var cont = $(rf).html();
        // console.log(cont);
        $('#infoContent').html("");
        $('#infoContent').append(cont);
    });

    function count(string) {
        var count = 0;
        string.split('').forEach(function(s) {
            count++;
        });
        return count;
    }

    function nextGoal(e) {
        var ind = parseInt($('#myCarousel').find('.active').index());
        var datum = $('#calcForm').serializeObject();
        if (ind == 5 && datum['goal[]'] == undefined) {
            // alert("Kindly pick an option to proceed");
            $('#error-p-tag4').text("Kindly pick an option to proceed").show()
            return false;
        } else if (ind == 7 && (datum.workout == undefined || datum.workout == "")) {
            // alert("Kindly pick an activity to proceed");
            $('#error-p-tag5').text("Kindly pick an activity to proceed").show()
            return false;
        } else if (ind == 6) {
            if ($('#weightIN_aim').val() == "" || $('input[name="weight_time_aim"]').val() == "") {
                // alert("Kindly let us know how much you want to weigh and in how much time.");
                $('#error-p-tag6').text("Kindly let us know how much you want to weight and in how much time.").show()
                return false;
            }
            // TO DETERMINE THE WEIGHT LOSS TIME
            var ht = datum.weight;
            var htALL = ht.split(' ');
            var htTYPE = htALL[1];
            var convKG = convLBS = workoutIndex = added = calories = "";
            var KG = 0;
            if (htTYPE == 'lbs') {
                KG = Math.round(htALL[0] / 2.20462);
            } else {
                KG = parseInt(htALL[0]);
            }
            var weightToLosex = weightToLose(datum, KG);
            // TO DETERMINE THE WEIGHT LOSS TIME

            if (isNaN(weightToLosex)) {
                alert(weightToLosex);
                return false;
            } else {
                var checkWeightLosex = checkWeightLose(parseInt(datum.weight_time_aim), weightToLosex);
                if (isNaN(checkWeightLosex)) {
                    $('#myModalInfo .modal-body').html(checkWeightLosex);
                    $('#myModalInfo').modal('show');
                    return false;
                } else {
                    $('#myCarousel').carousel('next');
                    $('#error-p-tag6').hide();
                }
            }
        } else {
            if (e.attr('id') == 'goalNext') {
                var goals = $('input[name="goal[]"]:checked').map(function() {
                    return $(this).val();
                }).get();

                if (goals.includes("Maintain Weight"))
                    $('#myCarousel').carousel(7);
            }
            $('#myCarousel').carousel('next');
            $('#error-p-tag4').hide();
            $('#error-p-tag5').hide();
        }
    }

    function nextSlide(e, msg) {
        var min = parseInt(e.attr('min'));
        var minC = count(min + '');
        var max = parseInt(e.attr('max'));
        var val = parseInt(e.val());
        var valC = count(val + '');

        if (e.val() == '' || e.val() == '0') {
            // console.log(e.selector);
            if (e.selector == '#age') {
                $('#error-p-tag').text(msg).show()
                e.addClass("error-input-border");
            } else if (e.selector == '#height') {
                $('#error-p-tag2').text(msg).show()
            } else {
                $('#error-p-tag3').text(msg).show()
            }
            // alert(msg);

        } else {
            // e.addClass("error-input-border");
            if ((val < min || val > max)) // && (valC >= minC))
            {
                // alert("Your input value must not be:\n\n-  Lesser than " + min + "\n-  Greater than " + max);
                if (e.selector == '#age') {
                    $('#error-p-tag').text("Your input value must not be:\n\n-  Lesser than " + min + "\n-  Greater than " + max).show();
                } else if (e.selector == '#height') {
                    $('#error-p-tag2').text("Your input value must not be:\n\n-  Lesser than " + min + "\n-  Greater than " + max).show();
                } else {
                    $('#error-p-tag3').text("Your input value must not be:\n\n-  Lesser than " + min + "\n-  Greater than " + max).show();
                }
                // $('#error-p-tag').text("Your input value must not be:\n\n-  Lesser than " + min + "\n-  Greater than " + max).show();
            } else {
                $('#myCarousel').carousel('next');
                e.removeClass("error-input-border");
                $('#error-p-tag').hide()
                $('#error-p-tag2').hide()
                $('#error-p-tag3').hide()
            }
        }
    }

    function clickWhomBtn(e, r) {
        $('.whom-btn').removeClass('btn-dark');
        $('.whom-btn').addClass('btn-dark-outline');
        $(e).removeClass('btn-dark-outline');
        $(e).addClass('btn-dark');

        $('input[name="whom"]').val(r);
    }

    function clickSexBtn(e, r) {
        $('.sex-btn').removeClass('btn-dark');
        $('.sex-btn').addClass('btn-dark-outline');
        $(e).removeClass('btn-dark-outline');
        $(e).addClass('btn-dark');

        $('input[name="sex"]').val(r);
    }

    function keyPressTall() {
        var ht = $('input[name="height"]').val();
        var htCM = parseInt($('#heightCM').val());
        var htFT = parseInt($('#heightFT').val());
        var htIN = parseInt($('#heightIN').val());
        var valCM = valFT = valIN = htCM ? htCM : ((htFT) ? ((htFT * 12) + htIN) * 2.54 : 0);

        $('input[name="height"]').val(Math.round(valCM));
    }

    function clickTallBtn(e) {
        $('.ft-cm').removeClass('activer');
        $(e).addClass('activer');
        var ht = $('input[name="height"]').val();
        var htCM = parseInt($('#heightCM').val());
        var htFT = parseInt($('#heightFT').val());
        var htIN = parseInt($('#heightIN').val());
        var valCM = valFT = valIN = htCM ? htCM : ((htFT) ? ((htFT * 12) + htIN) * 2.54 : 0);

        var whc = $(e).attr('id');
        if (whc == 'cmBtn') {
            $('#heightMsg').html("Valid height is 60cm - 300cm");
            $('#heightCM').show();
            $('#heightCMcon').show();
            $('#heightCM').val(Math.round(valCM));

            $('#heightFT').val("").hide();
            $('#heightFTcon').hide();
            $('#heightIN').val("").hide();
            $('#heightINcon').hide();
        } else {
            valIN = valCM / 2.54;
            valFT = Math.floor(valIN / 12);
            valIN = Math.round(valIN % 12);
            if (valIN == 12) {
                valIN = 0;
                valFT += 1;
            }
            $('#heightMsg').html("Valid height is 2ft - 9ft 11\"");
            $('#heightFT').show();
            $('#heightFTcon').show();
            $('#heightFT').val(valFT);
            $('#heightIN').show();
            $('#heightINcon').show();
            $('#heightIN').val(valIN);

            $('#heightCM').val("").hide();
            $('#heightCMcon').hide();
        }

        $('input[name="height"]').val(Math.round(valCM));
    }

    function keyPressFat() {
        var ht = $('input[name="weight"]').val();
        var htIN = $('#weightIN').val();
        var htALL = ht.split(' ');
        var htTYPE = "kg";

        if (ht != '')
            htTYPE = htALL[1];
        if (isNaN(htIN) || htIN == '' || !htIN)
            htIN = 0;

        $('input[name="weight"]').val(htIN + ' ' + htTYPE);
    }

    function clickFatBtn(e) {
        $('.lbs-kg').removeClass('activer');
        $(e).addClass('activer');
        var ht = $('input[name="weight"]').val();
        var htIN = $('#weightIN').val();
        var htALL = ht.split(' ');
        var htTYPE = "kg";

        if (ht != '')
            htTYPE = htALL[1];
        if (isNaN(htIN) || htIN == '' || !htIN)
            htIN = 0;

        var whc = $(e).attr('id');
        if (whc == 'kgBtn') {
            if (htTYPE != 'kg') {
                htIN = Math.round(htIN / 2.20462);
                htTYPE = 'kg';
                $('#weightIN').val(htIN);
                $('#weightIN').attr('min', '25');
                $('#weightIN').attr('max', '230');
                $('#weight').attr('min', '25');
                $('#weight').attr('max', '230');
            }
            $('#weightMsg').html("Valid weight is 25kg - 230 kg");
        } else {
            if (htTYPE == 'kg') {
                htIN = Math.round(htIN * 2.20462);
                htTYPE = 'lbs';
                $('#weightIN').val(htIN);
                $('#weightIN').attr('min', '50');
                $('#weightIN').attr('max', '500');
                $('#weight').attr('min', '50');
                $('#weight').attr('max', '500');
            }
            $('#weightMsg').html("Valid weight is 50lbs - 500lbs");
        }

        $('input[name="weight"]').val(htIN + ' ' + htTYPE);
    }

    function keyPressFat_aim() {
        var ht = $('input[name="weight_aim"]').val();
        var htIN = $('#weightIN_aim').val();
        var htALL = ht.split(' ');
        var htTYPE = "kg";

        if (ht != '')
            htTYPE = htALL[1];
        if (isNaN(htIN) || htIN == '' || !htIN)
            htIN = 0;

        $('input[name="weight_aim"]').val(htIN + ' ' + htTYPE);
    }

    function clickFatBtn_aim(e) {
        $('.lbs-kg').removeClass('activeree');
        $(e).addClass('activeree');
        var ht = $('input[name="weight_aim"]').val();
        var htIN = $('#weightIN_aim').val();
        var htALL = ht.split(' ');
        var htTYPE = "kg";

        if (ht != '')
            htTYPE = htALL[1];
        if (isNaN(htIN) || htIN == '' || !htIN)
            htIN = 0;

        var whc = $(e).attr('id');
        if (whc == 'kgBtn_aim') {
            if (htTYPE != 'kg') {
                htIN = Math.round(htIN / 2.20462);
                htTYPE = 'kg';
                $('#weightIN_aim').val(htIN);
                $('#weightIN_aim').attr('min', '23');
                $('#weightIN_aim').attr('max', '227');
                $('#weight_aim').attr('min', '23');
                $('#weight_aim').attr('max', '227');
            }
            $('#weightMsg_aim').html("Valid weight is 23kg - 227 kg");
        } else {
            if (htTYPE == 'kg') {
                htIN = Math.round(htIN * 2.20462);
                htTYPE = 'lbs';
                $('#weightIN_aim').val(htIN);
                $('#weightIN_aim').attr('min', '50');
                $('#weightIN_aim').attr('max', '500');
                $('#weight_aim').attr('min', '50');
                $('#weight_aim').attr('max', '500');
            }
            $('#weightMsg_aim').html("Valid weight is 50lbs - 500lbs");
        }

        $('input[name="weight_aim"]').val(htIN + ' ' + htTYPE);
    }

    function clickGoalBtn(e, r) {
        var goals = $('input[name="goal[]"]:checked').map(function() {
            return $(this).val();
        }).get();

        var input = $(e).children('input[type="checkbox"]');
        var actChk = input.is(':checked');
        var valChk = input.val();

        if (goals.includes("Maintain Weight") && valChk == "Lose Weight") {
            $("#MaintainWeight").children('input[type="checkbox"]').prop('checked', false);
            $("#MaintainWeight").removeClass('greyed-bg');

            input.prop('checked', true);
            $(e).addClass('greyed-bg');
        } else if (goals.includes("Lose Weight") && valChk == "Maintain Weight") {
            $("#LoseWeight").children('input[type="checkbox"]').prop('checked', false);
            $("#LoseWeight").removeClass('greyed-bg');

            input.prop('checked', true);
            $(e).addClass('greyed-bg');
        } else {
            if (actChk === true) {
                input.prop('checked', false);
                $(e).removeClass('greyed-bg');
            } else {
                input.prop('checked', true);
                $(e).addClass('greyed-bg');
            }
        }
    }

    function clickFoodBtn(e, r) {
        $('.food-cards').removeClass('greyed-bg');
        $(e).addClass('greyed-bg');

        $('input[name="food"]').val(r);
    }

    function clickRatioBtn(e, r) {
        $('.ratio-btn').removeClass('btn-dark');
        $('.ratio-btn').addClass('btn-dark-outline');
        $(e).removeClass('btn-dark-outline');
        $(e).addClass('btn-dark');

        $('input[name="ratios"]').val(r);
    }

    function clickWorkoutBtn(e, r) {
        $('.workout-cards').removeClass('greyed-bg');
        $(e).addClass('greyed-bg');

        $('input[name="workout"]').val(r);
    }

    function clickActivityBtn(e, r) {
        var input = $(e).children('input[type="checkbox"]');
        var actChk = input.is(':checked');

        if (actChk === true) {
            input.prop('checked', false);
            $(e).removeClass('greyed-bg');
        } else {
            input.prop('checked', true);
            $(e).addClass('greyed-bg');
        }
    }

    function clickFoodsBtn(e, r) {
        var input = $(e).children('input[type="checkbox"]');
        var actChk = input.is(':checked');

        if (actChk === true) {
            input.prop('checked', false);
            $(e).removeClass('greyed-bg');
        } else {
            input.prop('checked', true);
            $(e).addClass('greyed-bg');
        }
    }

    function proceedVal(ref = '') {
        if (ref != '') {
            var ind = parseInt($('#myCarousel').find('.active').index());
            var datum = $('#calcForm').serializeObject();
            console.log(datum);
            console.log('cal: ', datum['calories']);

            if (ind == 7 && datum['activity[]'] == undefined) {
                alert("Kindly pick a minimum of one option to proceed");
                return false;
            }
            $.ajax({
                data: datum,
                type: 'POST',
                url: "{{ url('ajax-calculator') }}",
                beforeSend: function() {
                    $('#proceed-msg').html('<div class="lds-ripple"><div></div><div></div></div>');
                },
                success: function(e) {
                    if (e == 'success') {
                        $('#proceed-msg').html('');
                        $('#myCarousel').carousel('next');
                    } else {
                        $('#proceed-msg').html('<b>' + e + '</b><br>').css("color", "#FF9494");
                        setTimeout(function() {
                            $('#proceed-msg').html('');
                        }, 15000);
                    }
                }
            });
        } else {
            $('#myCarousel').carousel('next');
        }
    }

    function submitForm() {
        var ind = parseInt($('#myCarousel').find('.active').index());
        var datum = $('#calcForm').serializeObject();
        if (ind == 7 && datum['activity[]'] == undefined) {
            alert("Kindly pick a minimum of one option to proceed");
            return false;
        }

        $('.min-calory').hide();
        $('#myCarousel').carousel('next');
        var datax = $('#calcForm').serialize();
        $('.weightLossResult').hide();
        $('.weightMaintainResult').hide();
        console.table(datum);

        var ht = datum.weight;
        var htALL = ht.split(' ');
        var htTYPE = htALL[1];
        var convKG = convLBS = workoutIndex = added = calories = "";
        var KG = 0;

        if (htTYPE == 'lbs') {
            convKG = Math.round(htALL[0] / 2.20462) + ' kg';
            convLBS = htALL[0] + ' lbs';
            KG = Math.round(htALL[0] / 2.20462);
        } else {
            convLBS = Math.round(htALL[0] * 2.20462) + ' lbs';
            convKG = htALL[0] + ' kg';
            KG = parseInt(htALL[0]);
        }

        added = -161;
        if (datum.sex == 'male') added = 5;
        let otherCalories = [];

        let workoutIndexes = {
            'Sedentary': 1.2,
            'Mildly Active': 1.375,
            'Moderately Active': 1.55,
            'Heavily Active': 1.7,
            'Extremely Active': 1.9
        }
        workoutIndex = workoutIndexes[datum.workout];
        console.log(workoutIndex, datum.workout, workoutIndexes);
        var weightToLosex = null;

        if (datum['goal[]'].includes('Maintain Weight')) {
            calories = maintainWeight(datum, added, workoutIndex, KG);
            if (calories > 2000) {
                calories = 2000;
            }
            // console.log("maintain: ", calories);
            for (var ind in workoutIndexes) {
                otherCalories.push(roundToNearest50(maintainWeight(datum, added, workoutIndexes[ind], KG)));
            }
            $('.weightMaintainResult').show();
            $('.invalid-result').hide();
            $('.valid-result').show();
        } else if (datum['goal[]'].includes('Lose Weight')) {
            var weightToLosex = weightToLose(datum, KG);
            if (isNaN(weightToLosex)) {
                $('.invalid-result').show();
                $('.valid-result').hide();
                $('#invalid-msg').html(weightToLosex);
                return false;
            }
            var timeToLoseWeight = parseInt(datum.weight_time_aim) * 4;
            var checkWeightLosex = checkWeightLose(parseInt(datum.weight_time_aim), weightToLosex, "yes");
            if (isNaN(checkWeightLosex)) {
                $('.recalc-next').hide();
            } else {
                $('.recalc-next').show();
            }
            calories = loseWeight(datum, added, workoutIndex, weightToLosex, timeToLoseWeight, KG);
            if (calories > 2000) {
                calories = 2000;
            }
            // console.log("Losee weight: ", calories);

            for (var ind in workoutIndexes) {
                otherCalories.push(roundToNearest50(loseWeight(datum, added, workoutIndexes[ind], weightToLosex, timeToLoseWeight, KG)));
            }
            $('.invalid-result').hide();
            $('.valid-result').show();
            $('#res-weight-text').html(weightToLosex + 'kg');
            var mons = (datum.weight_time_aim > 1) ? ' months' : ' month';
            $('#res-period-text').html(datum.weight_time_aim + mons);
            $('.weightLossResult').show();
        }

        $('#res-age').html(datum.age + ' years old');
        $('#res-weight').html(convKG + " (" + convLBS + ")");
        $('#res-height').html(datum.height + 'cm');
        $('#res-goal').html(datum['goal[]']);
        $('#res-activity').html(datum['workout']);
        $('.calories').html(roundToNearest50(calories));
        $('#caloriesField').val(roundToNearest50(calories));
        if (calories < 1200) {
            $('.min-calory').show();
            $('.calories').hide();
            $('.recalc-next').hide();
        }
        $('.calories').show();

        let caloryIndexes = {
            'Sedentary': 'SedentaryCalory',
            'Mildly Active': 'MildCalory',
            'Moderately Active': 'ModerateCalory',
            'Heavily Active': 'HeavyCalory',
            'Extremely Active': 'ExtremeCalory'
        }
        $('#SedentaryCalory h2').html(otherCalories[0]);
        $('#MildCalory h2').html(otherCalories[1]);
        $('#ModerateCalory h2').html(otherCalories[2]);
        $('#HeavyCalory h2').html(otherCalories[3]);
        $('#ExtremeCalory h2').html(otherCalories[4]);

        $('.calory-box').removeClass('active');
        $('#' + caloryIndexes[datum.workout] + ' .calory-box').addClass('active');
    }

    function checkWeightLose(timeToLoseWeight, KG, ignore = "") {
        var div = KG / 10;

        return (div > timeToLoseWeight) ? `Trust me I get it, you want to lose the weight as fast as possible. But it seems you are trying to lose more than 10kg per month, and that’s highly unrealistic. Kindly go back to adjust your numbers and continue with the goal.<br><br>
                <a href="javascript:void(0)" onclick="$('#myCarousel').carousel(5);$('#myModalInfo').modal('hide')" class="btn btn-dark">Adjust Your Numbers</a><a href="javascript:void(0)" onclick="$('#myCarousel').carousel('next');$('#myModalInfo').modal('hide')" class="btn btn-dark-outline" style="white-space:pre-wrap;margin:10px;">I understand, but I would like to continue with this goal</a><br><br><br><br>` : 0;
    }

    function weightToLose(datum, KG) {
        var htALL = datum.weight_aim.split(' ');
        var htTYPE = htALL[1];
        if (htTYPE == 'lbs')
            KGx = Math.round(htALL[0] / 2.20462);
        else
            KGx = parseInt(htALL[0]);

        return (KGx >= KG) ? `Your current weight must be greater than your target weight in other to lose some pounds. Kindly go back and adjust your numbers.` : (KG - KGx);

        // <br><br>
        //         <a href="javascript:void(0)" onclick="$('#myCarousel').carousel(5);" class="btn btn-dark" onclick="">Adjust Your Numbers</a><br><br><br><br>
    }

    function loseWeight(datum, added, workoutIndex, weightToLose, timeToLoseWeight, KG) {
        var maintainWeightx = maintainWeight(datum, added, workoutIndex, KG);
        var weightLoss = (weightToLose / timeToLoseWeight) * 500;

        return (maintainWeightx - weightLoss);
    }

    function maintainWeight(datum, added, workoutIndex, KG) {
        var res = (((10 * KG) + (6.25 * parseInt(datum.height))) - ((5 * parseInt(datum.age))));
        res = res + added;
        res = res * workoutIndex;
        return res;
    }

    function roundToNearest50(number) {
        return Math.round(number / 100) * 100;
    }

    //send email function
    function sendEmailPost() {
        var datum = $('#calcForm').serializeObject();
        // console.log(datum);
        $.ajax({
            data: datum,
            type: 'POST',
            url: "{{ url('sendmail') }}",
            // beforeSend: function() {
            //     $('#proceed-msg').html('<div class="lds-ripple"><div></div><div></div></div>');
            // },
            success: function(e) {
                // $('#myCarousel').carousel('next');
                if (e == 'success') {
                    // $('#proceed-msg').html('');
                    // $('#myCarousel').carousel('next');
                    console.log(e);
                } else {
                    // $('#proceed-msg').html('<b>' + e + '</b><br>').css("color", "#FF9494");
                    // setTimeout(function() {
                    //     $('#proceed-msg').html(''); 
                    // }, 15000);
                    console.log(e);
                }
            }
        });
    }
</script>
@endsection