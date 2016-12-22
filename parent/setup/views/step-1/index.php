
    <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Account
                        <small>Set-Up</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Account</a></li>
                        <li class="active">Set-Up</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">


               


                         
                       <div class="col-md-12 col-sm-12 col-xs-12">
                           <small>To enable all features please complete form below</small>
                        <div class="x_panel tile ">
                            <div class="x_title">
                                <h2>Parent / Gaudian <small>Information</small></h2>
                               
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                              
                       
                                <div class="dashboard-widget-content col-md-8">
                                             <form  method="POST" action="<?php echo URL; ?><?php echo USERTYPE; ?>setup/authorize" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                    <input type="hidden" name="ref" value="savechangeonuser"/>
                                              <?php textFormatter::notification(@$show) ?>
                                    <div class="col-md-6">
                                        
                                        <div class="form-group">
                                            <label class="pull-left col-md-6 col-sm-6 col-xs-12" for="first-name">First Name <span class="required text-danger">*</span>
                                            </label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input type="text" id="firstname" name="firstname" required="required" placeholder="First name" class="form-control col-md-7 col-xs-12" value="<?php echo $user->getFirstName(); ?> ">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="pull-left col-md-6 col-sm-6 col-xs-12" for="first-name">Last Name <span class="required text-danger">*</span>
                                            </label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input type="text" id="lastname" name="lastname" required="required" placeholder="Last name" class="form-control col-md-7 col-xs-12" value="<?php echo $user->getLastName(); ?> ">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="pull-left col-md-6 col-sm-6 col-xs-12" for="first-name">National Id <span class="required text-danger">*</span>
                                            </label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input type="text" id="lastname" name="nationalid" required="required" placeholder="National ID" class="form-control col-md-7 col-xs-12" value="<?php echo $user->getNationalId(); ?> ">
                                            </div>
                                        </div>
                                      
                                    </div>
                                    <div class="col-md-6">
                                       
                                        <div class="form-group">
                                            <label class="pull-left col-md-6 col-sm-6 col-xs-12" for="first-name">Province <span class="required text-danger">*</span>
                                            </label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <select class="select2_single form-control" name="province" tabindex="-1">
                                                    <option value='<?php echo $user->getProvince(); ?> '><?php 
                                                    $countryInfo->setId($user->getProvince());
                                                    echo $countryInfo->getName(); 
                                                    ?> </option>
                                                 <?php 
                                                 $result= $client->select("Select * FROM country WHERE id!='{$user->getProvince()}'");
                                                   foreach ($result as $key => $value) {
                                                       echo "<option value='".$value['id']."'>".$value['name']."</option>";
                                                    }
                                                   
                                                   ?>
                                                </select>
                                            </div>
                                        </div>
                                      
                                    <div class="form-group">
                                            <label class="pull-left col-md-6 col-sm-6 col-xs-12" for="last-name">Phone <span class="required">*</span>
                                            </label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input type="tel" id="position" name="phone" required="required"  class="form-control col-md-7 col-xs-12" value="<?php echo $user->getPhone(); ?> ">
                                            </div>
                                        </div>
                                      
                                    </div>
                                     <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="">
                                                
                                                <?php if($stage1==100)
                                                {
     echo '<a href="'.URL.''.USERTYPE.'dashboard/home" class="btn btn-primary btn-sm pull-right">Click To Enable Features </a>
                                            ';
                                                }
 else {
                                                    echo '<button type="submit" class="btn btn-success btn-sm pull-right col-md-4">Save </button>';
 }
                                                ?>
                                                
                                            </div>
                                        </div>
                                     </div>

                                    </form>

                                  
                                </div>
                               
                            </div>
                        </div>
                            
                    </div>
                        <!---end personal---->
                       
                    </div>
                </div>
            </div>
                
 </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->