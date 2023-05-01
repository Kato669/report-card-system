<!-- bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" >
<link rel="icon" type="image/x-icon" href="./img/logo.png">
<?php 
    include_once('partials/header.php');
    include_once('partials/left_bar.php');

 
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
                    <li class="active">Add subject combination</li>
                </ul>
            </div>
            
        </div>
    </div>
        <!-- add subject combination -->
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-lg-12">
                    
                    <form  action="" method="POST" style="padding: 2%; ">
                    <h5 style="opacity: .3">Add subjects in the class</h5>
                        <div class="mb-3">
                            
                            <label for="">Add class</label>
                                <select class="form-select" name="ClassId" required>
                                    <option value="">select class</option>
                                    <?php
                                            $sql = "select * from tbl_classes";
                                            //execute the querry
                                            $res = mysqli_query($conn, $sql);
                                            $count = mysqli_num_rows($res);
                                            if($count > 0){
                                                while($row = mysqli_fetch_assoc($res)){
                                                    $id = $row['id'];
                                                    $className = $row['className'];
                                                    $stream = $row['stream'];
                                                    ?>
                                                <option value="<?php echo $id ?>"><?php echo "{$className}  {$stream}" ?></option>
                                                    <?php
                                                }
                                            }

                                        ?>
                                    
                                </select>
                        </div>
                        <div class="mb-3">
                            <label for="">select subject</label>
                            <select class="form-select" name="SubjectId" required>
                                <option value="" >select subject</option>
                                <?php
                                    $sql1 = "select * from tbl_subject";
                                    //execute the querry
                                    $res1 = mysqli_query($conn, $sql1);
                                    $count1 = mysqli_num_rows($res1);
                                    if($count1 > 0){
                                        while($row1 = mysqli_fetch_assoc($res1)){
                                            $id1 = $row1['id'];
                                            $subjectName = $row1['subjectName'];
                                            // $stream = $row1['stream'];
                                            ?>
                                        <option value="<?php echo $id1 ?>"><?php echo $subjectName  ?></option>
                                            <?php
                                        }
                                    }

                                ?>
                            </select>
                        </div>
                        
                        <button type="submit" name="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- add data to database -->
        
        <?php
            if(isset($_POST['submit'])){
                $status =1;
                $ClassId = $_POST['ClassId'];
                $SubjectId = $_POST['SubjectId'];
                
                //check whether values do not exist in database
                $fetch = "select * from tbl_combination where classId = $ClassId and SubjectId = $SubjectId";
                //execute the querry
                $execute = mysqli_query($conn, $fetch);
                $countRows = mysqli_num_rows($execute);
                if($countRows > 0){
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
                                Command: toastr["error"]("Data failed to insert");
                            </script>
                            ';
                }else{

                

                    $sql2 = "insert into tbl_combination SET
                    ClassId = '$ClassId',
                    SubjectId =' $SubjectId',
                    status = '$status'
                    ";
                    //execute the query
                    $res2 = mysqli_query($conn, $sql2);
                    if($res2 == true){
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
                                Command: toastr["error"]("combination exists");
                            </script>
                            ';
                    }
                }
            }

        ?>
    
</div>