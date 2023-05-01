<!-- bootstrap -->
<link rel="icon" type="image/x-icon" href="./img/logo.png">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" >
<?php 
    include_once('partials/header.php');
    include_once('partials/left_bar.php');
 ?>


<!-- working on the sidebar -->
<div class="rightbar">
    <div class="top">
        <span>create class student</span>
        
        <hr>
        <div class="row breadcrumb-div">
            <div class="col-md-6">
                <ul class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-home"></i> <span style="padding: 0 3px;"></span> Home</a></li>
                    <span> / </span>
                    <li><a href="#">Classes</a></li>
                    <span> / </span>
                    <li class="active">Create Class</li>
                </ul>
            </div>
            
        </div>
    </div>
    <!-- form --><br><br>
    <form action="" method="POST">
        <h4>create student class</h4>
        <div class="mb-3">
            <label for="className" class="form-label">Class Name</label>
            <input type="text" class="form-control" id="className" name="className" required>
            <div id="hint" class="form-text hint"><i>Eg- Third, Fourth, One</i> </div>
       
        </div>
        <div class="mb-3">
            <label for="classNameNumeric" class="form-label">Class Name in Numeric</label>
            <input type="number" class="form-control" id="classNameNumeric" name="classNameNumeric" required>
            <div id="hint" class="form-text hint"><i>Eg- 1, 2, 3</i> </div>
        </div>
        
        <div class="mb-3">
            <label for="stream" class="form-label">Stream</label>
            <input type="text" class="form-control" id="stream" name="stream" required>
            <div id="hint" class="form-text hint"><i>Eg- Briliant, Active</i> </div>
        </div>
        
        <button type="submit" class="btn btn-success" name="submit">Add Class </button>
    </form>
</div>
<?php 
    $error = [];
    if(isset($_POST['submit'])){
        $className = $_POST['className'];
        $classNameNumeric = $_POST['classNameNumeric'];
        $stream = $_POST['stream'];
        $select = "select * from tbl_classes where className = '$className' && stream='$stream'";
        $execute = mysqli_query($conn, $select);
        $count = mysqli_num_rows($execute);
        if($count > 0){
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
                Command: toastr["error"]("class already exists");
            </script>
            ';
        }else{
            if(!is_numeric($className) && !is_numeric($stream)){
                $sql = "
                    Insert into tbl_classes SET
                    className = '$className',
                    classNameNumeric = '$classNameNumeric',
                    stream = '$stream'
                    ";
                    //execute the querry
                    $res = mysqli_query($conn, $sql);
                    if($res == true){
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
                                Command: toastr["success"]("Data inserted successfull!");
                            </script>
                            ';
                    }else{
                        
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
                    Command: toastr["error"]("class name and stream can not be a number");
                </script>
                ';
                return false;
            }
        }

    }

?>

<script src="../js/app.js"></script>