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
                @foreach($initiatives as $v)
                <?php $cum_target_iv = 0; ?>
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
                                    {{-- <br> --}}
                                    {{-- <button type="button" class="btn btn-warning btn-sm openModal" data-toggle="modal" data-value="{{ $company_savings[$v->id][$i]['target_saving'] }}" data-id="0" data-month="{{ $i }}" data-section="target_saving" data-initiative_id="{{ $v->id }}" data-saving_id="">Edit
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
                                {{-- @if ($company_savings[$v->id][$i]['actual_saving'] >= $company_savings[$v->id][$i]['target_saving']) --}}
                                <td>
                                    <p class="text-right">{{number_format(($company_savings[$v->id][$i]['actual_saving']), 2, '.', ',')}}</p>
                                    <button type="button" class="btn btn-info btn-sm openModal" data-toggle="modal" data-value="{{ $company_savings[$v->id][$i]['actual_saving'] }}" data-id="0" data-month="{{ $i }}" data-section="actual_saving" data-initiative_id="{{ $v->id }}">Edit
                                    </button>
                                </td>
                                {{-- @else
                                <td
                                   <p class="text-right fail">{{number_format(($company_savings[$v->id][$i]['actual_saving']), 2, '.', ',')}}</p>
                                    <button type="button" class="btn btn-info btn-sm openModal" data-toggle="modal" data-value="{{ $company_savings[$v->id][$i]['actual_saving'] }}" data-id="0" data-month="{{ $i }}" data-section="actual_saving" data-initiative_id="{{ $v->id }}">Edit
                                    </button>
                                </td>
                                @endif --}}
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
                                    <b><p class="text-right">{{ number_format(($company_savings[$v->id][$i]['target_saving']), 2, '.', ',') }}</p></b>
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
                                    <b><p class="text-right">{{ number_format($TCM, 2 ,'.' ,',')}}</p></b>
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
                                @if ($company_savings[$v->id][$i]['actual_saving'] >= $company_savings[$v->id][$i]['target_saving'])
                                    <td>
                                        <p class="text-right good">{{ number_format(($company_savings[$v->id][$i]['actual_saving']), 2, '.', ',')}}</p>
                                    </td>
                                @else
                                    <td>
                                        <p class="text-right fail">{{ number_format(($company_savings[$v->id][$i]['actual_saving']), 2, '.', ',')}}</p>
                                    </td>
                                @endif
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
                                @if ($ACM >= $TCM)
                                <td>
                                    <b><p class="text-right good">{{ number_format($ACM, 2 ,'.' ,',')}}</p></b>
                                </td>
                                @else
                                <td>
                                    <b><p class="text-right fail">{{ number_format($ACM, 2 ,'.' ,',')}}</p></b>
                                </td>
                                @endif
                            @else
                                <td> - </td>
                            @endif
                        @endfor
                    </tr>
                    <tr>
                        <th class="fixed-side"><b>Achievement Percentage</b></th>
                        <?php $achieve = 0; ?>
                        @for($i = 1; $i <= 12; $i++)
                        <?php $achieve += $company_savings[$v->id][$i]['actual_saving']; ?>
                            @if($achieve != null)
                                <td>
                                    <b><p class="text-center">{{ number_format(($achieve / $cum_target_iv)*100, 0) }}%</p></b>
                                </td>
                            @else
                                <td> 0 </td>
                            @endif
                        @endfor
                    </tr>
                @endforeach
                    <tr>
                        <td class="fixed-side" colspan="3"></td>
                            <th class="fixed-side" colspan="1" ><b>Overall Total Target Saving</b></th>
                            @for($i = 1; $i <= 12; $i++)
                            <?php $OTTS = 0; ?>
                            @foreach($initiatives as $v)
                            <?php $OTTS += $company_savings[$v->id][$i]['target_saving']; ?>
                            @endforeach
                                @if($OTTS != null)
                                    <td>
                                        <b><p class="text-right">{{ number_format($OTTS, 2 ,'.' ,',')}}</p></b>
                                    </td>
                                @else
                                    <td> - </td>
                                @endif
                            @endfor
                    </tr>
                    <tr>
                        <td class="fixed-side" colspan="3"></td>
                            <th class="fixed-side" colspan="1" ><b>Overall Target Cumulative Saving</b></th>
                            <?php $OTCS = 0; ?>
                            @for($i = 1; $i <= 12; $i++)
                            @foreach($initiatives as $v)
                            <?php $OTCS += $company_savings[$v->id][$i]['target_saving']; ?>
                            @endforeach
                                @if($OTCS != null)
                                    <td>
                                        <b><p class="text-right">{{ number_format($OTCS, 2 ,'.' ,',')}}</p></b>
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
                            <?php $OTAS = 0; ?>
                            @foreach($initiatives as $v)
                            <?php $OTAS += $company_savings[$v->id][$i]['actual_saving']; ?>
                            @endforeach
                                @if($OTAS != null )
                                    @if ($OTAS >= $OTTS)
                                    <td>
                                        <b><p class="text-right good">{{ number_format($OTAS, 2 ,'.' ,',')}}</p></b>
                                    </td>
                                    @else
                                    <td>
                                        <b><p class="text-right fail">{{ number_format($OTAS, 2 ,'.' ,',')}}</p></b>
                                    </td>
                                    @endif
                                @else
                                    <td> - </td>
                                @endif
                            @endfor
                    </tr>
                    <tr>
                        <td class="fixed-side" colspan="3"></td>
                            <th class="fixed-side" colspan="1" ><b>Overall Cumulative Savings</b></th>
                            <?php $OCS = 0; ?>
                            @for($i = 1; $i <= 12; $i++)
                            @foreach($initiatives as $v)
                            <?php $OCS += $company_savings[$v->id][$i]['actual_saving']; ?>
                            @endforeach
                                @if($OCS != null)
                                    @if ($OCS >= $OTCS)
                                    <td>
                                        <b><p class="text-right good">{{ number_format($OCS, 2 ,'.' ,',')}}</p></b>
                                    </td>
                                    @else
                                    <td>
                                        <b><p class="text-right fail">{{ number_format($OCS, 2 ,'.' ,',')}}</p></b>
                                    </td>
                                    @endif
                                @else
                                    <td> - </td>
                                @endif
                            @endfor
                    </tr>
                    <tr>
                        <td class="fixed-side" colspan="3"></td>
                            <th class="fixed-side" colspan="1" ><b>Overall Achievement Percentage</b></th>
                            <?php $OC = 0; $OAP=0; ?>
                            @for($i = 1; $i <= 12; $i++)
                            <?php $init_cumm = 0; ?>
                            @foreach($initiatives as $v)
                                <?php $OC += $company_savings[$v->id][$i]['actual_saving']; ?>

                                @for($t = 1; $t <= 12; $t++)
                                    <?php $init_cumm += $company_savings[$v->id][$t]['target_saving']; ?>
                                @endfor

                            @endforeach
                                @if($OC != null)
                                    <td>
                                        <b><p class="text-center">{{ number_format(($OC / $init_cumm)*100, 0) }}%</p></b>
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
