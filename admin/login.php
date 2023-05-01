<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Student Report Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="css/style.css">
  </head>
  <style>
    .span_error{
        color: red;
        text-transform: capitalize;
        display: none;
    }
    .span_error.active{
        display: block;
    }
    body{
        
        background-image: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url('https://images.squarespace-cdn.com/content/v1/5c30205b3c3a530bb4123769/1548181638824-ACJUZAZTC082LV88IJ8Q/Brett+Roy+-+BMR_0389.jpg?format=1500w');
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    section{
        width: 40%;
        margin: auto;
        background-color: #fff;
        box-shadow: 0 0 10px 10px rgba(0,0,0,.25);
        padding: 10px;
        border-radius: 10px;
    }
    h1{
        text-transform: capitalize;
        font-size: 1.5rem;
        padding: 10px;
    }
    
  </style>
  <?php

  ?>
  <body>
    <section>
        
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="" method="POST">
                    <h1>login to proceed</h1>
                        <span class="span_error" id="error">login failed</span>
                        <div class="mb-3">
                            <label for="username" class="form-label">Enter Username: </label>
                            <input type="text" class="form-control" id="username" name='username'>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Enter Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="show">
                            <label class="form-check-label" for="show">Show Password</label>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                       
                    </form>
                </div>
            </div>
        </div>
    </section>
  </body>
</html>

<?php 
include_once('partials/constants.php');
if(isset($_POST['submit'])){
    //select data from the form
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    //sql to select data;
    $sql = "select * from tbl_admin where username = '$username' and password='$password'
    ";
    //execute the querry
    $res = mysqli_query($conn, $sql);
    if($res == true){
        $count = mysqli_num_rows($res);
        if($count == 1){
            $_SESSION['login'] = 'You have logged in successfully';
            $_SESSION['user'] = $username;
            header('Location:'.SITEURL);
             
        }else{
            echo "
            <script type='text/javascript'>
            let error = document.getElementById('error').classList.add('active')
            setTimeout(()=> error.remove(), 2500);
            </script>
            "; 
        }
    }
}

?>
<script>
    let show = document.getElementById('show')
    let password = document.getElementById('password')
    show.addEventListener('click', ()=>{
        if(show.checked){
            password.type = 'text';
        }else{
            password.type = 'password';
        }
    })
    
</script>