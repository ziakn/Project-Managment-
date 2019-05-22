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

    <title>FYP Automation</title>

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
        <?php $adminid = $_SESSION['admin_id']; ?>
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
                                
                            </span>

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
                    <h1 class="page-header">Supervisor</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Here is Supervisor list...
                            <button class="btn btn-outline btn-primary " data-toggle="modal" data-target="#addData"  data-placement="left" title="Add new Supervisor"><span class="glyphicon glyphicon-plus"></span>SUPERVISOR</button>  
                             <div id="addData" class="modal fade" role="dialog">        <!--it is the modal when click on the upper supervisor button-->
                                                    <div class="modal-dialog">
                                                            <!-- Modal content-->
                                                          <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">Add supervisor Record</h4>
                                                                </div>
                                                                      <div class="modal-body">
                                                                            <form action="addsupervisorrefrence.php" method="POST">
                                                                                        <div class="form-group" > 
                                                                                             <label for="nm">Name</label>
                                                                                             <input type="text" required pattern="[A-Za-z\s]{1,25}" title="use only english alphabets & max length 25" class="form-control" name="name" placeholder="Enter name">
                                                                                        </div>
                                                                                        <div class="form-group" required>
                                                                                             <label for="dp">Department</label>
                                                                                               <input type="department" required pattern="[A-Za-z\s]{1,25}" title="use only english alphabets & max length 25" class="form-control" name="department" placeholder="Enter Department">
                                                                                        </div>
                                                                                          <div class="form-group" required>
                                                                                              <label for="qu">Qualification</label>
                                                                                              <input type="qualification" required pattern="[A-Za-z\s]{1,25}" title="use only english alphabets & max length 25" class="form-control" name="qualification" placeholder="Enter Qualification">
                                                                                        </div>
                                                                                        <div class="form-group" required>

                                                                                              <label for="sp">Specialization</label>
                                                                                               <input type="specialization" required pattern="[A-Za-z\s]{1,25}" title="use only english alphabets & max length 25" class="form-control" name="specialization" placeholder="Enter Specialization">
                                                                                            
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                              <label for="em" class="control-label">Email</label>
                                                                                              <div class="input-group">
                                                                                            <span class="input-group-addon">@</span>
                                                                                              <input type="email" required  class="form-control" name="email" placeholder="Enter Email" required>
                                                                                              
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                              <button type="submit"  class="btn btn-primary">Save data</button>
                                                                                   </div>
                                                                            </form>
                                                                     </div>
                      
                                                            </div>
                                                    </div>
                                            </div>
                        </div>

                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">

                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Department</th>
                                        <th>Qualification</th>
                                        <th>Specialication</th>
                                       
                                        <th width="15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $result=mysql_query("SELECT * FROM supervisor WHERE admin_id='$adminid' ");
                               while($row = mysql_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["user_name"].'</td>  
                                    <td>'.$row["department"].'</td>  
                                    <td>'.$row["qualification"].'</td>  
                                    <td>'.$row["specialization"].'</td>  

                                    <td>                                                                        <!--edit buuton-->
                                        <button class="btn btn-outline btn-warning" data-toggle="modal" data-toggle="tooltip" data-placement="left" title="Edit supervisor" data-target="#editModal-'. $row['supervisor_id'].'"><span class="glyphicon glyphicon-pencil"></span></button>
                                            <div class="modal fade" id="editModal-'.$row['supervisor_id'].'"  role="dialog" >   <!--edit modal-->
                                                                    <div class="modal-dialog ">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                
                                                                                <h4 class="modal-title" id="editLabel-'. $row['supervisor_id'].'">Edit Supervisor record</h4>
                                                                                '. $row['supervisor_id'].'
                                                                                '.$row['user_name'].'
                                                                                </div>
                                                                                  <div class="modal-body">
                                                                                  
                                                                                  <form action="editsupervisor.php" method="POST">
                                                                                                                <div class="form-group" > 
                                                                                                                <input type="hidden" name="supervisor_id"  id="'.$row['supervisor_id'].'" value="'.$row['supervisor_id'].'">  
                                                                                                                </div>
                                                                                                               
                                                                                                                        <div class="form-group ">
                                                                                                                              <label for="nm">Name :</label>
                                                                                                                              
                                                                                                                              <input type="text" size="70" name="user_name" required pattern="[A-Za-z\s]{1,25}" title="use only english alphabets & max length 25" class="form-control" id="nm-'.$row['supervisor_id'].'" value="'.$row['user_name'].'">
                                                                                                                            
                                                                                                                            </div>
                                                                                                                            <div class="form-group">
                                                                                                                              <label for="dp">Department :</label>
                                                                                                                              <input type="department" size="70" name="department"  class="form-control" required pattern="[A-Za-z\s]{1,25}" title="use only english alphabets & max length 25" id="dp-'. $row['supervisor_id'].'" value="'.$row['department'].'">
                                                                                                                            </div>
                                                                                                                            <div class="form-group">
                                                                                                                              <label for="qu">Qualification :</label>
                                                                                                                              <input type="qualification" size="70" name="qualification" required pattern="[A-Za-z\s]{1,25}" title="use only english alphabets & max length 25" class="form-control" id="qu-'. $row['supervisor_id'].'" value="'.$row['qualification'].'">
                                                                                                                            </div>
                                                                                                                            <div class="form-group">
                                                                                                                              <label for="sp">Specialization :</label>
                                                                                                                              <input type="specialization" size="70" name="specialization" required pattern="[A-Za-z\s]{1,25}" title="use only english alphabets & max length 25" class="form-control" id="sp-'.$row['supervisor_id'].'" value="'.$row['specialization'].'">
                                                                                                                            </div>
                                                                                                                            <div class="form-group">
                                                                                                                              <label for="em">Email :</label>
                                                                                                                              <input type="email" size="70" name="email_id"  class="form-control" id="em-'. $row['supervisor_id'].'" value="'.$row['email_id'].'">
                                                                                                                            </div>
                                                                                                                            <div class="modal-footer">
                                                                                                                             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                                                            <button type="submit" class="btn btn-primary">Update</button>

                                                                                                                     </div>
                                                                                                                     </form>
                                                                                                                     </div>
                                                                                                                     
                                                                                  </div>
                                                                             

                                                                            </div>
                                                                              </div>
                                                                  </div>
                                                                </div>




                                                                            <!--Delete buuton-->

                                                                 <button class="btn btn-outline btn-danger" data-toggle="modal" data-toggle="tooltip" data-placement="left" title="Delete supervisor" data-target="#deleteModal-'.$row['supervisor_id'].'"><span class="glyphicon glyphicon-trash"></span></button>  <!--edit buuton-->

                                                            <!-- Modal -->
                                                                <div class="modal fade" id="deleteModal-'.$row['supervisor_id'].'" tabindex="-1" role="dialog" >   <!--delete modal-->
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                                                                                <h4 class="modal-title" id="editLabel-'.$row['supervisor_id'].'"></h4>
                                                                                
                                                                                 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                                                <img src="exclamation-mark" alt="Mountain View" width="200" height="200"></i>
                                                                            </br></br>
                                                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                                                                                <b><font size="6">Are you sure ?</font></b>
                                                                                </br></br>
                                                                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                                                Once deleted, <b>'. $row['user_name'].'</b> you will not be able to recover this imaginary file!
                                                                                
                                                                                <form action="deletesupervisor.php" method="POST">
                                                                                  <div class="modal-body">
                                                                                                                <input type="hidden" name="supervisor_id"  id="'.$row['supervisor_id'].'" value="'.$row['supervisor_id'].'">  
                                                                                                                        
                                                                                                                            <div class="modal-footer">
                                                                                                                             <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                                                                                            <button type="submit" class="btn btn-danger">Yes, delete it!</button>

                                                                                                                     </div>
                                                                                                                    
                                                                                  </div>
                                                                              </form>

                                                                            </div>
                                                                              </div>
                                                                  </div>
                                                                </div>
                                                                

                                                                                <!--Admin buuton-->

                                                                <button class="btn btn-outline btn-primary" class="navbar-toggle" data-toggle="modal" data-toggle="tooltip" data-placement="left" title="Want Admin" data-target="#adminModal-'. $row['supervisor_id'].'"><span class="glyphicon glyphicon-user"></span></button>  

                                                            <!-- Modal -->
                                                                <div class="modal fade" id="adminModal-'. $row['supervisor_id'].'" tabindex="-1" role="dialog" >   <!-- modal-->
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                                                                                <h4 class="modal-title" id="editLabel-'.$row['supervisor_id'].'"></h4>
                                                                                
                                                                                 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                                                <img src="boss" alt="Mountain View" width="200" height="200"></i>
                                                                            </br></br>
                                                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                                                                                <b><font size="6">Are you sure ?</font></b>
                                                                                </br></br>
                                                                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                                                Once made admin, <b>'.$row['user_name'].'</b> then you  will not be no more admin for the particular department !! 
                                                                                
                                                                                <form action="makeanadmin.php" method="POST">
                                                                                  <div class="modal-body">
                                                                                                                <input type="hidden" name="supervisor_id"  id="'.$row['supervisor_id'].'" value="'. $row['supervisor_id'].'">  
                                                                                                                        
                                                                                                                            <div class="modal-footer">
                                                                                                                             <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                                                                                            <button type="submit" class="btn btn-warning">Yes, just do it!</button>

                                                                                                                     </div>
                                                                                                                    
                                                                                  </div>
                                                                              </form>

                                                                            </div>
                                                                              </div>
                                                                  </div>
                                                                </div>


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
