@extends('layouts.app')

@section('content')
        
<!-- Group Dashboard All Section -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dashboard - {{ $group }} Group</h1>

        <ol class="breadcrumb col-md-7 pull-left">
            @if(Auth::user()->role == 'admin')
            <li><a href="{{ url('/home') }}">Home</a></li>
            @endif
            <li><a href="{{ url('/dashboard') }}">Main Dashboard</a>
            </li>
            <li class="active">Dashboard - {{ $group }} Group</li>
        </ol>

        {{-- filter group saving by year --}}
        <div class="form-group col-md-5 pull-right filter-width">
            <label for="year" class="col-sm-3 col-sm-3-custom control-label filter-year">Year: </label>
            <div class="col-sm-4 filter-year">
                <select name="year" class="form-control" id="group_filteryear">
                </select>
            </div>
        </div>
        
    </div>

    </div></div></div></div></div>

    <div id="group_saving_summary"></div>

<script>

     // get year
    var currentTime = new Date();
    var year = currentTime.getFullYear();

    // do loop year
    var i = 2020 - 2018;

    //  append for asc, prepend for desc
    while(i>=0){
        $('#group_filteryear').prepend($('<option>', {
            value: year + i,
            text: year + i
        }));
        i--;
    }

    // get filter group saving by year
    //initial load
    getYear(year);
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