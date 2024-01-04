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

            <form action="<?php echo base_url('MainController/editstudent/' . $users['id']); ?>" method="post">


            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Enter Student Name</label>
                                <input type="text" name="name" id="name" placeholder="Enter Student Name" class="form-control" value="<?php echo set_value('name', $users['name']); ?>">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Enter Father Name</label>
                                <input type="text" name="fname" id="fname" placeholder="Enter Father Name" class="form-control" value="<?php echo set_value('fname', $users['fname']); ?>">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Enter Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email id" value="<?php echo set_value('email', $users['email']); ?>">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Enter Category Name</label>
                                <select class="form-control" name="catname" id="catname" placeholder="Enter Category Name">
                                    <option><?php echo set_value('catname', $users['category']); ?></option>
                                    <?php foreach ($category as $cat) { ?>
                                        <option><?php echo $cat['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Enter Class Name</label>
                                <select class="form-control" name="classname" id="classname" placeholder="Enter Class Name">
                                    <option><?php echo set_value('classname', $users['class']); ?></option>
                                    <?php foreach ($class as $c) { ?>
                                        <option><?php echo $c['classname'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Enter Date of Birth</label>
                                <input type="date" class="form-control" name="dob" id="dob" placeholder="Enter Date of Birth" value="<?php echo set_value('dob', $users['dob']); ?>">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Pending Fees</label>
                                <input type="number" class="form-control" name="pendingfees" id="pendingfees" placeholder="Pending Fees"  value="<?php echo set_value('pendingfees', $users['pendingfees']); ?>">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Enter Join Date</label>
                                <input type="date" class="form-control" name="joindate" id="joindate" placeholder="Enter Join Date"  value="<?php echo set_value('joindate', $users['joindate']); ?>">
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