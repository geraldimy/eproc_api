@extends('layouts.master')

@section('title')
    <title>Produk Bulog</title>
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manajemen Promo</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Promo</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Promo</h3>
                <div class="text-right">
                    <a href="{{ route('promo.create') }}" 
                       class="btn btn-primary btn-sm">
                    <i class="fa fa-edit"></i> Tambah
                  </a>
                    </div>
            </div>
           

              <!-- /.card-header -->
             
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr><center>
                        <th><center>No</center></th>
                        <th><center>Image</center></th>
                        <th><center>Title</center></th>
                        <th><center>Start Date</center></th>
                        <th><center>End Date</center></th>
                        <th><center>Action</center></th>
                        
                      </center>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no = 0;?>
                    @foreach($promotion as $promo)
                    <?php $no++ ;?>
                    <tr>
                      <td><center>{{ $no }}</center></td>
                      <td><center>
                        @if (!empty($promo->image))
                          <img src="{{ asset('uploads/promo/' . $promo->image) }}" 
                              alt="{{ $promo->promo_title }}" width="50px" height="50px">
                        @else
                          <img src="http://via.placeholder.com/50x50" alt="{{ $promo->promo_title }}">
                        @endif
                  </center></td>
                      <td><center>{{ $promo->promo_title }}</center></td>
                      <td><center>{{ $promo->promo_start_date }}</center></td>
                      <td><center>{{ $promo->promo_end_date }}</center></td>
                      <td>
                        <center>
                            <form action="{{ route('promo.destroy', $promo->id) }}" method="POST">
                              @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                  <a href="{{ route('promo.edit', $promo->id) }}" 
                                      class="btn btn-warning btn-sm">
                                      <i class="fa fa-edit"></i>
                                  </a>
                                <button class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </button>
                              </form>
                        </center>
                      </td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
@endsection
