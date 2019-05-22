<?php
session_start(); 
include('fypautomationconnection.php');
 
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.js"></script>
    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
        <?php  $_SESSION['admin_name']; ?>
        <?php  $_SESSION['admin_id']; ?>
        <?php $studentid=$_GET['id']; ?>
    <div id="wrapper">

        <!-- Navigation -->
     <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">IM'Sciences</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <!-- /.dropdown -->
                
                <!-- /.dropdown -->
               
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                               
                                <a  href="#">FYP Automation</a>
                                <span class="input-group-btn">
                                
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="admin.php"><i class="fa fa-dashboard fa-fw"></i> Home</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Supervisors<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="supervisor.php"> <i class="fa fa-list-ol fa-fw"></i> Supervisor List</a>
                                </li>
                                <li>
                                    <a href="supervisorproject.php"><i class="fa fa-tasks fa-fw"></i>Supervisor Project</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="projectprogress.php"><i class="fa fa-table fa-fw"></i>Project Progress</a>
                        </li>
                        <li>
                            <a href="studentproject.php"><i class="fa fa-edit fa-fw"></i> Student Project</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> My Port Folio<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="adminprojectrequest.php">Project Request</a>
                                </li>
                                <li>
                                    <a href="adminmyproject.php">My Project</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="admingradingsystem.php"><i class="fa fa-table fa-fw"></i>Grading System</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Student Progress</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Info Panel
                        </div>
                        <div class="panel-body">
                            <p>
                                        <?php 
                                    $result=mysql_query("SELECT status1 FROM  prefrenceone Where student_id1= '$studentid'");
                                    while($row = mysql_fetch_array($result))
                                    {
                                       $r1=$row['status1'];
                                    }
                                    $result=mysql_query("SELECT status2 FROM  prefrencetwo Where student_id2= '$studentid'");
                                    while($row = mysql_fetch_array($result))
                                    {
                                      $r2=$row['status2'];
                                    }
                                    $result=mysql_query("SELECT status3 FROM  prefrencethree Where student_id3= '$studentid'");
                                    while($row = mysql_fetch_array($result))
                                    {
                                       $r3=$row['status3'];
                                    }
                                     $r1;
                                     $r2;
                                     $r3;
                                    if($r1<>1 AND $r2<>1 AND $r3<>1)
                                    {
                                    ?>

                                    <form action="projectdetailstatusrefrence.php" method="POST">
                                                                            <input type="hidden" class="form-control" name="student_id" value="<?php echo $studentid ?>" >    
                                                                           <select name="supervisor_id" required name="firstsupervisor" class="selectpicker show-menu-arrow show-tick" data-width="70%" data-size="5" data-live-search="true"  data-style="btn btn-outline btn-primary" >
                                                                                                      <option  disabled selected>Select Supervisor </option>

                                                                                                           <?php
                                                                                                       $result=mysql_query("SELECT * FROM supervisor AS su  INNER JOIN prefrenceone AS pone ON su.supervisor_id = pone.supervisor_id1 INNER JOIN student AS st ON pone.student_id1=st.student_id INNER JOIN admin AS ad ON su.admin_id=ad.admin_id Where pone.student_id1= '$studentid'");
                                                                                                    while ($row=mysql_fetch_array($result)) { 
                                                                                                    
                                                                                                   echo "<option value='".$row['supervisor_id']."'>".$row['user_name']."</option>";
                                                                                                     } ?>

                                                                                                     <?php
                                                                                                        $result=mysql_query("SELECT * FROM supervisor AS su  INNER JOIN prefrencetwo AS ptwo ON su.supervisor_id = ptwo.supervisor_id2 INNER JOIN student AS st ON ptwo.student_id2=st.student_id INNER JOIN admin AS ad ON su.admin_id=ad.admin_id Where ptwo.student_id2= '$studentid'");
                                                                                                    while ($row=mysql_fetch_array($result)) { 
                                                                                                    
                                                                                                   echo "<option value='".$row['supervisor_id']."'>".$row['user_name']."</option>";
                                                                                                     } ?>

                                                                                                     <?php
                                                                                                       $result=mysql_query("SELECT * FROM supervisor AS su  INNER JOIN prefrencethree AS pthree ON su.supervisor_id = pthree.supervisor_id3 INNER JOIN student AS st ON pthree.student_id3=st.student_id INNER JOIN admin AS ad ON su.admin_id=ad.admin_id Where pthree.student_id3= '$studentid'");
                                                                                                    while ($row=mysql_fetch_array($result)) { 
                                                                                                    
                                                                                                   echo "<option value='".$row['supervisor_id']."'>".$row['user_name']."</option>";
                                                                                                     } ?>

                                                                                                     </select> 

                                                                                                               
                                                                                              <button type="submit"  class="btn btn-outline btn-primary ">By Force assign</button>
                                                                                   
                                                                            </form>

                                                                              <?php }?> 
                            </p>
                             <div class="col-lg-12">
                    <div class="well well-lg">
                        <h4>Status</h4>
                        <p> <?php $result=mysql_query("SELECT * FROM supervisor AS su  INNER JOIN prefrenceone AS pone ON su.supervisor_id = pone.supervisor_id1 INNER JOIN student AS st ON pone.student_id1=st.student_id INNER JOIN admin AS ad ON su.admin_id=ad.admin_id Where pone.student_id1= '$studentid'");
     
   ?>
    <table class="table table-condensed">
    <td>
      
      
     project title :
      
     
    </td>
    <?php
    while($row = mysql_fetch_array($result))
    {
    ?>
    <td>  <!--
        <?php echo $row['prefrencone_id'];?>    
        <td><?php echo $row['supervisor_id1'];?></td>
        <td><?php echo $row['student_id1'];?></td>
        <td><?php echo $row['admin_id1'];?></td>
       
  -->  <tr>
      <th >Supervisor :</th>
      <td><?php echo $row['user_name'];?></td>
      </tr>
        <tr>
      <th >Status :</th>
      <td><?php $status1= $row['status1'];
            if($status1==1)     //project accepted
            {
                echo "accept";
            }
             elseif($status1==NULL) //  pending
            {
                echo "pending";
            }
            elseif ($status1==0) // project rejected
            {
              echo "reject";
            }
            elseif($status1==2)   // accept by other 
            {
              echo "allready accept by other";
            }
            elseif($status1=3)  // qouta completed
            {
                echo "qouta complete";
            }
           
      ?></td>
      </tr>
      <tr>
      <th >Reason :</th>
      <td><?php echo $row['reason1'];?></td>
      </tr>
        

</td>
    <?php
  }



  ?>

  </table></p>
                    </div>
                </div>
                 <div class="col-lg-12">
                    <div class="well well-lg">
                        <h4>Status</h4>
                        <p>  <?php
       // in this condition we retrieve all the project of student with there supervisor information,, accept and reject status...
                         $studentid=$_GET['id'];
                      //  $supervisorid=18; 
        //  $result=mysql_query("SELECT * FROM supervisor AS su  INNER JOIN prefrenceone AS pone ON su.supervisor_id = pone.supervisor_id1 INNER JOIN student AS st ON pone.student_id1=st.student_id INNER JOIN admin AS ad ON su.admin_id=ad.admin_id1   Where su.supervisor_id='$supervisorid' AND pone.status IS NULL ");
      $result=mysql_query("SELECT * FROM supervisor AS su  INNER JOIN prefrencetwo AS ptwo ON su.supervisor_id = ptwo.supervisor_id2 INNER JOIN student AS st ON ptwo.student_id2=st.student_id INNER JOIN admin AS ad ON su.admin_id=ad.admin_id Where ptwo.student_id2= '$studentid'");
     
   ?>
    <table class="table table-condensed">
    <td>
      
      
     project title :
      
     
    </td>
    <?php
    while($row = mysql_fetch_array($result))
    {
    ?>
    <td>  <!--
        <?php echo $row['prefrencetwo_id'];?>    
        <td><?php echo $row['supervisor_id12'];?></td>
        <td><?php echo $row['student_id2'];?></td>
        <td><?php echo $row['admin_id2'];?></td>
       
  -->  <tr>
      <th >Supervisor :</th>
      <td><?php echo $row['user_name'];?></td>
      </tr>
        <tr>
      <th >Status :</th>
      <td><?php $status2= $row['status2'];
            if($status2==1)     //project accepted
            {
               echo "accept";
            }
            elseif($status2==NULL) //  pending
            {
                echo "pending";
            }
            elseif ($status2==0) // project rejected
            {
             echo "rejectt"; # code...
            }
            elseif($status2==2)   // accept by other 
            {
              echo "allredy accept by other";
            }
            elseif($status2=3)  // qouta completed
            {
              echo "quota complete";
            }
            
      ?></td>
      </tr>
      <tr>
      <th >Reason :</th>
      <td><?php echo $row['reason2'];?></td>
      </tr>
        

</td>
    <?php
  }



  ?>

  </table></p>
                    </div>
                </div>
                 <div class="col-lg-12">
                    <div class="well well-lg">
                        <h4>Status</h4>
                        <p><?php
       // in this condition we retrieve all the project of student with there supervisor information,, accept and reject status...
                         $studentid=$_GET['id'];
                      //  $supervisorid=18; 
        //  $result=mysql_query("SELECT * FROM supervisor AS su  INNER JOIN prefrenceone AS pone ON su.supervisor_id = pone.supervisor_id1 INNER JOIN student AS st ON pone.student_id1=st.student_id INNER JOIN admin AS ad ON su.admin_id=ad.admin_id1   Where su.supervisor_id='$supervisorid' AND pone.status IS NULL ");
      $result=mysql_query("SELECT * FROM supervisor AS su  INNER JOIN prefrencethree AS pthree ON su.supervisor_id = pthree.supervisor_id3 INNER JOIN student AS st ON pthree.student_id3=st.student_id INNER JOIN admin AS ad ON su.admin_id=ad.admin_id Where pthree.student_id3= '$studentid'");
     
   ?>
    <table class="table ">
    <td>
      
      
     project title :
      
     
    </td>
    <?php
    while($row = mysql_fetch_array($result))
    {
    ?>
    <td>  <!--
        <?php echo $row['prefrencethree_id'];?>    
        <td><?php echo $row['supervisor_id13'];?></td>
        <td><?php echo $row['student_id3'];?></td>
        <td><?php echo $row['admin_id3'];?></td>
       
  -->  <tr>
      <th >Supervisor :</th>
      <td><?php echo $row['user_name'];?></td>
      </tr>
        <tr>
      <th >Status :</th>
      <td><?php $status3= $row['status3'];
            if($status3==1)     //project accepted
            {
                echo "accept";
            }
             elseif($status3==NULL) //  pending
            {
                  echo "pending";
            }
            elseif ($status3==0) // project rejected
            {
              echo "reject";# code...
            }
            elseif($status3==2)   // accept by other 
            {
                  echo "allready accept by other";
            }
            elseif($status3=3)  // qouta completed
            {
                echo "qouta complete";
            }
           
      ?></td>
      </tr>
      <tr>
      <th >Reason :</th>
      <td><?php echo $row['reason3'];?></td>
      </tr>
        

</td>
    <?php
  }



  ?>

  </table>
 </p>
                    </div>
                </div>
                        </div>
                        <div class="panel-footer">
                            Panel Footer
                        </div>
                     
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
