<?php unset($_SESSION['currentStudentId']); ?>
   <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Aplicant /Student
                        <small>Details</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Aplicants /Student</a></li>
                        <li class="active">Details</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        
<div class="box">
                              
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No:</th>
                                                <th>Name</th>
                                                <th>Age</th>
                                                <th>D.O.B</th>
                                                <th>Gender</th>
                                                <th>Points</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            
                                             <?php 
                                             
                                             $appCounter=0;
                                                 $result= $client->select("Select * FROM students WHERE schools=:id",array(":id"=>  Session::get('usercodeid')));
                                                 foreach ($result as $key => $value) {

$appCounter++;
                                                       echo "<tr>
                                                <td>$appCounter</td>
                                                <td>".$value['firstname']." ".$value['lastname']."</td>
                                                <td> ".$value['age']."</td>
                                                <td> ".textFormatter::sortDate($value['dob'])."</td>
                                                <td> ".$value['gender']."</td>
                                                <td> ".$value['points']."</td>
                                                <td>
                                                <small><a href='".URL."".USERTYPE."dashboard/enroller/0/".$value['id']."' class='btn btn-sm btn-success'>View</a></small>
                                                   </td>
                                            </tr>";
                                                 }
                                                    
                                             
                                                   
                                                   ?>
                                  
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                           <th>No:</th>
                                                <th>Name</th>
                                                <th>Age</th>
                                                <th>D.O.B</th>
                                                <th>Gender</th>
                                                <th>Points</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                </section>


