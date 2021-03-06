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
        <?php  $adminid=$_SESSION['admin_id']; ?>
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
                <a class="navbar-brand" href="index.html">FYP Automation</a>
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
                        <li><a href="adminchangepassword.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
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
                    <h1 class="page-header">Project Progress </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Here is a project list and progress...
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Student Name</th>
                                        <th>Program</th>
                                        <th>Title</th>
                                        <th>Area</th>
                                       <th width="3%">P1</th>
                                      <th width="3%">P2</th>
                                      <th width="3%">P3</th>
                                      <th width="8%">View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                   $adminid=$_SESSION['admin_id'];
    
                                $result=mysql_query("SELECT * FROM student AS st  INNER JOIN prefrenceone AS pone ON st.student_id = pone.student_id1 INNER JOIN prefrencetwo AS ptwo ON st.student_id = ptwo.student_id2 INNER JOIN prefrencethree AS pthree ON st.student_id = pthree.student_id3 Where st.admin_id = '$adminid'  ");
                               while($row = mysql_fetch_array($result))  
                          {  ?>
                            <tr>
                              <td><?php echo $row['student_name'];?></td>
        <td><?php echo $row['program'];?></td>
        <td><?php echo $row['title'];?></td>
        <td><?php echo $row['area'];?></td>
        <td><?php  $s1=$row['status1'];
                if($s1==1)
                {
                  ?>
                  <button type="button" class="btn btn-default"><img src="if_Check_27837" alt="Mountain View" width="20" height="20"></i></button>
               <?php }
               elseif ($s1==NULL) {
                 # code...?>
                 <button type="button" class="btn btn-default"><img src="loading" alt="Mountain View" width="20" height="20"></button>

                 <?php
               }
               elseif($s1==0){
                    ?>
                <button type="button" class="btn btn-default"><img src="if_Remove_27874" alt="Mountain View" width="20" height="20"></button>
               <?php
             }
             elseif($s1==2){
              ?>
              <button type="button" class="btn btn-default"><img src="if_Minus_2125605" alt="Mountain View" width="20" height="20"></button>
             <?php
             }
             elseif($s1==3){
                ?>
              <button type="button" class="btn btn-default"><img src="if_Minus_2125605" alt="Mountain View" width="20" height="20"></button>
             <?php
             }
          ?></td>

       <!--   <td><?php echo $row['supervisor_id2'];?></td> -->
          <td><?php  $s2=$row['status2'];
          if($s2==1)
                {
                  ?>
                  <button type="button" class="btn btn-default"><img src="if_Check_27837" alt="Mountain View" width="20" height="20"></i></button>
               <?php }
               elseif ($s2==NULL) {
                 # code...?>
                 <button type="button" class="btn btn-default"><img src="loading" alt="Mountain View" width="20" height="20"></button>

                 <?php
               }
               elseif($s2==0){
                    ?>
                <button type="button" class="btn btn-default"><img src="if_Remove_27874" alt="Mountain View" width="20" height="20"></button>
               <?php
             }

             elseif($s2==2){
              ?>
              <button type="button" class="btn btn-default"><img src="if_Minus_2125605" alt="Mountain View" width="20" height="20"></button>
             <?php
             }
             elseif($s2==3){
                ?>
              <button type="button" class="btn btn-default"><img src="if_Minus_2125605" alt="Mountain View" width="20" height="20"></button>
             <?php
             }
          ?></td>
         <!--  <td><?php echo $row['supervisor_id3'];?></td>  -->
           <td><?php  $s3=$row['status3'];
            if($s3==1)
                {
                  ?>
                  <button type="button" class="btn btn-default"><img src="if_Check_27837" alt="Mountain View" width="20" height="20"></i></button>
               <?php }
               elseif ($s3==NULL) {
                 # code...?>
                 <button type="button" class="btn btn-default"><img src="loading" alt="Mountain View" width="20" height="20"></button>

                 <?php
               }
               elseif($s3==0){
                    ?>
                <button type="button" class="btn btn-default"><img src="if_Remove_27874" alt="Mountain View" width="20" height="20"></button>
               <?php
             }

             elseif($s3==2){
              ?>
              <button type="button" class="btn btn-default"><img src="if_Minus_2125605" alt="Mountain View" width="20" height="20"></button>
             <?php
             }
             elseif($s3==3){
                ?>
              <button type="button" class="btn btn-default"><img src="if_Minus_2125605" alt="Mountain View" width="20" height="20"></button>
             <?php
             }
           ?></td>
          <!-- here is the codding to view the project detail of the student button-->

           <!-- here is the codding to view the project detail of the student button-->
          <td>
          <a href="projectdetailstatus.php?id=<?php echo $row['student_id'];?>"><button type="button" class="btn btn-outline btn-primary " > <img src="eye" alt="Mountain View" width="20" height="20"></button></a>
          
              
        </td>
    </tr>
                         <?php }  
                          ?>  
                                    </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
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
