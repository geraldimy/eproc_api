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
                    <div class="col-md-12">
                          
                           
                            <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                               
                               
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="PUT">

                                <div class="form-group">
                                    <label for="">Kategori</label>
                                    <select name="category" id="category_id" 
                                        required class="form-control {{ $errors->has('category') ? 'is-invalid':'' }}">
                                        <option value="">Pilih</option>
                                        @foreach ($categories as $row)
                                            <option value="{{ $row->id }}" {{ $row->id == $product->category ? 'selected':'' }}>{{ ucfirst($row->category_name) }}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger">{{ $errors->first('category') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="">Nama Produk</label>
                                    <input type="text" name="product_name" required 
                                            value="{{$product->product_name}}"
                                        class="form-control {{ $errors->has('product_name') ? 'is-invalid':'' }}">
                                    <p class="text-danger">{{ $errors->first('product_name') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for=""> Deskripsi </label>
                                    <textarea name="short_desc" id="description" 
                                        cols="5" rows="5" 
                                        class="form-control {{ $errors->has('short_desc') ? 'is-invalid':'' }}">{{ $product->short_desc }}</textarea>
                                    <p class="text-danger">{{ $errors->first('short_desc') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for=""> Deskripsi 2 </label>
                                    <textarea name="long_desc" id="description" 
                                        cols="5" rows="5" 
                                        class="form-control {{ $errors->has('long_desc') ? 'is-invalid':'' }}">{{ $product->long_desc }}</textarea>
                                    <p class="text-danger">{{ $errors->first('long_desc') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Unit</label>
                                    <input type="number" name="unit" required value="{{ $product->unit }}" class="form-control" min="1" {{ $errors->has('unit') ? 'is-invalid' :'' }}">
                                    <p class="text-danger">{{ $errors->first('unit') }}</P>
                                </div>
                                <div class="form-group">
                                    <label for="">Harga</label>
                                    <input type="number" name="price" value="{{ $product->price }}" required min="0"
                                        class="form-control {{ $errors->has('price') ? 'is-invalid':'' }}">
                                    <p class="text-danger">{{ $errors->first('price') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Foto</label>
                                    <input type="file" name="photo" class="form-control">
                                    <p class="text-danger">{{ $errors->first('photo') }}</p>
                                    @if (!empty($product->image))
                                        <hr>
                                        <img src="{{ asset('uploads/product/' . $product->image) }}" 
                                            alt="{{ $product->product_name }}"
                                            width="150px" height="150px">
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Warna</label>
                  
                                    <div class="input-group my-colorpicker2">
                                      <input type="text" name="color" class="form-control" value="{{ $product->image }}">
                  
                                      <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-square"></i></span>
                                      </div>

                                    </div>

                                    <div class="form-group">
                                        <label for="">Status</label>
                                    <input type="text" name="status" required value="{{ $product->status }}" 
                                            class="form-control {{ $errors->has('status') ? 'is-invalid':'' }}">
                                        <p class="text-danger">{{ $errors->first('status') }}</p>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                  
                                <div class="form-group">
                                    <button class="btn btn-info btn-sm">
                                        <i class="fa fa-refresh"></i> Update
                                    </button>
                                </div>

                            </form>

                            <div class="card-footer">
                                Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
                                the plugin.
                            </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection