<div class="table-container">
    <div id="table-scroll" class="table-scroll">
        <div class="" style="overflow:auto; width: 100%;">
            <table class="main-table">
                <thead>
                <tr>
                    <th class="fixed-side"><b>Area</b></th>
                    <th class="fixed-side"><b>Analyze Factors Or Causes Contributing To Current Performance</b></th>
                    <th class="fixed-side"><b>Proposed Action To Be Taken To Achieve Saving</b></th>
                    <th class="fixed-side"><b>Cost Reduction</b></th>
                    <th class="col"><b>JAN</b></th>
                    <th class="col"><b>FEB</b></th>
                    <th class="col"><b>MAR</b></th>
                    <th class="col"><b>APR</b></th>
                    <th class="col"><b>MAY</b></th>
                    <th class="col"><b>JUN</b></th>
                    <th class="col"><b>JUL</b></th>
                    <th class="col"><b>AUG</b></th>
                    <th class="col"><b>SEP</b></th>
                    <th class="col"><b>OCT</b></th>
                    <th class="col"><b>NOV</b></th>
                    <th class="col"><b>DEC</b></th>
                </tr>
                </thead>
                <tbody>
                @foreach($initiatives as $v)
                    <tr>
                        <th class="fixed-side" rowspan="3">{{ $v->area }}</th>
                        <th class="fixed-side" rowspan="3">{{ $v->analyze }}</th>
                        <th class="fixed-side" rowspan="3">{{ $v->action }}</th>
                        <th class="fixed-side"><b>Target Saving (RM)</b></th>
                        @for($i = 1; $i <= 12; $i++)
                            @if($company_savings[$v->id][$i]['target_saving'] != null)
                                <td>
                                    {{ number_format(($company_savings[$v->id][$i]['target_saving']), 2, ',', '.') }}
                                </td>
                            @else

                                <td>
                                    <span class="editable">
                                    -
                                    <br>
                                    <button type="button" class="btn btn-warning btn-sm openModal" data-toggle="modal" data-value="" data-id="0" data-month="{{ $i }}" data-section="target_saving" data-initiative_id="{{ $v->id }}">Edit
                                    </button>
                                    </span>
                                </td>
                            @endif
                        @endfor
                    </tr>
                    <tr>
                        <th class="fixed-side"><b>Actual Saving (RM)</b></th>
                        @for($i = 1; $i <= 12; $i++)
                            @if($company_savings[$v->id][$i]['actual_saving'] != null)
                                <td>
                                    {{ $company_savings[$v->id][$i]['actual_saving'] }}
                                </td>
                            @else
                                <td>
                                    <span class="editable">
                                    -
                                    <br>

                                    <button type="button" class="btn btn-warning btn-sm openModal" data-toggle="modal" data-value="" data-id="0" data-month="{{ $i }}" data-section="actual_saving" data-initiative_id="{{ $v->id }}">Edit
                                    </button>
                                    </span>
                                </td>
                            @endif
                        @endfor
                    </tr>
                    <tr>
                        <th class="fixed-side"><b>Percentage %</b></th>
                        @for($i = 1; $i <= 12; $i++)
                            @if($company_savings[$v->id][$i]['actual_saving'] != null && $company_savings[$v->id][$i]['target_saving'] != null)
                                <td>
                                    {{ number_format(($company_savings[$v->id][$i]['actual_saving'] / $company_savings[$v->id][$i]['target_saving'])*100, 0)}}
                                </td>
                            @else
                                <td> - </td>
                            @endif
                        @endfor
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>