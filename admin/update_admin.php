<!--bootstrap css  -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

<?php
 include_once('partials/header.php');
?>
<?php
    $id = $_GET['id'];

    //select data from database corresponding to the id
    $sql = "select * from tbl_admin where id = $id";
    //execute the querry
    $res  = mysqli_query($conn, $sql);
    #check if the querry is executed
    if($res == true){
        $count = mysqli_num_rows($res);
        if($count == 1){
            $row = mysqli_fetch_assoc($res);
            $fullname = $row['fullname'];
             $username = $row['username'];
            // exit();
        }
    }
 ?>

<div class="container">
    <div class="row mt-4">
        <div class="col-lg-6 mt-4">
            <h3 class="update1">update admin</h3>
            <!-- form -->
            <form action="" method="post">
                <div class="mb-3">
                    <label for="fullname" class="form-label">Enter fullname:</label>
                    <input type="text" class="form-control" name="fullname" id="fullname" placeholder="enter fullname" value="<?php echo $fullname; ?>">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Enter username:</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="enter username" value="<?php echo  $username; ?>">
                </div>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<!-- update admin-->
<?php
if(isset($_POST['submit'])){
    //fetch data from the form
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    // sql querry to update database
    $sql = "Update tbl_admin SET
    fullname = '$fullname',
    username = '$username' 
    WHERE id = '$id'
    ";
    //execute the querry
    $res = mysqli_query($conn, $sql);
    if($res==true){
        $_SESSION['update'] = 'Admin updated successfully';
        header('Location: manage_admin.php');
    }
}
?>