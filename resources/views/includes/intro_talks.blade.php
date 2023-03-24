<div class="topPadding">
    <h3>Dear {{ $userDetails['name'] }}, </h3>
    <p>I’m super excited that you’ve chosen to take charge of your body and health. Throughout this journey with me, I’d like you to remember why you decided to join this program. What pushed you? What made you finally decide you needed a change, keep this reason(s) close to heart, because you’ll need to remember them frequently.</p>
    <p>This program is targeted towards helping you drop a dress size every 4 – 6 weeks. I implore you to be patient with the process, try to enjoy every phase of the journey and celebrate every milestone both big and small. In the coming weeks you are sure to see your body changing and your energy levels increasing, and I hope this encourages you to keep going!</p>
    <?php
    $lossweight = false;
    $userWeight = $userDetails['weight'];
    foreach ($MealDetails as $meald) {
        $userCalory = $meald->calories;

      
        if(!empty($meald->weight_aim))
        {
            $userWeightAim = $meald->weight_aim;
            $userMonthAim = $meald->weight_time_aim;
            $lossweight = true;
        }
    }
    if($lossweight)
    {
        //Getting user weight either kg or lbs
        $userWeightArray = explode(" ", $userWeight);
       if($userWeightArray[1] == 'kg')
       {
        $userWeightMain = $userWeightArray[0];
       }elseif ($userWeightArray[1] == 'lbs') {
        $userWeightMain = round($userWeightArray[0] / 2.20462);
       }
      //Getting user weight aim either kg or lbs
       $userWeightAimArray = explode(" ", $userWeightAim);
       if($userWeightAimArray[1] == 'kg')
       {
        $userWeightAimMain = $userWeightAimArray[0];
       }elseif ($userWeightAimArray[1] == 'lbs') {
        $userWeightAimMain = round($userWeightAimArray[0]/2.20462);
       }
        $weightdiff = $userWeightMain - $userWeightAimMain;
        $weightLossPerMonth = round($weightdiff / $userMonthAim);
    }

    ?>
    @if($lossweight)
        <p>Below is a breakdown of what I hope to achieve with you in the next <strong> {{$userMonthAim}} months.</strong> </p>
        @for($i = 1; $i <= 36; $i++) 
    
            @if($i == 1)
                @php 
                $sub = 0;
                $weightindex = $weightLossPerMonth;
                $printCalories = $userCalory - $sub;
                $prinntweight = $userWeightMain - $weightLossPerMonth
                @endphp
                
            @endif

            @php 
                $printCalories = $userCalory - $sub;
                $prinntweight = $userWeightMain - $weightLossPerMonth
            @endphp
            @if($i !== $userMonthAim)
                @php 
                    $sub = $sub + 100;
                    $weightLossPerMonth = $weightLossPerMonth + $weightindex;
                @endphp
                
            @endif
            
            <p>Month {{$i}}: Your plan will provide you  <strong> {{$printCalories}}cal per day</strong>, to ensure you are continually burning fat. Your target weight at the end of this month will be  <strong>{{$prinntweight}}kg.</strong></p>

                @if($i == $userMonthAim)
                @break;

                @endif

        @endfor
            <!-- <p>Below is a breakdown of what I hope to achieve with you in the next <strong> {{$userMonthAim}} months.</strong> </p>
            <p>Month 1: your plan will provide you with <strong> {{$userCalory}} cal per day </strong>, and will help you lose about 1kg per week. At the end of your first month your target weight is <strong> 65 </strong>.</p>
            <p>Month 2: at your 2nd month, your plan will provide you 1300cal per day, to ensure you are continually burning fat. Your target weight at the end of this month will be 99kg.</p>
            <p>Month 3: at your 3rd month, your plan will provide you 1200cal per day, to ensure you are continually burning fat. Your target weight at the end of this month will be 95kg.</p> -->
            <p>After you reach your goal, I’ll be helping you create a well-rounded meal plan that will help you maintain your results without feeling deprived.</p><br>
    @endif
        <p>Note that the weight goals are just guidelines. Sometimes the number on the scale doesn’t do a good job of reflecting your progress, and so, your body measurements, size and photos will be better metrics.</p>
        <p>To help you track visual progress, ensure you take the following photos. It’s very important to so you can have a baseline to compare with when you start making progress.</p>
        <p>Take the following photos:
        <ul>
            <li>A recent full photo of yourself (you can find and send one you already have on your phone</li>
            <li>A photo of your belly from the side and front </li>
            <li>A photo of your back</li>
        </ul>
        </p>
        <p>It won’t be easy, but it’ll be worth it. Whenever you want to cheat or give up please remember why you made the decision to do this, picture your end result and stay focused. You won’t be perfect, but so long as you stay on the path most of the time, you are definitely going to succeed! I’m rooting for you!</p>
</div>
<div style="height:300px;align-items:center;align-content:center;justify-items:center;justify-content:center;display:flex; margin-top:3rem">
    <!-- <h1 style="text-align: center;"> <img src="{{ public_path('assets/frontend/images/ebe.jpeg') }}" height="50px" /> So, let’s do this! <img src="{{ public_path('assets/frontend/images/ebe.jpeg') }}" height="50px" /> </h1> -->
    <!-- <h1 style="text-align: center;"> <img src="https://i.postimg.cc/VksZBmT6/Moderate.jpg" height="50px"/> So, let’s do this! <img src="https://i.postimg.cc/VksZBmT6/Moderate.jpg" height="50px"/>   </h1> -->
</div>

<div class="page-break"></div>