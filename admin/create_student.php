<!-- bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" >
<link rel="icon" type="image/x-icon" href="./img/logo.png">

<?php 
    include_once('partials/header.php');
    include_once('partials/left_bar.php');
 ?>

<!-- working on the sidebar -->
<div class="rightbar">
    <div class="top">
        <span>create new student</span>
        
        <hr>
        <div class="row breadcrumb-div">
            <div class="col-md-6">
                <ul class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-home"></i> <span style="padding: 0 3px;"></span> Home</a></li>
                    <span> / </span>
                    <li><a href="#">Student</a></li>
                    <span> / </span>
                    <li class="active">Create Student</li>
                </ul>
            </div>
            
        </div>
    </div>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-lg-12">
                <!-- form -->
                <form  action="" method="POST" enctype="multipart/form-data" style="width: 100%; margin: auto;">
                    <div class="mb-3">
                        <label for="Upload" class="form-label">Upload Student Photo</label>
                        <input type="file" class="form-control" id="Upload" name="image">
                    
                    </div>
                    <div class="mb-3">
                        <label for="student_name" class="form-label">Student Name</label>
                        <input type="text" class="form-control" id="student_name" name="student_name">
                    </div>
                    <div class="mb-3">
                        <label for="studentId" class="form-label">Student ID </label>
                        <input type="number" class="form-control" id="studentId" name="studentId">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Student Gender</label>
                        <br>
                        <input type="radio" id="male" value="male" name="gender" style="width: 10px; height: 10px;">
                        <label for="male">male</label>
                        <input type="radio" id="female" value="female" name="gender" style="width: 10px; height: 10px;">
                        <label for="female">female</label>
                    </div>
                    
                    <div class="mb-3">
                        <label for="age" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="age" name="age">
                    </div>
                    
                    <div class="mb-3">
                        <label for="student_name" class="form-label">Student Class</label>
                        <select name="class_id" id="" class="form-control">
                            <?php 
                                $sql = "select * from tbl_classes";
                                $res = mysqli_query($conn, $sql);

                                if($res == true){
                                    $count = mysqli_num_rows($res);
                                    if($count > 0){
                                        while($row = mysqli_fetch_assoc($res)){
                                            $id = $row['id'];
                                            $classes = $row['className'];
                                            $stream = $row['stream'];
                                            ?>
                                            <option value="<?php echo $id; ?>" style="text-transform: capitalize;"><?php echo "{$classes} {$stream}"?></option>
                                            <?php
                                        }
                                    }else{
                                        $classes = "select class";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <input type="hidden" name="sigles" value="<?php echo $classes; ?>"> 
                    <button type="submit" class="btn btn-primary" name="submit">Add Student</button>
                </form>
                <!-- form end -->
            </div>
        </div>
    </div>
</div>

<script src="../js/app.js"></script>

<?php

if(isset($_POST['submit'])){
    if(isset($_FILES['image']['name'])){
        //we need image name, source and destination
        $image = $_FILES['image']['name'];
        if($image !=''){
          $ext = explode('.', $image);
          $file_ext = end($ext);
    
          $image = 'student_image'.time().rand(000, 999). '.'.$file_ext;
          $image_src = $_FILES['image']['tmp_name'];
          $image_destination = "img/".$image;
    
          //upload image
          $upload = move_uploaded_file($image_src, $image_destination);
          if($upload == false){
            $_SESSION['failed'] = 'image failed to upload';
            exit;
          }
        }else{
          echo 'image not available';
        }
    
      }else{
        $image = 'hello';
      }

    // $image = $_POST['image'];
    $student_name = $_POST['student_name'];
    $studentId = $_POST['studentId'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $class_id = $_POST['class_id'];
    $sigles = $_POST['sigles'];
    //check whether id exits
    $sql2 = "select * from tbl_student where studentId = '$studentId'";
    //execute the querry
    $res2 = mysqli_query($conn, $sql2);
    //count rows in database
    $count = mysqli_num_rows($res2);
    //check if rows exceed one
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
                Command: toastr["error"]("student id already exists");
            </script>
            ';
    }else{
        //sql to insert data
        $sql = "
        Insert into tbl_student SET
            image = '$image',
            student_name = '$student_name',
            studentId = $studentId,
            gender = '$gender',
            age = '$age',
            class_id = '$class_id',
            sigles = '$sigles'
        ";

        //execute the querry
        $res = mysqli_query($conn, $sql);
        if($res){
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
                    Command: toastr["success"]("student created successfull!");
                </script>
                ';
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
                Command: toastr["red"]("Data failed");
            </script>
            ';
        }
    }
}
?>