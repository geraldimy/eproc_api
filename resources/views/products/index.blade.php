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
            <h1>Manajemen Produk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Produk</li>
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
                <h3 class="card-title">Produk</h3>
                <div class="text-right">
                    <a href="{{ route('product.create') }}" 
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
                        <th><center>Gambar</center></th>
                        <th><center>Nama Produk</center></th>
                        <th><center>kategori</center></th>
                        <th><center>Unit</center></th>
                        <th><center>Harga</center></th>
                        <th><center>Action</center></th>
                        
                      </center>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no = 0;?>
                    @foreach($product as $product)
                    <?php $no++ ;?>
                    <tr>
                      <td><center>{{ $no }}</center></td>
                      <td><center>
                        @if (!empty($product->image))
                          <img src="{{ asset('uploads/product/' . $product->image) }}" 
                              alt="{{ $product->product_name }}" width="50px" height="50px">
                        @else
                          <img src="http://via.placeholder.com/50x50" alt="{{ $product->product_name }}">
                        @endif
                  </center></td>
                      <td><center>{{ $product->product_name }}</center></td>
                      <td><center>{{ $product->kategori->category_name }}</center></td>
                      <td><center>{{ $product->unit }}</center></td>
                      <td><center>Rp {{number_format($product->price) }}</center></td>
                      
                      
                      <td>
                        <center>
                            <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                              @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                  <a href="{{ route('product.edit', $product->id) }}" 
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
