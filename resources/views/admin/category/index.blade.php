@extends('admin.admin_master')

@section('title')
{{ 'Category List' }}
@endsection

@section('main-content')
<section class="content">
    <div class="container-fluid pt-3">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>All Category
                        <a href="{{ route('admin.category.create') }}" class="btn btn-primary btn-sm" style="float: right;"><i class="las la-plus-square"></i>Create Category</a>
                    </h4>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Category</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($categories as $key=>$row)
                               <tr>
                                 <td>{{ $key+1 }}</td>
                                 <td>{{ $row->name_en }}</td>
                                 <td>{{ $row->slug }}</td>
                                 <td>
                                    <a href="{{ route('admin.category.edit',$row->id) }}" class="btn btn-primary btn-sm" title="edit"><i class="las la-pencil-alt"></i></a>
                                    <a href="{{ route('admin.category.delete',$row->id) }}" class="btn btn-danger btn-sm" title="delete" onclick="confirmation(event)"><i class="las la-trash"></i></a>
                                 </td>
                               </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection
