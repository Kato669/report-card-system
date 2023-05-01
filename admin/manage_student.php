<!-- bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" >
<link rel="icon" type="image/x-icon" href="./img/logo.png">
<!-- dtablesata -->
<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<!-- dtablesata -->

<style>
    .error{
        color: red;
    }
    .delete1, .studentUpdate, .failedimg, .imagenotfound{
        position: absolute;
        top: 25%;
        left: 45%;
        transform: translateY(-1000%);
        z-index: 1000;
        color: green;
        font-size: 1.4rem;
        background-color: transparent;
        text-transform: capitalize;
        transition: all 1s;
    }
    .delete1.active{
        transform: translateY(-100%);
    }
    .imagenotfound.active{
        transform: translateY(-100%);
    }
    .studentUpdate.active{
        transform: translateY(-100%);
    }
    .failedimg.active{
        transform: translateY(-100%);
    }
</style>
<?php 
    include_once('partials/header.php');
    include_once('partials/left_bar.php');
 ?>
<?php
if(isset($_SESSION['image'])){
    echo $_SESSION['image'];
    unset($_SESSION['image']);
}
?>
<h4 class="delete1" id="delete1">
    <?php 
if(isset($_SESSION['delete'])){
    echo $_SESSION['delete'];
    unset($_SESSION['delete']);
}
    ?>
</h4>
<h4 class="studentUpdate " id="studentUpdate">
    <?php
        if(isset($_SESSION['studentUpdate'])){
            echo $_SESSION['studentUpdate'];
            unset($_SESSION['studentUpdate']);
        }
    ?>
</h4>
<h4 class="failedimg " id="failedimg">
    <?php
        if(isset($_SESSION['failedimg'])){
            echo $_SESSION['failedimg'];
            unset($_SESSION['failedimg']);
        }
    ?>
</h4>
<h4 class="imagenotfound " id="imagenotfound">
    <?php
        if(isset($_SESSION['imagenotfound'])){
            echo $_SESSION['imagenotfound'];
            unset($_SESSION['imagenotfound']);
        }
    ?>
</h4>
<!-- working on the sidebar -->
<div class="rightbar">
    <div class="top">
        <span>manage student</span>
        <hr>
        <div class="row breadcrumb-div">
            <div class="col-md-6">
                <ul class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-home"></i> <span style="padding: 0 3px;"></span> Home</a></li>
                    <span> / </span>
                    <li><a href="#">Student</a></li>
                    <span> / </span>
                    <li class="active">manage Student</li>
                </ul>
            </div>
            
        </div>
    </div>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-lg-12">
            <table id="example" class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Sn</th>
                        <th>Student Image</th>
                        <th>Student Name</th>
                        <th>Student ID</th>
                        <th>Student Gender</th>
                        <th>Date of Birth</th>
                        <th>Student Class</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sn =1;
                        //sql to fetch data
                        $sql = "select *, tbl_classes.className, tbl_classes.stream from tbl_student, tbl_classes where tbl_classes.id = tbl_student.class_id";
                        //execute
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);
                        while($row = mysqli_fetch_assoc($res)){
                            $id = $row['student_id'];
                            $image = $row['image'];
                            $student_name = $row['student_name'];
                            $student_id = $row['studentId'];
                            $student_gender = $row['gender'];
                            $age = $row['age'];
                            $student_class = $row['className'];
                            $stream = $row['stream'];

                            ?>      
                            <tr>
                                
                                <td><?php echo $sn++?></td>
                                <td>
                                    <?php
                                    if($image !=''){
                                        ?>
                                        <img src="<?php echo SITEURL;?>img/<?php echo $image ?>" style='width: 80px; height: 80px;'>
                                        <?php
                                    }else{
                                        echo '<p class="error">image not available</p>';
                                    }
                                    ?>
                                    
                                </td>
                                <td><?php echo $student_name; ?></td>
                                <td><?php echo $student_id ?></td>
                                <td><?php echo $student_gender; ?></td>
                                <td><?php echo $age ?></td>
                                <td><?php echo "{$student_class} {$stream}" ?></td>
                            
                                <td>
                                    <a href="<?php echo SITEURL; ?>delete_student.php?student_id=<?php echo $id; ?> &image=<?php echo $image; ?>" style="color: red; "><i class="fa-solid fa-light fa-trash"></i></a>
                                    <a href="<?php echo SITEURL;?>update_student.php?student_id=<?php echo $id ?>" style="color: green; "><i class="fa-solid fa-light fa-pen-to-square"></i></a>
                                </td>
                                
                            </tr>

<?php
                        }

                    ?>
                    
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
<script>
    let delete1 = document.getElementById('delete1');
    let studentUpdate = document.getElementById('studentUpdate');
    let failedimg = document.getElementById('failedimg');
    let imagenotfound = document.getElementById('imagenotfound');
    window.addEventListener('load', ()=>{
        delete1.classList.add('active');
    })
    window.addEventListener('load', ()=>{
        imagenotfound.classList.add('active');
    })
    window.addEventListener('load', ()=>{
        failedimg.classList.add('active');
    })
    window.addEventListener('load', ()=>{
        studentUpdate.classList.add('active');
    })
    setTimeout(()=> delete1.remove(), 3000);
    setTimeout(()=> studentUpdate.remove(), 3000);
    setTimeout(()=> failedimg.remove(), 3000);
    setTimeout(()=> imagenotfound.remove(), 3000);
</script>