@extends('admin.admin_master')

@section('title')
{{ 'Category Update' }}
@endsection

@section('main-content')
<section class="content">
    <div class="container-fluid pt-3">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Category Update
                        <a href="{{ route('admin.category.index') }}" class="btn btn-primary" style="float: right;">Back</a>
                    </h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.category.update') }}" method="POST">
                        @csrf

                        <input type="hidden" name="id" value="{{ $category->id }}">
                        <div class="form-group">
                            <label for="">Category English <span class="text-danger">*</span> </label>
                            <input type="text" name="name_en" value="{{ $category->name_en }}" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="">Category Bangla <span class="text-danger">*</span> </label>
                            <input type="text" name="name_bn" value="{{ $category->name_bn }}" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="">Slug <span class="text-danger">*</span> </label>
                            <input type="text" name="slug" value="{{ $category->slug }}" class="form-control" required>
                        </div>

                        <div class="form-group text-right">
                            <input type="submit" value="Update" class="btn btn-primary">
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
