<?php 
 if(!Session::get('createNewPassword'))
{
  $show="Invalid link .Please try again";
            include "views/home/index.php";
           include 'views/footer.php';
          exit();   
} ?>
<div class="form-box" id="login-box">
            <div class="header">Set New Password</div>
         
            <form action="<?php echo URL; ?><?php echo USERTYPE; ?>resetpassword/qwGHKy756huunnuyopkjktykhjk/1" method="post">
                <div class="body bg-gray">
                    <?php textFormatter::notification(@$show);  ?>
                    <div class="form-group">
                        <input type="password" name="newpassword" class="form-control" placeholder="Password"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="newpassword1" class="form-control" placeholder="Re-type Password"/>
                    </div>          
                   
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block">Set New Password</button>  
                    
                    </div>
            </form>

           
        </div>


                    