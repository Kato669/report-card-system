<?php include_once('partials/constants.php') ?>

<?php 
   if(isset($_GET['student_id']) && isset($_GET['image'])){
    //delete image
    $id = $_GET['student_id'];
    $image = $_GET['image'];
    
    if($image !=""){
        $path = "img/".$image;
        $remove = unlink($path);

        if($remove == false){
            //session msg
            $_SESSION['image'] = 'image failed to delete';
            //redirect to manage_student.php
            header('Location: manage_student.php');
            //stop the session
            die();
        }
    }
    //sql query to delete the image
    $sql = "delete from tbl_student where student_id= $id";
    $res = mysqli_query($conn, $sql);
    if($res){
        $_SESSION['delete'] = "student deleted successfully";
        header('Location: manage_student.php');
    }else{
        $_SESSION['deletefailed'] = "student failed to delete";
        header('Location: manage_student.php');
    }
   }else{
    header('Location: manage_student.php');
   };
   
?>