<table class="table table-bordered" style="border-collapse: collapse;">
    <tr>
        <td><label class="col-md-12 text-center control-label">Area</label></td>
        <td><label class="col-md-12 text-center control-label">Target (RM)</label></td>
        <td><label class="col-md-12 text-center control-label">Actual (RM)</label></td>
        <td><label class="col-md-12 text-center control-label">%</label></td>
    </tr>
    <?php $i=1 ?>
    @forelse ($initiatives as $w)
        <tr>
            <td><b>{!! $w->area !!}</b></td>
            <td>
                <label class="col-md-12 text-right number control-label">
                    {{ number_format( ($w->target_saving), 2, '.', ',') }}
                </label>
            </td>
            @if($w->actual_saving >= $w->target_saving)
                <td><label class="col-md-12 text-right number control-label good">{{ number_format( ($w->actual_saving), 2, '.', ',') }}</label></td>
            @else
                <td><label class="col-md-12 text-right number control-label fail">{{ number_format( ($w->actual_saving), 2, '.', ',') }}</label></td>
            @endif
            <td><label class="col-md-12 text-center number control-label">{{ number_format(($w->actual_saving/$w->target_saving) * 100,2) }}</label></td>
        </tr>
        <?php $i++; ?>
    @empty
    @endforelse
</table>

<div class="row">
    <div class="col-lg-12">
        <div class="text-center padding2">
            <a class="btn btn-outline-info info" href="{{ url('/saving-company') }}/{{ $id }}">Open Cost Saving</a>
        </div>
    </div>
</div>

