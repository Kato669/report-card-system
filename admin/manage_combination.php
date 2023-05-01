<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" >
<!-- dtablesata -->
<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<!-- dtablesata -->
<link rel="icon" type="image/x-icon" href="./img/logo.png">
<style>
    .deleted{
        position: absolute;
        top: 25%;
        left: 45%;
        color: green;
        z-index: 1000;
        transition: .5s;
        font-size: 1.1rem;
        transform: translateY(-1000%);
    }
    .deleted.active{
        transform: translateY(-100%);
    }
</style>
<?php 
    include_once('partials/header.php');
    include_once('partials/left_bar.php');

 
 ?>
<h4 class="deleted" id="deleted">
    <?php
        if(isset($_SESSION['deleted'])){
            echo $_SESSION['deleted'];
            unset($_SESSION['deleted']);
        }

    ?>
</h4>

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
                    <li class="active">Add manage combination</li>
                </ul>
            </div>
            
        </div>
    </div>
<br><br>
    <!-- data tables -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <table id="example" class="table table-hover table-striped">
        <thead>
            <tr>
                <th>Sn</th>
                <th>Class and Section</th>
                <th>Subject</th>
                <th>Action</th>
              
        </thead>
        <tbody>
            <?php
                
                $sql = "select className,stream, subjectName, tbl_combination.id from tbl_classes, tbl_subject, tbl_combination where tbl_classes.id = tbl_combination.ClassId and tbl_subject.id = tbl_combination.SubjectId";
                
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                if($count > 0){
                    $sn = 1;
                    while($row = mysqli_fetch_assoc($res)){
                        $id = $row['id'];
                        $classname = $row['className'];
                        $stream = $row['stream'];
                        $subjectName = $row['subjectName'];
                        ?>
                            <tr>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo "{$classname} {$stream}" ?></td>
                                <td><?php echo $subjectName; ?></td>
                                <td>
                                    <a href="<?php echo SITEURL ?>delete_combination.php?id=<?php echo $id; ?>" style="color: red"><i class="fa-solid fa-light fa-trash"></i></a>
                                    <!-- <a href="#" style="color: green"><i class="fa-solid fa-light fa-pen-to-square"></i></a> -->
                                </td>
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


<script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
    <script>
        let deleted = document.getElementById('deleted');
        window.addEventListener('load', ()=>{
            deleted.classList.add('active');
        })
        setTimeout(()=> deleted.remove(), 2000);
    </script>
<!-- <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>