@extends('admin.admin_master')

@section('title')
{{ 'Blog Create' }}
@endsection

@section('main-content')
<section class="content">
    <div class="container-fluid pt-3">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Blog Create
                        <a href="{{ route('admin.blog.index') }}" class="btn btn-primary" style="float: right;">Back</a>
                    </h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="">Select Category <span class="text-danger">*</span> </label>
                            <select name="category_id" class="form-control" required>
                                <option value="" selected disabled>Select</option>
                                @foreach ($categories as $category)
                                  <option value="{{ $category->id }}">{{ $category->name_en }}||{{ $category->name_bn }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Title English <span class="text-danger">*</span> </label>
                            <input type="text" name="title_en" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="">Title Bangla <span class="text-danger">*</span> </label>
                            <input type="text" name="title_bn" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="">Description English <span class="text-danger">*</span> </label>
                            <textarea name="desc_en" id="desc_en" class="form-control" required rows="5"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Description Bangla <span class="text-danger">*</span> </label>
                            <textarea name="desc_bn" id="desc_bn"  class="form-control" required rows="5"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Image<span class="text-danger">*</span> </label>
                            <input type="file" name="image" class="form-control" required onchange="postImgUrl(this)">

                            <img src="" id="postImage" style="margin-top: 5px;">
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
  <script src="{{ asset('ckeditor5/ckeditor.js') }}"></script>
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

    <script>
         ClassicEditor
            .create(document.querySelector('#desc_en'), {
                ckfinder: {
                    uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
                }
            })

            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });


            ClassicEditor
            .create(document.querySelector('#desc_bn'), {
                ckfinder: {
                    uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
                }
            })

            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

    </script>
@endsection
