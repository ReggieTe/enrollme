<?php unset($_SESSION['currentStudentId']) ?>


            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Aplicant /Student
                        <small>Details</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Aplicant /Student</a></li>
                        <li class="active">Details</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-7 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <?php textFormatter::notification(@$show) ?>
                                <div class="x_content">
                                     
                                   <form  enctype="multipart/form-data"  method="POST" 
                                          action="<?php echo URL; ?><?php echo USERTYPE; ?>dashboard/authorize" 
                                          
                                          class="form-horizontal form-label-left">
                                       
                                       <input type="hidden" value="eenrollment" name="ref"  />
                                       
                                     
                                          <!-- start accordion -->
                                    <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                        <div class="panel">
                                           
                                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                <div class="panel-body">
                                                     
                
                                        <div class="form-group col-md-6">
                                            <label class="pull-left col-md-6 col-sm-6 col-xs-12" for="name">First Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input type="text" id="first-name" name="firstname" required="required" data-validate-length-range="6" data-validate-words="2"  placeholder="First Name" class="form-control col-md-7 col-xs-12" value="<?php echo@$firstname; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="pull-left col-md-6 col-sm-6 col-xs-12" for="name">Last Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input type="text" id="first-name" name="lastname" required="required" data-validate-length-range="6" data-validate-words="2"  placeholder="Last Name" class="form-control col-md-7 col-xs-12" value="<?php echo@$lastname; ?>">
                                            </div>
                                        </div>
                                       
                                        <div class="form-group col-md-6">
                                            <label class="pull-left col-md-6 col-sm-6 col-xs-12">Gender <span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <select class="select2_single form-control" name="gender" tabindex="-1">
                   <option value='male'>Male / Boy</option>
                   <option value='female'>Female / Girl</option>
                                                 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="pull-left col-md-6 col-sm-6 col-xs-12">Date of Birth <span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                               <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                                   <input type="text" class="form-control"placeholder="dd/mm/yyyy" name="dob" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                                        
                                               
                                               </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="pull-left col-md-6 col-sm-6 col-xs-12">Age <span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <select class="select2_single form-control" name="age">
                                                 <?php 
                                                   for($i=11;$i<15;$i++)
                                                   {
                                                       echo "<option value='$i'>$i</option>";    
                                                   }
                                                   
                                                   ?>
                                                </select>
                                            </div>
                                        </div>
                                                     <div class="form-group col-md-6">
                                            <label for="image" class="pull-left col-md-6 col-sm-6 col-xs-12">Child Image <span class="required">*</span></label>
                                            <small class="col-md-12">The image is optional </small>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                 <input type="file" name="child_img" class="" required="required">
                                                 </div>
                                            
                                        </div>
                                                    <hr/>
                                        <div class="form-group col-md-6">
                                            <label class="pull-left col-md-6 col-sm-6 col-xs-12">Points <span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <select class="select2_multiple form-control" name="points" >
                                                 <?php 
                                                   for($i=9;$i<39;$i++)
                                                   {
                                                       echo "<option value='$i'>$i</option>";    
                                                   }
                                                   
                                                   ?>
                                                </select>
                                            </div>
                                        </div>
                                       
                                        <div class="form-group col-md-6">
                                            <label for="image" class="pull-left col-md-6 col-sm-6 col-xs-12">Results Slip <span class="required">*</span></label>
                                            <small class="col-md-12">The scanned copy of the result slip</small>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                 <input type="file" name="slip_img" class="" required="required">
                                                 </div>
                                            
                                        </div>
                                                    
                                                       <div class="form-group">
                                            <label class="pull-left col-md-6 col-sm-6 col-xs-12">Schools <span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <select class="select2_multiple form-control" name="schools">
                                                <?php 
                                                   $result=$client->select("Select * FROM userschool");
                                                   foreach ($result as $key => $value) {
                                                           echo "<option value='".$value['id']."'>".$value['firstname']."</option>";
                                                    }
                                                   
                                                   ?>
                                                </select>
                                            </div>
                                        </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                       
                                    </div>
                                    <!-- end of accordion -->
                                      <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-12 col-sm-12 col-xs-12 ">
                                                <button type="submit" class="btn btn-success pull-right">Save Project</button>
                                            </div>
                                        </div>                                        
                                         
                                      

                                  </form>
                                    
                                 
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2><small>Today's Entries</small></h2>
                                   
                                </div>
                                     <div class="box-body table-responsive">
                                    <table id="example2" class="table table-bordered table-hover">
                                         <thead>
                                            <tr class="headings">
                                                <th>Student Name </th>
                                                
                                            </tr>
                                        </thead>

                                        <tbody>
                                                 <?php 
                                             
                                                   $result= $client->select("Select * FROM students WHERE date=:date AND parent_id=:userid",array(":date"=> date("d/m/y"),":userid"=>Session::get('usercodeid')));
                                                   foreach ($result as $key => $value) {
    
                                                       echo '<tr class="even pointer">
                                                <td class=" ">'.ucfirst($value['firstname']).' '.ucfirst($value['lastname']).'
                                                
                                                <a href="'.URL.''.USERTYPE.'dashboard/enroller/0/'.$value['id'].'" class="btn  btn-sm pull-right">View</a>
                                                
                                                <a href="'.URL.''.USERTYPE.'dashboard/delete/'.$value['id'].'/0" class="btn  btn-sm pull-right">Delete</a>
                                                
                                                </td>
                                            </tr>';
                                                    }
                                                   
                                                   ?>
                                            
                                            
                                  
                                        </tbody>

                                    </table>
                                  
                                                
                                
                            </div>
                                
                    </div>
                        
                    </div>
                </section>

                