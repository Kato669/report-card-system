<!-- bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" >

<?php include_once('partials/header.php') ?>

<?php $id = $_GET['id'];?>

<?php
//sql to fetch data
$sql = "select * from tbl_classes where id = $id";

//execute the querry
$res = mysqli_query($conn, $sql);
if($res == true){
    $count = mysqli_num_rows($res);
    if($count == 1){
        while($row = mysqli_fetch_assoc($res)){
            $className = $row['className'];
            $classNameNumeric = $row['classNameNumeric'];
            $stream = $row['stream'];
        }
    }
}

?>



<div class="container mt-5">
    <div class="row mt-4">
        <div class="col-12">
            <!-- form -->
            <form action="" method="post">
                <div class="mb-3">
                    <label for="classname" class="form-label">Class Name</label>
                    <input type="text" class="form-control" id="classname" name="className" value="<?php echo $className; ?>">
                   
                </div>
                <div class="mb-3">
                    <label for="classnamenumeric" class="form-label">Class Name in Numeric</label>
                    <input type="text" class="form-control" id="classnamenumeric" name="classNameNumeric" value="<?php echo $classNameNumeric; ?>">
                </div>

                <div class="mb-3">
                    <label for="stream" class="form-label">Stream</label>
                    <input type="text" class="form-control" id="stream" name="stream" value="<?php echo $stream; ?>">
                </div>
                
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
            <!-- form end -->
        </div>
    </div>
</div>

<!-- updating the table -->
<?php 
    if(isset($_POST['submit'])){
        // echo "hello";
        // exit;
        $id = $_POST['id'];
        $className = $_POST['className'];
        $classNameNumeric = $_POST['classNameNumeric'];
        $stream = $_POST['stream'];

        //sql to update the table
        $sql1 = "
        update tbl_classes SET
        className = '$className',
        classNameNumeric = '$classNameNumeric',
        stream = '$stream'
        WHERE id = '$id'
        ";

        //execute the querry
        $res1 = mysqli_query($conn, $sql1);
        if($res1 ==true){
            $_SESSION['update'] = 'Admin updated successfully';
            header('Location: manage_class.php');
        }
    }
?>