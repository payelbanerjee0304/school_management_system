<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    <section class="content" style="background:url(./uploads/sunflower.jpg)no-repeat">
        <div class="container-fluid">

            <!-- /.content-wrapper -->
<?php echo form_open_multipart('MainController/do_upload');?>

                        <div class="modal-body">
                            <div class="form-group">
                                <label for=""><font >Enter Staff Name</font></label>
                                <input type="text" name="name" id="name" placeholder="Enter Student Name" class="form-control">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for=""><font >Enter Email</font></label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email id">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for=""><font >Enter Address</font></label>
                                <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for=""><font >Date of Birth</font></label>
                                <input type="date" class="form-control" name="dob" id="dob" placeholder="Enter Date of Birth">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for=""><font >Enter Phone No.</font></label>
                                <input type="number" class="form-control" name="phone" id="phone" placeholder="Enter Phone No.">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for=""><font >Enter Date of Joining</font></label>
                                <input type="date" class="form-control" name="doj" id="doj" placeholder="Enter Date of Joining">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for=""><font>Profile Picture</font></label>
                                <input type="file"  name="userfile" id="userfile" size="20">
                            </div>
                        </div>

<br /><br />

<input type="submit" value="upload" class="btn btn-lg btn-warning" />
</div>
</section>
</form>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>
</html>

