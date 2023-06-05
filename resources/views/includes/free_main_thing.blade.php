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
        function float2rat22($n, $tolerance = 1.e-6)
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

            <td style="min-width:90px;padding:5px">
                {{$m->days}}
            </td>
            <?php

            $yer = str_replace(['[', ']'], '', $m->daymeal);
            $implo = explode('",', $yer);
            // print_r($implo);
            ?>
            @foreach($implo as $k=> $ml)
            <td style="min-width:90px;padding:5px">
                <?php
                // echo $ml;
                $did = " ";
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

        </tr>
        @endforeach

    </table><br>
<a href=" {{ url('/login') }}">
<h2 style="font-weight: bolder; color:red; font-family: 'Be Vietnam Pro', sans-serif;"> SUBSCRIBE TO HAVE ACCESS TO FULL MEAL PLAN</h2>
</a>

</div>


@include('includes.snack1')