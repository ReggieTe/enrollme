<?php 
 if(!Session::get('loggedIn'))
{
  $show="Invalid link .Please try again";
            include "views/home/index.php";
           include 'views/footer.php';
          exit();   
}
$fistStep=array(
$user->getFirstName(),
$user->getLastName(),
$user->getPhone(),
$user->getCountryCode());
$stage1= SetUp::setUpUser(0,0,$fistStep);
$setupProgress=$stage1;

?>

              

                         
                                                        
                        <div class="form-box" id="login-box">
            <div class="header"><h3>Welcome !</h3></div>
       
                <div class="body bg-gray">
                    <h3>Proceed</h3>                             
                                   </div>
                <div class="footer"> 
                    
									
                                                                      
                         
                         
                         <?php  
                         //if the progress set is <300 ::meaning all data has been completed
                         if($setupProgress>=100)
                         {
                             echo '<a href="'.URL.''.USERTYPE.'dashboard/home"  class="btn bg-olive btn-block">My Account</a>';  
                         }
                        else {
                            
                            echo '<a href="'.URL.''.USERTYPE.'setup/home"  class="btn bg-olive btn-block">My Account</a>';  
                       
                        }
                         ?>
                    <a href="<?php echo URL; ?><?php echo USERTYPE; ?>logout"  class="btn bg-olive btn-block">Log Out</a>
              
                   
                    </div>

           
        </div>