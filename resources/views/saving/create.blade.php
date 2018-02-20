@extends('layouts.app')
@section('content')

<div class="row">
    <div clss="col-lg-12">
        <ol class="breadcrumb" style="background-color:#d6f5f5;">
            <li>You are here: <a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('saving') }}">Cost Saving</a></li>
            <li class="active">Add New Cost Saving</li>
        </ol>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading" style="background-color:#33cccc;">
        <h1>Add New Cost Saving</h1>
    </div>

    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
            {!! Form::open(array('route' => 'saving.store','method'=>'POST', 'files' => true)) !!}

            <div class="col-lg-11 col-centered">
                <div class="panel-heading">
                    <strong><h2>User Details</h2></strong>
                </div>

                <div class="col-lg-10 col-centered">
                    <div class="form-group">
                        <strong>Username</strong>
                        <td>{{auth()->user()->username}}</td>
                    </div>
                </div>

                <div class="col-lg-10 col-centered">
                     <div class="form-group">
                        <strong>Email:</strong>
                            <td>{{auth()->user()->email}}</td>
                    </div>
                </div>
            </div>

            <div class="col-lg-11 col-centered">
                <div class="panel-heading">
                    <strong><h2>Cost Saving Details</h2></strong>
                </div>

                <div class="col-lg-10 col-centered">
                    <div class="form-group">
                        <strong>Area:</strong>
                            {!! Form::text('tajuk', null, array('placeholder' => 'Tajuk Berita','class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="col-lg-10 col-centered">
                    <div class="form-group">
                        <strong>Analyze Factor:</strong>
                            {!! Form::textarea('huraian', null, array('placeholder' => 'Huraian Berita','class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="col-lg-10 col-centered">
                    <div class="form-group">
                        <strong>Kategori Hebahan:</strong>
                            <select class="form-control select2" name="kategori_berita[]" multiple>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                    </div>
                </div>

                <div class="col-lg-10 col-centered">
                    <div class="form-group">
                        <strong>Lokasi:</strong>
                            {!! Form::text('lokasi', null, array('placeholder' => 'Lokasi Berita','class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="col-lg-10 col-centered">
                    <div class="form-group">
                        <strong>Kumpulan Sasaran:</strong>
                            {{ Form::select('kumpulan_sasaran',
                                ['Pelajar Pra Siswazah' => 'Pelajar Pra Siswazah', 'Pelajar Pasca Siswazah' => 'Pelajar Pasca Siswazah', 'Staff UKM' => 'Staff UKM', 'Warga UKM' => 'Warga UKM', 'Warga Kolej Zaba' => 'Warga Kolej Zaba', 'Warga FTSM' => 'Warga FTSM', 'Warga KTSN' => 'Warga KTSN'], null, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="col-lg-10 col-centered">
                    <div class="form-group">
                        <strong>Gambar Berita:</strong><br>
                        <input type="file" name="gambar" id="fileUpload" class="hide">
                        <label for="fileUpload" style="width: 500px">
                            <img class="image-placeholder" src="{{ asset('img/image-placeholder.jpg') }}" width="100%"/>
                        </label>
                    </div>
                </div>
            </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                        <div class="form-group">
                            <a href="{{ action('BeritasController@index') }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove-sign"></span> Batal</a>
                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Cipta</button>
                        </div>
                </div>

          {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@endsection
