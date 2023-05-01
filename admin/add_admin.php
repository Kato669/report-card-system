
<!-- bootstrap css -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" >
<link rel="icon" type="image/x-icon" href="./img/logo.png">
<!-- bootstrap css -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" >
<?php include_once('partials/header.php') ?>

<div class="container mt-5">
    <form action="" method="POST">
        <div class="row">
            <div class="col-lg-6">
                <!-- <span class='close'>x</span> -->
                <div class="mb-3">
                    <label for="fullname" class="form-label">Enter Fullname</label>
                    <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Enter fullname"  required>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Enter username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter username" autocomplete='off' value="" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Enter password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>



<?php

 if(isset($_POST['submit'])){
    // echo '<script type="text/javascript">alert("hello")</script>';
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);


    //querry to select data from tadabase
    $data = "select * from tbl_admin where fullname = '$fullname' and  username = '$username'";
    $datares = mysqli_query($conn, $data);
    if($datares == true){
        $rowCount = mysqli_num_rows($datares);
        if($rowCount > 0){
            $_SESSION['userExists'] = 'The user already exists';
            header("Location: manage_admin.php");
        }else{
            //sql querry to insert data
            $sql = "
            Insert into tbl_admin SET
            fullname = '$fullname',
            username = '$username',
            password = '$password'
            ";
            //execute the querry
            $res = mysqli_query($conn, $sql);
            if($res == true){
                $_SESSION['added'] = 'admin added successfully';
                // $referer = $_SERVER['HTTP_REFERER'];
                header("Location: manage_admin.php");
            }else{
                //display error message and direct back to the page
                $_SESSION['error'] = 'failed to add admin';
                // header('Location: manage_admin.php');
            }
        }
            

    }
    
 }

?>

