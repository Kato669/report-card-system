<!-- bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" >

<?php 
    include_once('partials/header.php')
?>
<?php
$id = $_GET['id'];
?>
<?php

//sql querry to fetch data
$sql = "select * from tbl_subject where id=$id";
//execute the querry
$res = mysqli_query($conn, $sql);
//check if its true
if($res == true){
    $count = mysqli_num_rows($res);
    if($count == 1 ){
        while($row= mysqli_fetch_assoc($res)){
            $subject = $row['subjectName'];
            $subjectCode = $row['subjectCode'];
            $initials = $row['initials'];
        }
    }
}


?>

<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-lg-6">
        <form action="" method="POST">
            <h6>Update subject</h6>
            <div class="mb-3">
                <label for="subject" class="form-label">Enter subject</label>
                <input type="text" class="form-control" id="subject" name="subjectName" value="<?php echo $subject; ?>">
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <div class="mb-3">
                <label for="subjectCode" class="form-label">Enter subject code</label>
                <input type="number" class="form-control" id="subjectCode" name="subjectCode" value="<?php echo $subjectCode; ?>">
            </div>
            <div class="mb-3">
                    <label for="initials" class="form-label">Subject Initials</label>
                    <input type="text" placeholder="like N.S, K.J.K" value="<?php echo $initials ?>" class="form-control" id="initials" name="initials" required>
                    <!-- <div id="hint" class="form-text hint"><i>Eg- 1543, 2342</i> </div> -->
                </div>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
        </div>
    </div>
</div>
<?php

//check if button is clicked
if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $subjectName = $_POST['subjectName'];
    $subjectCode = $_POST['subjectCode'];
    $initials = $_POST['initials'];

    //sql to insert data
    $sql1 = "update tbl_subject SET
        subjectName = '$subjectName',
        subjectCode = $subjectCode,
        initials = '$initials'
        where id = '$id'
    ";

    //execute the query
    $res1 = mysqli_query($conn, $sql1);

    if($res1 == true){
        $_SESSION['updatesubject'] = "subject updated successfully";
        header('Location: manage_subject.php');
    }else{
        $_SESSION['failedsubject'] = "subject failed to update";
        header('Location: manage_subject.php');
    }
    
}
?>