<!-- bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" >
<link rel="icon" type="image/x-icon" href="./img/logo.png">
<!-- datatables -->
<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<!-- datatables end -->
<style>
    .deletesub, .updatesubject{
        position: absolute;
        top: 20%;
        left: 45%;
        z-index: 1000;
        letter-spacing: 3px;
        color: green;
        text-transform: capitalize;
        font-size: 1rem;
        transform: translateY(-1000%);
        transition: all 1s;

    }
    .deletesub.active{
        transform: translateY(-100%);
    }
    .updatesubject.active{
        transform: translateY(-100%);
    }
</style>

<?php 
    include_once('partials/header.php');
    include_once('partials/left_bar.php');
 ?>

<h4 class="deletesub" id="deletesub">
<?php
    if(isset($_SESSION['delete'])){
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);
    }
?>
</h4>

<h4 class="updatesubject" id="updatesubject">
<?php
    if(isset($_SESSION['updatesubject'])){
        echo $_SESSION['updatesubject'];
        unset($_SESSION['updatesubject']);
    }
?>
</h4>

<?php
    if(isset($_SESSION['failedsubject'])){
        echo $_SESSION['failedsubject'];
        unset($_SESSION['failedsubject']);
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
                    <li class="active">manage subject</li>
                </ul>
            </div>
            
        </div>
    </div>
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-12">

            <table id="example" class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Sn</th>
                        <th>Subject Name</th>
                        <th>Subject Code</th>
                        <th>Creation Date</th>
                        <th>Initials</th>
                        <th>Action</th>
                        <!-- <th></th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                        //sql querry to select data
                        $sql = "select * from tbl_subject";
                        //execute the querry
                        $res = mysqli_query($conn, $sql);
                        //count rows
                        $count = mysqli_num_rows($res);
                        if($count > 0){
                            $sn =1;
                            while($row = mysqli_fetch_assoc($res)){
                                $id = $row['id'];
                                $subjectName = $row['subjectName'];
                                $subjectCode = $row['subjectCode'];
                                $creationDate = $row['Creationdate'];
                                $initials = $row['initials'];

                                ?>
                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $subjectName?></td>
                                    <td><?php echo $subjectCode?></td>
                                    <td><?php echo $creationDate?></td>
                                    <td><?php echo $initials?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>edit_subject.php?id=<?php echo $id ?>" class="btn btn-primary btn-small">Edit</a>
                                        <a href="<?php echo SITEURL ?>delete_subject.php?id=<?php echo $id; ?>" class="btn btn-danger btn-small">Delete</a>
                                    </td>
                                    <!-- <td>$320,800</td> -->
                                </tr>

                                <?php

                            }
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
    let deletesub = document.getElementById('deletesub');
    let updatesubject = document.getElementById('updatesubject');
    window.addEventListener('load', ()=>{
        // console.log('hello')
        deletesub.classList.add('active')
    })
    window.addEventListener('load', ()=>{
        // console.log('hello')
        updatesubject.classList.add('active')
    })
    setTimeout(() => deletesub.remove(), 3000);
    setTimeout(() => updatesubject.remove(), 3000);
</script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });

    
</script>

