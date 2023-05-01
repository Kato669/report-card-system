<!-- bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" >
<link rel="icon" type="image/x-icon" href="./img/logo.png">
<!-- datatables -->
<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<!-- datatables end -->

<style>
    .classDeleted{
        position: absolute;
        top: 20%;
        left: 40%;
        color: green !important;
        font-size: 1.3rem;
        z-index: 1000;
        text-transform: capitalize;
        transform: translateY(-1000%);
        transition: 1s;
    }
    .classDeleted.active{
        transform: translateY(-100%);
    }
    .update{
        position: absolute;
        top: 20%;
        left: 40%;
        color: green !important;
        font-size: 1.3rem;
        z-index: 1000;
        text-transform: capitalize;
        /* transform: translateY(-1000%); */
        transition: 1s;
    }
    .update.active{
        transform: translateY(-100%);
    }
</style>

<?php 
    include_once('partials/header.php');
    include_once('partials/left_bar.php');
 ?>

<!-- session messages -->
<h4 class="classDeleted" id="classDeleted">
    <?php
        if(isset($_SESSION['classDeleted'])){
            echo $_SESSION['classDeleted'];
            unset($_SESSION['classDeleted']);
        }

    ?>
<!-- </h4> -->

<h4 class="update" id="update">
    <?php 
        if(isset($_SESSION['update'])){
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
    ?>
</h4>



<div class="rightbar">
    <div class="top">
        <span>manage classes</span>
        
        <hr>
        <div class="row breadcrumb-div">
            <div class="col-md-6">
                <ul class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-home"></i> <span style="padding: 0 3px;"></span> Home</a></li>
                    <span> / </span>
                    <li><a href="#">Classes</a></li>
                    <span> / </span>
                    <li class="active">Manage Classes</li>
                </ul>
            </div>
            
        </div>
    </div>
    <!-- datatables live -->
   <div class="container mt-4">
    <div class="row">
        <div class="col-lg-11">
            <table id="example" class="table table-hover table-striped" style="width:100%;">
                <thead>
                    <tr>
                        <th>Sn.</th>
                        <th>Class Name</th>
                        <th>Class Name in Numeric</th>
                        <th>stream</th>
                        <th>creation date</th>
                        <th>Action</th>
                    </tr>
                </thead>


                <?php
                    //sql to fetch data from database
                    $sql = 'select * from tbl_classes order by creationDate';
                    //execute the querry
                    $res = mysqli_query($conn, $sql);
                    if($res == true){
                        //check if data exists
                        $count = mysqli_num_rows($res);
                        if($count> 0){
                            $sn = 1;
                            //while loop to get data
                            while($row = mysqli_fetch_assoc($res)){
                               $id = $row['id'];
                               $className = $row['className'];
                               $classNameNumeric = $row['classNameNumeric'];
                               $stream = $row['stream'];
                               $date = $row['creationDate'];
                               ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php  echo $className ?></td>
                                        <td><?php echo $classNameNumeric ?></td>
                                        <td><?php echo $stream ?></td>
                                        <td><?php echo $date ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>delete_class.php?id=<?php echo $id; ?>" class="btn btn-danger btn-small">Delete</a>
                                            <a href="<?php echo SITEURL; ?>edit_class.php?id=<?php echo $id; ?>" class="btn btn-primary btn-small">Edit</a>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php

                            }
                            

                        }
                    }
                ?>



                
            </table>
        </div>
    </div>
   </div>
    <!-- datatables live ends -->
</div>
<!-- datatables -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
    let classDeleted = document.getElementById('classDeleted');
    let update = document.getElementById('update');
    window.addEventListener('load',()=>{
        classDeleted.classList.add('active');
    })
    window.addEventListener('load',()=>{
        update.classList.add('active');
    })
    setTimeout(()=> classDeleted.remove(), 3000)
    setTimeout(()=> update.remove(), 3000)
</script>
<script src="../js/app.js"></script>