<div class="table-container">
    <div id="table-scroll" class="table-scroll">
        <div class="" style="overflow:auto; width: 100%;">
            <table class="main-table">
                <thead>
                <tr>
                    <th class="fixed-side"><p class="col"><b>AREA</b></p></th>
                    <th class="fixed-side"><p class="col" style="width: 200px;"><b>ANALYZE FACTORS OR CAUSES CONTRIBUTING TO CURRENT PERFORMANCE</b></p></th>
                    <th class="fixed-side"><p class="col" style="width: 200px;"><b>PROPOSED ACTION TO BE TAKEN TO ACHIEVE SAVINGS</b></p></th>
                    <th class="fixed-side"><p class="col" style="width: 150px;"><b>TARGET COST REDUCTION (ESTIMATE)</b></p></th>
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
                <?php $cum_target_iv = 0; ?>
                @foreach($initiatives as $v)
                    <tr>
                        <th class="fixed-side" rowspan="7">{!! $v->area !!}</th>
                        <th class="fixed-side" rowspan="7">{!! $v->analyze !!}</th>
                        <th class="fixed-side" rowspan="7">{!! $v->action !!}</th>
                        @for($i = 1; $i <= 12; $i++)
                        <?php $cum_target_iv += $company_savings[$v->id][$i]['target_saving']; ?>
                        @endfor            
                        <th class="fixed-side">
                            <span style="float: left;"><b>RM</b></span>
                            <span style="float: right;"><b>{{ number_format($cum_target_iv, 2, '.', ',')}}</b></span>
                        </th>
                        @for($i = 1; $i <= 12; $i++)
                            @if($company_savings[$v->id][$i]['target_saving'] != null)
                                <td>
                                    <p class="text-right">{{ number_format(($company_savings[$v->id][$i]['target_saving']), 2, '.', ',') }}</p>
                                    {{-- <br>
                                    <button type="button" class="btn btn-warning btn-sm openModal" data-toggle="modal" data-value="{{ $company_savings[$v->id][$i]['target_saving'] }}" data-id="0" data-month="{{ $i }}" data-section="target_saving" data-initiative_id="{{ $v->id }}" data-saving_id="">Edit
                                    </button> --}}
                                </td>
                            @else

                                <td>
                                    <span class="editable">
                                    -
                                    <br>
                                    <button type="button" class="btn btn-warning btn-sm openModal" data-toggle="modal" data-value="" data-id="0" data-month="{{ $i }}" data-section="target_saving" data-initiative_id="{{ $v->id }}" data-saving_id="">Edit
                                    </button>
                                    </span>
                                </td>
                            @endif
                        @endfor
                    </tr>
                    <tr>
                        <th class="fixed-side"><b>ACTUAL SAVING FOR THE MONTH</b></th>
                        @for($i = 1; $i <= 12; $i++)
                            @if($company_savings[$v->id][$i]['actual_saving'] != null)
                                <td>
                                    <p class="text-right">{{number_format(($company_savings[$v->id][$i]['actual_saving']), 2, '.', ',')}}</p>
                                    <button type="button" class="btn btn-info btn-sm openModal" data-toggle="modal" data-value="{{ $company_savings[$v->id][$i]['actual_saving'] }}" data-id="0" data-month="{{ $i }}" data-section="actual_saving" data-initiative_id="{{ $v->id }}">Edit
                                    </button>
                                </td>
                            @else
                                <td>
                                    <span class="editable">
                                    -
                                    <br>
                                    <button type="button" class="btn btn-info btn-sm openModal" data-toggle="modal" data-value="" data-id="0" data-month="{{ $i }}" data-section="actual_saving" data-initiative_id="{{ $v->id }}">Edit
                                    </button>
                                    </span>
                                </td>
                            @endif
                        @endfor
                    </tr>
                    <tr>
                        <th class="fixed-side"><b>Total Target Saving</b></th>
                        @for($i = 1; $i <= 12; $i++)
                            @if($company_savings[$v->id][$i]['target_saving'] != null)
                                <td>
                                    <p class="text-right">{{ number_format(($company_savings[$v->id][$i]['target_saving']), 2, '.', ',') }}</p>
                                    {{-- <br>
                                    <button type="button" class="btn btn-warning btn-sm openModal" data-toggle="modal" data-value="{{ $company_savings[$v->id][$i]['target_saving'] }}" data-id="0" data-month="{{ $i }}" data-section="target_saving" data-initiative_id="{{ $v->id }}" data-saving_id="">Edit
                                    </button> --}}
                                </td>
                            @else

                                <td>
                                    <span class="editable">
                                    -
                                    <br>
                                    <button type="button" class="btn btn-warning btn-sm openModal" data-toggle="modal" data-value="" data-id="0" data-month="{{ $i }}" data-section="target_saving" data-initiative_id="{{ $v->id }}" data-saving_id="">Edit
                                    </button>
                                    </span>
                                </td>
                            @endif
                        @endfor
                    </tr>
                    <tr>
                        <th class="fixed-side"><b>Target Cumulative Saving</b></th>
                        <?php $TCM = 0; ?>
                        @for($i = 1; $i <= 12; $i++)
                        <?php $TCM += $company_savings[$v->id][$i]['target_saving']; ?>
                            @if($TCM != null)
                                <td>
                                    <p class="text-right">{{ number_format($TCM, 2 ,'.' ,',')}}</p>
                                </td>
                            @else
                                <td> - </td>
                            @endif
                        @endfor
                    </tr>
                    <tr>
                        <th class="fixed-side"><b>Actual Saving for the Month</b></th>
                        @for($i = 1; $i <= 12; $i++)
                            @if($company_savings[$v->id][$i]['actual_saving'] != null)
                                <td>
                                    <p class="text-right">{{ number_format(($company_savings[$v->id][$i]['actual_saving']), 2, '.', ',')}}</p>
                                </td>
                            @else
                                <td> - </td>
                            @endif
                        @endfor
                    </tr>
                    <tr>
                        <th class="fixed-side"><b>Actual Cumulative Saving</b></th>
                        <?php $ACM = 0; ?>
                        @for($i = 1; $i <= 12; $i++)
                        <?php $ACM += $company_savings[$v->id][$i]['actual_saving']; ?>
                            @if($ACM != null)
                                <td>
                                    <p class="text-right">{{ number_format($ACM, 2 ,'.' ,',')}}</p>
                                </td>
                            @else
                                <td> - </td>
                            @endif
                        @endfor
                    </tr>
                    <tr>
                        <th class="fixed-side"><b>Achievement %</b></th>
                        @for($i = 1; $i <= 12; $i++)
                            @if($company_savings[$v->id][$i]['actual_saving'] != null && $company_savings[$v->id][$i]['target_saving'] != null)
                                <td>
                                    <p class="text-right">{{ number_format(($company_savings[$v->id][$i]['actual_saving'] / $company_savings[$v->id][$i]['target_saving'])*100, 0)}}</p>
                                </td>
                            @else
                                <td> - </td>
                            @endif
                        @endfor
                    </tr>
                @endforeach
                    <tr>
                        <td class="fixed-side" colspan="3"></td>
                            <th class="fixed-side" colspan="1" ><b>Overall Total Target Saving</b></th>
                            @for($i = 1; $i <= 12; $i++)
                                @if($company_savings[$v->id][$i]['actual_saving'] != null && $company_savings[$v->id][$i]['target_saving'] != null)
                                    <td>
                                        
                                    </td>
                                @else
                                    <td> - </td>
                                @endif
                            @endfor
                    </tr>
                    <tr>
                        <td class="fixed-side" colspan="3"></td>
                            <th class="fixed-side" colspan="1" ><b>Overall Total Actual Saving</b></th>
                            @for($i = 1; $i <= 12; $i++)
                                @if($company_savings[$v->id][$i]['actual_saving'] != null && $company_savings[$v->id][$i]['target_saving'] != null)
                                    <td>
                                        
                                    </td>
                                @else
                                    <td> - </td>
                                @endif
                            @endfor
                    </tr>
                    <tr>
                        <td class="fixed-side" colspan="3"></td>
                            <th class="fixed-side" colspan="1" ><b>Overall Actual Saving for the Month</b></th>
                            @for($i = 1; $i <= 12; $i++)
                                @if($company_savings[$v->id][$i]['actual_saving'] != null && $company_savings[$v->id][$i]['target_saving'] != null)
                                    <td>
                                        
                                    </td>
                                @else
                                    <td> - </td>
                                @endif
                            @endfor
                    </tr>
                    <tr>
                        <td class="fixed-side" colspan="3"></td>
                            <th class="fixed-side" colspan="1" ><b>Overall Cumulative Savings</b></th>
                            @for($i = 1; $i <= 12; $i++)
                                @if($company_savings[$v->id][$i]['actual_saving'] != null && $company_savings[$v->id][$i]['target_saving'] != null)
                                    <td>
                                        
                                    </td>
                                @else
                                    <td> - </td>
                                @endif
                            @endfor
                    </tr>
                    <tr>
                        <td class="fixed-side" colspan="3"></td>
                            <th class="fixed-side" colspan="1" ><b>Overall Achievement Percentage</b></th>
                            @for($i = 1; $i <= 12; $i++)
                                @if($company_savings[$v->id][$i]['actual_saving'] != null && $company_savings[$v->id][$i]['target_saving'] != null)
                                    <td>
                                        
                                    </td>
                                @else
                                    <td> - </td>
                                @endif
                            @endfor
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function() {
       jQuery(".main-table").clone(true).appendTo('#table-scroll').addClass('clone'); 
    });
</script>
