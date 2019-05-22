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

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">My Project </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Here is a Accepted project list of student...
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
                                        <th width="5%" >Action</th>
                                         <th width="10%" >Progress</th>
                                      
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                     $result=mysql_query("SELECT * FROM supervisor AS su  INNER JOIN prefrenceone AS pone ON su.supervisor_id = pone.supervisor_id1 INNER JOIN student AS st ON pone.student_id1=st.student_id INNER JOIN admin AS ad ON su.admin_id=ad.admin_id Where su.supervisor_id=' $supervisorid' AND pone.status1 = 1");
                                                  while($row = mysql_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["student_name"].'</td>  
                                    <td>'.$row["program"].'</td> 
                                   
                                    <td>'.$row["title"].'</td>  
                                    
                                    <td>'.$row["area"].'</td>  
                                    <td>

                                    <button type="button" class="btn btn-outline btn-primary " data-toggle="modal" data-target="#viewModal-'. $row['prefrenceone_id'] .'" data-toggle="modal"><span class="glyphicon glyphicon-eye-open"></span> View </button>
           <div class="modal fade" id="viewModal-'.$row['prefrenceone_id'].'" tabindex="-1" role="dialog" >   <!--edit modal-->
                  <div class="modal-dialog modal-lg " role="document">
                      <div class="modal-content ">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                              <h4 class="modal-title" id="#viewModal-'.$row['prefrenceone_id'].'">'. $row['student_name'].'</h4>
                                    <div class="container bootstrap snippet">
<div class="panel-body inf-content">
    <div class="row">
        <div class="col-md-12">
            <img alt="" style="width:50px;" title="" class="img-circle img-thumbnail isTooltip" src="https://bootdey.com/img/Content/user-453533-fdadfd.png" data-original-title="Usuario"> 
            
        </div>
        <div class="col-md-8">
            <strong>'.$row['student_name'].'</strong><br>
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
                           '. $row['program'].'
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                                 
                                Section :                                               
                            </strong>
                        </td>
                        <td class="text-primary">
                            '.$row['section'].'
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                             
                                 Title :                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                        '.$row['title'].'
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                             
                                 Description :                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            '.$row['description'].'
                        </td>
                    </tr>


                    <tr>        
                        <td>
                            <strong>
                             
                                Area :                                              
                            </strong>
                        </td>
                        <td class="text-primary">
                            '.$row['area'].'
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                             
                                Pre-Requistie :                                             
                            </strong>
                        </td>
                        <td class="text-primary">
                            '.$row['pre_requisite'].'
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


                                      <form action="adminstudentprogress.php" method="POST">
                                         <input type="hidden" name="student_id"  id="' .$row['student_id']. '" value="'.$row['student_id'].'"> 
                                      <button type="submit" class="btn btn-outline btn-primary "  ><span class="glyphicon glyphicon-eye-open"></span> Project progress  </button>
                                      </form>
                                    </td> 
                                    
                               </tr>  
                               ';  
                          }                                    
                                $result=mysql_query("SELECT * FROM supervisor AS su  INNER JOIN prefrencetwo AS ptwo ON su.supervisor_id = ptwo.supervisor_id2 INNER JOIN student AS st ON ptwo.student_id2=st.student_id INNER JOIN admin AS ad ON su.admin_id=ad.admin_id Where su.supervisor_id=' $supervisorid' AND ptwo.status2 = 1");
                                          while($row = mysql_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                     <td>'.$row["student_name"].'</td>  
                                    <td>'.$row["program"].'</td> 
                                   
                                    <td>'.$row["title"].'</td>  
                                    
                                    <td>'.$row["area"].'</td>  
                                    <td>
                                    <button type="button" class="btn btn-outline btn-primary " data-toggle="modal" data-target="#viewModal-'. $row['prefrencetwo_id'] .'" data-toggle="modal"><span class="glyphicon glyphicon-eye-open"></span> View </button>
           <div class="modal fade" id="viewModal-'.$row['prefrencetwo_id'].'" tabindex="-1" role="dialog" >   <!--edit modal-->
                  <div class="modal-dialog modal-lg " role="document">
                      <div class="modal-content ">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                              <h4 class="modal-title" id="#viewModal-'.$row['prefrencetwo_id'].'">'. $row['student_name'].'</h4>
                                    <div class="container bootstrap snippet">
<div class="panel-body inf-content">
    <div class="row">
        <div class="col-md-12">
            <img alt="" style="width:50px;" title="" class="img-circle img-thumbnail isTooltip" src="https://bootdey.com/img/Content/user-453533-fdadfd.png" data-original-title="Usuario"> 
            
        </div>
        <div class="col-md-8">
            <strong>'.$row['student_name'].'</strong><br>
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
                           '. $row['program'].'
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                                 
                                Section :                                               
                            </strong>
                        </td>
                        <td class="text-primary">
                            '.$row['section'].'
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                             
                                 Title :                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                        '.$row['title'].'
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                             
                                 Description :                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            '.$row['description'].'
                        </td>
                    </tr>


                    <tr>        
                        <td>
                            <strong>
                             
                                Area :                                              
                            </strong>
                        </td>
                        <td class="text-primary">
                            '.$row['area'].'
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                             
                                Pre-Requistie :                                             
                            </strong>
                        </td>
                        <td class="text-primary">
                            '.$row['pre_requisite'].'
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
                                      <form action="adminstudentprogress.php" method="POST">
                                         <input type="hidden" name="student_id"  id="' .$row['student_id']. '" value="'.$row['student_id'].'"> 
                                      <button type="submit" class="btn btn-outline btn-primary "  ><span class="glyphicon glyphicon-eye-open"></span> Project progress  </button>
                                      </form>
                                    </td> 
                                    
                               </tr>  
                               ';  
                          }  
                               $result=mysql_query("SELECT * FROM supervisor AS su  INNER JOIN prefrencethree AS pthree ON su.supervisor_id = pthree.supervisor_id3 INNER JOIN student AS st ON pthree.student_id3=st.student_id INNER JOIN admin AS ad ON su.admin_id=ad.admin_id Where su.supervisor_id=' $supervisorid' AND pthree.status3 = 1");
                               while($row = mysql_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["student_name"].'</td>  
                                    <td>'.$row["program"].'</td> 
                                   
                                    <td>'.$row["title"].'</td>  
                                    
                                    <td>'.$row["area"].'</td>  
                                    <td>
                                    <button type="button" class="btn btn-outline btn-primary " data-toggle="modal" data-target="#viewModal-'. $row['prefrencethree_id'] .'" data-toggle="modal"><span class="glyphicon glyphicon-eye-open"></span> View </button>
           <div class="modal fade" id="viewModal-'.$row['prefrencethree_id'].'" tabindex="-1" role="dialog" >   <!--edit modal-->
                  <div class="modal-dialog modal-lg " role="document">
                      <div class="modal-content ">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                              <h4 class="modal-title" id="#viewModal-'.$row['prefrencethree_id'].'">'. $row['student_name'].'</h4>
                                    <div class="container bootstrap snippet">
<div class="panel-body inf-content">
    <div class="row">
        <div class="col-md-12">
            <img alt="" style="width:50px;" title="" class="img-circle img-thumbnail isTooltip" src="https://bootdey.com/img/Content/user-453533-fdadfd.png" data-original-title="Usuario"> 
            
        </div>
        <div class="col-md-8">
            <strong>'.$row['student_name'].'</strong><br>
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
                           '. $row['program'].'
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                                 
                                Section :                                               
                            </strong>
                        </td>
                        <td class="text-primary">
                            '.$row['section'].'
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                             
                                 Title :                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                        '.$row['title'].'
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                             
                                 Description :                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            '.$row['description'].'
                        </td>
                    </tr>


                    <tr>        
                        <td>
                            <strong>
                             
                                Area :                                              
                            </strong>
                        </td>
                        <td class="text-primary">
                            '.$row['area'].'
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                             
                                Pre-Requistie :                                             
                            </strong>
                        </td>
                        <td class="text-primary">
                            '.$row['pre_requisite'].'
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
                                        <form action="adminstudentprogress.php" method="POST">
                                         <input type="hidden" name="student_id"  id="' .$row['student_id']. '" value="'.$row['student_id'].'"> 
                                      <button type="submit" class="btn btn-outline btn-primary "  ><span class="glyphicon glyphicon-eye-open"></span> Project progress  </button>
                                      </form>
                                    </td> 
                                    
                               </tr>  
                               ';  
                          }  
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
