<!-- calculator old blade start -->
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
    }

    .btn-dark {
        background-color: #000 !important;
        color: #fff !important;
        border: 1px solid #000 !important;
    }

    .btn-dark:hover {
        background-color: #fff !important;
        color: #000 !important;
        border: 1px solid #000 !important;
        border-radius: 5px;
    }

    .btn-dark-outline {
        background-color: #05a1c4 !important;
        color: #fff !important;
        border: 1px solid #05a1c4 !important;
        border-radius: 5px;
    }

    .btn-dark-outline:hover {
        background-color: #fff !important;
        color: #05a1c4 !important;
        border: 1px solid #05a1c4 !important;
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
        background-color: #05a1c4;
        color: #fff;
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
    }

    .ft-cm.activer {
        background-color: #05a1c4;
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
    }

    .lbs-kg.activer {
        background-color: #05a1c4;
    }

    .lbs-kg.activeree {
        background-color: #05a1c4;
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
        background-color: #c2eff9;
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
        background-color: #c2eff9;
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
        background-color: #c2eff9;
    }

    div.workout-cards {
        border: 1px solid #ccc;
        cursor: pointer;
        border-radius: 10px;
        margin: 15px 0px;
        height: 320px;
        padding: 7px;
        overflow: hidden;
    }

    div.workout-cards div {
        height: 280px;
        overflow: hidden;
        font-size: 11px;
    }

    div.workout-cards div h4 {
        font-size: 13px;
    }

    div.workout-cards div img {
        max-height: 100px;
        max-width: 80%;
        margin: 7px 0px 5px;
    }

    div.workout-cards.greyed-bg {
        background-color: #c2eff9;
    }

    .myprogress .table>tbody>tr>td,
    .myprogress .table>tbody>tr>th,
    .myprogress .table>tfoot>tr>td,
    .myprogress .table>tfoot>tr>th,
    .myprogress .table>thead>tr>td,
    .myprogress .table>thead>tr>th {
        border-top: none !important;
    }

    .table-container {
        background-color: #f4f4f4;
        border-radius: 20px;
    }

    .progress-bar {
        border-radius: 20px;
        background-image:url("{{ url('assets/frontend/images/progress.png') }}");
        height: 33.14px;
        position: absolute;
    }

    .myprogress .table td {
        text-align: center;
        font-size: 12px;
        color: #c3c0c0;
        font-weight: bold;
    }

    .myprogress .table td.active-bar {
        color: #fff;
    }

    .myprogress .table td.inactive-bar {
        color: #d8d8d8;
    }

    small.direction-right img,
    small.direction-left img {
        display: block;
        margin-bottom: 5px;
    }

    small.direction-right {
        display: inline-block;
        font-size: 9px;
        text-align: center;
        float: right;
    }

    small.direction-left {
        display: inline-block;
        font-size: 9px;
        text-align: center;
        float: left;
    }

    .input-group-addon:last-child {
        border-top: 1px solid #000;
        border-right: 1px solid #000;
        border-bottom: 1px solid #000;
        border-left: 1px solid #000000;
        background: #000000;
        color: #fff;
        font-weight: bold;
    }

    .triggerInfo {
        font-weight: bold;
        color: #337ab7;
        font-size: 12px;
    }

    .calory-box {
        margin: 4px;
        text-align: center;
        padding: 3px 6px;
        background: #f2f2f2;
        border-radius: 10px;
    }

    .calory-box.active {
        background: #099abd;
        color: #fff;
    }

    .calory-box h2 {
        text-align: center;
        font-size: 22px;
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
        width: 120px;
        text-align: center;
        margin-bottom: 60px;
        margin-top: 70px;
        border: 2px solid #b3b3b3;
        border-radius: 10px;
    }

    div.food-options {
        border: 1px solid #ccc;
        cursor: pointer;
        border-radius: 10px;
        margin: 5px 0px;
        height: 40px;
        padding: 7px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    div.food-options.greyed-bg {
        background-color: #c2eff9;
    }

    .bestest {
        text-align: center;
        color: black;
        font-size: 18px;
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
</style>

<section id="home">
    <div class="container">
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
    </div>
</section>

<form action="{{ url('post-calculator-data') }}" method="POST" id="calcForm">
    {!! csrf_field() !!}
    <div class="modal" tabindex="-1" role="dialog" id="calculatorModal">
        <div class="modal-dialog" role="document" style="height:100vh;width:100vw;margin:0px;">
            <div class="modal-content" style="height:100vh;border-radius:0px;border:none;overflow:auto;">
                <div class="modal-body" style="padding:0px !important">
                    <div class="container">
                        <div class="pt-3">
                            <h3 class="text-center text-dark" style="color:#000;">
                                <a href="#myCarousel" id="backBtn">
                                    <small class="direction-left">
                                        <img src="{{ url('assets/frontend/images/back.png') }}" style="height:34px;" />
                                        Previous
                                    </small>
                                </a>
                                {{ env('APP_NAME') }}
                                <a href="javascript:void(0)" data-dismiss="modal">
                                    <small class="direction-right">
                                        <img src="{{ url('assets/frontend/images/close.png') }}" style="height:34px;" />
                                        Cancel
                                    </small>
                                </a>
                            </h3>

                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner" style="color:#000 !important;text-align:center;padding-top:4vh;">
                                    <div class="item active firstest">
                                        <div class="container">
                                            <div style="display:flex;align-items:center;justify-content:center;justify-items:center;min-height:60%;">
                                                <div style="display:inline-block;" align="center">
                                                    <hr class="valid-result">
                                                    <div class="row valid-result">
                                                        <!-- <div class="col-md-2"></div> -->
                                                        <div class="col-md-12" align="center">
                                                            <h2 align="left">Trying to lose weight?
                                                            </h2>
                                                            <h4>What if I told you you could achieve your best body and maintain it, while still eating Nigerian meals 😋 </h4>
                                                            <h5 style="margin-bottom: 2rem;">Here's what we have to do:</h5>
                                                            <table class="table table-striped">
                                                                <tr>
                                                                    <td>Step 1:</td>
                                                                    <td>Using our free calorie allowance calculator, we'll calculate how many calories you should be eating per day to reach your goal</td>
                                                                   
                                                                </tr>
                                                                <tr> 
                                                                    <td>Step 2:</td>
                                                                    <td>You'll select which foods you enjoy eating</td>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td>Step 3: </td>
                                                                    <td>We'll use your food selection and calculated calorie allownace to create a CUSTOMISED meal plan for you!</td>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td>Step 4:</td>
                                                                    <td>The best part? .... We'll be sending you 2 days out of your 4 week plan to you absolutely FREE!</td>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td> Step 5:</td>
                                                                    <td>And if you'd like to get the complete plan, all you have to do is subscribe!</td>
                                                                </tr>
                                                            </table>
                                                        </div>
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

                                            <h4>Very good. Let's keep moving...</h4>
                                            <h1 style="font-weight:bold;">What’s your gender?</h1>

                                            <div style="display:flex;align-items:center;justify-content:center;justify-items:center;min-height:60%; margin-top:3rem;">

                                                <div style="display:inline-block;" align="center">
                                                    <input type="hidden" name="sex">
                                                    <div class="row">
                                                        <div class="col-xs-6" align="center">
                                                            <img src="{{ url('assets/frontend/images/m1.jpg') }}" class="img-responsive" style="max-height:200px;" />

                                                            &nbsp;&nbsp;&nbsp;
                                                            <br>
                                                            <a href="#myCarousel" class="btn btn-dark-outline sex-btn" onclick="clickSexBtn(this, 'male')" data-slide="next">Male</a>
                                                        </div>
                                                        <div class="col-xs-6" align="center">
                                                            <img src="{{ url('assets/frontend/images/w2.jpg') }}" class="img-responsive" style="max-height:186px;" />

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

                                            <h5>Don’t worry we won’t tell 😉</h5>
                                            <h3 style="font-weight:bold; font-size:30px;">How old are you?</h3>

                                            <div style="display:flex;align-items:center;justify-content:center;justify-items:center;min-height:60%;">

                                                <div style="display:inline-block;" align="center">
                                                    <input id="age" type="number" name="age" min="18" max="120">
                                                    <p id="error-p-tag" class="error-color"> </p>
                                                    <p style="font-weight:bold; margin-top:3rem;">Valid age is between 18years - 120years</p>
                                                    <br>

                                                    <a href="#myCarousel" class="btn btn-dark-outline whom-btn" onclick="nextSlide($('#age'), 'Please enter your age!')">Next</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item" style="height:100%;overflow-y:auto;">
                                        <div class="container">
                                            @include('progress')

                                            <h4>Got it. Next question...</h4>
                                            <h1 style="font-weight:bold;">What’s your height?</h1>

                                            <div style="display:flex;align-items:center;justify-content:center;justify-items:center;min-height:60%;">

                                                <div style="display:inline-block; background: aliceblue; width: 60%;margin-top: 3rem;" align="center">
                                                    <div style="display:inline-block;margin:25px;">
                                                        <button type="button" class="ft-cm activer" id="ftBtn" onclick="clickTallBtn(this)">ft</button>
                                                        <button type="button" class="ft-cm" id="cmBtn" onclick="clickTallBtn(this)">cm</button>

                                                        <input id="height" type="hidden" name="height" min="60" max="300">
                                                    </div>

                                                    <div id="ft-con" style="margin-bottom:10px">
                                                        <div class="input-group" id="heightFTcon">
                                                            <input id="heightFT" type="number" id="weightIN" class="height" style="font-size:50px;margin-right:-5px;" onkeyup="keyPressTall()" min="2" max="9">
                                                            <span class="input-group-addon" style="padding-left: 15px; padding-top: 20px;padding-right: 20px;  font-size:16px">ft</span>
                                                        </div>
                                                        <div class="input-group" id="heightINcon">
                                                            <input id="heightIN" type="number" class="height" style="font-size:50px;margin-right:-5px;" onkeyup="keyPressTall()" min="0" max="11">
                                                            <span class="input-group-addon" style="padding-left: 15px; padding-top: 20px; padding-right: 20px;font-size:16px">in</span>
                                                        </div>


                                                        <div class="input-group" id="heightCMcon">
                                                            <input id="heightCM" type="number" class="height heightHide" style="font-size:50px;margin-right:-5px;" onkeyup="keyPressTall()" min="60" max="300">
                                                            <span class="input-group-addon" style="padding-left: 10px; padding-top: 20px; padding-right: 30px;font-size:16px">cm</span>
                                                        </div>

                                                        <p id="heightMsg">Valid height is 2'-9'11"</p>
                                                    </div>

                                                    <br>
                                                    <a href="#myCarousel" style="width: 225px; height: 40px;" class="btn btn-dark-outline whom-btn" onclick="nextSlide($('#height'), 'Please enter your height in feets or centimeter!')">Next</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item" style="height:100%;overflow-y:auto;">
                                        <div class="container">
                                            @include('progress')

                                            <h4>Great. Last personal detail...</h4>
                                            <h1 style="font-weight:bold;">How much do you weigh right now?</h1>

                                            <div style="display:flex;align-items:center;justify-content:center;justify-items:center;min-height:60%;">

                                                <div style="display:inline-block;" align="center">
                                                    <div style="display:inline-block;margin-bottom:30px;">
                                                    </div>

                                                    <div id="ft-con" style="margin-bottom:10px">
                                                        <input id="weight" type="hidden" name="weight" min="23" max="227">

                                                        <input type="number" id="weightIN" class="height" style="display:initial;font-size:50px;text-align:right;padding-right:15px;width:150px;" onkeyup="keyPressFat()" min="25" max="230">
                                                        <div style="display:inline;top:-13.5px;left:-7px;position:relative;">
                                                            <button type="button" class="lbs-kg activer" id="kgBtn" onclick="clickFatBtn(this)">kg</button>
                                                            <button type="button" class="lbs-kg" id="lbsBtn" onclick="clickFatBtn(this)">lbs</button>
                                                        </div>

                                                        <p id="weightMsg" style="margin-top: 2rem;">Valid weight is 25kg - 230kg</p>
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

                                            <h4>Now tell us what you want to achieve...</h4>
                                            <h1 style="font-weight:bold;">What do you want to achieve?</h1>

                                            <div style="display:flex;align-items:center;justify-content:center;justify-items:center;min-height:60%; margin-top: 2rem">

                                                <div style="display:inline-block;" align="center">
                                                    <!-- <input type="hidden" name="goal"> -->

                                                    <div class="row">
                                                        <div class="col-md-4 col-sm-6" align="center">
                                                            <div class="goal-cards" align="center" onclick="clickGoalBtn(this, 'Lose Weight')" id="LoseWeight">
                                                                <input type="checkbox" name="goal[]" value="Lose Weight">

                                                                <div class="goal-cards3">
                                                                    <img src="{{ url('assets/frontend/images/lose-weight.png') }}" class="img-responsive" style="max-height:100px;" />
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
                                                                    <img src="{{ url('assets/frontend/images/athletic-performance.png') }}" class="img-responsive" style="max-height:100px;" />
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
                                                                    <img src="{{ url('assets/frontend/images/improve-health.png') }}" class="img-responsive" style="max-height:100px;" />
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

                                            <h4>Let's get really specific on this....</h4>
                                            <h1 style="font-weight:bold;">What’s your target weight?</h1>

                                            <div style="display:flex;align-items:center;justify-content:center;justify-items:center;min-height:60%;padding-top:25px;">

                                                <div style="display:inline-block;" align="center">
                                                    <div id="ft-con_aim" style="margin-bottom:10px;">
                                                        <input id="weight_aim" type="hidden" name="weight_aim" min="25" max="230">


                                                        <input type="number" id="weightIN_aim" class="height" style="display:initial;font-size:50px;text-align:right;padding-right:15px;width:150px;" onkeyup="keyPressFat_aim()" min="23" max="227">
                                                        <div style="display:inline;top:-13.5px;left:-5px;position:relative;">
                                                            <button type="button" class="lbs-kg activeree" id="kgBtn_aim" onclick="clickFatBtn_aim(this)">kg</button>
                                                            <button type="button" class="lbs-kg" id="lbsBtn_aim" onclick="clickFatBtn_aim(this)">lbs</button>
                                                        </div>

                                                        <p id="weightMsg_aim">Valid weight is 25kg - 230kg</p>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-2"></div>
                                                        <div class="col-lg-8">
                                                            <h3 style="font-weight:bold;margin-top:42px;">In how many months will you like to achieve this goal?</h3>
                                                        </div>
                                                        <div class="col-lg-2"></div>
                                                    </div>

                                                    <div id="ft-con_aim" style="margin-bottom:10px;padding-top:15px;">

                                                        <input type="number" name="weight_time_aim" class="height" style="display:initial;font-size:30px;text-align:center;padding-right:15px;width:170px;">
                                                        <small style="display:block;margin-top:15px;width:70vw;font-size:16px;font-weight:bold;">Please let's be realistic here. Extreme weight loss is not usually sustainable. We recommend a target of 4 - 5kg per month.</small>
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

                                            <h4>Cool. Let's go a little deeper on exercise...</h4>
                                            <h1 style="font-weight:bold;">How physically active are you?</h1>

                                            <div style="display:flex;align-items:center;justify-content:center;justify-items:center;min-height:60%;">

                                                <div style="display:inline-block;" align="center">
                                                    <input type="hidden" name="workout">

                                                    <div class="row">
                                                        <div class="col-md-1"></div>

                                                        <div class="col-md-2 col-sm-6" align="center">
                                                            <div class="workout-cards" align="center" onclick="clickWorkoutBtn(this, 'Sedentary')">
                                                                <div class="workout-cards0">
                                                                    <img src="{{ url('assets/frontend/images/_Very Light.png') }}" class="img-responsive" style="max-height:100px;" />

                                                                    <h4>Sedentary</h4>
                                                                    <p>Little to no regular exercise.</p>
                                                                </div>
                                                                <a href=".workout-cards0" class="triggerInfo">...learn more</a>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 col-sm-6" align="center">
                                                            <div class="workout-cards" align="center" onclick="clickWorkoutBtn(this, 'Mildly Active')">
                                                                <div class="workout-cards1">
                                                                    <img src="{{ url('assets/frontend/images/_Light.png') }}" class="img-responsive" style="max-height:100px;" />

                                                                    <h4>Mild Activity</h4>
                                                                    <p>Intense exercise for at least 20 minutes 1-3 times per week. This may include things like brisk walking, bicycling, jogging, basketball, swimming etc. If you do not exercise regularly, but you maintain a busy life that requires you to walk frequently for long periods, you meet the requirements for this level.</p>
                                                                </div>
                                                                <a href=".workout-cards1" class="triggerInfo">...learn more</a>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 col-sm-6" align="center">
                                                            <div class="workout-cards" align="center" onclick="clickWorkoutBtn(this, 'Moderately Active')">
                                                                <div class="workout-cards2">
                                                                    <img src="{{ url('assets/frontend/images/_Moderate.png') }}" class="img-responsive" style="max-height:100px;" />

                                                                    <h4>Moderate Activity</h4>
                                                                    <p>Intense exercise for 60min 3 to 4 times per week. Any of the activities listed above will qualify.</p>
                                                                </div>
                                                                <a href=".workout-cards2" class="triggerInfo">...learn more</a>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 col-sm-6" align="center">
                                                            <div class="workout-cards" align="center" onclick="clickWorkoutBtn(this, 'Heavily Active')">
                                                                <div class="workout-cards3">
                                                                    <img src="{{ url('assets/frontend/images/_Intense.png') }}" class="img-responsive" style="max-height:100px;" />

                                                                    <h4>Heavy or Labour Intensive Activity</h4>
                                                                    <p>Intense exercise for 60min or greater, 5 to 7 days per week. Labour intensive occupations also qualify for this level, such as bricklaying, carpentry, general labour, farming etc.</p>
                                                                </div>
                                                                <a href=".workout-cards3" class="triggerInfo">...learn more</a>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 col-sm-6" align="center">
                                                            <div class="workout-cards" align="center" onclick="clickWorkoutBtn(this, 'Extremely Active')">
                                                                <div class="workout-cards4">
                                                                    <img src="{{ url('assets/frontend/images/_Very Intense.png') }}" class="img-responsive" style="max-height:100px;" />

                                                                    <h4>Extreme Activity</h4>
                                                                    <p>Exceedingly active and/ or very demanding activities, such as athlete with an almost unstoppable training schedule, very demanding jobs such as shovelling coal or working long hours on an assembly line.</p>
                                                                </div>
                                                                <a href=".workout-cards4" class="triggerInfo">...learn more</a>
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

                                            <h4>Now tell us what you want to achieve...</h4>
                                            <h1 style="font-weight:bold;">Are you managing any of this health conditions?</h1>

                                            <div style="display:flex;align-items:center;justify-content:center;justify-items:center;min-height:60%; margin-top:2rem">

                                                <div style="display:inline-block;" align="center">

                                                    <div class="row">
                                                        <div class="col-md-1"></div>

                                                        <div class="col-md-2 col-sm-6" align="center">
                                                            <div class="activity-cards" align="center" onclick="clickActivityBtn(this, 'Very Light')">
                                                                <input type="checkbox" name="activity[]" value="High Cholesterol">

                                                                <img src="{{ url('assets/frontend/images/Very Light.png') }}" class="img-responsive" style="max-height:100px;" />
                                                                <h4>High Cholesterol</h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 col-sm-6" align="center">
                                                            <div class="activity-cards" align="center" onclick="clickActivityBtn(this, 'Light')">
                                                                <input type="checkbox" name="activity[]" value="Hypertension">

                                                                <img src="{{ url('assets/frontend/images/Light.png') }}" class="img-responsive" style="max-height:100px;" />
                                                                <h4>Hypertension</h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 col-sm-6" align="center">
                                                            <div class="activity-cards" align="center" onclick="clickActivityBtn(this, 'Moderate')">
                                                                <input type="checkbox" name="activity[]" value="Diabetes">

                                                                <img src="{{ url('assets/frontend/images/Moderate.png') }}" class="img-responsive" style="max-height:100px;" />
                                                                <h4>Diabetes</h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 col-sm-6" align="center">
                                                            <div class="activity-cards" align="center" onclick="clickActivityBtn(this, 'Heavy')">
                                                                <input type="checkbox" name="activity[]" value="Pre-diabetes">

                                                                <img src="{{ url('assets/frontend/images/Heavy.png') }}" class="img-responsive" style="max-height:100px;" />
                                                                <h4>Pre-diabetes</h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 col-sm-6" align="center">
                                                            <div class="activity-cards" align="center" onclick="clickActivityBtn(this, 'None')">
                                                                <input type="checkbox" name="activity[]" value="None">

                                                                <img src="{{ url('assets/frontend/images/Heavy.png') }}" class="img-responsive" style="max-height:100px;" />
                                                                <h4>None</h4>
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
                                                    <hr class="valid-result">
                                                    <div class="row valid-result">
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-8" align="center">
                                                            <h2 align="left">Brief Summary</h2>
                                                            <table class="table table-striped">
                                                                <tr>
                                                                    <td><span class="fa fa-user"></span></td>
                                                                    <td>Age</td>
                                                                    <td id="res-age"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="fa fa-flask"></span></td>
                                                                    <td>Current Weight</td>
                                                                    <td id="res-weight"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="fa fa-text-height"></span></td>
                                                                    <td>Height</td>
                                                                    <td id="res-height"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="fa fa-sliders"></span></td>
                                                                    <td>Level of Activity</td>
                                                                    <td id="res-activity"></td>
                                                                </tr>
                                                            </table>

                                                            <div class="weightMaintainResult">
                                                                <p>
                                                                    Here’s the number of calories you need to consume to maintain your current weight::
                                                                </p>

                                                                <h3>
                                                                    <span class="calories"></span>cal<br>
                                                                    <small class="min-calory">The recommended minimum is <b>1200cal</b> per day to meet your body’s nutritional needs.</small>
                                                                    <br>
                                                                    <small class="min-calory">So you here are your options, you can increase the time it’ll take to reach your goal, and/ or increase your level of physical activity.</small>
                                                                    <br>
                                                                    <small class="min-calory">With this in mind, kindly click the button below to recalculate your calorie needs</small>
                                                                    <br>
                                                                </h3>
                                                                <div class="">
                                                                    <p>See how the number changes based on your level of activity.</p>
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
                                                                <p>
                                                                    To lose <b id="res-weight-text">28kg</b> over the next <b id="res-period-text">28kg</b>, at your current level of activity and weight, you’ll need to consume:
                                                                </p>

                                                                <h3>
                                                                    <span class="calories"></span>cal per day<br>
                                                                    <small class="min-calory" style="color:#FF9494;">The recommended minimum is <b>1200cal</b> per day to meet your body’s nutritional needs.</small>
                                                                    <br>
                                                                    <small class="min-calory" style="color:#FF9494;">So you here are your options, you can increase the time it’ll take to reach your goal, and/ or increase your level of physical activity.</small>
                                                                    <br>
                                                                    <small class="min-calory" style="color:#FF9494;">With this in mind, kindly click the button below to recalculate your calorie needs</small>
                                                                </h3>

                                                                <p class="recalc-next">
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
                                                        <p>
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
                                            <h1 style="font-weight:bold;">How many main meals do you eat a day?</h1>

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
                                            <h1 style="font-weight:bold;">And how many times do you snack?</h1>

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
                                            <h4 style="font-weight:bold;">Now it’s time to choose the foods you enjoy. Don’t worry if you consider them healthy or not, just choose the options you enjoy eating</h4>
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
                                                        <p style="font-weight:bold;">
                                                            Others (List any other food you would like me to include)
                                                        </p>
                                                        <textarea style="margin-top:20px;width:350px;height:155px;font-size:18px;padding:8px;resize:none;" name="food_options[]"></textarea>
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
                                            <h1 style="font-weight:bold;">Yaaay! Your FREE Meal Plan is ready!</h1>
                                            <h3 align="center">We have just created your fully CUSTOMIZED 30 day meal plan!</h3>

                                            <h4>Enter your name and best email below to get 2 FULL days of the meal plan completely FREE!</h4>

                                            <div style="display:flex;align-items:center;justify-content:center;justify-items:center;min-height:60%;">

                                                <div style="display:inline-block;" align="center">
                                                    <br><br>
                                                    <input class="bestest" placeholder="Full Name" type="text" name="best_name">
                                                    <br>
                                                    <input class="bestest" placeholder="Best Email" type="email" name="best_email">
                                                    <br>

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
                                            <h1 style="font-weight:bold;">If you would like to get the complete 30-day plan, click below</h1>

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
                        <img src="{{ url('assets/frontend/images/close.png') }}" style="height:24px;" />
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
        console.log(cont);
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
            alert("Kindly pick an option to proceed");
            return false;
        } else if (ind == 7 && (datum.workout == undefined || datum.workout == "")) {
            alert("Kindly pick an activity to proceed");
            return false;
        } else if (ind == 6) {
            if ($('#weightIN_aim').val() == "" || $('input[name="weight_time_aim"]').val() == "") {
                alert("Kindly let us know how much you want to weigh and in how much time.");
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
                }
            }
        } else {
            if (e.attr('id') == 'goalNext') {
                var goals = $('input[name="goal[]"]:checked').map(function() {
                    return $(this).val();
                }).get();

                if (goals.includes("Maintain Weight"))
                    $('#myCarousel').carousel(6);
            }
            $('#myCarousel').carousel('next');
        }
    }

    function nextSlide(e, msg) {
        var min = parseInt(e.attr('min'));
        var minC = count(min + '');
        var max = parseInt(e.attr('max'));
        var val = parseInt(e.val());
        var valC = count(val + '');

        if (e.val() == '' || e.val() == '0') {
            // alert(msg);
            $('#error-p-tag').text(msg).show()
            e.addClass("error-input-border");
        } else {
            e.addClass("error-input-border");
            if ((val < min || val > max)) // && (valC >= minC))
                // alert("Your input value must not be:\n\n-  Lesser than " + min + "\n-  Greater than " + max);
                $('#error-p-tag').text("Your input value must not be:\n\n-  Lesser than " + min + "\n-  Greater than " + max).show();
            else {
                $('#myCarousel').carousel('next');
                e.removeClass("error-input-border");
                $('#error-p-tag').hide()
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

        return (KGx >= KG) ? `Your current weight must be greater than your target weight in other to lose some pounds. Kindly go back and adjust your numbers.<br><br>
                <a href="javascript:void(0)" onclick="$('#myCarousel').carousel(5);" class="btn btn-dark" onclick="">Adjust Your Numbers</a><br><br><br><br>` : (KG - KGx);
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

<!-- calculator end -->
<!-- final page blade start  -->
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
    @if(Session::get('time'))
    <div class="alert alert-{{Session::get('alert')}} alert-styling" role="alert">
        {{Session::get('message')}}
    </div>
    @else
    <div class="main-loader">
        <h2>Creating meal plan...........</h2>
        <div class="loader">
            <div class="loader-item loader-item_1"></div>
            <div class="loader-item loader-item_2"></div>
            <div class="loader-item loader-item_3"></div>
            <div class="loader-item loader-item_4"></div>
        </div>
    </div>
    @endif


    <div class="main" style="display: none;">
        @if(isset(Auth::user()->email))
        <div class="logout-style">
            <a class="btn btn-primary" style="background: #ed4c67; width:100px; border-color: #ed4c67;" href="{{ url('/logout') }}">Logout</a>
        </div>
        @endif
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
                                <div class="text-center mt-5" style=" justify-content: space-between; display: flex;">
                                    @if ($userDetails['status']== 'free')
                                    <form action="{{ url('sendmail') }}" method="post" style="width: 50%;">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="userId" value="{{$userDetails['id']}}">
                                        <input type="hidden" name="cusType" value="{{$userDetails['status']}}">
                                        <button type="submit" class="btn btn-primary" style="width: 90%; margin-right: 15px;">Get FREE Meal Plan</button>
                                    </form>

                                    <form id="paymentForm" style="width: 50%;">
                                        <input type="hidden" id="name" name="name" value="{{$userDetails['name']}}" placeholder="Name:">
                                        <input type="hidden" id="email-address" name="email-address" value="{{$userDetails['email']}}" placeholder="Email:" required>
                                        <input type="hidden" id="amount" name="amount" placeholder="Amount:" value="20000" required>
                                        <button type="submit" onclick="payWithPaystack(event)" class="btn btn-primary" style="width: 90%;">Get FULL Meal Plan</button>
                                        <p id="success-div" style="display:none;">Your complete meal plan has been sent to your mail</p>
                                        <p style="color:#FF9494; display: none;" id="error-div">Please contact us to make complain. <a href="mailto:support@cmp.com" target="_blank">Contant us</a></p>

                                    </form>

                                    @else
                                    <form action="{{ url('sendmail') }}" method="post" style="width: 100%;">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="userId" value="{{$userDetails['id']}}">
                                        <input type="hidden" name="cusType" value="{{ $userDetails['status']}}">
                                        <button type="submit" class="btn btn-primary" style="width: 100%; margin-right: 15px;">Get Meal Plan</button>
                                    </form>
                                    @endif

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
    const error_div = document.getElementById('error-div');
    const success_div = document.getElementById('success-div');
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
                        // console.log(response)
                        if (response == 1) {
                            paymentForm.style.display = 'none'
                            success_div.style.display = 'block'
                        } else {
                            paymentForm.style.display = 'none'
                            success_div.style.display = 'block'
                        }
                    }
                });
            }
        });

        handler.openIframe();
    }
</script>

</html>
<!-- final page blade end  -->

<!-- free main things bladew start  -->
<h3>Meal Plan (Week 1 and 2)</h3>
<table width="100%" cellspacing="1" cellpadding="1" border="1">
    <tr>
        <th>Day</th>
        <th>Breakfast</th>
        <th>Brunch</th>
        <th>Lunch</th>
        <th>Dinner</th>
    </tr>
    @foreach($MealDetails as $m)
    <tr>

        <td style="min-width:90px;padding:5px">
            {{$m->days}}
        </td>
        <?php

        $yer = str_replace(['[', ']'], '', $m->daymeal);
        $implo = explode('",', $yer);
        ?>
        @foreach($implo as $k=> $ml)
        <td style="min-width:90px;padding:5px">
            {!! strlen($ml) > 3 ? $ml : 'Snack meal' !!}
        </td>
        @endforeach
 
    </tr>
    @endforeach

</table><br>

<h2 style="font-weight: bolder; color:red"> SUBSCRIBE TO HAVE ACCESS TO FULL MEAL PLAN</h2>

@include('includes.snack1')

<!-- free main things bladew end -->
<!-- main things start  -->
<h3>Meal Plan (Week 1 and 2)</h3>
<table width="100%" cellspacing="1" cellpadding="1" border="1">
    <tr>
        <th>Day</th>
        <th>Breakfast</th>
        <th>Brunch</th>
        <th>Lunch</th>
        <th>Dinner</th>
    </tr>
    @foreach($MealDetails as $m)
    <tr>
        @if($m->month_par == '1_and_2')
        <td style="min-width:90px;padding:5px">
            {{$m->days}}
        </td>
        <?php

        $yer = str_replace(['[', ']'], '', $m->daymeal);
        $implo = explode('",', $yer);
        ?>
        @foreach($implo as $k=> $ml)
        <td style="min-width:90px;padding:5px">
            {!! strlen($ml) > 3 ? $ml : 'Snack meal' !!}
        </td>
        @endforeach
        @endif
    </tr>
    @endforeach
</table><br>

@include('includes.snack1')

<br><br>

<h3>Meal Plan (Week 3 and 4)</h3>
<table width="100%" cellspacing="1" cellpadding="1" border="1">
    <tr>
        <th>Day</th>
        <th>Breakfast</th>
        <th>Brunch</th>
        <th>Lunch</th>
        <th>Dinner</th>
    </tr>
    @foreach($MealDetails as $m)
    <tr>
        @if($m->month_par == '3_and_4')
        <td style="min-width:90px;padding:5px">
            {{$m->days}}
        </td>
        <?php

        $yer = str_replace(['[', ']'], '', $m->daymeal);
        $implo = explode('",', $yer);
        ?>
        @foreach($implo as $k=> $ml)
        <td style="min-width:90px;padding:5px">
            {!! strlen($ml) > 3 ? $ml : 'Snack meal' !!}
        </td>
        @endforeach
        @endif
    </tr>
    @endforeach
</table><br>

@include('includes.snack2')
<!-- main things end -->

<!-- login blade start  -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ url('assets/frontend') }}/css/font-awesome.min.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
            outline-color: #a5b4fc;
        }

        body {
            min-height: 100vh;
            display: grid;
            place-items: center;
            background-color: #e2e8f0;
        }

        p {
            font-size: 14px;
            color: #6b7280;
        }

        .signup-form {
            width: 480px;
            padding: 32px;
            border-radius: 8px;
            background-color: #ffffff;
            box-shadow: 2px 4px 8px #6b728040;
            text-align: center;
        }

        .header {
            margin-bottom: 48px;
        }

        .header h1 {
            font-weight: bolder;
            font-size: 28px;
            color: #6366f1;
        }

        .input {
            position: relative;
            margin-bottom: 24px;
        }

        .input input {
            width: 100%;
            border: none;
            padding: 8px 40px;
            border-radius: 4px;
            background-color: #f3f4f6;
            color: #1f2937;
            font-size: 16px;
        }

        .input input::placeholder {
            color: #6b7280;
        }

        .input i {
            top: 50%;
            width: 36px;
            position: absolute;
            transform: translateY(-50%);
            color: #6b7280;
            font-size: 16px;
        }

        .signup-btn {
            width: 100%;
            border: none;
            padding: 8px 0;
            margin: 24px 0;
            border-radius: 4px;
            background-color: #6366f1;
            color: #ffffff;
            font-size: 16px;
            cursor: pointer;
        }

        .alert {
            background: #FF9494;
            margin-bottom: 10px;
            padding: 10px;
        }

        .signup-btn:active {
            background-color: #4f46e5;
            transition: all 0.3s ease;
        }

        .social-icons i {
            height: 36px;
            width: 36px;
            line-height: 36px;
            border-radius: 50%;
            margin: 24px 8px 48px 8px;
            background-color: gray;
            color: #ffffff;
            font-size: 16px;
            cursor: pointer;
        }

        i.fa-facebook-f {
            background-color: #3b5998;
        }

        i.fa-twitter {
            background-color: #1da1f2;
        }

        i.fa-google {
            background-color: #dd4b39;
        }

        a {
            color: #6366f1;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="signup-form">
        <div class="container">
            <div class="header">
                <h1>Welcome Back</h1>
                <p>Login to get your meal plan</p>
            </div>
            @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <strong style="color: #ffffff;">{{ $message }}</strong>
            </div>
            @endif
            <form method="post" action="{{ url('/loginlogic') }}">
                {!! csrf_field() !!}
                <div class="input">
                    <i class="fa fa-envelope"></i>
                    <input type="email" placeholder="Email" name="email" />
                </div>
                <div class="input">
                    <i class="fa fa-lock"></i>
                    <input type="password" placeholder="Password" name="password" />
                </div>
                <input class="signup-btn" type="submit" value="LOGIN" />
            </form>
        </div>
    </div>
</body>

</html>
<!-- login blade end -->

<!-- intro talk deleted part \ -->

<div style="height:300px;align-items:center;align-content:center;justify-items:center;justify-content:center;display:flex;">
    <h1 align="center">So, let’s do this! 💪💪</h1>
</div>

<!-- ennd  -->