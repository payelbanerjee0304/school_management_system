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

    <section class="content">
        <div class="container-fluid">

            <!-- /.content-wrapper -->

            <form action="<?php echo base_url('MainController/editstaff/' . $users['id']); ?>" method="post">


                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Enter Staff Name</label>
                        <input type="text" name="name" id="name" placeholder="Enter Staff Name" class="form-control" value="<?php echo set_value('name', $users['name']); ?>">
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Enter Email</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email" value="<?php echo set_value('email', $users['email']); ?>">
                    </div>
                </div>

                <div class="modal-body">
                            <div class="form-group">
                                <label for="">Enter Address</label>
                                <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address" value="<?php echo set_value('address', $users['address']); ?>">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Date of Birth</label>
                                <input type="date" class="form-control" name="dob" id="dob" placeholder="Enter Date of Birth" value="<?php echo set_value('dob', $users['dob']); ?>">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Enter Phone No.</label>
                                <input type="number" class="form-control" name="phone" id="phone" placeholder="Enter Phone No." value="<?php echo set_value('phone', $users['phone']); ?>">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Enter Date of Joining</label>
                                <input type="date" class="form-control" name="doj" id="doj" placeholder="Enter Date of Joining" value="<?php echo set_value('doj', $users['doj']); ?>">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Profile Picture</label>
                                <input type="file"  name="userfile" id="userfile" class="form-control"><img class="post-thumb" src="<?php echo base_url(); ?>assets/staffimages/<?php echo $users['image']; ?>" height="100px" alt="Uploaded Image">
                            </div>
                        </div>
                <div class="modal-footer">
                    <input type="submit" name="submit" id="" value="Update" class="btn btn-lg btn-warning">
                </div>
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
