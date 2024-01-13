<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper"  style="background-image:url('<?php echo base_url('assets/img/six.jpg'); ?>'); background-repeat:no-repeat; background-size: 100% 100%; ">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><font color="Red">Staff</font></h1>
                </div>
                <!-- </form> -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item">Dashboard v1</li>
                        <li class="breadcrumb-item">Manage Staff</li>
                        <li class="breadcrumb-item active">Staff Registration</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- Your main content goes here -->
                <h1></h1>
            </div>
            <div class="col-md-4">
                <!-- Search button on the right -->
                <span class="form-inline float-right">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" name="keyword" id="keyword" aria-label="Search">
                    <button class="btn btn-navbar alert-info" type="submit" id="searchButton">
                        <i class="fas fa-search"></i>
                    </button>
                </span>
            </div>
        </div>
    </div>
    <!-- Main content -->

    <section class="content">
        <div class="container-fluid">
            <div id="searchResults">
                <div id="showmessage1" class="alert alert-success alert-dismissible" style="display:none">Staff Added Successfully</div>
                <div class="btn btn-warning btn-outline-dark" data-toggle="modal" data-target="#createcar">
                    <a href="javascript:void(0);" onclick="showmodel();">Add New Staff</a>
                </div>
                <!-- Small boxes (Stat box) -->
                <div class="table-responsiv">

                    <table border="1" cellpadding="20" cellspacing="0" class="table table-striped" id="mytable">

                        <div class="text-center">
                        <h1><u>VIEW</u></h1>
                        </div>

                        <thead   style= "background-color: #D0E775">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Date of Birth</th>
                                <th>Phone</th>
                                <th>Date of Joining</th>
                                <th>Profile Picture</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <?php echo $this->pagination->create_links(); ?>
                        <tbody   style= "background-color: #86F0C9">
                            <?php if (!empty($staff)) {
                                foreach ($staff as $all) {
                            ?>
                                    <tr>
                                        <td><?php echo $all['id'] ?></td>
                                        <td><?php echo $all['name'] ?></td>
                                        <td><?php echo $all['email'] ?></td>
                                        <td><?php echo $all['address'] ?></td>
                                        <td><?php echo $all['dob'] ?></td>
                                        <td><?php echo $all['phone'] ?></td>
                                        <td><?php echo $all['doj'] ?></td>
                                        <td><img class="post-thumb" src="<?php echo base_url(); ?>assets/staffimages/<?php echo $all['image']; ?>" height="100px" alt="Uploaded Image"></td>
                                            <td><a href="<?php echo base_url('deletestaff/' . $all['id']) ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url('editstaff/' . $all['id']) ?>" class="btn btn-success"><i class="fa-regular fa-pen-to-square"></i></a>
                                        </td>
                                    </tr>
                            <?php }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Modal -->
        <div class="modal fade" id="createcar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="background-image:url('<?php echo base_url('assets/img/six.jpg'); ?>'); background-repeat:no-repeat; background-size: 100% 100%; ">
                <?php echo form_open_multipart('MainController/do_upload');?>
                        <div id="showmessage" class="alert alert-danger alert-dismissible" style="display:none">Please fill-up all fields</div>
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><font color="Red">Add Staff</font></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for=""><font color="yellow">Enter Staff Name</font></label>
                                <input type="text" name="name" id="name" placeholder="Enter Student Name" class="form-control">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for=""><font color="yellow">Enter Email</font></label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email id">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for=""><font color="yellow">Enter Address</font></label>
                                <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for=""><font color="yellow">Date of Birth</font></label>
                                <input type="date" class="form-control" name="dob" id="dob" placeholder="Enter Date of Birth">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for=""><font color="yellow">Enter Phone No.</font></label>
                                <input type="number" class="form-control" name="phone" id="phone" placeholder="Enter Phone No.">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for=""><font color="yellow">Enter Date of Joining</font></label>
                                <input type="date" class="form-control" name="doj" id="doj" placeholder="Enter Date of Joining">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for=""><font color="yellow">Profile Picture</font></label>
                                <input type="file"  name="userfile" id="userfile" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" value="Add" class="btn btn-lg btn-success">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        <?php echo form_close(); ?>
                    
                </div>
            </div>
        </div>



</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



<script>
    $(document).ready(function() {
        // Attach a click event to the search button
        $("#searchButton").on("click", function() {
            // Get the search keyword
            var keyword = $("#keyword").val();

            // Send an AJAX request to the server
            $.ajax({
                url: "<?= base_url('MainController/'); ?>",
                type: "post",
                data:new FormData(this),  
                contentType: false,  
                cache: false,  
                processData:false,  
                success: function(data) {
                    // alert(data);
                    // console.log(data);
                    // Display the search results in the container
                    $("#searchResults").html(data);

                }
            });
        });
    });
</script>


<script>
    function showmodel() {
        $('#createcar').model('show');
    }

</script>

</body>

</html>