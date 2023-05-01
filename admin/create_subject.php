<!-- bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" >
<link rel="icon" type="image/x-icon" href="./img/logo.png">
<?php 
    include_once('partials/header.php');
    include_once('partials/left_bar.php');

    if(isset($_POST['submit'])){
        $subjectName = $_POST['subjectName'];
        $subjectCode = $_POST['subjectCode'];
        $initials = $_POST['initials'];
        //subject inserted only once
        $select = "select * from tbl_subject where subjectName = '$subjectName' OR subjectCode='$subjectCode' ";
        //execute the querry
        $execute = mysqli_query($conn, $select);

        $count = mysqli_num_rows($execute);
        if($count > 0){
            echo '
            <script type="text/javascript">
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"}
                Command: toastr["error"]("subject already exists!");
            </script>
            ';
        }else{

            if(!empty($subjectName)  && !is_numeric($subjectName) ){
                $sql = "Insert into tbl_subject SET
                    subjectName = '$subjectName',
                    subjectCode = '$subjectCode',
                    initials = '$initials'
                    ";
                $res = mysqli_query($conn, $sql);
                //  die();
                if($res == true){
                    // $_SESSION['subject'] = 'subject entered successfully';
                    echo '
                    <script type="text/javascript">
                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"}
                        Command: toastr["success"]("subject inserted successfull!");
                    </script>
                    ';
                }
            }else{
                echo '
                <script type="text/javascript">
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"}
                    Command: toastr["error"]("subject name can not be empty and can\'t be a number");
                </script>
                ';
            }
        }
    }
 ?>


<div class="rightbar">
    <div class="top">
        <span>create subject</span>
        
        <hr>
        <div class="row breadcrumb-div">
            <div class="col-md-6">
                <ul class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-home"></i> <span style="padding: 0 3px;"></span> Home</a></li>
                    <span> / </span>
                    <li><a href="#">subject</a></li>
                    <span> / </span>
                    <li class="active">create subject</li>
                </ul>
            </div>
            
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">

        
            <form action="" method="POST">
                <h4>create subject</h4>
                <div class="mb-3">
                    <label for="subject" class="form-label">Subject Name</label>
                    <input type="text" class="form-control" id="subject" name="subjectName" placeholder="Enter subject" required>
                    <!-- <div id="hint" class="form-text hint"><i>Eg- Third, Fourth, One</i> </div> -->
            
                </div>
                <div class="mb-3">
                    <label for="subjectCode" class="form-label">Subject Code</label>
                    <input type="number" placeholder="Enter subject code" class="form-control" id="subjectCode" name="subjectCode" required>
                    <!-- <div id="hint" class="form-text hint"><i>Eg- 1543, 2342</i> </div> -->
                </div>
                <div class="mb-3">
                    <label for="initials" class="form-label">Subject Initials</label>
                    <input type="text" placeholder="like N.S, K.J.K" class="form-control" id="initials" name="initials" required>
                    <!-- <div id="hint" class="form-text hint"><i>Eg- 1543, 2342</i> </div> -->
                </div>
                
                
                <button type="submit" class="btn btn-success" name="submit">Add Class </button>
            </form>
            </div>
        </div>
    </div>
</div>

<script src="../js/app.js"></script>


<?php


?>
