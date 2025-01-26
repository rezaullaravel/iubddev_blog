@extends('admin.admin_master')

@section('title')
{{ 'Category Create' }}
@endsection

@section('main-content')
<section class="content">
    <div class="container-fluid pt-3">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Category Create
                        <a href="{{ route('admin.category.index') }}" class="btn btn-primary" style="float: right;">Back</a>
                    </h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.category.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Category English <span class="text-danger">*</span> </label>
                            <input type="text" name="name_en" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="">Category Bangla <span class="text-danger">*</span> </label>
                            <input type="text" name="name_bn" class="form-control" required>
                        </div>

                        <div class="form-group text-right">
                            <input type="submit" value="Submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection
