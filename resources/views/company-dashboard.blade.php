@extends('layouts.app')

@section('content')

<!-- Company Dashboard All Section -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dashboard - {{ $company->name }}</h1>

        <ol class="breadcrumb">
            @if(Auth::user()->role == 'admin')
            <li><a href="{{ url('/home') }}">Home</a></li>
            @endif
            <li><a href="{{ url('/dashboard') }}">Main Dashboard</a></li>
            <li><a href="{{ url('/group-dashboard') }}/{{ $company->group }}">Group Dashboard</a></li>
            <li class="active">Dashboard - {{ $company->name }}</li>
        </ol>

        {{-- filter company saving by year --}}
        <div class="form-group col-md-5 pull-right filter-width">
            <label for="year" class="col-sm-3 col-sm-3-custom control-label filter-year">Year: </label>
            <div class="col-sm-4 filter-year">
                <select name="year" class="form-control" id="company_filteryear">
                </select>
            </div>
        </div>

    </div>

    </div></div></div></div></div>

    <div id="company_saving_summary"></div>

<script>

    // get year
    var currentTime = new Date();
    var year = currentTime.getFullYear();

    // do loop year
    var i = 2020 - 2018;

    //  append for asc, prepend for desc
    while(i>=0){
        $('#company_filteryear').prepend($('<option>', {
            value: year + i,
            text: year + i
        }));
        i--;
    }

    // filter company saving by year
    // initial load
    getYear(year);
    $(function() {
        $("#company_filteryear").on('change', function(){
            var selected_value = $(this).find(":selected").val();
            getYear(selected_value);
        });
    });

    function getYear(year)
    {
        $.ajax({
            url: '/company-dashboard/{{ $id }}/'+year, //this is the submit URL
            type: 'GET', //or POST
            success: function(data){
                $("#company_saving_summary").html(data);
            }
        });
    }

</script>

@endsection