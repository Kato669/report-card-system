<?php
     include_once('partials/constants.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        //sql to delete data
        $sql = "delete from tbl_subject where id = $id";
        //execute the sql querry
        $res = mysqli_query($conn, $sql);

        if($res == true){
            $_SESSION['delete'] = 'subject deleted successfully';
            header('Location: manage_subject.php');
        }else{
            $_SESSION['failed'] = 'failed to delete admin';
            header('Location: manage_subject.php');
        }
    }else{
        header('Location: manage_subject.php');
    }
?>