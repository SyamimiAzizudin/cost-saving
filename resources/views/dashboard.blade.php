@extends('layouts.app')

@section('content')

<!-- Dashboard All Section -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Main Dashboard</h1>

        <ol class="breadcrumb col-md-7 pull-left">
            @if(Auth::user()->role == 'admin')
            <li><a href="{{ url('/home') }}">Home</a></li>
            @endif
            <li class="active">Main Dashboard</li>
        </ol>

        {{-- filter by year --}}
        <div class="form-group col-md-5 pull-right filter-width">
            <label for="year" class="col-sm-3 col-sm-3-custom control-label filter-year">Filter by Year</label>
            <div class="col-sm-4 filter-year">
                <select name="year" class="form-control" id="filteryear">
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                </select>
            </div>
        </div>

    </div></div></div></div></div>

    <div id="year_saving_summary"></div>

<!-- Footer -->
<!-- <div class="container">
    <hr>
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; UMW Cost Saving Initiative 2018</p>
            </div>
        </div>
    </footer>
</div> -->

<script>
    
    // filter saving by year
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
            url: 'dashboard/'+year, //this is the submit URL
            type: 'GET', //or POST
            success: function(data){
                $("#year_saving_summary").html(data);
            }
        });
    }
</script>

@endsection