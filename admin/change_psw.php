
<!-- bootstrap css -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" >
<link rel="icon" type="image/x-icon" href="./img/logo.png">
<?php
include_once('partials/header.php')
?>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
?>
<!-- session -->
<h4 class="psw-not-match" id="psw-not-match">
    <?php
        if(isset($_SESSION['psw-not-match'])){
            echo $_SESSION['psw-not-match'];
            unset($_SESSION['psw-not-match']);
        }
    ?>
</h4>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-6">
            <h3 class="update1">change password</h3>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="current_password" class="form-label">Enter Current Password</label>
                    <input type="password" class="form-control" id="current_password" name="current_password">
                </div>
                <div class="mb-3">
                    <label for="new_password" class="form-label">Enter New Password</label>
                    <input type="password" class="form-control" id="new_password" name="new_password">
                </div>
                <div class="mb-3 ">
                    <label for="confirm_password" class="form-label">confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                </div>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php
if(isset($_POST['submit'])){
    //get data from the form
    $current_password = md5($_POST['current_password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);

    //sql querry to get data
    $sql = "select * from tbl_admin where id =$id and password = '$current_password'";
    //execute the querry
    $res = mysqli_query($conn, $sql);
    if($res == true){
        $count = mysqli_num_rows($res);
        if($count ==1){
            if($new_password == $confirm_password){
                //update the password
                $sql1 = "Update tbl_admin SET
                password = '$new_password'
                where id='$id';
                ";
                $res1 = mysqli_query($conn, $sql1);
                if($res1 == true){
                    $_SESSION['password'] = 'password updated successfully';
                    header('Location: manage_admin.php');
                }else{
                    $_SESSION['not password'] = 'password change failed';

                }
            }else{
                $_SESSION['psw-not-match'] = "password don't match";

            }
        }
    }
}

?>

<script>
    let psw_not_match = document.getElementById('psw-not-match');
    window.addEventListener('load', ()=>{
        psw_not_match.classList.add('active');
    })
    setTimeout(()=> psw_not_match.remove(), 3000); 
</script>