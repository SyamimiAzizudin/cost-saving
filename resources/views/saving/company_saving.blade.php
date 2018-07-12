@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Saving - {{ $company->name }} </h3>
        
        <ol class="breadcrumb col-md-7 pull-left">
            <li><a href="{{ url('/dashboard') }}">Main Dashboard</a></li>
            @if(Auth::user()->role != 'subsidiary')
            <li>
            <a href="{{ url('/saving-company') }}">Saving - Company List</a>
            </li>
            @endif  
            <li class="active">Saving - {{ $company->name }}</li>
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
        <div class="text-center">
            <div id="SavingTable"></div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="text-center">
        <button type="submit" class="btn btn-primary btn-lg" id="lock_initiative"> Submit</button>
    </div>
</div>

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Value</h4>
            </div>
            <form action="" id="savingForm">
            <div class="modal-body">
                <label for="" class="col-sm-4 control-label">Actual Saving (RM)</label>
                <input type="text" id="value" name="value" value="">
                <input type="hidden" value="" id="month" name="month">
                <input type="hidden" value="" id="section" name="section">
                <input type="hidden" value="" id="id" name="id">
                <input type="hidden" value="" id="initiative_id" name="initiative_id">
                {{ csrf_field() }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="saveSaving">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    // requires jquery library
    jQuery(document).ready(function() {
       jQuery(".main-table").clone(true).appendTo('#table-scroll').addClass('clone');

        getTable();

     });

    $('#savingForm').on('submit', function(e){
        e.preventDefault();
        var formURL = $(this).attr("action");

        $.ajax({
            url: formURL, //this is the submit URL
            type: 'POST', //or POST
            data: $('#savingForm').serialize(),
            success: function(data){
                //alert('successfully submitted')
                $("#myModal").modal('hide');
                getTable(2018);
            }
        });

    });

    // filter saving by year
    getTable(2018);
    $(function() {
        $("#filteryear").on('change', function(){
            var selected_value = $(this).find(":selected").val();
        });
    });

    function getTable() {
        console.log('get table');
        $.ajax({
            url: '/saving-company-table/{{$company_id}}', //this is the submit URL
            type: 'get', //or POST
            success: function(data){
                // console.log(year);
                // console.log(data);
                $("#SavingTable").html(data);
                $(".modal-body #value").val('');
                $('.openModal').on('click', openModal);
            }
        });
    }

    var openModal = function(){


        var my_id_value = $(this).data('id');
        var value = $(this).data('value');
        var month = $(this).data('month');
        var section = $(this).data('section');
        var initiative_id = $(this).data('initiative_id');

        //console.log(my_id_value)
        $(".modal-body #value").val(value);
        $(".modal-body #id").val(my_id_value);
        $(".modal-body #month").val(month);
        $(".modal-body #section").val(section);
        $(".modal-body #initiative_id").val(initiative_id);
        $('#myModal').modal('toggle');
    }


    $("#lock_initiative").click(function(){
        $.ajax({
            url: '/lock_initiative/{{$company_id}}', //this is the submit URL
            type: 'post', //or POST
            data: {
                "_token": "{{ csrf_token() }}",
            },
            success: function(data){
                alert("Succesfully lock!");
                location.reload();
            }
        });

    });

</script>
@endsection