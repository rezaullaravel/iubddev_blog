@extends('admin.admin_master')

@section('title')
{{ 'Blog Update' }}
@endsection

@section('main-content')
<section class="content">
    <div class="container-fluid pt-3">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Blog Update
                        <a href="{{ route('admin.blog.index') }}" class="btn btn-primary" style="float: right;">Back</a>
                    </h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.blog.update',$blog->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="">Select Category <span class="text-danger">*</span> </label>
                            <select name="category_id" class="form-control" required>
                                <option value="" selected disabled>Select</option>
                                @foreach ($categories as $category)
                                  <option value="{{ $category->id }}" {{ $category->id == $blog->category_id ? 'selected':'' }}>{{ $category->name_en }}||{{ $category->name_bn }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Title English <span class="text-danger">*</span> </label>
                            <input type="text" name="title_en" value="{{ $blog->title_en }}" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="">Title Bangla <span class="text-danger">*</span> </label>
                            <input type="text" name="title_bn" value="{{ $blog->title_bn }}"  class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="">Slug <span class="text-danger">*</span> </label>
                            <input type="text" name="slug" value="{{ $blog->slug }}" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="">Description English <span class="text-danger">*</span> </label>
                            <textarea name="desc_en" class="form-control" required rows="5">
                                {{ $blog->desc_en }}
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Description Bangla <span class="text-danger">*</span> </label>
                            <textarea name="desc_bn" class="form-control" required rows="5">
                                {{ $blog->desc_bn }}
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Image<span class="text-danger">*</span> </label>
                            <input type="file" name="image" class="form-control"  onchange="postImgUrl(this)">

                            <img src="{{ $blog->image ? asset($blog->image) : '' }}" id="postImage" style="margin-top: 5px;">
                        </div>

                        <div class="form-group">
                            <label for="">Status <span class="text-danger">*</span> </label>
                            <select name="status" class="form-control" required>
                                <option value="1" {{ $blog->status=='1' ? 'selected':'' }}>Published</option>
                                <option value="0" {{ $blog->status=='0' ? 'selected':'' }}>Not Published</option>
                            </select>
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

    {{-- javascript for post   image --}}
    <script type="text/javascript">
        function postImgUrl(input){
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e){
            $('#postImage').attr('src',e.target.result).width(300).height(200);
            };
            reader.readAsDataURL(input.files[0]);
        }
        }
    </script>
    {{-- javascript for post image end --}}
@endsection
