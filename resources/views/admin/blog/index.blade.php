@extends('admin.admin_master')

@section('title')
{{ 'Blog List' }}
@endsection

@section('main-content')
<section class="content">
    <div class="container-fluid pt-3">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>All Blog
                        <a href="{{ route('admin.blog.create') }}" class="btn btn-primary btn-sm" style="float: right;"><i class="las la-plus-square"></i>Create Blog</a>
                    </h4>
                </div>

                <div class="card-body">
                    <table class="table" id="example">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Is Popular</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($blogs as $key=>$row)
                               <tr>
                                 <td>{{ $key+1 }}</td>
                                 <td>{{ $row->category->name_en }}</td>
                                 <td>{{ $row->title_en }}</td>
                                 <td>{{ $row->slug }}</td>
                                 <td>{{ Str::limit($row->desc_en,50)}}</td>
                                 <td>
                                    <img src="{{ asset($row->image) }}" alt="" height="50" width="50">
                                 </td>
                                 <td>
                                    @if ($row->status==1)
                                      <span class="badge badge-primary">Published</span>
                                    @else
                                    <span class="badge badge-danger">Not Published</span>
                                    @endif
                                 </td>

                                 <td>
                                    @if ($row->is_popular==1)
                                      <span class="badge badge-primary">Yes</span>
                                    @else
                                    <span class="badge badge-danger">No</span>
                                    @endif
                                 </td>
                                 <td>
                                    <a href="{{ route('admin.blog.edit',$row->id) }}" class="btn btn-primary btn-sm" title="edit"><i class="las la-pencil-alt"></i></a>
                                    <a href="{{ route('admin.blog.delete',$row->id) }}" class="btn btn-danger btn-sm" title="delete" onclick="confirmation(event)"><i class="las la-trash"></i></a>
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
