<table class="table table-bordered" style="border-collapse: collapse;">
    <tr>
        <td><label for="" class="col-md-12 text-center control-label">Area</label></td>
        <td><label for="" class="col-md-12 text-center control-label">Target (RM)</label></td>
        <td><label for="" class="col-md-12 text-center control-label">Actual (RM)</label></td>
        <td><label for="" class="col-md-12 text-center control-label">%</label></td>
        {{-- <td></td> --}}
    </tr>
    <?php $i=1 ?>
    @forelse ($initiatives as $w)
    @if($w->company_id == $company->id)
        <tr>
            <td><b><a class="col-md-12 control-label" href="{{ url('/saving-company') }}/{{ $w->company_id }}">{{ $w->area }}</a></b></td>
            <td>
                <label for="Target" class="col-md-12 text-right number control-label">
                    {{ number_format( ($w->target_saving), 2, '.', ',') }}
                </label>
            </td>
                <td><label for="Target" class="col-md-12 text-right number control-label fail">{{ number_format( ($w->actual_saving), 2, '.', ',') }}</label></td>
            
            <td><label for="Target" class="col-md-12 text-center number control-label">{{ number_format(($w->actual_saving/$w->target_saving) * 100,0) }}</label></td>
        </tr>
        <?php $i++; ?>
    @endif
    @empty
    @endforelse
</table>