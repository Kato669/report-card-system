<!-- bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" >
<link rel="icon" type="image/x-icon" href="./img/logo.png">

<?php 
    include_once('partials/header.php');
?>

<style>
    body{
        overflow: hidden;
    }
    .login{
        color: green;
        z-index: 10000;
        position: absolute;
        left: 40%;
        font-size: 1.1rem;
        top: 20%;
        transition: 1s;
        transform: translateY(-1000%);
    }
    .login.active{
        transform: translateY(-100%);
    }
    .rightbar .dash{
    background-color: #fff !important;
    padding: 40px;
    text-transform: capitalize;
    font-size: 2rem;
    /* max-height: 20vh; */
    font-weight: 900;
    /* z-index: 10000; */
}
</style>
    <!-- left bar -->
    <h1 class="login" id="login">
        <?php 
            if(isset($_SESSION['login'])){
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            ?>
    </h1>
  <!-- include sidebar -->
  <?php include_once('partials/left_bar.php') ?>
  <!-- include sidebar end -->
<!-- right bar -->
<div class="rightbar">
    <div class="dash">
        <span>dashboard</span>
    </div>
    <div class="bottom">

     
      <!-- getting registered stdnts -->
      <?php
            $sql =  "select * from tbl_student";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
      ?>


        <div class="stdntsbjct">
            <!-- registered student -->
            <div class="regstdnt">
                <div class="left">
                    <span><i class="fa-solid fa-people-roof"></i></span>
                </div>
                <div class="right">
                    <span class="txt"><?php echo $count;?></span>
                    <span>Registered student</span>
                </div>
                
            </div>
            <!-- registered student -->
            <!-- subject listed -->
            <!-- getting registered stdnts -->
            <?php
                    $sql1 =  "select * from tbl_subject";
                    $res1 = mysqli_query($conn, $sql1);
                    $count1 = mysqli_num_rows($res1);
            ?>
            <div class="subject">
                <div class="left">
                    <span><i class="fa-solid fa-book"></i></span>
                </div>
                <div class="right">
                    <span class="txt"><?php echo $count1; ?></span>
                    <span>subjects listed</span>
                </div>
            </div>
            <!-- end subject listed -->
        </div>
        <div class="stdntsbjct">
            <!-- class listed -->
            <?php
                $sql2 =  "select * from tbl_classes";
                $res2 = mysqli_query($conn, $sql2);
                $count2 = mysqli_num_rows($res2);
            ?>
            <div class="classlisted">
                <div class="left">
                    <span><i class="fa-solid fa-house"></i></span>
                </div>
                <div class="right">
                    <span class="txt"><?php echo $count2; ?></span>
                    <span>classes listed</span>
                </div>
            </div>
           
            <!-- results declared -->
            <div class="results">
                <div class="left">
                    <span><i class="fa-solid fa-bookmark"></i></span>
                </div>
                <?php
                    $sql3 =  "SELECT stdntsId FROM tbl_results GROUP BY stdntsId HAVING COUNT(stdntsId) > 1";
                    $res3 = mysqli_query($conn, $sql3);
                    $count3 = mysqli_num_rows($res3);
                ?>
                <div class="right">
                    <span class="txt"><?php echo $count3 ?></span>
                    <span>results declared</span>
                </div>
            </div>
        </div>
    </div>
   
</div>
<script>
    let login = document.getElementById('login');
    window.addEventListener('load', ()=>{
        login.classList.add('active');
    })
    setTimeout(()=> login.remove(), 2500);
    
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
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
        Command: toastr["success"]("Welcome to Student Report Management System ");
                       
</script>
    <script src="../js/app.js"></script>
