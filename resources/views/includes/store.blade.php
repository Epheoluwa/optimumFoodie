<h3>Meal Plan (Week 3 and 4)</h3>
<table width="100%" cellspacing="1" cellpadding="1" border="1">
    <tr>
        <th>Day</th>
        <th>Breakfast</th>
        <th>Brunch</th>
        <th>Lunch</th>
        <th>Dinner</th>
    </tr>
    @foreach($meal2 as $k=>$m)
    <tr>
        <th>{!! $k !!}</th>
        @foreach($m as $v)
        <td style="min-width:90px;padding:5px">
            <?php
            $yer = str_replace(['[', ']'], '', $v);
            ?>
            {!! !empty(trim($yer)) ? $yer: 'Snack meal' !!}
        </td>
        @endforeach
    </tr>
    @endforeach
</table><br>