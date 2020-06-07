@extends('layouts.master')
​
@section('title')
    <title>Tambah Data Produk</title>

@endsection
​
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Tambah Data</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="">Produk</a></li>
                            <li class="breadcrumb-item active">Tambah</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
​
        <section class="content">
            <div class="container-fluid">
                <div class="card card-default">

                <div class="card-body">
                <div class="row">
                    <div class="col-md-12" ng-app="myApp" ng-controller="myCtrl">


                            @if (session('error'))
                            @alert(['type' => 'danger'])
                                {!! session('error') !!}
                            @endalert
                            @endif
                            <form action="{{ route('promo.store')}}" method="POST" enctype="multipart/form-data" name="myForm">


                                {{csrf_field()}}

                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="promo_title" required
                                        class="form-control {{ $errors->has('promo_title') ? 'is-invalid':'' }}" ng-model="input_field" name="input_field" ng-pattern="/^[A-Za-z0-9]/">
                                    <p class="text-danger">{{ $errors->first('promo_title') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for=""> Description </label>
                                    <textarea name="promo_desc" id="description"
                                        cols="5" rows="5"
                                        class="form-control {{ $errors->has('promo_desc') ? 'is-invalid':'' }}" ng-model="description_field" name="description_field" ng-pattern="/^[A-Za-z0-9]/"></textarea>
                                    <p class="text-danger">{{ $errors->first('promo_desc') }}</p>
                                </div>
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text">
                                          <i class="far fa-calendar-alt"></i>
                                        </span>
                                      </div>
                                      <input type="text" name="date_start" class="form-control float-right" id="reservation">
                                    </div>
                                    <!-- /.input group -->
                                  </div>
                                  <div class="form-group">
                                    <label>End Date</label>
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text">
                                          <i class="far fa-calendar-alt"></i>
                                        </span>
                                      </div>
                                      <input type="text" name="date_end" class="form-control float-right" id="reservation2">
                                    </div>

                                  </div>
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <input type="file" name="photo" class="form-control">
                                    <p class="text-danger">{{ $errors->first('photo') }}</p>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm" ng-disabled="myForm.input_field.$error.pattern || !input_field || !description_field">
                                        <i class="fa fa-send"></i> Save
                                    </button>
                                </div>
                            </form>
                            </div>
                            <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>


  <script>
    var app = angular.module('myApp', []);
    app.controller('myCtrl', function($scope) {});
  </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </section>
    </div>
@endsection

@section('js')
    <script>
        $('#reservation').datepicker({
            autoclose: true,
            format: 'dd-mm-yyyy'
        });

        $('#reservation2').datepicker({
            autoclose: true,
            format: 'dd-mm-yyyy'
        });
    </script>
@endsection
