<?php
include_once('partials/constants.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
    // echo "proceed to delete combination";
    //sql query to delete the query
    $sql = "delete from tbl_combination where id=$id";
    //execute the query
    $res = mysqli_query($conn, $sql);
    if($res == true){
        $_SESSION['deleted'] = "combination deleted successfully";
        header('Location: manage_combination.php');
    }
}else{
    header('Location: manage_combination.php');
}

?>