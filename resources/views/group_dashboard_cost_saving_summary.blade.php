<table class="table table-bordered table-summary">
    <tr>
        <td><label for="" class="col-md-12 text-center control-label">Company</label></td>
        <td><label for="" class="col-md-12 text-center control-label">Target (RM)</label></td>
        <td><label for="" class="col-md-12 text-center control-label">Actual (RM)</label></td>
        <td><label for="" class="col-md-12 text-center control-label">%</label></td>
    </tr>
    <?php $i=1 ?>
    @forelse ($companies as $company)
        <tr>
            <td><b><a class="control-label" href="{{ url('/company-dashboard') }}/{{ $company->id }}">{{ $company->name }}</a></b></td>
            <td>
                <label for="Target" class="col-md-12 text-right number control-label">
                    {{ number_format( ($company->target_saving), 2, '.', ',') }}
                </label>
            </td>
            @if($company->actual_saving<$company->target_saving)
                <td><label for="Target" class="col-md-12 text-right number control-label fail fresult">{{ number_format( ($company->actual_saving), 2, '.', ',') }}</label></td>
            @else
                <td><label for="Target" class="col-md-12 text-right number control-label good">{{ number_format( ($company->actual_saving), 2, '.', ',') }}</label></td>
            @endif
            <td>
                @if($company->target_saving != null && $company->actual_saving != null)
                <label class="col-md-12 text-center number control-label">
                    {{ number_format(($company->actual_saving/$company->target_saving) * 100,2) }}
                </label>
                @endif
            </td>
        </tr>
        <?php $i++; ?>
    @empty
    @endforelse
</table>