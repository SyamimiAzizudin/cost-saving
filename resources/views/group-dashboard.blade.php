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
            <label for="year" class="col-sm-3 col-sm-3-custom control-label filter-year">Filter by Year</label>
            <div class="col-sm-4 filter-year">
                <select name="year" class="form-control" id="filteryear">
                </select>
            </div>
        </div>
        
    </div>
    {{-- <div class="col-md-12 form-group"> --}}
    </div></div></div></div></div>

    <div id="year_saving_summary"></div>

<!-- Footer -->
{{-- <div class="container">
    <hr>
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; UMW Cost Saving Initiative 2018</p>
            </div>
        </div>
    </footer>
</div> --}}

<script>

    // get year
    // var max_year;
    var currentTime = new Date();
    var year = currentTime.getFullYear();

    // do loop Year
    var i = 2020 - year;

    while (i>=0) {
        $('#filteryear').append($('<option>', {
            value: year + i,
            text: year + i
        }));
        i--;
    }
    
    //initial load
    getYear(2018);
    $(function() {
        $("#filteryear").on('change', function(){
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
                $("#year_saving_summary").html(data);
            }
        });
    }
</script>

@endsection