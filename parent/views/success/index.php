<?php 
 if(!Session::get('accountCreated'))
{
  $show="Invalid link .Please try again";
            include "views/home/index.php";
           include 'views/footer.php';
          exit();   
} 
$show="Confirmation link has been sent to:".@$useremail; ?>

                        
                       <div class="form-box" id="login-box">
            <div class="header">Log-In</div>
              
            <form action="<?php echo URL; ?><?php echo USERTYPE; ?>authorise/login" method="POST">
                <div class="body bg-gray">
                    <?php textFormatter::notification(@$show);  ?>
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Email"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password"/>
                    </div>          
                   
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block">Login in</button>  
                    
                    <p><a href="<?php echo URL; ?><?php echo USERTYPE; ?>reset">I forgot my password</a></p>
                    
                    <a href="<?php echo URL; ?><?php echo USERTYPE; ?>register" class="text-center">Register</a>
                </div>
            </form>

           
        </div>

