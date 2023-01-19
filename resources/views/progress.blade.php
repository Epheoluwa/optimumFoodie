
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8" align="center">
            <div class="table-container myprogress">
                <div class="progress-bar" style="width:{{ $perc }}%"></div>
                <table class="table" style="position:relative;">
                    <tr>
                        <td class="{{ ($perc==25)?'active-bar':'inactive-bar' }}">Details</td>
                        <td class="{{ ($perc==50)?'active-bar':(($perc>50)?'inactive-bar':'') }}">Goals</td>
                        <td class="{{ ($perc==75)?'active-bar':(($perc>75)?'inactive-bar':'') }}">Activity</td>
                        <td class="{{ ($perc==100)?'active-bar':'' }}">Results</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>