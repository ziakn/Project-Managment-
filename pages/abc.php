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
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Trail 2</title>
 
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="datatable/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--<link href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css" rel="stylesheet">-->
     
    <style>
        tfoot input {
            width: 100%;
            padding: 3px;
            box-sizing: border-box;
        }
    </style>
     
  </head>
  <body>
    <br><br>
    <div class="container">
        <div class="row">
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>City</th>
                        <th>Mobile No</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th><input type="text" name="name" id="name" placeholder="Search by NAME"></th>
                        <th>Surname</th>
                        <th>City</th>
                        <th>Mobile No</th>
                    </tr>
                </tfoot>
                <tbody>
                <?php
                    
                        $query1 = "SELECT * FROM student";
                        $result1 = mysqli_query($con, $query1);
                         
                        while($row = mysqli_fetch_assoc($result1)){
                            $name = $row['student_name'];
                            $surname = $row['m_sec_surname'];
                            $city = $row['m_city'];
                            $no = $row['m_mobile'];
                ?>
                        <tr>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $surname; ?></td>
                            <td><?php echo $city; ?></td>
                            <td><?php echo $no; ?></td>
                        </tr>
                         
                <?php  }//End of while loop
                    }//End of if statement
                ?>     
                </tbody>   
            </table>
        </div>
    </div>
 
    <script src="js/jquery-1.12.4.js"></script>
    <script src="datatable/js/jquery.dataTables.min.js"></script>
    <!--<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script> -->
     
    <script type="text/javascript">
        $(document).ready(function() {
             
            // DataTable
            var table = $('#example').DataTable();
             
            // Search
            $("#name").keyup(function(){
                var m_name = $("input[name='name']").val();
                 
                $.ajax({
                    type: "POST",
                    url: "trial2php.php",
                    data: {member_name : m_name},
                    cache: true,
                    success: function(){
                        $('#example').DataTable();
                    }
                });
            }
             
        } );
    </script>
  </body>
</html>