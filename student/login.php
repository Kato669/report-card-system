<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" >
<link rel="icon" type="image/x-icon" href="../admin/img/logo.png">
<?php include_once("../admin/partials/constants.php") ?>

<link rel="stylesheet" href="login.css">
<style>
    .error{
        color: red;
        padding: 0;
        text-transform: capitalize;
        display: none;
        transition: 1s; 
    }
    .error.active{
        display: block;
    }
</style>
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-12">
        <form action="" method="POST"> 
            <div class="mb-3">
                <span for="" id="error" class="form-label error">student not found</span>
            </div>
            <div class="mb-3">
                <label for="studentId" class="form-label">student Id:</label>
                <input type="number" class="form-control" id="studentId" name="studentId" placeholder="Enter student Id" autocomplete = "off">
            </div>
            <div class="mb-3">
                <label for="">Class and Stream</label>
                    <select class="form-select" name="class">
                        <option selected>select class and stream</option>
                        <?php
                            $sql = "select * from tbl_classes";
                            //execute the query
                            $res = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($res);
                            if($count > 0){
                                while($row = mysqli_fetch_assoc($res)){
                                    $id = $row ['id'];
                                    $class = $row['className'];
                                    $stream = $row['stream'];
                                    ?>

                                        <option value="<?php echo $id; ?>"><?php echo "{$class} {$stream}"; ?></option>
                                    <?php
                                }
                            }
                        ?>
                        
                        
                    </select>
            </div>
            <input type="hidden" name="id" value="<?php echo $id?>">
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
    </div>
</div>

<?php
    
if(isset($_POST['submit'])){
        $ids = $_POST['id'];
        $student_id = $_POST['studentId'];
        $class = $_POST['class'];

        // echo "student id is $student_id and class id is $class";
        // exit;
        $sql1 = "select tbl_classes.id, studentId from tbl_classes, tbl_student where id = tbl_student.class_id and studentId = '$student_id' and id = '$class'";
        //execute the querry
        $res1 = mysqli_query($conn, $sql1);
        $count1 = mysqli_num_rows($res1);
        
        if($count1 == 1){
            $fetch = mysqli_fetch_assoc($res1);
            $student = $fetch['studentId'];
            header("Location: final_report.php?id=$student");
            // echo "logged in successfully";
        }else{
            echo "<script type='text/javascript'>
                let error = document.getElementById('error');
                error.classList.add('active');
                setTimeout(()=> error.remove(), 2500)
            </script>";
        }
    }

?>