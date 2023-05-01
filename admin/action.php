<?php
include('config.php');
if(!empty($_POST["classid"])) 
{
 $cid=intval($_POST['classid']);
 if(!is_numeric($cid)){
 
 	echo htmlentities("invalid Class");exit;
 }
 else{
 $stmt = $dbh->prepare("SELECT student_name,studentId FROM tbl_student WHERE class_id= :id order by student_name");
 $stmt->execute(array(':id' => $cid));
 ?><option value="">Select Student </option><?php
 while($row=$stmt->fetch(PDO::FETCH_ASSOC))
 {
  ?>
  <option value="<?php echo htmlentities($row['studentId']); ?>"><?php echo htmlentities($row['student_name']); ?></option>
  <?php
 }
}

}

// Code for Subjects
if(!empty($_POST["classid1"])) 
{
 $cid1=intval($_POST['classid1']);
 if(!is_numeric($cid1)){
 
  echo htmlentities("invalid Class");exit;
 }
 else{
 $status=0;	
 $stmt = $dbh->prepare("SELECT tbl_subject.subjectName,tbl_subject.id FROM tbl_combination join  tbl_subject on  tbl_subject.id = tbl_combination.SubjectId WHERE tbl_combination.ClassId=:cid and tbl_combination.status!=:stts order by tbl_subject.subjectName");
 $stmt->execute(array(':cid' => $cid1,':stts' => $status));
 
 while($row=$stmt->fetch(PDO::FETCH_ASSOC))
 {?>
  <p><span class="label"> <?php echo htmlentities($row['subjectName']); ?></span><input type="text"  name="marks[]" value="" class="form-control" required="" placeholder="Enter marks out of 100" autocomplete="off"></p>
  
<?php  }
}
}


?>

<?php

if(!empty($_POST["studclass"])) 
{
 $id= $_POST['studclass'];
 $dta=explode("$",$id);
$id=$dta[0];
$id1=$dta[1];
 $query = $dbh->prepare("SELECT stdntsId,ClassId FROM tbl_result WHERE stdntsId=:id1 and ClassId=:id ");
//$query= $dbh -> prepare($sql);
$query-> bindParam(':id1', $id1, PDO::PARAM_STR);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{ ?>
<p>
<?php
echo "<span style='color:red'> Result Already Declare .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
 ?></p>
<?php }


  }?>


