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
                                            <?php echo Upload::studentImage($student->getParentId(),$student->getCode());     ?>
                                    
                                                         <!-- upload new image modal -->
                                                         <br>
                                 
                                       
                                      </div>
                                      <div  class="col-md-4">
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
                                                <?php print $student->getFirstName(); ?>
                                            </div>
                                        </div>
                                                                                 
                                           <div class="form-group">
                                            <label class="control-label col-md-6 col-sm-3 col-xs-12" for="link">Last Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <?php print $student->getLastName() ?>
                                            </div>
                                        </div>
                                           <div class="form-group">
                                            <label class="control-label col-md-6 col-sm-3 col-xs-12" for="link">Date of Birth <span class="required">*</span>
                                            </label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                               <?php print textFormatter::sortDate($student->getDOB()) ?>
                                            </div>
                                        </div>
                                           <div class="form-group">
                                            <label class="control-label col-md-6 col-sm-3 col-xs-12" for="link">Gender <span class="required">*</span>
                                            </label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                   <?php echo $student->getGender(); ?>
                                            </div>
                                        </div>
                                           <div class="form-group">
                                            <label class="control-label col-md-6 col-sm-3 col-xs-12" for="link">Age<span class="required">*</span>
                                            </label>
                                             <div class="col-md-12 col-sm-12 col-xs-12">
                                                 <?php echo $student->getAge(); ?>
                                              
                                            </div>
                                        </div>
                                           <div class="form-group">
                                            <label class="control-label col-md-6 col-sm-3 col-xs-12" for="link">Points<span class="required">*</span>
                                            </label>
                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                                   <?php echo $student->getPoints(); ?>
                                                 
                                            </div>
                                        </div>
                                                    
                                            
                                        <div class="form-group">
                                            <br><br>
                                            <div class="col-md-12 col-sm-12 col-xs-12 ">
                                                <button type="submit" class="btn btn-success pull-right">Accept Student</button>
                                                <button type="submit" class="btn btn-danger pull-right">Reject Student</button>
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

                
