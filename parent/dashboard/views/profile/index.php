

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Profile
                        <small>Details</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Profile</a></li>
                        <li class="active">Details</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel tile ">
                           
                            <div class="x_content">
                                  <div class="dashboard-widget-content col-md-8">
                                             <form  method="POST" action="<?php echo URL; ?><?php echo USERTYPE; ?>dashboard/authorize" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                    <input type="hidden" name="ref" value="savechangeonuser"/>
                                              <?php textFormatter::notification(@$show) ?>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="pull-left col-md-6 col-sm-3 col-xs-12" for="first-name">Username <span class="required text-danger">*</span>
                                            </label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input type="text" id="username" name="username" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $user->getName(); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="pull-left col-md-6 col-sm-6 col-xs-12" for="first-name">First Name <span class="required text-danger">*</span>
                                            </label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input type="text" id="firstname" name="firstname" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $user->getFirstName(); ?> ">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="pull-left col-md-6 col-sm-6 col-xs-12" for="first-name">Last Name <span class="required text-danger">*</span>
                                            </label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input type="text" id="lastname" name="lastname" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $user->getLastName(); ?> ">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="pull-left col-md-6 col-sm-6 col-xs-12" for="first-name">National ID <span class="required text-danger">*</span>
                                            </label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input type="text" id="lastname" name="nationalid" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $user->getNationalId(); ?> ">
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
                                                    echo $countryInfo->getName(); ?> </option>
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
                                        <div class="form-group">
                                            <label for="middle-name" class="pull-left col-md-6 col-sm-6 col-xs-12">Email  <span class="required text-danger">*</span></label>
                                            <div class="col-md-12 col-sm-6 col-xs-12">
                                                <input id="email" class="form-control col-md-7 col-xs-12" type="email" required="required" name="email" value="<?php echo $user->getEmail(); ?> ">
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="">
                                                <button type="submit" class="btn btn-success btn-sm pull-right">Save Changes </button>
                                            </div>
                                        </div>
                                     </div>

                                    </form>

                                  
                                </div>
                                
                            </div>
                        </div>
                            
                    </div>
                       
                            
                    </div>
                </section>
                
