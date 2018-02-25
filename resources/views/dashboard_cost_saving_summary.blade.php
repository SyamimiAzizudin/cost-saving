<table class="table table-bordered" style="border-collapse: collapse;">
    <tr>
        <td><label for="company" class="col-md-12 text-center control-label">Group</label></td>
        <td><label for="company" class="col-md-12 text-center control-label">Target (RM)</label></td>
        <td><label for="company" class="col-md-12 text-center control-label">Actual (RM)</label></td>
        <td><label for="company" class="col-md-12 text-center control-label">%</label></td>
    </tr>
    <?php $i=0 ?>
    @forelse ($saving_summary_results as $k => $v)
        <tr>
            <td><a href="{{ url('/group-dashboard') }}/{{$v->group}}"><label for="company" class="col-md-12 control-label">{{  $v->group }}</label></a></td>
            <td><label for="saving_target" class="col-md-12 number text-right control-label">{{  number_format( ($v->target), 2, '.', ',') }}</label></td>
            <td><label for="actual_saving" class="col-md-12 number text-right control-label">{{  number_format( ($v->actual), 2, '.', ',' ) }}</label></td>
            <td><label for="Target" class="col-md-12 number text-center control-label">45</label></td>
            {{-- <td><label class="col-md-2 text-left"><a href="{{ url('/group-dashboard') }}/{{$company->group}}">View More (Company)</a></label></td> --}}
        </tr>
        <?php $i++; ?>
    @empty
    @endforelse
</table>