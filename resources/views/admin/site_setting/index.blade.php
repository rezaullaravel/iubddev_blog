@extends('admin.admin_master')

@section('title')
{{ 'Site Setting' }}
@endsection

@section('main-content')
<section class="content">
    <div class="container-fluid pt-3">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Site Setting
                    </h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.site-setting.update',$setting->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Favicon <span class="text-danger">*</span> </label>
                                    <input type="file" name="favicon" class="form-control">
                                    <img src="{{ asset($setting->favicon) }}" alt="" width="80" height="80">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Site Email<span class="text-danger">*</span> </label>
                                    <input type="email" name="site_email" value="{{ $setting->site_email }}" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Site Phone<span class="text-danger">*</span> </label>
                                    <input type="text" name="site_phone" value="{{ $setting->site_phone }}" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Site Address<span class="text-danger">*</span> </label>
                                    <textarea name="site_address" class="form-control" rows="4">
                                      {{ $setting->site_address }}
                                    </textarea>
                                </div>
                            </div>
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
