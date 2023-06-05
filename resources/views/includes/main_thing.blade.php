<div class="page-break"></div>
<div class="topPadding">
    <h3>Meal Plan (Week 1 and 2)</h3>
    <table width="100%" cellspacing="1" cellpadding="1" border="1">
        <tr>
            <th>Day</th>
            <th>1st Meal</th>
            <th>2nd Meal</th>
            <th>3rd Meal</th>
            <th>4th Meal</th>
        </tr>
        <?php
        function float2rat($n, $tolerance = 1.e-6)
        {
            $h1 = 1;
            $h2 = 0;
            $k1 = 0;
            $k2 = 1;
            $b = 1 / $n;
            do {
                $b = 1 / $b;
                $a = floor($b);
                $aux = $h1;
                $h1 = $a * $h1 + $h2;
                $h2 = $aux;
                $aux = $k1;
                $k1 = $a * $k1 + $k2;
                $k2 = $aux;
                $b = $b - $a;
            } while (abs($n - $h1 / $k1) > $n * $tolerance);

            return "$h1/$k1";
        }

        function convertDecimalToFraction($string)
        {
            $pattern = '/\b(\d+(\.\d+)?)\b/'; // regex pattern to match decimal numbers
            preg_match_all($pattern, $string, $matches);

            foreach ($matches[0] as $decimal) {
                $fraction = convertToFraction($decimal);
                $string = str_replace($decimal, $fraction, $string);
            }

            return $string;
        }

        function convertToFraction($decimal)
        {
            $whole = floor($decimal);
            $fraction = $decimal - $whole;

            if ($fraction == 0) {
                return $whole;
            } else {
                $numerator = $fraction * 100;
                $denominator = 100;
                $gcd = gcd($numerator, $denominator);
                $numerator /= $gcd;
                $denominator /= $gcd;
                return $whole . ' ' . $numerator . '/' . $denominator;
            }
        }

        function gcd($a, $b) {
            if ($b == 0) {
                return $a;
            }

            return gcd($b, $a % $b);
        }

        function decimal_to_mixed_fraction($decimal)
        {
            $parts = explode('.', $decimal);
            $integer = $parts[0];
            $numerator = $parts[1];
            $denominator = pow(10, strlen($parts[1]));
            $gcd = gcd($numerator, $denominator);
            $numerator /= $gcd;
            $denominator /= $gcd;
            $whole = floor($decimal);
            if ($numerator == 0) {
                return $whole;
            } else {
                return ($whole == 0) ? $numerator . '/' . $denominator : $whole . ' ' . $numerator . '/' . $denominator;
            }
        }

        ?>
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
                <?php
                $did = " ";
                // $oldget = " ";
                // $still = array();
                // //check if + sign exist in the string
                // if (strpos($ml, '+')) {
                //     //if true the turn that string to an array on that + sign
                //     $newarrr = explode('+', $ml);
                //     foreach ($newarrr as $get) {
                //         //loop through that array and get the string index value from 1-4
                //         $pos = substr($get, 1, 4);
                //         if (floatval($pos)) {
                //             //if that value found from that position can be turn to a float the run below
                //             if (strpos($pos, '.') !== false) {
                //                 //check if the value that can be turn to fraction is actually a float the add the loop value to the created string above
                //                 $oldget = $get;
                //                 //convert to decimal her
                //                 $decimal = floatval($pos);
                //                 //functionn to convert decimal to fraction
                //                 $fracValue = float2rat22($decimal);
                //                 $did = str_replace($decimal, $fracValue, $get);
                //             }
                //         }
                //         $nnn = str_replace($oldget, $did, $get);
                //         array_push($still, $nnn);
                //     }
                // }

                $newl = preg_replace_callback('/\d+\.\d+/', function ($match) {
                    return decimal_to_mixed_fraction($match[0]);
                }, $ml);
                // $newl = convertDecimalToFraction($ml);
                $tr = str_replace('"', '', $newl);
                $newml = str_replace('\u00bd', '½', $tr);
                ?>
                {!! strlen($newml) > 3 ? $newml : 'Snack meal' !!}
            </td>
            @endforeach
            @endif
        </tr>
        @endforeach
    </table><br>
</div>

<div class="page-break"></div>
@include('includes.snack1')

<br><br>

<div class="page-break"></div>

<div class="topPadding">
    <h3>Meal Plan (Week 3 and 4)</h3>
    <table width="100%" cellspacing="1" cellpadding="1" border="1">
        <tr>
            <th>Day</th>
            <th>1st Meal</th>
            <th>2nd Meal</th>
            <th>3rd Meal</th>
            <th>4th Meal</th>
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
                <?php
                $did = " ";
                // $oldget = " ";
                // $still = array();
                // //check if + sign exist in the string
                // if (strpos($ml, '+')) {
                //     //if true the turn that string to an array on that + sign
                //     $newarrr = explode('+', $ml);
                //     foreach ($newarrr as $get) {
                //         //loop through that array and get the string index value from 1-4
                //         $pos = substr($get, 1, 4);
                //         if (floatval($pos)) {
                //             //if that value found from that position can be turn to a float the run below
                //             if (strpos($pos, '.') !== false) {
                //                 //check if the value that can be turn to fraction is actually a float the add the loop value to the created string above
                //                 $oldget = $get;
                //                 //convert to decimal her
                //                 $decimal = floatval($pos);
                //                 //functionn to convert decimal to fraction
                //                 $fracValue = float2rat($decimal);
                //                 $did = str_replace($decimal, $fracValue, $get);
                //             }
                //         }
                //         $nnn = str_replace($oldget, $did, $get);
                //         array_push($still, $nnn);
                //     }
                // } else {
                //     array_push($still, $ml);
                // }

                $newl = preg_replace_callback('/\d+\.\d+/', function ($match) {
                    return  decimal_to_mixed_fraction($match[0]); 
                }, $ml);

                // $ml = implode("+", $still);
                $tr = str_replace('"', '', $newl);
                $newml = str_replace('\u00bd', '½', $tr);

                ?>
                {!! strlen($newml) > 3 ? $newml : 'Snack meal' !!}
            </td>
            @endforeach
            @endif
        </tr>
        @endforeach
    </table><br>

</div>

<!-- @include('includes.snack2') -->