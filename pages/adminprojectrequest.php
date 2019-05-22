<?php                                        
session_start();                                // session start for admin
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
        <?php $adminid= $_SESSION['admin_id']; ?>
       <?php $supervisorid=$_SESSION['supervisor_id']; ?>
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
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Project Request</h1>
                    </div>
                    <!-- /.col-lg-12 -->

                </div>
                <!-- /.row -->
            <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Project Request
                            <div class="pull-right">
                                <div class="table-responsive">
            <table class="table table-condensed table-responsive table-user-information ">
                <tbody>

                    <tr>
                    <td>
                            <strong>
                                <span class="glyphicon glyphicon-cloud text-primary"></span>  
                                <!-- these three qureis are use to count the total number of accepted project of a particular supervisor-->
                                <?php 
                                $result=mysql_query("SELECT COUNT(supervisor_id1) AS total FROM prefrenceone WHERE supervisor_id1 ='$supervisorid' AND status1 = 1"); 
                                    $row = mysql_fetch_array($result);
                                    $row1= $row['total'];      
                                    $result=mysql_query("SELECT COUNT(supervisor_id2) AS total FROM prefrencetwo WHERE supervisor_id2 ='$supervisorid' AND status2 = 1");  
                                    $row = mysql_fetch_array($result);
                                    $row2= $row['total'];  
                                    $result=mysql_query("SELECT COUNT(supervisor_id3) AS total FROM prefrencethree WHERE supervisor_id3 ='$supervisorid' AND status3 = 1");
                                    $row = mysql_fetch_array($result);
                                    $row3= $row['total'];  
                                  ?>
                                Accepted Prject :                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                             <?php echo $total=$row1+$row2+$row3; ?>
                        </td>  
                    <td>
                            <strong>
                                <span class="glyphicon glyphicon-cloud text-primary"></span>
                                <!-- these three qureis are use to count the total number of requested project of a particular supervisor-->
                                <?php 
                                $result=mysql_query("SELECT COUNT(supervisor_id1) AS total FROM prefrenceone WHERE supervisor_id1 ='$supervisorid' AND status1 IS NULL"); 
                                    $row = mysql_fetch_array($result);
                                    $row1= $row['total'];      
                                    $result=mysql_query("SELECT COUNT(supervisor_id2) AS total FROM prefrencetwo WHERE supervisor_id2 ='$supervisorid' AND status2 IS NULL");  
                                    $row = mysql_fetch_array($result);
                                    $row2= $row['total'];  
                                    $result=mysql_query("SELECT COUNT(supervisor_id3) AS total FROM prefrencethree WHERE supervisor_id3 ='$supervisorid' AND status3 IS NULL");
                                    $row = mysql_fetch_array($result);
                                    $row3= $row['total'];  
                                  ?>  
                                Total requested Project :                                              
                            </strong>
                        </td>
                        <td class="text-primary">
                              <?php echo $total=$row1+$row2+$row3; ?>  <!-- to reterive total requested project-->
                        </td>
                              
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-asterisk text-primary"></span>
                                First Priority :                                      
                            </strong>
                        </td>
                        <td class="text-primary">
                             <?php 
                              $result=mysql_query("SELECT COUNT(supervisor_id1) AS total FROM prefrenceone WHERE supervisor_id1 ='$supervisorid' AND status1 IS NULL"); // this query is for supervisor to get ist priority student project
                              $row = mysql_fetch_array($result);
                               echo $row1= $row['total'];  ?>     
                        </td>
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-user  text-primary"></span>    
                                Second Priority :                                              
                            </strong>
                        </td>
                        <td class="text-primary" >
                            <?php
                            $result=mysql_query("SELECT COUNT(supervisor_id2) AS total FROM prefrencetwo WHERE supervisor_id2 ='$supervisorid' AND status2 IS NULL");  // this query is for supervisor to get 2nd priority studen project
                            $row = mysql_fetch_array($result);
                             echo $row2= $row['total'];  ?>  
                        </td>
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-cloud text-primary"></span>  
                                Third Priority :                                           
                            </strong>
                        </td>
                        <td class="text-primary">
                           <?php 
                           $result=mysql_query("SELECT COUNT(supervisor_id3) AS total FROM prefrencethree WHERE supervisor_id3 ='$supervisorid' AND status3 IS NULL");// this query is for supervisor to get 3rd priority studen project
                              $row = mysql_fetch_array($result);
                           echo $row3= $row['total'];  ?>  
                        </td>
                    </tr>
                                                       
                </tbody>
            </table>
            </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="morris-area-chart"></div>
                            <?php
   





    // in this condition we retrieve record from ist ist pririty table for loged in supervisor ... 
 if($row1>0)
{

         //   $result=mysql_query("SELECT * FROM prefrencethree WHERE supervisor_id ='$sis' AND status IS NULL");
     $result=mysql_query("SELECT * FROM supervisor AS su  INNER JOIN prefrenceone AS pone ON su.supervisor_id = pone.supervisor_id1 INNER JOIN student AS st ON pone.student_id1=st.student_id INNER JOIN admin AS ad ON su.admin_id=ad.admin_id   Where su.supervisor_id='$supervisorid' AND pone.status1 IS NULL ");
  //   $result=mysql_query("SELECT * FROM supervisor INNER JOIN prefrence ON supervisor.supervisor_id = prefrence.supervisor_id1 RIGHT OUTER JOIN student ON student.student_id = prefrence.student_id Where prefrence.supervisor_id1='$supervisorid' AND prefrence.status1 IS NULL");
   ?>
    <table class="table table-striped table-responsive table-condensed table-bordered ">
    <tr>
      <th >Student Name</th>
      <th >Program</th>
      <th >Title</th>
      <th >Area</th>
      <th colspan="3"> Action </th>
    </tr>
    <?php
    while($row = mysql_fetch_array($result))
    {
    ?>
    <tr>  <!--
        <?php echo $row['prefrenceone_id'];?>    
        <td><?php echo $row['supervisor_id1'];?></td>
        <td><?php echo $row['student_id1'];?></td>
        <td><?php echo $row['admin_id1'];?></td>
       -->
        <td><?php echo $row['student_name'];?></td>
        <td><?php echo $row['program'];?></td>
        <td><?php echo $row['title'];?></td>
        <td><?php echo $row['area'];?></td>
        



           <!-- here is the codding to view the project detail of the student button-->
          <td>
          <button type="button" class="btn btn-outline btn-primary" data-toggle="modal" data-target="#viewModal-<?php echo $row['prefrenceone_id'] ?>" data-toggle="modal"><span class="glyphicon glyphicon-eye-open"></span> View </button>
           <div class="modal fade" id="viewModal-<?php echo $row['prefrenceone_id'] ?>" tabindex="-1" role="dialog" >   <!--edit modal-->
                  <div class="modal-dialog modal-lg " role="document">
                      <div class="modal-content ">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                              <h4 class="modal-title" id="#viewModal-<?php echo $row['prefrenceone_id'] ?>"><?php echo $row['student_name'] ?></h4>
                                    <div class="container bootstrap snippet">
<div class="panel-body inf-content">
    <div class="row">
        <div class="col-md-12">
            <img alt="" style="width:50px;" title="" class="img-circle img-thumbnail isTooltip" src="https://bootdey.com/img/Content/user-453533-fdadfd.png" data-original-title="Usuario"> 
            
        </div>
        <div class="col-md-8">
            <strong><?php echo $row['student_name'] ?></strong><br>
            <div class="table-responsive">
            <table class="table table-condensed table-responsive table-user-information">
                <tbody>
                    
                    <tr>    
                        <td>
                            <strong>
                                   
                                Program :                                            
                            </strong>
                        </td>
                        <td class="text-primary">
                           <?php echo $row['program'] ?> 
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                                 
                                Section :                                               
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo $row['section'] ?> 
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                             
                                 Title :                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo $row['title'] ?> 
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                             
                                 Description :                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo $row['description'] ?> 
                        </td>
                    </tr>


                    <tr>        
                        <td>
                            <strong>
                             
                                Area :                                              
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo $row['area'] ?> 
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                             
                                Pre-Requistie :                                             
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo $row['pre_requisite'] ?>   
                        </td>
                    </tr>
                    
                                                   
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
</div>                                        
                                  <div class="modal-footer">
                                  <button type="submit"  class="btn btn-primary" data-dismiss="modal">Ok</button>
                                   </div>
                                                                  
                            </div>
                      </div>
                  </div>
                </div>
              </div>
              
        </td>



          <!-- here is the codding for accept button-->
            <td>
        <form action="adminprefrenceoneaccept.php" method="POST" > 
          
           <input type="hidden" class="form-control" name="prefrenceone_id" value="<?php echo $row['prefrenceone_id'] ?>" >
            <input type="hidden" class="form-control" name="student_id1" value="<?php echo $row['student_id1'] ?>" >
            <button type="submit" class="btn btn-outline btn-success"><span class="glyphicon glyphicon-ok"></span> Accept</button>
                 </form>
          

          </td>

         
          <td>
        
           <!-- here is the codding for reject button ,, if we click on reject the popup prompt ,, modal code is beloow from reject button-->

            <button class="btn btn-outline btn-info" data-target="#rejectModal-<?php echo $row['prefrenceone_id'] ?>" data-toggle="modal"><span class="glyphicon glyphicon-remove"></span> Reject</button>
           <!-- Modal -->
              <div class="modal fade" id="rejectModal-<?php echo $row['prefrenceone_id'] ?>" tabindex="-1" role="dialog" >   <!--edit modal-->
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                              <h4 class="modal-title" id="rejectLabel-<?php echo $row['prefrenceone_id'] ?>">Give a Reason to a Head</h4>
                              
                              
                              <form action="adminprefrenceonereject.php" method="POST">
                                <div class="modal-body">
                                                              <input type="hidden" name="prefrenceone_id"  id="<?php echo $row['prefrenceone_id'] ?>" value="<?php echo $row['prefrenceone_id'] ?>">
                                                                          <div class="form-group">
                                                                            <label for="re">Reciepent : (Head)</label>
                                                                            <input class="form-control" type="text" disabled="" type="reciepent" name="reciepent"   id="re-<?php echo $row['prefrenceone_id']  ?>" value="<?php echo $row['admin_name'] ?>" >
                                                                          </div>
                                                                          <div class="form-group" required>
                                                                            <label required for="reason">Give a Reason :</label>
                                                                            <textarea required type="reason" name="reason1" rows="7" class="form-control" id="reason-<?php echo $row['prefrenceone_id'] ?>" value="<?php echo $row['reason1'] ?>" ></textarea> 
                                                                          </div>
                                                                          <div class="modal-footer">
                                                                           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                          <button type="submit"  class="btn btn-primary">Send message</button>

                                                                   </div>
                                                                  
                                </div>
                            </form>

                          </div>
                            </div>
                </div>
              </div>
                  
          </td>
    <?php
  }
  ?>
  </table>
  <?php
}










// in this condition we retrieve record from second  pririty table for loged in supervisor ...
else if($row2>0)
{
  
     //   $result=mysql_query("SELECT * FROM prefrencethree WHERE supervisor_id ='$sis' AND status IS NULL");
     $result=mysql_query("SELECT * FROM supervisor AS su  INNER JOIN prefrencetwo AS ptwo ON su.supervisor_id = ptwo.supervisor_id2 INNER JOIN student AS st ON ptwo.student_id2=st.student_id INNER JOIN admin AS ad ON su.admin_id=ad.admin_id  Where su.supervisor_id='$supervisorid' AND ptwo.status2 IS NULL ");
    //  $result=mysql_query("SELECT * FROM supervisor INNER JOIN prefrence ON supervisor.supervisor_id = prefrence.supervisor_id2 INNER JOIN student ON student.student_id = prefrence.student_id Where prefrence.supervisor_id2='$supervisorid' AND prefrence.status2 IS NULL OR prefrence.status1 != 1 OR prefrence.status3 != 1");
   ?>
    <table class="table table-striped table-responsive table-condensed table-bordered ">
    <tr>
      <th >Student Name</th>
      <th >Program</th>
      <th >Title</th>
      <th >Area</th>
      <th colspan="3"> Action </th>
    </tr>
    <?php
    while($row = mysql_fetch_array($result))
    {
    ?>
    <tr>  <!--
        <?php echo $row['prefrenctwo_id'];?>    
        <td><?php echo $row['supervisor_id2'];?></td>
        <td><?php echo $row['student_id2'];?></td>
        <td><?php echo $row['admin_id2'];?></td>
       -->   
        <td><?php echo $row['student_name'];?></td>
        <td><?php echo $row['program'];?></td>
        <td><?php echo $row['title'];?></td>
        <td><?php echo $row['area'];?></td>
        

           <!-- here is the codding to view the project detail of the student button-->
          <td>
          <button type="button" class="btn btn-outline btn-primary" data-toggle="modal" data-target="#viewModal-<?php echo $row['prefrencetwo_id'] ?>" data-toggle="modal"><span class="glyphicon glyphicon-eye-open"></span> View </button>
           <div class="modal fade" id="viewModal-<?php echo $row['prefrencetwo_id'] ?>" tabindex="-1" role="dialog" >   <!--edit modal-->
                  <div class="modal-dialog modal-lg " role="document">
                      <div class="modal-content ">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                              <h4 class="modal-title" id="#viewModal-<?php echo $row['prefrencetwo_id'] ?>"><?php echo $row['student_name'] ?></h4>
                                    <div class="container bootstrap snippet">
<div class="panel-body inf-content">
    <div class="row">
        <div class="col-md-12">
            <img alt="" style="width:50px;" title="" class="img-circle img-thumbnail isTooltip" src="https://bootdey.com/img/Content/user-453533-fdadfd.png" data-original-title="Usuario"> 
            
        </div>
        <div class="col-md-8">
            <strong><?php echo $row['student_name'] ?></strong><br>
            <div class="table-responsive">
            <table class="table table-condensed table-responsive table-user-information">
                <tbody>
                    
                    <tr>    
                        <td>
                            <strong>
                                   
                                Program :                                            
                            </strong>
                        </td>
                        <td class="text-primary">
                           <?php echo $row['program'] ?> 
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                                 
                                Section :                                               
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo $row['section'] ?> 
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                             
                                 Title :                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo $row['title'] ?> 
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                             
                                 Description :                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo $row['description'] ?> 
                        </td>
                    </tr>


                    <tr>        
                        <td>
                            <strong>
                             
                                Area :                                              
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo $row['area'] ?> 
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                             
                                Pre-Requistie :                                             
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo $row['pre_requisite'] ?>   
                        </td>
                    </tr>
                    
                                                   
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
</div>                                        
                                  <div class="modal-footer">
                                  <button type="submit"  class="btn btn-primary" data-dismiss="modal">Ok</button>
                                   </div>
                                                                  
                            </div>
                      </div>
                  </div>
                </div>
              </div>
              
        </td>

        <td>
            <!-- here is the codding for accept button-->

        <form action="adminprefrencetwoaccept.php" method="POST" > 
          
           <input type="hidden" class="form-control" name="prefrencetwo_id" value="<?php echo $row['prefrencetwo_id'] ?>" >
            <input type="hidden" class="form-control" name="student_id2" value="<?php echo $row['student_id2'] ?>" >
            <button type="submit" class="btn btn-outline btn-success"><span class="glyphicon glyphicon-ok"></span> Accept</button>
                 </form>
          

          </td>

         
          <td>
              
           <!-- here is the codding for reject button ,, if we click on reject the popup prompt ,, modal code is beloow from reject button-->

            <button class="btn btn-outline btn-info" data-target="#rejectModal-<?php echo $row['prefrencetwo_id'] ?>" data-toggle="modal"><span class="glyphicon glyphicon-remove"></span> Reject</button>
           <!-- Modal -->
              <div class="modal fade" id="rejectModal-<?php echo $row['prefrencetwo_id'] ?>" tabindex="-1" role="dialog" >   <!--edit modal-->
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                              <h4 class="modal-title" id="rejectLabel-<?php echo $row['prefrencetwo_id'] ?>">Give a Reason to a Head</h4>
                              
                              
                              <form action="adminprefrencetworeject.php" method="POST">
                                <div class="modal-body">
                                                              <input type="hidden" name="prefrencetwo_id"  id="<?php echo $row['prefrencetwo_id'] ?>" value="<?php echo $row['prefrencetwo_id'] ?>">
                                                                          <div class="form-group">
                                                                            <label for="re">Reciepent : (Head)</label>
                                                                            <input type="reciepent" disabled="" name="reciepent"  class="form-control" id="re-<?php echo $row['prefrencetwo_id']  ?>" value="<?php echo $row['admin_name'] ?>">
                                                                          </div>
                                                                          <div class="form-group" required>
                                                                            <label required for="reason">Give a Reason :</label>
                                                                            <textarea type="reason" name="reason2" rows="7" class="form-control" id="reason-<?php echo $row['prefrencetwo_id'] ?>" value="<?php echo $row['reason2'] ?>" ></textarea> 
                                                                          </div>
                                                                          <div class="modal-footer">
                                                                           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                          <button type="submit"  class="btn btn-primary">Send message</button>

                                                                   </div>
                                                                  
                                </div>
                            </form>

                          </div>
                            </div>
                </div>
              </div>
                  
          </td>
    <?php
  }
  ?>
  </table>
  <?php
}













// in this condition we retrieve record from third pririty table for loged in supervisor ...
else if($row3 > 0)
{
    
        //   $result=mysql_query("SELECT * FROM prefrencethree WHERE supervisor_id ='$sis' AND status IS NULL");
     $result=mysql_query("SELECT * FROM supervisor AS su  INNER JOIN prefrencethree AS pthree ON su.supervisor_id = pthree.supervisor_id3 INNER JOIN student AS st ON pthree.student_id3=st.student_id INNER JOIN admin AS ad ON su.admin_id=ad.admin_id   Where su.supervisor_id='$supervisorid' AND pthree.status3 IS NULL");
   ?>
    <table class="table table-striped table-responsive table-condensed table-bordered ">
    <tr>
      <th >Student Name</th>
      <th >Program</th>
      <th >Title</th>
      <th >Area</th>
      <th colspan="3"> Action </th>
    </tr>
    <?php
    while($row = mysql_fetch_array($result))
    {
    ?>
    <tr>  <!--
        <?php echo $row['prefrencthree_id'];?>    
        <td><?php echo $row['supervisor_id3'];?></td>
        <td><?php echo $row['student_id3'];?></td>
        <td><?php echo $row['admin_id3'];?></td>
       -->   
        <td><?php echo $row['student_name'];?></td>
        <td><?php echo $row['program'];?></td>
        <td><?php echo $row['title'];?></td>
        <td><?php echo $row['area'];?></td>
        
        
          <!-- here is the codding to view the project detail of the student button-->
          <td>
          <button type="button" class="btn btn-outline btn-primary" data-toggle="modal" data-target="#viewModal-<?php echo $row['prefrencethree_id'] ?>" data-toggle="modal"><span class="glyphicon glyphicon-eye-open"></span> View </button>
           <div class="modal fade" id="viewModal-<?php echo $row['prefrencethree_id'] ?>" tabindex="-1" role="dialog" >   <!--edit modal-->
                  <div class="modal-dialog modal-lg " role="document">
                      <div class="modal-content ">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                              <h4 class="modal-title" id="#viewModal-<?php echo $row['prefrencethree_id'] ?>"><?php echo $row['student_name'] ?></h4>
                                    <div class="container bootstrap snippet">
<div class="panel-body inf-content">
    <div class="row">
        <div class="col-md-12">
            <img alt="" style="width:50px;" title="" class="img-circle img-thumbnail isTooltip" src="https://bootdey.com/img/Content/user-453533-fdadfd.png" data-original-title="Usuario"> 
            
        </div>
        <div class="col-md-8">
            <strong><?php echo $row['student_name'] ?></strong><br>
            <div class="table-responsive">
            <table class="table table-condensed table-responsive table-user-information">
                <tbody>
                    
                    <tr>    
                        <td>
                            <strong>
                                   
                                Program :                                            
                            </strong>
                        </td>
                        <td class="text-primary">
                           <?php echo $row['program'] ?> 
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                                 
                                Section :                                               
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo $row['section'] ?> 
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                             
                                 Title :                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo $row['title'] ?> 
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                             
                                 Description :                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo $row['description'] ?> 
                        </td>
                    </tr>


                    <tr>        
                        <td>
                            <strong>
                             
                                Area :                                              
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo $row['area'] ?> 
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                             
                                Pre-Requistie :                                             
                            </strong>
                        </td>
                        <td class="text-primary">
                            <?php echo $row['pre_requisite'] ?>   
                        </td>
                    </tr>
                    
                                                   
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
</div>                                        
                                  <div class="modal-footer">
                                  <button type="submit"  class="btn btn-primary" data-dismiss="modal">Ok</button>
                                   </div>
                                                                  
                            </div>
                      </div>
                  </div>
                </div>
              </div>
              
        </td>

            <!-- here is the codding for accept button-->
            <td>
        <form action="adminprefrencethreeaccept.php" method="POST" > 
          
           <input type="hidden" class="form-control" name="prefrencethree_id" value="<?php echo $row['prefrencethree_id'] ?>" >
              <input type="hidden" class="form-control" name="student_id3" value="<?php echo $row['student_id3'] ?>" >
            <button type="submit" class="btn btn-outline btn-success"><span class="glyphicon glyphicon-ok"></span> Accept</button>
                 </form>
          

          </td>

           <!-- here is the codding for reject button ,, if we click on reject the popup prompt ,, modal code is beloow from reject button-->
          <td>
        
            <button class="btn btn-outline btn-info" data-target="#rejectModal-<?php echo $row['prefrencethree_id'] ?>" data-toggle="modal"><span class="glyphicon glyphicon-remove"></span> Reject</button>
           <!-- Modal -->
              <div class="modal fade" id="rejectModal-<?php echo $row['prefrencethree_id'] ?>" tabindex="-1" role="dialog" >   <!--edit modal-->
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                              <h4 class="modal-title" id="rejectLabel-<?php echo $row['prefrencethree_id'] ?>">Give a Reason to a Head</h4>
                              
                              
                              <form action="adminprefrencethreereject.php" method="POST">
                                <div class="modal-body">
                                                              <input type="hidden" name="prefrencethree_id"  id="<?php echo $row['prefrencethree_id'] ?>" value="<?php echo $row['prefrencethree_id'] ?>">
                                                                          <div class="form-group">
                                                                            <label for="re">Reciepent : (Head)</label>
                                                                            <input type="reciepent" disabled="" name="reciepent"  class="form-control" id="re-<?php echo $row['prefrencethree_id']  ?>" value="<?php echo $row['admin_name'] ?>">
                                                                          </div>
                                                                          <div class="form-group" required>
                                                                            <label required for="reason">Give a Reason :</label>
                                                                            <textarea required type="reason" name="reason3" rows="7" class="form-control" id="reason-<?php echo $row['prefrencethree_id'] ?>" value="<?php echo $row['reason3'] ?>" ></textarea> 
                                                                          </div>
                                                                          <div class="modal-footer">
                                                                           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                          <button type="submit"  class="btn btn-primary">Send message</button>

                                                                   </div>
                                                                  
                                </div>
                            </form>

                          </div>
                            </div>
                </div>
              </div>
                  
          </td>
    <?php
  }
  ?>
  </table>
  <?php
}





else
{?>
  no project found

<i class="fa fa-frown-o " style="font-size:200px " align="centre"></i>
<?php }
?>  
                        </div>
                        <!-- /.panel-body -->
                    </div>
            </div>
            <!-- /.container-fluid -->
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

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
