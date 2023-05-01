<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" >
<link rel="icon" type="image/x-icon" href="./img/logo.png">
<!-- dtablesata -->
<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<?php 
    include_once('partials/header.php');
    include_once('partials/left_bar.php');
 ?>

<!-- working on the sidebar -->
<div class="rightbar">
    <div class="top">
        <span>manage results</span>
        <hr>
        <div class="row breadcrumb-div">
            <div class="col-md-6">
                <ul class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-home"></i> <span style="padding: 0 3px;"></span> Home</a></li>
                    <span> / </span>
                    <li><a href="#">Student</a></li>
                    <span> / </span>
                    <li class="active">manage results</li>
                </ul>
            </div>
            
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mt-3">
            <table id="example" class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Sn</th>
                        <!-- <th>Student Image</th> -->
                        <th>Student Name</th>
                        <th>Student ID</th>
                        <th>Student Class</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                    <tr>
                        <td>1</td>
                        <td>kato james</td>
                        <td>12</td>
                        <td>seven active</td>
                        <td>active</td>
                        <td>
                            <a href="" class="btn btn-danger btn-small">Delete</a>
                            <a href="" class="btn btn-primary btn-small">Edit</a>
                        </td>
                    </tr>
                <tbody>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>

<script src="../js/app.js"></script>

<!-- <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>