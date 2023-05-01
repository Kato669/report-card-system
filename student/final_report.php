<?php
    include_once('../admin/partials/constants.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "select *, className, stream from tbl_student, tbl_classes where tbl_classes.id = tbl_student.class_id and studentId = $id";
        //execute the query
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        if($count == 1){
            $row = mysqli_fetch_assoc($res);
            $sigles = $row['sigles'];
            // echo $sigles;
            // exit;
        }
    }else{
        header('Location: login.php');
    }
?>





<!doctype html>
<html lang="en">
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="final_report.css">
    <link rel="icon" type="image/x-icon" href="../admin/img/logo.png">
  </head>
  <body>
    <section>
      <img src="../admin/img/logo.png" alt="" srcset="" class='img1'>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 head">
            <div class="header">
                <img src="../admin/img/logo.png" alt="" class="rounded">
            </div>
            <div class="header mid">
                <h1 class="text-uppercase">
                    master cares <br> christian school
                </h1>
                <span class="text-uppercase"><b>p.o box 66 - kyotera</b></span>
                <span>tel: +256-392-001226/+256-707-933538/+256-758-325359</span>
                <span>'primary <?php  echo $row['className'] ?>' progressive report</span>
            </div>
            <div class="header">
                <?php 
                 $countmks = 0;
                  $current_image = $row['image'];
                  if($current_image !=''){
                    ?>
                        <!-- <img src="../admin/img/adminlogo.png" alt="" class="img"> -->
                        <img src="<?php echo SITEURL; ?>img/<?php echo $current_image; ?>" alt="" class="img">
                    <?php
                  }else{
                    ?>
                        <img src="../admin/img/adminlogo.png" alt="" class="img">
                    <?php
                  }
                ?>
                
            </div>
        </div>
        
        
        
    </div>
</div>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 biodata">
            <div class="bio">
                <span><b>Student's name: </b></span><span class="text-uppercase pl-3"><?php echo $row['student_name'] ?></span><br>
                <span><b>Position in class:</b></span> <span>47</span> out of <span>
                    <?php
                    // $id = $_GET['id'];
                   
                      $sql1 = "select sigles from tbl_student where sigles='".$row['className']."'";
                      $res1 = mysqli_query($conn, $sql1);
                      
                      $numbers = mysqli_num_rows($res1);
                      echo $numbers;
                       

                    ?>
                </span> pupils <br>
                <span><b>Position in stream:</b> </span><span>47</span> out of <span>
                <?php
                    // $id = $_GET['id'];
                   
                      $sql1 = "select class_id from tbl_student where class_id='".$row['class_id']."'";
                      $res1 = mysqli_query($conn, $sql1);
                      
                      $numbers = mysqli_num_rows($res1);
                      echo $numbers;
                       

                    ?>
                </span> pupils <br>
                
            </div>
            <div class="bio">
                <span><b>Gender:</b> </span><span class="text-uppercase pl-3"><?php echo $row['gender'] ?></span><br>
                <span><b>Class:</b> </span><span style="text-transform: uppercase;"><?php echo $row['className'] ?></span><br>
               
                <span><b>Stream:</b> </span><span class="text-uppercase pl-3"> <?php echo $row['stream'] ?></span>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <span class="subject">core subjects</span>
            <table class="table ">
                <thead>
                  <tr>
                    <th scope="col"><b>SUBJECTS</b></th>
                    <th scope="col" class="text-center"><B>M.O.T <br> (100%)</B></th>
                    <th scope="col" class=""><b>E.O.T <br> (100%)</b></th>
                    <th scope="col" class="text-center"><b>Average</b></th>
                    <th scope="col" class="text-center" style="width: 150px"><b>GRADE</b></th>
                    <th scope="col" class="text-center"><b>REMARKS</b></th>
                    <th scope="col" class="text-center"><b>INITIALS</b></th>
                  </tr>
                </thead>

                  <?php 
                    $select = "select 
                    c.subjectName,
                    c.initials,
                      a.ClassId, 
                      a.SubjectId, 
                      a.stdntsId,
                    a.marks as 'marks', 
                    b.marks_mid as 'mid'
                    from 
                      tbl_results a 
                      join tbl_mid b on a.SubjectId = b.Subject_mid_id
                      and a.ClassId = b.class_mid_id and  a.stdntsId = b.stdnt_mid_id 
                      JOIN tbl_subject c ON a.SubjectId = c.id where a.stdntsId=$id";
                    // $select = "select  from tbl_results";
                    
                    $execute = mysqli_query($conn, $select);
                    $countRows = mysqli_num_rows($execute);
                   
                    if($countRows > 0){
                     
                      $total_marks = 0;
                      $sum = 0;
                      
                      while($fetch = mysqli_fetch_array($execute)){
                        // $countmks++;
                        $avg = round((($fetch['marks'] + $fetch['mid'])/2));
                        $marks = $fetch['marks'];
                        // $marked = 
                       
                        // $sum +=$countmks;
                        ?>
                          <tbody>
                            <tr>
                              <th scope="row" class="text-uppercase">
                                <?php echo $fetch['subjectName'] ?>
                                
                              </th>
                              <td class="text-center" style="width: 80px">
                                <?php echo $fetch['mid'] ?>
                              </td>
                           
                              <td class="text-center" style="width: 80px"><?php echo $marks ?></td>
                              <td class="text-center">
                                <?php
                                 
                                  echo $avg;
                                  $total_marks += $avg;
                                ?>
                              </td>
                              
                              <td class="text-center">
                                <?php
                      

                                  if($avg >= 90){
                                    echo "D1";
                                    $countmks += 1;
                                  }elseif($avg <= 89 && $avg >=85){
                                    echo "D2";
                                    $countmks += 2;
                                  }
                                  elseif($avg <= 84 && $avg >=80){
                                    echo "C3";
                                    $countmks += 3;
                                  }elseif($avg <= 79 && $avg >=75){
                                    echo "C4";
                                    $countmks += 4;
                                  }elseif($avg <= 74 && $avg >=70){
                                    echo "C5";
                                    $countmks += 5;
                                  }elseif($avg <= 69 && $avg >=65){
                                    echo "C6";
                                    $countmks += 6;
                                  }elseif($avg <= 64 && $avg >=60){
                                    echo "P7";
                                    $countmks += 7;
                                  }elseif($avg <= 59 && $avg >=50){
                                    echo "P8";
                                    $countmks += 8;
                                  }else{
                                    echo "F9";
                                    $countmks += 9;
                                  }
                                ?>
                              </td>
                              <td class="" style="width: 150px">
                                <?php
                                  if($avg > 95){
                                    echo "Excellent";
                                  }elseif($avg <=94 && $avg >=85){
                                    echo "Great Job";
                                  }elseif($avg <=84 && $avg >=80){
                                    echo "V.Good";
                                  }elseif($avg <=79 && $avg >=70){
                                    echo "Good";
                                  }
                                  elseif($avg <=69 && $avg >=60){
                                    echo "Good try";
                                  }elseif($avg <=55 && $avg >=59){
                                    echo "You can make it";
                                  }
                                  elseif($avg <=50 && $avg >=54){
                                    echo "Work hard";
                                  }elseif($avg <=40 && $avg >=49){
                                    echo "Aim higher";
                                  }else{
                                    echo "More effort";
                                  }
                                ?>
                              </td>
                              <td class="text-center">
                                <?php echo $fetch['initials'] ?>
                              </td>
                            </tr>
                            
                          
                          </tbody>
                        <?php
                      }
                      ?>
                      <tr>
                        <th>TOTAL</th>
                        
                        <td class="text-center">
                            
                        </td>
                        <td class="text-center">
                          <?php 
                         
                          // $countmks = 0;
                          // echo "Total:"; 
                              // echo $total_marks;
                          ?>
                        </td >
                        <td class="text-center">
                          <b><?php echo $total_marks ?></b>
                        </td>
                        <td class="text-center">
                          <b>AGGR: 
                            <?php echo $countmks ?>
                          </b>
                        </td>
                        <td class="text-center" colspan="2">
                              <b>
                                Grade: <?php
                                  if($countmks < 12){
                                    echo '1';
                                  }elseif($countmks <=25 && $countmks >=13){
                                    echo "2";
                                  }elseif($countmks <=32 && $countmks >=26){
                                    echo "3";
                                  }else{
                                    echo "4";
                                  }
                                ?>
                              </b>
                        </td>
                      </tr>
                      <?php
                      
                    }
                    
                    
                  ?>
                
                
              </table>
        </div>

        
                  
        
    </div>
</div>
<!-- <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <span class="subject">other subjects</span>
            <table class="table ">
                <thead>
                  <tr>
                    <th scope="col"><b>SUBJECTS</b></th>
                    <th scope="col" class="text-center"><B>M.O.T(100%)</B></th>
                    <th scope="col" class="text-center">E.O.T(100%)</th>
                    <th scope="col" class="text-center">GRADE</th>
                    <th scope="col" class="text-center">REMARKS</th>
                    <th scope="col" class="text-center">INITIALS</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">Kiswahili</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row">Agriculture</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row">P.E</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                 
                </tbody>
              </table>
        </div>
    </div>
</div> -->
<br>


<div class="container-fluid">
    <div class="row">
        
        <div class="col-lg-12 biodata">
            <div class="bio">
                <span><b>Class-teacher's comments:</b></span><br>
                 -------------------------
            </div>
            <div class="bio">
                <span><b>Signature</b></span>
                <span>------------------------</span>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        
        <div class="col-lg-12 biodata">
            <div class="bio">
                <span><b>Head-teacher's comments:</b></span><br>
                 <?php
                    if($countmks<8){
                      echo 'Excellent perfomance';
                    }elseif($countmks <=12 && $countmks>=9){
                      echo 'Aim at getting aggregate 4';
                    }elseif($countmks <=15 && $countmks>=13){
                      echo 'Capable of scoring D1';
                    }elseif($countmks <=20 && $countmks>=16){
                      echo 'You can perfom better';
                    }elseif($countmks <=25 && $countmks>=21){
                      echo 'Still need to improve';
                    }else{
                      echo "much effort needed";
                    }
                 ?>
            </div>
            <div class="bio">
                <span><b>Signature and Stamp</b></span>
                <span>------------------------</span>
            </div>
        </div>
    </div>
</div>

<!-- <div class="container-fluid">
    <div class="row">
        <span><b></b></span>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="col-lg-6">
                <div class="comment">
                    <span>
                      ---------------
                    </span>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="comment">
                <span><b></b></span>
                <span>---------------------------</span>
            </div>
        </div>
    </div>
</div> -->
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <span><b><i>Beginning of Next Term: <span style="padding: 0 10px;"></span><span>05/06/2023</span></i></b></span>
        </div>
    </div>
</div>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <span class="text-uppercase"><b>grading:</b></span><br>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">90-100</th>
                    <th scope="col">86-89</th>
                    <th scope="col">80-84</th>
                    <th scope="col">75-79</th>
                    <th scope="col">70-74</th>
                    <th scope="col">65-69</th>
                    <th scope="col">60-64</th>
                    <th scope="col">50-59</th>
                    <th scope="col">0-49</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>D1</td>
                    <td>D2</td>
                    <td>C3</td>
                    <td>C4</td>
                    <td>C5</td>
                    <td>C6</td>
                    <td>P7</td>
                    <td>P8</td>
                    <td>F9</td>
                  </tr>
                  
                </tbody>
              </table>
        </div>
    </div>
</div>
    </section>
    
  </body>
</html>