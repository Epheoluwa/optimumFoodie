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
        ?>
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
                <?php
                $did = " ";
                $oldget = " ";
                $still = array();
                //check if + sign exist in the string
                if (strpos($ml, '+')) {
                    //if true the turn that string to an array on that + sign
                    $newarrr = explode('+', $ml);
                    foreach ($newarrr as $get) {
                        //loop through that array and get the string index value from 1-4
                        $pos = substr($get, 1, 4);
                        if (floatval($pos)) {
                            //if that value found from that position can be turn to a float the run below
                            if (strpos($pos, '.') !== false) {
                                //check if the value that can be turn to fraction is actually a float the add the loop value to the created string above
                                $oldget = $get;
                                //convert to decimal her
                                $decimal = floatval($pos);
                                //functionn to convert decimal to fraction
                                $fracValue = float2rat22($decimal);
                                $did = str_replace($decimal, $fracValue, $get);
                            }
                        }
                        $nnn = str_replace($oldget, $did, $get);
                        array_push($still, $nnn);
                    }
                }
                $ml = implode("+", $still);
                $newml = str_replace('\u00bd', '½', $ml);

                ?>
                {!! strlen($newml) > 3 ? $newml : 'Snack meal' !!}
            </td>
            @endforeach

        </tr>
        @endforeach

    </table><br>

    <h2 style="font-weight: bolder; color:red; font-family: 'Be Vietnam Pro', sans-serif;"> SUBSCRIBE TO HAVE ACCESS TO FULL MEAL PLAN</h2>
</div>


@include('includes.snack1')