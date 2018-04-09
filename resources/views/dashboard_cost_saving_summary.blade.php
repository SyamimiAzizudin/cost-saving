<table class="table table-bordered table-summary">
    <tr>
        <td><label for="company" class="col-md-12 text-center control-label">Group</label></td>
        <td><label for="company" class="col-md-12 text-center control-label">Target (RM)</label></td>
        <td><label for="company" class="col-md-12 text-center control-label">Actual (RM)</label></td>
        <td><label for="company" class="col-md-12 text-center control-label">%</label></td>
    </tr>
    <?php $i=0 ?>
    @forelse ($saving_summary_results as $k => $v)
        <tr>
            <td><b><a class="control-label" href="{{ url('/group-dashboard') }}/{{$v->group}}">{{$v->group}}</a></b></td>
            <td class="text-right"><label for="saving_target" class="col-md-12 number text-right control-label">{{  number_format( ($v->target), 2, '.', ',') }}</label></td>
            @if($v->actual >= $v->target )
            <td class="text-right"><label for="actual_saving" class="col-md-12 number text-right control-labe good">{{  number_format( ($v->actual), 2, '.', ',' ) }}</label></td>
            @else
            <td class="text-right"><label for="actual_saving" class="col-md-12 number text-right control-labe fail">{{  number_format( ($v->actual), 2, '.', ',' ) }}</label></td>
            @endif
            <td><label for="Target" class="col-md-12 number text-center control-label">{{ number_format(($v->actual/$v->target) * 100,0) }}</label></td>
        </tr>
        <?php $i++; ?>
    @empty
    @endforelse
</table>