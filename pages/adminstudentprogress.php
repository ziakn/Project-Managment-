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
        <?php  $_SESSION['admin_id']; ?>
        <?php  $_SESSION['user_name']; ?>
        <?php  $_SESSION['supervisor_id']; ?>
       <?php  
         $studentid=mysql_real_escape_string($_POST['student_id']); 
                    $studentidd = $_SESSION['si'];
        ?>
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
                    <h1 class="page-header">Student Progress</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    






                       <!-- this condition is to use for to get student id-->
                    <?php

                    if (!empty($studentid))   // outer if
                    { 
                                        // this is the query for student to rereive total marks of the student .. if marks is greater then zero it will lock the all the tasks ..  
                                    $result=mysql_query("SELECT total_marks  FROM totalmark WHERE student_id = '$studentid'");
                                   while($row = mysql_fetch_array($result))
                                      
                                      {     // these id is retreive for total marks
                                            
                                             $totalmark= $row["total_marks"];
                                             
                                          }
                        // if marks is greter then 0 the go to if condition..
                      if($totalmark>0)     // inner if
                      {?>
                          <div class="panel panel-default">
                        <div class="panel-heading">
                            Here is a student project progress detail...
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#home" data-toggle="tab">Meeting</a>
                                </li>
                                <li><a href="#profile" data-toggle="tab">Tasks</a>
                                </li>
                                <li><a href="#messages" data-toggle="tab">Marks</a>
                                </li>
                                <li><a href="#settings" data-toggle="tab">Settings</a>
                                </li>
                            </ul>
                                            <!-- the below two queries is to solve the latest maximum task progress of student....-->
                             <?php
                                    $result=mysql_query("SELECT Max(studentprogress_id) AS studentprogress_id , student_id  FROM studentprogress WHERE student_id = '$studentid' ");
                                   while($row = mysql_fetch_array($result))
                                      
                                      {     // these id is retreive for max id..
                                             $e= $row["studentprogress_id"];
                                             $v= $row["student_id"];
                                            
                                          }

                                           $result=mysql_query("SELECT * FROM studentprogress WHERE studentprogress_id = '$e' ");
                                           $row = mysql_fetch_array($result);
                                           if($row!==false)
                                           {
                                                 $studentprogressid= $row["studentprogress_id"];
                                              $vt= $row["student_id"];
                                              $q= $row["supervisor_id"];
                                              $task= $row["task"];
                                              $st= $row["taskdate"];
                                              // the below two are to reararnge the date formate in sequance...
                                             $vr=strtotime($st);
                                             $date=date('d/m/Y',$vr);
                                           }
                                        ?>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home">
                                    <!-- expiry date alert -->
                                    <div class="alert alert-info">
                                <!-- Id demo is diplaying date in javascript coding below in the page -->
                                    <p align="center"><div class="clock" style="margin:2em;"></div></p> 
                                     </div>

                                    <p>
                                        <!-- this is the coding for tab panel in which we retreive latest meeting for the student until  it expires -->
                               
                                        <form action="adminstudentprogressupdate.php" method="POST">
                                                    
                                                    <input type="hidden" name="studentid"   value="<?php echo $studentid ?>">
                                                    <input type="hidden" name="studentprogressid"   value="<?php echo $studentprogressid ?>">
                                                    
                                                    <div class="form-group">
                                                      <label for="em" class="control-label">Meeting : </label>
                                                      <div class="input-group">
                                                   <input type="text"  value="<?php echo $date ?>" disabled class="form-control"  name="taskdate" >
                                                      <span class="input-group-addon"><div class="glyphicon glyphicon-calendar"></div></span></div>
                                                    <div class="form-group">
                                                      <label for="text">Task is : </label>
                                                      <input type="text" value="<?php echo $task ?>" disabled class="form-control" id="text">
                                                    </div>
                                                    <div class="form-group">
                                                      <label for="Percentage">Task completed : (%) </label>
                                                      <input type="percentage" required disabled class="form-control" id="percentage" placeholder="Percentage %%%%%%" name="percentage">
                                                    </div>
                                                    <button type="submit" class="btn btn-outline btn-primary">Submit</button>
                                                    </div>                 
                                        </form>
                                       
                                    </p>







                                    <!-- these coding for to assign9ng new task -->
                                       <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Assign New Meeting</a>
                                        </h4>
                                    </div>

                                    <!-- these coding for to assign9ng new task -->
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                           <form action="adminstudenttaskprogress.php" method="POST">

                                              <div class="form-group">
                                                  <label for="email">Next Meeting:</label>
                                                  <div class="input-group">
                                               <input type="date" disabled required class="form-control" name="date" >
                                                  <span class="input-group-addon"><div class="glyphicon glyphicon-calendar"></div></span> </div>
                                                </div>
                                               <div class="form-group">
                                                  <label for="assigntask">Assign Task:</label>
                                                  <textarea type="assigntask" disabled required class="form-control" name="assigntask"></textarea>
                                                </div>
                                                <div class="form-group">
                                                  <label for="assigntask">Student_Id:</label>
                                                  <input type="hidden" value="<?php echo $studentid ?>"  class="form-control" name="student_id">
                                                </div>
                                                <button type="submit" class="btn btn-outline btn-primary ">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="tab-pane fade" id="profile">
                                    <h4>Tasks</h4>
                                      result has uploaded in ist
                                    <?php
                                    $result=mysql_query("SELECT * FROM studentprogress WHERE student_id='$studentid'");
                                           while($row = mysql_fetch_array($result))
                                           
                                           {?>
                                                    <?php
                                                          $et= $row["studentprogress_id"];
                                                          $vt= $row["student_id"];
                                                          $q= $row["supervisor_id"];
                                                          $vw= $row["task"];
                                                          $st= $row["taskdate"];
                                                          $taskmark= $row["task_mark"];
                                                         $vr=strtotime($st);
                                                         $date=date('d/m/Y',$vr);
                                                         $percentage= $row["task_percentage"];
                                                         $taskcompletedate= $row["task_completedate"];
                                                        $taskcomplete=strtotime($taskcompletedate);
                                                         $taskcompleteda=date('d/m/Y',$taskcomplete);
                                                      ?>
                                             <div class="well">
                                                <table width=100%>
                                                <tr>
                                                  <th width="20%">Task Detail :</th>
                                                  <td><?php echo $vw ; ?></td>
                                                </tr>
                                                <tr>
                                                  <th width="20%">Issue Date :</th>
                                                  <td><?php echo $date ; ?></td>
                                                </tr>
                                                <tr>
                                                  <th width="20%">Submit Date :</th>
                                                  <td><?php echo $taskcompleteda ; ?></td>
                                                </tr>
                                                 <tr>
                                                  <th width="20%">Task Marks :</th>
                                                  <td><?php echo $taskmark ; ?></td>
                                                </tr>
                                                <tr>
                                                   
                                                    
                                                  <div>
                                                    <p>
                                                        
                                                        <span class="pull-right text-muted"><?php echo $percentage?>% Complete</span>
                                                    </p>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percentage?>%">
                                                            <span class="sr-only">20% Complete</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                </tr>
                                              </table>

                                               
                                            </div>
                                          
                                             
                                          <?php
                                           
                                           }
                                           ?>
                                    
                                         
                                </div>
                                <div class="tab-pane fade" id="messages">
                                    <h4>Messages Tab</h4>
                                    <p>Total marks will be dislpay here</p>
                                </div>
                                <div class="tab-pane fade" id="settings">
                                    <h4>Settings Tab</h4>
                                    <p>Dont know what to do</p>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                   
                    </div>
                      
                     <?php }  // inner if close
                     
                      else   // inner else
                        { ?>

                        <div class="panel panel-default">
                        <div class="panel-heading">
                            Here is a student project progress detail...
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#home" data-toggle="tab">Meeting</a>
                                </li>
                                <li><a href="#profile" data-toggle="tab">Tasks</a>
                                </li>
                                <li><a href="#messages" data-toggle="tab">Marks</a>
                                </li>
                                <li><a href="#settings" data-toggle="tab">Settings</a>
                                </li>
                            </ul>
                                            <!-- the below two queries is to solve the latest maximum task progress of student....-->
                             <?php
                                    $result=mysql_query("SELECT Max(studentprogress_id) AS studentprogress_id , student_id  FROM studentprogress WHERE student_id = '$studentid' ");
                                   while($row = mysql_fetch_array($result))
                                      
                                      {     // these id is retreive for max id..
                                             $e= $row["studentprogress_id"];
                                             $v= $row["student_id"];
                                            
                                          }

                                           $result=mysql_query("SELECT * FROM studentprogress WHERE studentprogress_id = '$e' ");
                                           $row = mysql_fetch_array($result);
                                           if($row!==false)
                                           {
                                                 $studentprogressid= $row["studentprogress_id"];
                                              $vt= $row["student_id"];
                                              $q= $row["supervisor_id"];
                                              $task= $row["task"];
                                              $st= $row["taskdate"];
                                              // the below two are to reararnge the date formate in sequance...
                                             $vr=strtotime($st);
                                             $date=date('d/m/Y',$vr);
                                           }
                                        ?>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home">
                                    <!-- expiry date alert -->
                                    <div class="alert alert-info">
                                <!-- Id demo is diplaying date in javascript coding below in the page -->
                                    <p align="center"><div class="clock" style="margin:2em;"></div></p> 
                                     </div>

                                    <p>
                                        <!-- this is the coding for tab panel in which we retreive latest meeting for the student until  it expires -->
                               
                                        <form action="adminstudentprogressupdate.php" method="POST">
                                                    
                                                    <input type="hidden" name="studentid"   value="<?php echo $studentid ?>">
                                                    <input type="hidden" name="studentprogressid"   value="<?php echo $studentprogressid ?>">
                                                    
                                                    <div class="form-group">
                                                      <label for="em" class="control-label">Meeting : </label>
                                                      <div class="input-group">
                                                   <input type="text"  value="<?php echo $date ?>" disabled class="form-control"  name="taskdate" >
                                                      <span class="input-group-addon"><div class="glyphicon glyphicon-calendar"></div></span></div>
                                                    <div class="form-group">
                                                      <label for="text">Task is : </label>
                                                      <input type="text" value="<?php echo $task ?>"  class="form-control" id="text">
                                                    </div>
                                                    <div class="form-group">
                                                      <label for="Percentage">Task completed : (%) </label>
                                                      <input type="percentage" required  class="form-control" id="percentage" placeholder="Percentage %%%%%%" name="percentage">
                                                    </div>
                                                    <button type="submit" class="btn btn-outline btn-primary">Submit</button>
                                                    </div>                 
                                        </form>
                                       
                                    </p>







                                    <!-- these coding for to assign9ng new task -->
                                       <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Assign New Meeting</a>
                                        </h4>
                                    </div>

                                    <!-- these coding for to assign9ng new task -->
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                           <form action="adminstudenttaskprogress.php" method="POST">

                                              <div class="form-group">
                                                  <label for="email">Next Meeting:</label>
                                                  <div class="input-group">
                                               <input type="date" required class="form-control" name="date" >
                                                  <span class="input-group-addon"><div class="glyphicon glyphicon-calendar"></div></span> </div>
                                                </div>
                                               <div class="form-group">
                                                  <label for="assigntask">Assign Task:</label>
                                                  <textarea type="assigntask" required class="form-control" name="assigntask"></textarea>
                                                </div>
                                                <div class="form-group">
                                                  <label for="assigntask">Student_Id:</label>
                                                  <input type="hidden" value="<?php echo $studentid ?>"  class="form-control" name="student_id">
                                                </div>
                                                <button type="submit" class="btn btn-outline btn-primary ">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="tab-pane fade" id="profile">
                                    <h4>Tasks</h4>
                                          <!-- the coding in modal below is to submitt the final marks for the student and the lock-->
                                    <button class="btn btn-outline btn-info" data-toggle="modal"  data-target="#markModal-<?php echo $studentid ?>">Submit Marks</button>  <!--edit buuton-->

                                      <!-- Modal -->
                                          <div class="modal fade" id="markModal-<?php echo $studentid ?>" tabindex="-1" role="dialog" >   <!--edit modal-->
                                              <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                      <div class="modal-header">
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                                                          <h4 class="modal-title" id="editLabel-<?php echo $studentid ?>"></h4>
                                                          
                                                           &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                          <img src="exclamation-mark" alt="Mountain View" width="200" height="200"></i>
                                                      </br></br>
                                                      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                                                          <b><font size="6">Are you sure ?</font></b>
                                                          </br></br>
                                                          &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                          Once Submitted, You can not assign any task to student,, task should be locked..
                                                          
                                                          <form action="admintotalmarks.php" method="POST">
                                                            <div class="modal-body">
                                                                                          <input type="hidden" name="student_id"  id="<?php echo $studentid ?>" value="<?php echo $studentid ?>"> 
                                                                                                  
                                                                                                      <div class="modal-footer">
                                                                                                       <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                                                                      <button type="submit" class="btn btn-warning">Yes, Submit Marks!</button>

                                                                                               </div>
                                                                                              
                                                            </div>
                                                        </form>

                                                      </div>
                                                        </div>
                                            </div>
                                          </div>
                                    
                                    <?php
                                    $result=mysql_query("SELECT * FROM studentprogress WHERE student_id='$studentid'");
                                           while($row = mysql_fetch_array($result))
                                           
                                           {?>
                                                    <?php
                                                          $et= $row["studentprogress_id"];
                                                          $vt= $row["student_id"];
                                                          $q= $row["supervisor_id"];
                                                          $vw= $row["task"];
                                                          $st= $row["taskdate"];
                                                          $taskmark= $row["task_mark"];
                                                         $vr=strtotime($st);
                                                         $date=date('d/m/Y',$vr);
                                                         $percentage= $row["task_percentage"];
                                                         $taskcompletedate= $row["task_completedate"];
                                                        $taskcomplete=strtotime($taskcompletedate);
                                                         $taskcompleteda=date('d/m/Y',$taskcomplete);
                                                      ?>
                                             <div class="well">
                                                <table width=100%>
                                                <tr>
                                                  <th width="20%">Task Detail :</th>
                                                  <td><?php echo $vw ; ?></td>
                                                </tr>
                                                <tr>
                                                  <th width="20%">Issue Date :</th>
                                                  <td><?php echo $date ; ?></td>
                                                </tr>
                                                <tr>
                                                  <th width="20%">Submit Date :</th>
                                                  <td><?php echo $taskcompleteda ; ?></td>
                                                </tr>
                                                 <tr>
                                                  <th width="20%">Task Marks :</th>
                                                  <td><?php echo $taskmark ; ?></td>
                                                </tr>
                                                <tr>
                                                   
                                                    
                                                  <div>
                                                    <p>
                                                        
                                                        <span class="pull-right text-muted"><?php echo $percentage?>% Complete</span>
                                                    </p>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percentage?>%">
                                                            <span class="sr-only">20% Complete</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                </tr>
                                              </table>

                                               
                                            </div>
                                          
                                             
                                          <?php
                                           
                                           }
                                           ?>
                                    
                                         
                                </div>
                                <div class="tab-pane fade" id="messages">
                                    <h4>Messages Tab</h4>
                                    <p>Total marks will be dislpay here</p>
                                </div>
                                <div class="tab-pane fade" id="settings">
                                    <h4>Settings Tab</h4>
                                    <p>Dont know what to do</p>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                   
                    </div>
                    <?php    
                    } // inner else close
                     }  // outer if close
























                     //this condition is use for to get seesion id from task update page after expire the above if condition...
                   else   // outer else
                    { 
                            // this is the query for student to rereive total marks of the student .. if marks is greater then zero it will lock the all the tasks ..  
                                    $result=mysql_query("SELECT total_marks  FROM totalmark WHERE student_id = '$studentidd'");
                                   while($row = mysql_fetch_array($result))
                                      
                                      {     // these id is retreive for total marks
                                            
                                             $totalmark= $row["total_marks"];
                                             
                                          }
                        // if marks is greter then 0 the go to if condition..
                      if($totalmark>0)     // inner if in else portion
                      {?>

                        <div class="panel panel-default">
                        <div class="panel-heading">
                            Here is a student project progress detail...
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#home" data-toggle="tab">Meeting</a>
                                </li>
                                <li><a href="#profile" data-toggle="tab">Tasks</a>
                                </li>
                                <li><a href="#messages" data-toggle="tab">Marks</a>
                                </li>
                                <li><a href="#settings" data-toggle="tab">Settings</a>
                                </li>
                            </ul>
                                            <!-- the below two queries is to solve the latest maximum task progress of student....-->
                             <?php
                                    $result=mysql_query("SELECT Max(studentprogress_id) AS studentprogress_id , student_id  FROM studentprogress WHERE student_id = '$studentidd' ");
                                   while($row = mysql_fetch_array($result))
                                      
                                      {     // these id is retreive for max id..
                                             $e= $row["studentprogress_id"];
                                             $v= $row["student_id"];
                                            
                                          }
                                           $result=mysql_query("SELECT * FROM studentprogress WHERE studentprogress_id = '$e' ");
                                           $row = mysql_fetch_array($result);
                                           if($row!==false)
                                           {
                                                 $studentprogressid= $row["studentprogress_id"];
                                              $vt= $row["student_id"];
                                              $q= $row["supervisor_id"];
                                              $task= $row["task"];
                                              $st= $row["taskdate"];
                                              // the below two are to reararnge the date formate in sequance...
                                             $vr=strtotime($st);
                                             $date=date('d/m/Y',$vr);
                                           }
                                        ?>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home">
                                    <!-- expiry date alert -->
                                    <div class="alert alert-info">
                                <!-- Id demo is diplaying date in javascript coding below in the page -->
                                    <h1><div class="clock" style="margin:2em;"></div></h1> 
                                     </div>

                                    <p>
                                        <!-- this is the coding for tab panel in which we retreive latest meeting for the student until  it expires -->
                               
                                        <form action="adminstudentprogressupdate.php" method="POST">
                                                    
                                                    <input type="hidden" name="studentid"   value="<?php echo $studentidd ?>">
                                                    <input type="hidden" name="studentprogressid"   value="<?php echo $studentprogressid ?>">
                                                    
                                                    <div class="form-group">
                                                      <label for="em" class="control-label">Meeting : </label>
                                                      <div class="input-group">
                                                   <input type="text"  value="<?php echo $date ?>" disabled class="form-control"  name="taskdate" >
                                                      <span class="input-group-addon"><div class="glyphicon glyphicon-calendar"></div></span></div>
                                                    <div class="form-group">
                                                      <label for="text">Task is : </label>
                                                      <input type="text" value="<?php echo $task ?>" disabled class="form-control" id="text">
                                                    </div>
                                                    <div class="form-group">
                                                      <label for="Percentage">Task completed : (%) </label>
                                                      <input type="percentage" required disabled class="form-control" id="percentage" placeholder="Percentage %%%%%%" name="percentage">
                                                    </div>
                                                    <button type="submit" class="btn btn-outline btn-primary">Submit</button>
                                                    </div>                 
                                        </form>
                                       
                                    </p>







                                    <!-- these coding for to assign9ng new task -->
                                       <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Assign New Meeting</a>
                                        </h4>
                                    </div>

                                    <!-- these coding for to assign9ng new task -->
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                           <form action="adminstudenttaskprogress.php" method="POST">

                                              <div class="form-group">
                                                  <label for="email">Next Meeting:</label>
                                                  <div class="input-group">
                                               <input type="date" required disabled class="form-control" name="date" >
                                                  <span class="input-group-addon"><div class="glyphicon glyphicon-calendar"></div></span> </div>
                                                </div>
                                               <div class="form-group">
                                                  <label for="assigntask">Assign Task:</label>
                                                  <textarea type="assigntask" required disabled class="form-control" name="assigntask"></textarea>
                                                </div>
                                                <div class="form-group">
                                                  <label for="assigntask">Student_Id:</label>
                                                  <input type="hidden"  value="<?php echo $studentidd ?>"  class="form-control" name="student_id">
                                                </div>
                                                <button type="submit" class="btn btn-outline btn-primary ">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="tab-pane fade" id="profile">
                                    <h4>Tasks</h4>
                                      resluut has been uploaded...
                                    <?php
                                    $result=mysql_query("SELECT * FROM studentprogress WHERE student_id='$studentidd'");
                                           while($row = mysql_fetch_array($result))
                                           
                                           {?>

                                             <div class="well">
                                                
                                                    
                                                        <!--Each table column is echoed in to a td cell-->
                                              
                                                          <?php
                                                          $et= $row["studentprogress_id"];
                                                          $vt= $row["student_id"];
                                                          $q= $row["supervisor_id"];
                                                          $vw= $row["task"];
                                                          $st= $row["taskdate"];
                                                          $taskmark= $row["task_mark"];
                                                         $vr=strtotime($st);
                                                         $date=date('d/m/Y',$vr);
                                                         $percentage= $row["task_percentage"];
                                                         $taskcompletedate= $row["task_completedate"];
                                                        $taskcomplete=strtotime($taskcompletedate);
                                                         $taskcompleteda=date('d/m/Y',$taskcomplete);
                                                         ?>
                                                    <table width=100%>
                                                <tr>
                                                  <th width="20%">Task Detail :</th>
                                                  <td><?php echo $vw ; ?></td>
                                                </tr>
                                                <tr>
                                                  <th width="20%">Issue Date :</th>
                                                  <td><?php echo $date ; ?></td>
                                                </tr>
                                                <tr>
                                                  <th width="20%">Submit Date :</th>
                                                  <td><?php echo $taskcompleteda ; ?></td>
                                                </tr>
                                                 <tr>
                                                  <th width="20%">Task Marks :</th>
                                                  <td><?php echo $taskmark ; ?></td>
                                                </tr>
                                                <tr>
                                                   
                                                    
                                                  <div>
                                                    <p>
                                                        
                                                        <span class="pull-right text-muted"><?php echo $percentage?>% Complete</span>
                                                    </p>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percentage?>%">
                                                            <span class="sr-only">20% Complete</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                </tr>
                                              </table>
                                            </div>
                                          <?php
                                           
                                           }
                                           ?>
                                           
                                    
                                <div class="tab-pane fade" id="messages">
                                    <h4>Messages Tab</h4>
                                    <p>Total marks will be dislpay here</p>
                                </div>
                                <div class="tab-pane fade" id="settings">
                                    <h4>Settings Tab</h4>
                                    <p>Dont know what to do</p>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                   
                    </div>
                         
                    </div>
                    <!-- /.panel -->


                         <?php  } //inner if close in else portion



                          else           // inner else in else portion
                          { ?>
                                <div class="panel panel-default">
                        <div class="panel-heading">
                            Here is a student project progress detail...
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#home" data-toggle="tab">Meeting</a>
                                </li>
                                <li><a href="#profile" data-toggle="tab">Tasks</a>
                                </li>
                                <li><a href="#messages" data-toggle="tab">Marks</a>
                                </li>
                                <li><a href="#settings" data-toggle="tab">Settings</a>
                                </li>
                            </ul>
                                            <!-- the below two queries is to solve the latest maximum task progress of student....-->
                             <?php
                                    $result=mysql_query("SELECT Max(studentprogress_id) AS studentprogress_id , student_id  FROM studentprogress WHERE student_id = '$studentidd' ");
                                   while($row = mysql_fetch_array($result))
                                      
                                      {     // these id is retreive for max id..
                                             $e= $row["studentprogress_id"];
                                             $v= $row["student_id"];
                                            
                                          }
                                           $result=mysql_query("SELECT * FROM studentprogress WHERE studentprogress_id = '$e' ");
                                           $row = mysql_fetch_array($result);
                                           if($row!==false)
                                           {
                                                 $studentprogressid= $row["studentprogress_id"];
                                              $vt= $row["student_id"];
                                              $q= $row["supervisor_id"];
                                              $task= $row["task"];
                                              $st= $row["taskdate"];
                                              // the below two are to reararnge the date formate in sequance...
                                             $vr=strtotime($st);
                                             $date=date('d/m/Y',$vr);
                                           }
                                        ?>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home">
                                    <!-- expiry date alert -->
                                    <div class="alert alert-info">
                                <!-- Id demo is diplaying date in javascript coding below in the page -->
                                    <h1><div class="clock" style="margin:2em;"></div></h1> 
                                     </div>

                                    <p>
                                        <!-- this is the coding for tab panel in which we retreive latest meeting for the student until  it expires -->
                               
                                        <form action="adminstudentprogressupdate.php" method="POST">
                                                    
                                                    <input type="hidden" name="studentid"   value="<?php echo $studentidd ?>">
                                                    <input type="hidden" name="studentprogressid"   value="<?php echo $studentprogressid ?>">
                                                    
                                                    <div class="form-group">
                                                      <label for="em" class="control-label">Meeting : </label>
                                                      <div class="input-group">
                                                   <input type="text"  value="<?php echo $date ?>" disabled class="form-control"  name="taskdate" >
                                                      <span class="input-group-addon"><div class="glyphicon glyphicon-calendar"></div></span></div>
                                                    <div class="form-group">
                                                      <label for="text">Task is : </label>
                                                      <input type="text" value="<?php echo $task ?>"  class="form-control" id="text">
                                                    </div>
                                                    <div class="form-group">
                                                      <label for="Percentage">Task completed : (%) </label>
                                                      <input type="percentage" required  class="form-control" id="percentage" placeholder="Percentage %%%%%%" name="percentage">
                                                    </div>
                                                    <button type="submit" class="btn btn-outline btn-primary">Submit</button>
                                                    </div>                 
                                        </form>
                                       
                                    </p>







                                    <!-- these coding for to assign9ng new task -->
                                       <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Assign New Meeting</a>
                                        </h4>
                                    </div>

                                    <!-- these coding for to assign9ng new task -->
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                           <form action="adminstudenttaskprogress.php" method="POST">

                                              <div class="form-group">
                                                  <label for="email">Next Meeting:</label>
                                                  <div class="input-group">
                                               <input type="date" required class="form-control" name="date" >
                                                  <span class="input-group-addon"><div class="glyphicon glyphicon-calendar"></div></span> </div>
                                                </div>
                                               <div class="form-group">
                                                  <label for="assigntask">Assign Task:</label>
                                                  <textarea type="assigntask" required class="form-control" name="assigntask"></textarea>
                                                </div>
                                                <div class="form-group">
                                                  <label for="assigntask">Student_Id:</label>
                                                  <input type="hidden" value="<?php echo $studentidd ?>"  class="form-control" name="student_id">
                                                </div>
                                                <button type="submit" class="btn btn-outline btn-primary ">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="tab-pane fade" id="profile">
                                    <h4>Tasks</h4>
                                      <!-- the coding in modal below is to submitt the final marks for the student and the lock-->
                                    <button class="btn btn-outline btn-info" data-toggle="modal"  data-target="#markModal-<?php echo $studentidd ?>">Submit Marks</button>  <!--edit buuton-->

                                      <!-- Modal -->
                                          <div class="modal fade" id="markModal-<?php echo $studentidd ?>" tabindex="-1" role="dialog" >   <!--edit modal-->
                                              <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                      <div class="modal-header">
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                                                          <h4 class="modal-title" id="editLabel-<?php echo $studentidd ?>"></h4>
                                                          
                                                           &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                          <img src="exclamation-mark" alt="Mountain View" width="200" height="200"></i>
                                                      </br></br>
                                                      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                                                          <b><font size="6">Are you sure ?</font></b>
                                                          </br></br>
                                                          &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                          Once Submitted, You can not assign any task to student,, task should be locked..
                                                          
                                                          <form action="admintotalmarks.php" method="POST">
                                                            <div class="modal-body">
                                                                                          <input type="hidden" name="student_id"  id="<?php echo $studentidd ?>" value="<?php echo $studentidd ?>"> 
                                                                                                  
                                                                                                      <div class="modal-footer">
                                                                                                       <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                                                                      <button type="submit" class="btn btn-warning">Yes, Submit Marks!</button>

                                                                                               </div>
                                                                                              
                                                            </div>
                                                        </form>

                                                      </div>
                                                        </div>
                                            </div>
                                          </div>
                                      
                                    <?php
                                    $result=mysql_query("SELECT * FROM studentprogress WHERE student_id='$studentidd'");
                                           while($row = mysql_fetch_array($result))
                                           
                                           {?>

                                             <div class="well">
                                                
                                                    
                                                        <!--Each table column is echoed in to a td cell-->
                                              
                                                          <?php
                                                          $et= $row["studentprogress_id"];
                                                          $vt= $row["student_id"];
                                                          $q= $row["supervisor_id"];
                                                          $vw= $row["task"];
                                                          $st= $row["taskdate"];
                                                          $taskmark= $row["task_mark"];
                                                         $vr=strtotime($st);
                                                         $date=date('d/m/Y',$vr);
                                                         $percentage= $row["task_percentage"];
                                                         $taskcompletedate= $row["task_completedate"];
                                                        $taskcomplete=strtotime($taskcompletedate);
                                                         $taskcompleteda=date('d/m/Y',$taskcomplete);
                                                         ?>
                                                    <table width=100%>
                                                <tr>
                                                  <th width="20%">Task Detail :</th>
                                                  <td><?php echo $vw ; ?></td>
                                                </tr>
                                                <tr>
                                                  <th width="20%">Issue Date :</th>
                                                  <td><?php echo $date ; ?></td>
                                                </tr>
                                                <tr>
                                                  <th width="20%">Submit Date :</th>
                                                  <td><?php echo $taskcompleteda ; ?></td>
                                                </tr>
                                                 <tr>
                                                  <th width="20%">Task Marks :</th>
                                                  <td><?php echo $taskmark ; ?></td>
                                                </tr>
                                                <tr>
                                                   
                                                    
                                                  <div>
                                                    <p>
                                                        
                                                        <span class="pull-right text-muted"><?php echo $percentage?>% Complete</span>
                                                    </p>
                                                    <div class="progress progress-striped active">
                                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percentage?>%">
                                                            <span class="sr-only">20% Complete</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                </tr>
                                              </table>
                                            </div>
                                          <?php
                                           
                                           }
                                           ?>
                                           
                                    
                                <div class="tab-pane fade" id="messages">
                                    <h4>Messages Tab</h4>
                                    <p>Total marks will be dislpay here</p>
                                </div>
                                <div class="tab-pane fade" id="settings">
                                    <h4>Settings Tab</h4>
                                    <p>Dont know what to do</p>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                   
                    </div>
                          
                    </div>
                    <!-- /.panel -->
                        <?php  }  // else close in else portion
                               }  // outer else close..
                         ?> 





















                            




                            
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


    <!-- the below link are used to flip clock for task completion-->
    <link rel="stylesheet" href="../compiled/flipclock.css">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <script src="../compiled/flipclock.js"></script>  

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
   

    <script type="text/javascript">
      var val = "<?php echo $st ?>";
      var clock;
      
      $(document).ready(function() {
        // Set dates.
        var futureDate  = new Date(val);
        var currentDate = new Date();

        // Calculate the difference in seconds between the future and current date
        var diff = futureDate.getTime() / 1000 - currentDate.getTime() / 1000;

        // Calculate day difference and apply class to .clock for extra digit styling.
        function dayDiff(first, second) {
          return (second-first)/(1000*60*60*24);
        }

        if (dayDiff(currentDate, futureDate) < 100) {
          $('.clock').addClass('twoDayDigits');
        } else {
          $('.clock').addClass('threeDayDigits');
        }

        if(diff < 0) {
          diff = 0;
        }

        // Instantiate a coutdown FlipClock
        clock = $('.clock').FlipClock(diff, {
          clockFace: 'DailyCounter',
          countdown: true
        });
      });
    </script>
    
</body>

</html>


