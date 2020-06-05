@extends('layouts.master')

@section('title')
    <title>Kategori Produk</title>
@endsection

@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manajemen Kategori</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Kategori</li>
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
                <h3 class="card-title">Kategori</h3>
                <div class="text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                        Tambah Kategori
                   </button>
                    </div>
            </div>
           

              <!-- /.card-header -->
             
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr><center>
                        <th><center>No</center></th>
                        <th><center>Kategori</center></th>
                        <th><center>Deskripsi</center></th>
                        <th><center>Action</center></th>
                      </center>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no = 0;?>
                    @foreach($categories as $cat)
                    <?php $no++ ;?>
                    <tr>
                      <td><center>{{ $no }}</center></td>
                      <td><center>{{ $cat->category_name}}</center></td>
                      <td>{{ $cat->description}}</td>
                      <td><center>
                        <button class="btn btn-info" data-mytitle="{{$cat->category_name}}" data-mydescription="{{$cat->description}}" data-catid={{$cat->id}} data-toggle="modal" data-target="#edit">Edit</button>
                        
                        <button class="btn btn-danger" data-catid={{$cat->id}} data-toggle="modal" data-target="#delete">Delete</button>
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

      <!-- /.content -->
    



    

      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Kategori</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{route('category.store')}}" method="post">
                    {{csrf_field()}}
                <div class="modal-body">

                  <div class="form-group">
                      <label for="title">Kategori</label>
                      <input type="text" class="form-control" name="category_name" id="title">
                  </div>
      
                  <div class="form-group">
                      <label for="des">Deskripsi</label>
                      <textarea name="description" id="des" cols="20" rows="5" id='des' class="form-control"></textarea>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->




<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit categorygory</h4>
      </div>
      <form action="{{route('category.update','test')}}" method="post">
        {{method_field('patch')}}
        {{csrf_field()}}
      <div class="modal-body">
          <input type="hidden" name="category_id" id="cat_id" value="cat_id">
           <div class="form-group">
            <label for="title">Kategori</label>
            <input type="text" class="form-control" name="category_name" id="title">
        </div>

        <div class="form-group">
            <label for="des">Deskripsi</label>
            <textarea name="description" id="des" cols="20" rows="5" id='des' class="form-control"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Changes</button>
      </div>
    </form>

    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
      </div>
      <form action="{{route('category.destroy','test')}}" method="post">
        {{method_field('delete')}}
      		{{csrf_field()}}
	      <div class="modal-body">
				<p class="text-center">
					Are you sure you want to delete this?
				</p>
	      		<input type="hidden" name="category_id" id="cat_id" value="cat_id">

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
	        <button type="submit" class="btn btn-warning">Yes, Delete</button>
	      </div>
      </form>
    </div>
  </div>
</div>
@endsection
  