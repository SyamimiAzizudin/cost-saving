<table class="table table-bordered" style="border-collapse: collapse;">
    <tr>
        <td><label for="" class="col-md-12 text-center control-label">Company</label></td>
        <td><label for="" class="col-md-12 text-center control-label">Target (RM)</label></td>
        <td><label for="" class="col-md-12 text-center control-label">Actual (RM)</label></td>
        <td><label for="" class="col-md-12 text-center control-label">%</label></td>
        {{-- <td></td> --}}
    </tr>
    <?php $i=1 ?>
    @forelse ($companies as $company)
        <tr>
            <td><a href="{{ url('/company-dashboard') }}/{{ $company->id }}"><label for="company" class="col-md-12 control-label">{{ $company->name }}</label></a></td>
            <td>
                <label for="Target" class="col-md-12 text-right number control-label">
                    {{ number_format( ($company->target_saving), 2, '.', ',') }}
                </label>
            </td>
            {{-- @if($cummulative_target > $cummulative_actual) --}}
                <td><label for="Target" class="col-md-12 text-right number control-label fail">{{ number_format( ($company->actual_saving), 2, '.', ',') }}</label></td>
            {{-- @else
                <td><label for="Target" class="col-md-12 text-right number control-label good">{{ number_format( ($company->actual_saving), 2, '.', ',') }}</label></td>
            @endif --}}
            <td><label for="Target" class="col-md-12 text-center number control-label">{{ number_format(($company->actual_saving/$company->target_saving) * 100,0) }}</label></td>
        </tr>
        <?php $i++; ?>
    @empty
    @endforelse
</table>