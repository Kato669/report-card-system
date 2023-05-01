
<!-- bootstrap css -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" >
<link rel="icon" type="image/x-icon" href="./img/logo.png">
<!-- datatables -->
<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<!-- end datatables -->
<?php include_once('partials/header.php') ?>
<style>
    body{
        width: 90%;
        margin: auto;
    }
   
</style>


<body>
    
    <!-- datatable html -->
<br><br>
<h3>manage admin</h3>
<!-- admin form -->
<a href="add_admin.php" class="btn btn-primary">add admin</a>
<!-- <button class=" add_admin" id="add_admin">add admin</button> -->
<h4 class="userExists" id="userExists">
    <?php
    if(isset($_SESSION['userExists'])){
        echo $_SESSION['userExists'];
        unset($_SESSION['userExists']);
    }
    ?>
</h4>
<h4 class="added" id="added">
    <?php
        if(isset($_SESSION['added'])){
            echo $_SESSION['added'];
            unset($_SESSION['added']);
        }
    ?>
</h4>
<h4 class="update" id="update">
    <?php
        if(isset($_SESSION['update'])){
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
    ?>
</h4>
<h4 class="password" id="password">
    <?php
        if(isset($_SESSION['password'])){
            echo $_SESSION['password'];
            unset($_SESSION['password']);
        }
    ?>
</h4>
<h4 class="admindeleted" id="admindeleted">
    <?php
        if(isset($_SESSION['admindeleted'])){
            echo $_SESSION['admindeleted'];
            unset($_SESSION['admindeleted']);
        }
    ?>
</h4>
<br><br>
<div class="row breadcrumb-div">
<div class="col-md-6">
    <ul class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i> <span style="padding: 0 3px;"></span> Dashboard</a></li>
        <span> / </span>
        <li><a href="#">Manage Admin</a></li>
        <!-- <span> / </span>
        <li class="active">Create Class</li> -->
    </ul>
</div>
            
        </div>
<!-- admin form ends -->
<table id="example" class="table table-hover table-striped" style="width:100%">
    <thead>
        <tr>
            <th>id</th>
            <th>Fullname</th>
            <th>Username</th>
            <!-- <th>Password</th> -->
            <th>Action</th>
            <!-- <th>Salary</th> -->
        </tr>
    </thead>
    <tbody>
    

<?php 
//select from database
    $sql = 'select * from tbl_admin';
//execute the query
    $res = mysqli_query($conn, $sql);
//count rows
if($res == true){
    $count = mysqli_num_rows($res);
    
    if($count > 0){
        $num =1;
        // echo 'hello world';
        // exit();
        while($row = mysqli_fetch_assoc($res)){
            
            $id = $row['id'];
            $fullname  = $row['fullname'];
            $username  = $row['username'];

            ?>
                <tr>
                    <td><?php echo $num++ ?></td>
                    <td><?php echo $fullname ?></td>
                    <td><?php echo $username ?></td>
                    <!-- <td></td> -->
                    <td>
                        <a href="<?php echo SITEURL; ?>delete_admin.php?id=<?php echo $id; ?>" class="delete">delete</a>
                        <a href="<?php  echo SITEURL;?>update_admin.php?id=<?php echo $id ?>" class="success">edit</a>
                        <a href="<?php echo SITEURL; ?>change_psw.php?id=<?php echo $id ?>" class="primary">change password</a>
                    </td>
                    <!-- <td>$320,800</td> -->
                </tr>
            <?php
        };
       
    }
}

?>
       
    </tbody>

</table>
<!--end datatable html -->



<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" ></script> -->
 <!-- <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script> -->
 <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });

    // bootstrap js

    // let add_admin = document.getElementById('add_admin');
    // let form = document.querySelector('.form');
    // let close = document.querySelector('.close');
    // let body = document.querySelector('body')
    // add_admin.addEventListener('click', ()=>{
    //     // console.log('hello world')
    //     form.classList.add('active');
    //     body.classList.add('overflow')
    // })
    // close.addEventListener('click',()=>{
    //     form.classList.remove('active');
    //     body.classList.remove('overflow')
    // })

    let userExists = document.getElementById('userExists');
    let added = document.getElementById('added');
    let update = document.getElementById('update');
    let password = document.getElementById('password');
    let admindeleted = document.getElementById('admindeleted');
    window.addEventListener('load', ()=>{
        userExists.classList.add('active');
    })
    window.addEventListener('load', ()=>{
        added.classList.add('active');
    })
    window.addEventListener('load', ()=>{
        password.classList.add('active');
    })
    window.addEventListener('load', ()=>{
        admindeleted.classList.add('active');
    })
    window.addEventListener('load', ()=>{
        update.classList.add('active');
    })
    setTimeout(()=> userExists.remove(), 3000);   
    setTimeout(()=> update.remove(), 3000);   
    setTimeout(()=> added.remove(), 3000);   
    setTimeout(()=> admindeleted.remove(), 3000);   
    setTimeout(()=> password.remove(), 3000);   
</script>
</body>
</html>

