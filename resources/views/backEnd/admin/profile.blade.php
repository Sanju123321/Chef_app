@extends('backEnd.layouts.master')
@section('title',' Admin Profile')
@section('content')

<div class="page-content-wrapper ">
	<div class="page-content">
		<div class="tab-content11">
              <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PROFILE SIDEBAR -->
                <div class="row">
                    <div class="col-lg-4 col-lg-offset-0 col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-4 col-xs-4 col-xs-offset-2" >
                       <div class="profile-sidebar">
                            <!-- PORTLET MAIN -->
                            <div class="portlet light profile-sidebar-portlet">
                                <!-- SIDEBAR USERPIC -->
                                <?php 
                                    $path = '';
                                    if (!empty($admin->image)) {

                                        $path = base_path().'/'.AdminProfileBasePath.'/'.$admin->image;
                                        if (file_exists($path)) {
                                            $image = AdminProfileImgPath.'/'.$admin->image;
                                            
                                        }else{
                                            $image = DefaultImgPath;    
                                        }
                                    }else{
                                        $image = DefaultImgPath;
                                    }
                                ?>
                                <div class="profile-userpic">
                                    <img src="{{ $image }}" class="img-responsive img_style" id="old_image" alt="">
                                    <span class=""><h2><center>{{ ucfirst($admin->name) }}</center></h2></span>
                                </div>
                                <!-- END SIDEBAR USERPIC -->
                                <!-- SIDEBAR USER TITLE -->
                                <div class="profile-usertitle">
                                    <div class="profile-usertitle-name">
                                         
                                    </div>
                                    
                                </div>
                                <!-- END SIDEBAR BUTTONS -->
                            </div>
                            <!-- END PORTLET MAIN -->
                        </div> 
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                         <div class="profile-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="portlet light">
                                        <div class="portlet-title tabbable-line">
                                            <div class="caption caption-md">
                                                <i class="icon-globe theme-font hide"></i>
                                                <span class="caption-subject font-black-madison bold uppercase">Profile Account</span>
                                            </div>
                                            <ul class="nav nav-tabs">
                                                <li class="active">
                                                    <a href="#tab_1_1" data-toggle="tab">Personal Info</a>
                                                </li>
                                                
                                                <!-- <li>
                                                    <a href="#tab_1_2" data-toggle="tab">Contact</a>
                                                </li>
                                                <li>
                                                    <a href="#tab_1_3" data-toggle="tab">Shipping</a>
                                                </li> -->
                                                
                                                <li>
                                                    <a href="#tab_1_4" data-toggle="tab">Change Password</a>
                                                </li>
                                              <!--   <li>
                                                    <a href="#tab_1_4" data-toggle="tab">Privacy Settings</a>
                                                </li> -->
                                            </ul>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="tab-content">
                                                <!-- PERSONAL INFO TAB -->
                                                <div class="tab-pane active" id="tab_1_1">
                                                    <form role="form" method="post" action="{{ url('/admin/profile') }}" id="personal_form" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            <label class="control-label">Name</label>
                                                            <input placeholder="Name" name="name" class="form-control" type="text" value="{{ $admin->name }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Email</label>
                                                            <input placeholder="Email" name="email" class="form-control" type="text" value="{{ $admin->email }}">
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label class="control-label">Image</label>
                                                            <input name="image" type="file" id="img_upload">
                                                        </div>
                                                        <div class="margiv-top-10">
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <button class="btn green" type="submit">Submit</button>
                                                            <a href="{{ url('admin/dashboard') }}" class="btn btn-default m-l-10">
                                                            Cancel </a>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- END PERSONAL INFO TAB -->

                                                <!-- CHANGE PASSWORD TAB -->
                                                <div class="tab-pane" id="tab_1_4">
                                                    <form action="{{ url('admin/change-password') }}" method="post" id="change_password_form">
                                                        <div class="form-group">
                                                            <label class="control-label">Current Password</label>
                                                            <input class="form-control" name="current_password" type="password" placeholder="Current Password" value="" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">New Password</label>
                                                            <input class="form-control" name="new_password" id="new_password" type="password" placeholder="New Password" value="" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Re-type New Password</label>
                                                            <input class="form-control" name="confirm_password" type="password" placeholder="Confirm Password" value="">
                                                        </div>
                                                        <div class="margin-top-10">
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <button class="btn green" type="submit">Submit</button>
                                                            <a href="{{ url('admin/dashboard') }}" class="btn btn-default m-l-10">
                                                            Cancel </a>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- END CHANGE PASSWORD TAB -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        function readURL(input)
        {
            if(input.files && input.files[0])
            {
                var reader = new FileReader();
                reader.onload = function(e)
                {
                    $('#old_image').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#img_upload').change(function(){

            var img_name = $(this).val();

            if(img_name != '' && img_name != null)
            {
                var img_arr = img_name.split('.');

                var ext = img_arr.pop();
                ext = ext.toLowerCase();
                // alert(ext); return false;

                if(ext == 'jpeg' || ext == 'jpg' || ext == 'png')
                {
                    input = document.getElementById('img_upload');

                    readURL(this);
                }
            } else{

                $(this).val('');
                alert('Please select an image of .jpeg, .jpg, .png file format.');
            }

        });

    });
</script>

@endsection