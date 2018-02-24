@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Saving - {{ $company->name }} </h3>
        <ol class="breadcrumb">
            <li><a href="{{ url('/home') }}">Home</a>
            <li><a href="{{ url('/saving-company') }}">Saving - Company List</a></li>
            <li class="active">Saving - {{ $company->name }}</li>
        </ol>
        </div></div></div></div></div>
        <div class="text-center">
            <div id="SavingTable"></div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="text-center">
        <a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Save</button>
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

       // $(".editable").click(function(){
       //  //console.log(this)
       //  console.log('123')
       //    var dom = "<input type='text' />";
       //    console.log($(this))
       //    $(this).html(dom);
       // });

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

                getTable();
            }
        });

    });

    function getTable(){
        console.log('get table');
        $.ajax({
            url: '/saving-company-table/{{$company_id}}', //this is the submit URL
            type: 'get', //or POST
            success: function(data){
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

</script>
@endsection