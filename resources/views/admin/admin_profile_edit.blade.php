@extends('admin.admin_master')

@section('admin_content')


<div class="container-full">
    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Update Profile</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Email<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="email" name="email" class="form-control"
                                                        value="{{ $editAdminData->email }}">
                                                    @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Name<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="name" class="form-control"
                                                        value="{{ $editAdminData->name }}">
                                                    @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Profile </h5>
                                                <div class="controls">
                                                    <input type="file" name="profile_photo_path" id="profile_photo_path"
                                                        class="form-control">
                                                    @error('profile_photo_path')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <img id="profile_photo_preview" style="width: 100px;height: 100px;"
                                                src="{{ !empty($editAdminData->profile_photo_path) ? url('upload/admin_image/' . $editAdminData->profile_photo_path) : url('backend/upload/no_image.jpg') }}"
                                                alt="Admin Profile">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="text-xs-right">
                                <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                                <input type="submit" class="btn btn-primary" value="Update" name="submit">
                            </div>
                        </form>

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#profile_photo_path').change(function(e) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#profile_photo_preview').attr('src', e.target.result)
        }
        reader.readAsDataURL(e.target.files['0']);
    });
});
</script>
@endsection