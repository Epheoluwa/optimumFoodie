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