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
        <?php $adminid= $_SESSION['admin_id']; ?>
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
                    <h1 class="page-header">Project Detail </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Here is a student project list and progress...                     <!--it is the modal when click on the upper student button-->
                            <button class="btn btn-outline btn-primary " data-toggle="modal" data-target="#addstudentData" ><span class="glyphicon glyphicon-plus"></span>STUDENT</button> 
                            <div id="addstudentData" class="modal fade" role="dialog">        <!--it is the modal when click on the upper student button-->
                                                    <div class="modal-dialog modal-lg">
                                                            <!-- Modal content-->
                                                          <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">Add Student Record</h4>
                                                                </div>
                                                                      <div class="modal-body">
                                                                            <form action="addstudentprojectrefrence.php" method="POST">
                                                                                        <div class="form-group" required> 
                                                                                             <label for="nm">Name</label>
                                                                                             <input type="text" required pattern="[A-Za-z\s]{1,25}" title="use only english alphabets & max length 25" class="form-control" name="name" placeholder="Enter name">
                                                                                        </div>
                                                                                        <div class="form-group" required>
                                                                                             <label for="pr">Program</label>
                                                                                               <input type="program" required pattern="[A-Za-z\s]{1,25}" title="use only english alphabets & max length 25" class="form-control" name="program" placeholder="Enter Program">
                                                                                        </div>
                                                                                          <div class="form-group" required>
                                                                                              <label for="se">Section</label>
                                                                                              <input type="section" required pattern="[A-Za-z\s]{1,25}" title="use only english alphabets & max length 25" class="form-control" name="section" placeholder="Enter Section">
                                                                                        </div>
                                                                                        <div class="form-group" required>
                                                                                              <label for="ti">Title</label>
                                                                                               <input type="title" required pattern="[A-Za-z\s]{1,200}" title="use only english alphabets & max length 200" class="form-control" name="title" placeholder="Enter Title">
                                                                                        </div>
                                                                                        <div class="form-group" required>
                                                                                              <label for="de">Description</label>
                                                                                              <textarea type="description" rows="3" required class="form-control" name="description" placeholder="Enter Breif Description"></textarea>
                                                                                        </div>
                                                                                         <div class="form-group" required>
                                                                                              <label for="ar">Area</label>
                                                                                              <input type="area" required pattern="[A-Za-z\s]{1,25}" title="use only english alphabets & max length 25" class="form-control" name="area" placeholder="Enter Area">
                                                                                        </div>
                                                                                        <div class="form-group" required>
                                                                                              <label for="pre">Pre_Requisites</label>
                                                                                              <input type="pre_requisite" pattern="[A-Za-z\s]{1,25}" title="use only english alphabets & max length 25" required class="form-control" name="pre_requisite" placeholder="Enter Pre_Requisites">
                                                                                        </div>
                                                                                         <div class="form-group">
                                                                                              <label for="pre">Prefrence : 1</label>
                                                                                                    <select required name="firstsupervisor" class="selectpicker show-menu-arrow show-tick" title="Choose your ist prior supervisor" data-width="70%" data-size="5" data-live-search="true"    title="Choose your ist prior supervisor" data-style="btn btn-outline btn-primary" >
                                                                                                      <option  disabled selected>Select your ist supervisor</option>

                                                                                                            <?php
                                                                                                       $result=mysql_query("SELECT * FROM supervisor");
                                                                                                    while ($row=mysql_fetch_array($result)) { 
                                                                                                    
                                                                                                   echo "<option value='".$row['supervisor_id']."'>".$row['user_name']."</option>";
                                                                                                     } ?>
                                                                                                     </select>  
                                                                                        </div>
                                                                                         <div class="form-group">
                                                                                              <label for="pre">Prefrence : 2</label>
                                                                                                     <select required name="secondsupervisor"  class="selectpicker show-menu-arrow show-tick" title="Choose your 2nd prior supervisor" data-width="70%" data-size="5"  data-live-search="true"  data-style="btn btn-outline btn-primary"" >
                                                                                                       <option  disabled selected>Select your 2nd supervisor</option>

                                                                                                           <?php
                                                                                                       $result=mysql_query("SELECT * FROM supervisor");
                                                                                                    while ($row=mysql_fetch_array($result)) { 
                                                                                                    
                                                                                                   echo "<option value='".$row['supervisor_id']."'>".$row['user_name']."</option>";
                                                                                                     } ?>
                                                                                                     </select>  
                                                                                        </div>
                                                                                         <div class="form-group">
                                                                                              <label for="pre">Prefrence : 3</label>
                                                                                                     <select required="required" name="thirdsupervisor" class="selectpicker show-menu-arrow show-tick " data-width="70%" data-size="5"  data-live-search="true"   title="Choose your 3rd prior supervisor" data-style="btn btn-outline btn-primary" >
                                                                                                       <option  disabled selected>Select your 3rd supervisor</option>

                                                                                                           <?php
                                                                                                       $result=mysql_query("SELECT * FROM supervisor");
                                                                                                    while ($row=mysql_fetch_array($result)) { 
                                                                                                    
                                                                                                   echo "<option value='".$row['supervisor_id']."'>".$row['user_name']."</option>";
                                                                                                     } ?>
                                                                                                     </select>  
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                              <button type="submit" class="btn btn-primary">Save data</button>
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
                                        <th>Student Name</th>
                                        <th>Program</th>
                                        <th>Section</th>
                                        <th>Title</th>
                                        <th>Area</th>
                                        <th>Description</th>
                                       <th>Prerequsite</th>
                                      <th width="10%">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                   $adminid=$_SESSION['admin_id'];
    
                                $adminid= $_SESSION['admin_id'];
                                    $result=mysql_query("SELECT * FROM student WHERE admin_id='$adminid'");
                               while($row = mysql_fetch_array($result))  
                          {  ?>
                              <tr>                                                      <!--this row contain to retrevidata and also a popup modal to edit and delte data-->
        
      <!--  <?php echo $row['student_id'] ?>-->
        <td><?php echo $row['student_name'] ?></td>
        <td><?php echo $row['program'] ?></td>
        <td><?php echo $row['section'] ?></td>
        <td><?php echo $row['title'] ?></td>
        <td><?php echo $row['description'] ?></td>
        <td><?php echo $row['area'] ?></td>
        <td><?php echo $row['pre_requisite'] ?></td>
        <td width="30">
        <button class="btn btn-outline btn-warning" data-toggle="modal" data-toggle="tooltip" data-placement="left" title="Edit Student" data-target="#editModal-<?php echo $row['student_id'] ?>"><span class="glyphicon glyphicon-pencil"></span></button>  <!--edit buuton-->

          <!-- Modal -->
              <div class="modal fade" id="editModal-<?php echo $row['student_id'] ?>" tabindex="-1" role="dialog" >   <!--edit modal-->
                  <div class="modal-dialog" >
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                              <h4 class="modal-title" id="editLabel-<?php echo $row['student_id'] ?>">Edit Student record</h4>
                          </div>
                              <?php  $row['student_id']  ?>
                              
                              
                                <div class="modal-body">
                                    <form action="editstudentproject.php" method="POST">
                                                              <input type="hidden" name="student_id"  id="<?php echo $row['student_id'] ?>" value="<?php echo $row['student_id'] ?>"> 
                                                                      <div class="form-group">
                                                                            <label for="nm">Name :</label>
                                                                            <input type="text" required size="70" name="user_name" pattern="[A-Za-z\s]{1,25}" title="use only english alphabets & max length 25"  class="form-control" id="nm-<?php echo $row['student_id'] ?>" value="<?php echo $row['student_name'] ?>">
                                                                          </div>
                                                                          <div class="form-group">
                                                                            <label for="pr">Program :</label>
                                                                            <input type="program" required size="70" name="program" pattern="[A-Za-z\s]{1,25}" title="use only english alphabets & max length 25"   class="form-control" id="pr-<?php echo $row['student_id'] ?>" value="<?php echo $row['program'] ?>">
                                                                          </div>
                                                                          <div class="form-group">
                                                                            <label for="se">Section :</label>
                                                                            <input type="section" required size="70" name="section" pattern="[A-Za-z\s]{1,25}" title="use only english alphabets & max length 25"   class="form-control" id="se-<?php echo $row['student_id'] ?>" value="<?php echo $row['section'] ?>">
                                                                          </div>
                                                                          <div class="form-group">
                                                                            <label for="ti">Title :</label>
                                                                            <input type="title" required size="71" name="title" pattern="[A-Za-z\s]{1,200}" title="use only english alphabets & max length 25"   class="form-control" id="ti-<?php echo $row['student_id'] ?>" value="<?php echo $row['title'] ?>">
                                                                          </div>
                                                                          <div class="form-group">
                                                                            <label for="de">Description :</label>
                                                                            <input type="description" required size="70" name="description"  class="form-control" id="de-<?php echo $row['student_id'] ?>" value="<?php echo $row['description'] ?>">
                                                                          </div>
                                                                           <div class="form-group">
                                                                            <label for="ar">Area :</label>
                                                                            <input type="area" required size="71" name="area" pattern="[A-Za-z\s]{1,25}" title="use only english alphabets & max length 25"   class="form-control" id="ar-<?php echo $row['student_id'] ?>" value="<?php echo $row['area'] ?>">
                                                                          </div>
                                                                           <div class="form-group">
                                                                            <label for="pre">Pre_requisite :</label>
                                                                            <input type="pre_requisite" required size="70" name="pre_requisite" pattern="[A-Za-z\s]{1,25}" title="use only english alphabets & max length 25"   class="form-control" id="pre-<?php echo $row['student_id'] ?>" value="<?php echo $row['pre_requisite'] ?>">
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
              
                      
        

        <!-- here is the coding to delete student by admin-->
        
          <button class="btn btn-outline btn-danger" data-toggle="modal" data-toggle="tooltip" data-placement="left" title="Delete Student" data-target="#deleteModal-<?php echo $row['student_id'] ?>"><span class="glyphicon glyphicon-trash"></span></button>  <!--edit buuton-->

          <!-- Modal -->
              <div class="modal fade" id="deleteModal-<?php echo $row['student_id'] ?>" tabindex="-1" role="dialog" >   <!--edit modal-->
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                              <h4 class="modal-title" id="editLabel-<?php echo $row['student_id'] ?>"></h4>
                              
                               &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                              <img src="exclamation-mark" alt="Mountain View" width="200" height="200"></i>
                          </br></br>
                          &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                              <b><font size="6">Are you sure ?</font></b>
                              </br></br>
                              &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                              Once deleted, <b><?php echo $row['student_name'] ?></b> you will not be able to recover this imaginary file!
                              
                              <form action="deletestudentproject.php" method="POST">
                                <div class="modal-body">
                                                              <input type="hidden" name="student_id"  id="<?php echo $row['student_id'] ?>" value="<?php echo $row['student_id'] ?>"> 
                                                                      
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
              
                       










        </td>
      </tr>
           <?php               }  
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
</body>

</html>
