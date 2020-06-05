@extends('layouts.master')
​
@section('title')
    <title>Edit Promo</title>
@endsection
​
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit Data</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="">Promo</a></li>
                            <li class="breadcrumb-item active">Edit</li>
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
                    <div class="col-md-12">
                          
                           
                        
                            <form action="{{ route('promo.update', $promo->id) }}" method="POST" enctype="multipart/form-data">
                               
                               
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="PUT">

                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="promo_title" required 
                                            value="{{$promo->promo_title}}"
                                        class="form-control {{ $errors->has('promo_title') ? 'is-invalid':'' }}">
                                    <p class="text-danger">{{ $errors->first('promo_title') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for=""> Description </label>
                                    <textarea name="promo_desc" id="description" 
                                        cols="5" rows="5" 
                                        class="form-control {{ $errors->has('promo_desc') ? 'is-invalid':'' }}">{{ $promo->promo_desc }}</textarea>
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
                                      <input type="text" value="{{$promo->promo_start_date }}" name="date_start" class="form-control float-right" id="reservation">
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
                                      <input type="text" name="date_end" value="{{$promo->promo_end_date }}" class="form-control float-right" id="reservation2">
                                    </div>
                                    
                                  </div>
                                  <div class="form-group">
                                    <label for="">Foto</label>
                                    <input type="file" name="photo" class="form-control">
                                    <p class="text-danger">{{ $errors->first('photo') }}</p>
                                    @if (!empty($promo->image))
                                        <hr>
                                        <img src="{{ asset('uploads/promo/' . $promo->image) }}" 
                                            alt="{{ $promo->promo_title }}"
                                            width="150px" height="150px">
                                    @endif
                                    </div>  
                                    
                                <div class="form-group">
                                    <button class="btn btn-info btn-sm">
                                        <i class="fa fa-refresh"></i> Update
                                    </button>
                                </div>

                            </form>

                            </div>
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