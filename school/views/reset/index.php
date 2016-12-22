
                        <div class="form-box" id="login-box">
            <div class="header">Reset Password</div>
       
            <form action="<?php echo URL; ?><?php echo USERTYPE; ?>authorise/passwordreset" method="post">
                <input type="hidden" name="ref" value="a2s4cg45aghlopp"/>
                <div class="body bg-gray">
                    <?php textFormatter::notification(@$show);  ?>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Enter Email"/>
                    </div>
                             
                   
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block">Reset Password</button>  
                    <p><a href="<?php echo URL; ?><?php echo USERTYPE; ?>">I have an account</a></p>
                    
                    <a href="<?php echo URL; ?><?php echo USERTYPE; ?>register" class="text-center">Register</a>
                
                    </div>
            </form>

           
        </div>