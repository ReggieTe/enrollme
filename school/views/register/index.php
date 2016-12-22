                  
  <div class="form-box" id="login-box">
            <div class="header">Register New Account</div>
             
            <form action="<?php echo URL; ?><?php echo USERTYPE; ?>authorise/registration" method="post">
                <div class="body bg-gray">
                    <?php textFormatter::notification(@$show);  ?>
                     <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Username"/>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password2" class="form-control" placeholder="Retype password"/>
                    </div>
                </div>
                <div class="footer">                    

                    <button type="submit" class="btn bg-olive btn-block">Register Now</button>

                    <a href="<?php echo URL; ?><?php echo USERTYPE; ?>/" class="text-center">I already have an Account</a>
                </div>
            </form>

           
        </div>


                         