<!DOCTYPE html>

<html lang="en">
<head>
    

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->

    <!-- jQuery library -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> -->

    <!-- Latest compiled JavaScript -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="icon" type="image/x-icon" href="./img/logo.png">

    <link rel="stylesheet" href="../toarst/toastr.min.css">
    <style>
        label{
            text-transform: capitalize;
            padding: 1% 0;
        }
        button{
            background: transparent;
            padding: 1% 2%;
            border-radius: 10px;
            border: 1px solid deepskyblue;
            transition: 1s;
        }
        button:hover{
            background: #192a56;
            color: #fff;
        }
        .span{
            text-transform: capitalize;
            padding: 1% 0;
            color: black;
            opacity: .5;
        }
        ::placeholder{
            text-transform: lowercase;
        }
        label{
            font-size: .9rem;
        }
        h5{
            color: #000;
            font-size: 1rem;
            opacity: .7;
        }
        .label{
            padding: 2% 0;
            font-size: .9rem;
            opacity: .7;
            text-transform: capitalize;
        }
    </style>
   <script>
function getStudent(val) {
    $.ajax({
    type: "POST",
    url: "action_mid.php",
    data:'classid='+val,
    success: function(data){
        $("#student").html(data);
        
    }
    });

    $.ajax({
        type: "POST",
        url: "action_mid.php",
        data:'classid1='+val,
        success: function(data){
            $("#subjects").html(data);
            
        }
    });
}
    </script>

</head>
<?php 
    include_once("partials/header.php");
    include_once("config.php");
    include_once("partials/left_bar.php");
?>
<body>
<div class="rightbar">
    <div class="top">
        <span>create results</span>
        
        <hr>
        <div class="row breadcrumb-div">
            <div class="col-md-6">
                <ul class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-home"></i> <span style="padding: 0 3px;"></span> Home</a></li>
                    <span> / </span>
                    <li><a href="#">Results</a></li>
                    <span> / </span>
                    <li class="active">Create Mid Term Results</li>
                </ul>
            </div>
            
        </div>
    </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12">
                <form action="" method="POST" style="width : 80%;">
                <span class="span">declare results</span>
                    <div class="mb-3">
                        <label for="email" class="class-label">select class:</label>
                        <select name="class" id="classid" onChange="getStudent(this.value);" class="form-select">
                        <option value="" disabled selected>select class from here</option>

                            <?php

                                $sql1 = "select * from tbl_classes";
                                $res = mysqli_query($conn, $sql1);
                                while($rows = mysqli_fetch_array($res)){
                                    $id = $rows['id'];
                                    $stream = $rows['stream'];
                                    $className = $rows['className'];

                                    ?>
                                        <option value="<?php echo $id; ?>"><?php echo "{$className} {$stream}" ?></option>
                                    <?php
                                }
                            ?>
                        </select>
                        
                    </div>
                    <div class="mb-3">
                        <label for="pwd" class="class-label">select student:</label>
                        <select name="studentId" id="student" class="form-select">
                            <option value="" disabled selected>select student from here</option>
                        </select>
                        
                    </div>
                    <label for="" >Subjects</label>
                    <div class="mb-3" id="subjects">
                        
                        <!-- <input type="number" class="form-control" id="" placeholder="Enter marks out of 100"> -->
                    </div>
                    
                    <button type="submit" name="submit">Declare results</button>
                </form>
                </div>
            </div>
        </div>
</div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../toarst/toastr.min.js"></script>

  </body>
</body>
</html>


<?php
// session_start();
// error_reporting(0);
// include('includes/config.php');

if(isset($_POST['submit'])){
    // echo "hello world";
    // exit;
    $marks=array();
$class=$_POST['class'];
$studentid=$_POST['studentId']; 
$mark=$_POST['marks'];

//  $stmt = $dbh->prepare("SELECT tbl_subject.subjectName,tblsubjects.id FROM tblsubjectcombination join  tblsubjects on  tblsubjects.id=tblsubjectcombination.SubjectId WHERE tblsubjectcombination.ClassId=:cid order by tblsubjects.SubjectName");
 $stmt = $dbh->prepare("SELECT tbl_subject.subjectName,tbl_subject.id FROM tbl_combination join  tbl_subject on  tbl_subject.id = tbl_combination.SubjectId WHERE tbl_combination.ClassId=:cid order by tbl_subject.subjectName");
 $stmt->execute(array(':cid' => $class));
  $sid1=array();
 while($row=$stmt->fetch(PDO::FETCH_ASSOC))
 {

array_push($sid1,$row['id']);
   } 
  
for($i=0;$i<count($mark);$i++){
    $mar=$mark[$i];
  $sid=$sid1[$i];
$sql="INSERT INTO  tbl_mid(class_mid_id,Subject_mid_id,marks_mid,stdnt_mid_id	) VALUES(:class,:sid,:marks, :studentId)";
$query = $dbh->prepare($sql);

$query->bindParam(':class',$class,PDO::PARAM_STR);
$query->bindParam(':sid',$sid,PDO::PARAM_STR);
$query->bindParam(':marks',$mar,PDO::PARAM_STR);
$query->bindParam(':studentId',$studentid,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
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
}
else 
{
$error="Something went wrong. Please try again";
}
}
}
?>