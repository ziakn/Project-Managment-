<?php
session_start(); 
include('fypautomationconnection.php');

// these data came from supervisor.php page ,, when click on add button in popup modal...

$name=mysql_real_escape_string($_POST['name']);
$program=mysql_real_escape_string($_POST['program']);
$section=mysql_real_escape_string($_POST['section']);
$title=mysql_real_escape_string($_POST['title']);
$description=mysql_real_escape_string($_POST['description']);
$area=mysql_real_escape_string($_POST['area']);
$pre_requisite=mysql_real_escape_string($_POST['pre_requisite']);
// these attribute get the data for priority supervisors...
$firstsupervisorid=mysql_real_escape_string($_POST['firstsupervisor']);
 $secondsupervisorid=mysql_real_escape_string($_POST['secondsupervisor']);
 $thirdsupervisorid=mysql_real_escape_string($_POST['thirdsupervisor']);

$adminid=$_SESSION['admin_id'];  
                                     // forein key of admin table in student table...
if($firstsupervisorid=='')
{
	echo "<script>

alert('select your firstsupervisor');
window.location.href='studentproject.php';
</script>";
}
elseif($secondsupervisorid=='')
{
	echo "<script>

alert('select your second supervisor');
window.location.href='studentproject.php';
</script>";
}
elseif($firstsupervisorid=='')
{
	echo "<script>

alert('select your thirdsupervisor');
window.location.href='studentproject.php';
</script>";
}
elseif($firstsupervisorid==$secondsupervisorid)
{
echo "<script>

alert('your ist and second supervisor  is same');
window.location.href='studentproject.php';
</script>";
}
elseif($firstsupervisorid==$thirdsupervisorid)
{
echo "<script>

alert('your ist and third supervisor  is same');
window.location.href='studentproject.php';
</script>";
}
elseif($secondsupervisorid==$thirdsupervisorid)
{
echo "<script>

alert('your second and third supervisor  is same');
window.location.href='studentproject.php';
</script>";
}


elseif(!empty($name&&$program&&$section&&$title&&$description&&$area&&$pre_requisite&&$adminid&&$firstsupervisorid&&$secondsupervisorid&&$thirdsupervisorid))                      // half data will be insert in student table and the remainig will be insert in project table....
{
mysql_query("INSERT INTO student(student_name,program,section,title,description,area,pre_requisite,admin_id)VALUES('$name',' $program','$section','$title','$description','$area','$pre_requisite','$adminid')");
  
 $studentid = mysql_insert_id();
 
mysql_query("INSERT INTO prefrenceone(supervisor_id1,student_id1,admin_id1,status1,reason1)VALUES('$firstsupervisorid','$studentid','$adminid',NULL,'')");
mysql_query("INSERT INTO prefrencetwo(supervisor_id2,student_id2,admin_id2,status2,reason2)VALUES('$secondsupervisorid','$studentid','$adminid',NULL,'')");
mysql_query("INSERT INTO prefrencethree(supervisor_id3,student_id3,admin_id3,status3,reason3)VALUES('$thirdsupervisorid','$studentid','$adminid',NULL,'')");
echo "<script>

alert('A new student project has been added');
window.location.href='studentproject.php';
</script>";
}
 
// header("location:studentproject.php");






















//the else statmnt is to retreive data while coordinaotr click on the supervisor link in sidebar menu...
session_close();
?>