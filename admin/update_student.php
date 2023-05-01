<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    .error{
        color: red;
    }
</style>
<?php
    include_once('partials/header.php');
?>
<!-- getting data from database -->
<?php 
if(isset($_GET['student_id'])){
    $id = $_GET['student_id'];

    //sql to fetch data
    $sql = "select * from tbl_student where student_id= $id";
    //execute the querry
    $res = mysqli_query($conn, $sql);
    //count rows
    $count = mysqli_num_rows($res);
    //fetch rows
    $rows = mysqli_fetch_assoc($res);
    $current_image = $rows['image'];
    $student_name = $rows['student_name'];
    $studentId = $rows['studentId'];
    $gender = $rows['gender'];
    $age = $rows['age'];
}else{
    header('Location: manage_student.php');
}
 ?>
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-lg-12">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label">current image</label>
                <br>
                <!-- display current image -->
                <?php
                    if($current_image !=''){
                        ?>
                            <img src="<?php echo SITEURL; ?>img/<?php echo $current_image; ?>" alt="" style="width: 100px;">
                        <?php
                    }else{
                        echo "<p class='error'>image not found</p>";
                    }
                ?>
              
                
            </div>
            <div class="mb-3">
                <label for="new_image" class="form-label">Upload new image</label>
                <input type="file" class="form-control" id="new_image" name="image">
            </div>

            <div class="mb-3">
                <label for="student" class="form-label">Student Name:</label>
                <input type="text" placeholder="enter student name" name="student_name" class="form-control" id="student" value="<?php echo $student_name; ?>">
            </div>
            
            <div class="mb-3">
                <label for="student_id" class="form-label">Student ID:</label>
                <input type="text" placeholder="enter student id" name="studentId" class="form-control" id="student_id" value="<?php echo $studentId; ?>">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Student Gender:</label>
                <input <?php if($gender == 'male'){echo 'checked';} ?> type="radio" name="gender" value="male" id="Male"><label for="Male">Male</label>
                <input <?php if($gender == 'female'){echo 'checked';} ?> type="radio" name="gender" value="female" id="Female"><label for="Female">Female</label>
            </div>

            <div class="mb-3">
                <label for="DOB" class="form-label">Student DOB:</label>
                <input type="date" placeholder="enter student DOB" name="age" class="form-control" id="DOB" value="<?php echo $age; ?>">
            </div>

            <input type="hidden" name="current_image" id="" value="<?php echo $current_image; ?>">
            <input type="hidden" name="student_id" value="<?php echo $id; ?>">
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
        </div>

        <!-- updating the form -->
        <?php
            if(isset($_POST['submit'])){
                $id = $_POST['student_id'];
                $image = $_POST['current_image'];
                $student_name = $_POST['student_name'];
                $studentId = $_POST['studentId'];
                $gender = $_POST['gender'];
                $age = $_POST['age'];

                //image update
                if(isset($_FILES['image']['name'])){
                    //name the image
                    $image_name = $_FILES['image']['name'];
                    //check if image is selected
                    if($image_name !=""){

                        $name = explode('.', $image_name);
                        $ext = end($name);

                        $image_name = "student_image". rand(000,999). '.'.$ext;
                        //image source
                        $source = $_FILES['image']['tmp_name'];
                        //image destination
                        $destination = "img/".$image_name;
                        //upload the image
                        $upload = move_uploaded_file($source, $destination);

                        if($upload == false){
                            $_SESSION['failedimg'] = "image failed to upload";
                            header('Location: manage_student.php');
                            die();
                        }
                        if($image !=''){
                            $path = "img/".$image;
                            $remove = unlink($path);
    
                            if($remove == false){
                                $_SESSION['imagenotfound'] = 'image not found';
                                // header('Location: manage_student.php');
                                die();
                            }
                       }

                    }else{
                        $image_name = $image;
                    }
                    //remove image from the folder
                   


                }else{
                    $image_name = $image;
                }

                $sql1 = "Update tbl_student SET
                image = '$image_name',
                student_name = '$student_name',
                studentId = $studentId,
                gender = '$gender',
                age = '$age'
                Where student_id = '$id'
                ";

                //execute the querry
                $res1 = mysqli_query($conn, $sql1);

                if($res1){
                    $_SESSION['studentUpdate'] = "student updated successfully";
                    header('Location: manage_student.php');
                }else{
                    $_SESSION['failedstdnt'] = "failed to updare student";
                    header('Location: manage_student.php');
                }
            }
        ?>
    </div>
</div>