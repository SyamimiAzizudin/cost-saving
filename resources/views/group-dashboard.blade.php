@extends('layouts.app')

@section('content')
        
<div class="row">
    <div class="col-lg-12">
        <!--name group-->
        <h1 class="page-header">Dashboard - {{ $group }} Group</h1>

        <ol class="breadcrumb col-md-7 pull-left">
            @if(Auth::user()->role == 'admin')
            <li><a href="{{ url('/home') }}">Home</a></li>
            @endif
            <li><a href="{{ url('/dashboard') }}">Main Dashboard</a>
            </li>
            <li class="active">Dashboard - {{ $group }} Group</li>
        </ol>

        {{-- filter by year --}}
        <div class="form-group col-md-5 pull-right filter-width">
            <label for="year" class="col-sm-3 col-sm-3-custom control-label filter-year">Year: </label>
            <div class="col-sm-4 filter-year">
                <select name="year" class="form-control" id="group_filteryear">
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                </select>
            </div>
        </div>
        
    </div>

    </div></div></div></div></div>

    <div id="group_saving_summary"></div>

<script>

    // filter group saving by year
    //initial load
    getYear(2018);
    $(function() {
        $("#group_filteryear").on('change', function(){
            var selected_value = $(this).find(":selected").val();
            getYear(selected_value);
        });
    });

    function getYear(year)
    {
        $.ajax({
            url: '/group-dashboard/{{ $group }}/'+year, //this is the submit URL
            type: 'GET', //or POST
            success: function(data){
                $("#group_saving_summary").html(data);
            }
        });
    }
    
</script>

@endsection