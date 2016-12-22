<?php 
$student->setStudentIdFromSession();
?>
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
                                      
                              <div class="col-md-12">
                                  <div class="col-md-12">
                                      <div class='col-md-6'>
                           
                                       <?php textFormatter::notification(@$show) ?>
                                            <?php echo Upload::studentImage();     ?>
                                    
                                                         <!-- upload new image modal -->
                                                         <br>
                                 
                                    <div class="btn-group btn-group-sm">
                                            <button class="btn btn-primary"  >Image Setting</button>
                                            <button class="btn btn-default" data-toggle="modal" data-target=".rotate-file" type="button"> <span class="fa fa-rotate-right"></span> Rotate</button>
                                            <button class="btn btn-default"  data-toggle="modal" data-target=".add-file"type="button"> <span class="fa fa-upload"></span>  Change</button>
                                        </div>
                                  
                                        <div class="modal fade rotate-file" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel2">Action</h4>
                                            </div>
                                            <div class="modal-body">
                                               
                                                <form   enctype="multipart/form-data"  method="POST" action="<?php echo URL ?><?php echo USERTYPE; ?>dashboard/authorize" data-parsley-validate class="form-horizontal form-label-left">
                                    <input type="hidden" name="ref" value="rotateimage"/>
                                            <label class="col-md-12 col-sm-3 col-xs-12 pull-left">Degrees <span class="required">*</span></label>
                                                <select class="select2_single form-control col-md-12 col-sm-12 col-xs-12" name="degrees" tabindex="-1">
                                                    <option value='0'>0 </option>
                                                    <option value='45'>45</option>
                                                  <option value='90'>90 </option>
                                                  <option value='135'> 135</option>
                                                  <option value='180'>180</option>
                                                  <option value='225'>225</option>
                                                  <option value='360'>360</option>
                                                </select>
                                            
                                    <button class="btn btn-success" type="submit">Rotate Now</button>
                                                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                </form>
                                            </div>
                                            
                                          

                                        </div>
                                    </div>
                                </div>
                                  
                                                                         
                                        <div class="modal fade add-file" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel2">Action</h4>
                                            </div>
                                            <div class="modal-body">
                                               
                                                <form   enctype="multipart/form-data"  method="POST" action="<?php echo URL ?><?php echo USERTYPE; ?>dashboard/authorize" data-parsley-validate class="form-horizontal form-label-left">
                                    <input type="hidden" name="ref" value="updatestudentimage"/>
                                    <div class="form-group">
                                            <label for="image" class="pull-left col-md-12 col-sm-12 col-xs-12">Add new image</label>
                                            <small>only png,jpg</small>
                                                
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input type="file" name="img" >
                                            <input type="hidden" name="MAX_FILE_SIZE"   required="required"  VALUE="1024000">
                                            </div>
                                        </div>
                                    <button class="btn btn-success" type="submit">Save File</button>
                                                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                </form>
                                            </div>
                                            
                                          

                                        </div>
                                    </div>
                                </div>
                                <!-- /modals --> 
                                      </div>
                                      <div  class="col-md-6">
                                       <div class="x_panel">
                                         <form  role="form" method="POST" action="<?php echo URL; ?><?php echo USERTYPE; ?>dashboard/authorize">
                                          <input type="hidden" value="updatestudent" name="ref" />
                                          <input type="hidden" name="currentname"  value="<?php //print $student->getName(); ?>">
                                   <div class="x_content">
                                        <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                        <div class="panel">
                                            <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                <h2 class="panel-title" >Student Details</h2>
                                            </a>
                                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                <div class="panel-body">
                                                
                                
                                          <div class="form-group">
                                            <label class="control-label col-md-6 col-sm-6 col-xs-12" for="name">First Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input type="text" id="first-name" name="firstname" required="required"  placeholder="Student First Name" class="form-control col-md-7 col-xs-12" value="<?php print $student->getFirstName(); ?>">
                                            </div>
                                        </div>
                                                                                 
                                           <div class="form-group">
                                            <label class="control-label col-md-6 col-sm-3 col-xs-12" for="link">Last Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input type="text" id="url" name="lastname" placeholder="Student Last Name"  required="required"  class="form-control col-md-7 col-xs-12" value="<?php print $student->getLastName() ?>">
                                            </div>
                                        </div>
                                           <div class="form-group">
                                            <label class="control-label col-md-6 col-sm-3 col-xs-12" for="link">Date of Birth <span class="required">*</span>
                                            </label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input type="text" id="url" name="dob" placeholder="Student Last Name"  required="required"  class="form-control col-md-7 col-xs-12" value="<?php print $student->getDOB() ?>">
                                            </div>
                                        </div>
                                           <div class="form-group">
                                            <label class="control-label col-md-6 col-sm-3 col-xs-12" for="link">Gender <span class="required">*</span>
                                            </label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <select class="select2_single form-control" name="gender" tabindex="-1">
                   <option value='<?php echo $student->getGender(); ?>'><?php echo $student->getGender(); ?></option>
                   <option value='male'>Male / Boy</option>
                   <option value='female'>Female / Girl</option>
                                                 
                                                </select>
                                            </div>
                                        </div>
                                           <div class="form-group">
                                            <label class="control-label col-md-6 col-sm-3 col-xs-12" for="link">Age<span class="required">*</span>
                                            </label>
                                             <div class="col-md-12 col-sm-12 col-xs-12">
                                                <select class="select2_single form-control" name="age">
                                                    <?php echo "<option value='".$student->getAge()."'>".$student->getAge()."</option>"; ?>
                                                 <?php 
                                                 
                                                   for($i=11;$i<15;$i++)
                                                   {
                                                       echo "<option value='$i'>$i</option>";    
                                                   }
                                                   
                                                   ?>
                                                </select>
                                            </div>
                                        </div>
                                           <div class="form-group">
                                            <label class="control-label col-md-6 col-sm-3 col-xs-12" for="link">Points<span class="required">*</span>
                                            </label>
                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                                <select class="select2_multiple form-control" name="points" >
                                                    <?php echo "<option value='".$student->getPoints()."'>".$student->getPoints()."</option>"; ?>
                                                 <?php 
                                                   for($i=9;$i<49;$i++)
                                                   {
                                                       echo "<option value='$i'>$i</option>";    
                                                   }
                                                   
                                                   ?>
                                                </select>
                                            </div>
                                        </div>
                                                    
                                            
                                        <div class="form-group">
                                            <br><br>
                                            <div class="col-md-12 col-sm-12 col-xs-12 ">
                                                <button type="submit" class="btn btn-success pull-right">Save Changes</button>
                                            </div>
                                        </div> 
                                
                                               
                                                </div>
                                            </div>
                                        </div>                 
            
                                      
                                  </div>
                                  </form>
                           
                                    </div><!-- /.box-body -->
                            </div><!-- /.box -->
                       

                </section><!-- /.content -->
            </aside><!-- /.right-side --> 
                                       
                                       
                                       
                                       
                                       
                                </div>
                            </div>
                        </div>
                    </div>

                
