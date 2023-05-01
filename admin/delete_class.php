<?php include_once('partials/constants.php') ?>
<?php
        $id = $_GET['id'];
        //sql querry to delete data from the table
        $sql = "delete from tbl_classes where id = $id";
        //execute the querry
        $res = mysqli_query($conn, $sql);
        //check if the querry was executed
        if($res == true){
            //display success method and direct to manage_class
            $_SESSION['classDeleted'] = 'class deleted successfully';
            header('Location: manage_class.php');
        }else{
            //display error message
            $_SESSION['classFailed'] = 'class delete failed';
            header('Location: manage_class.php');
        }
?>