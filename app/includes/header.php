<?php
$table = 'topics';
$topics = selectAll('topics');
// this will fetch all topics  
?>

<header>
    <div class="logo">
    <a href="<?php echo BASE_URL . '/index.php'?>"><img src="<?php echo BASE_URL . '/assets/images/iblog.png'?>" alt="" class="header-logo"></a>
    </div>
    <i class="fa fa-bars menu-toggle" ></i>
    <ul class="nav">
        <li><a href="https://www.iprojectleg.com/">I-Project Leg </i></a>
        <li><a href="<?php echo BASE_URL . '/index.php' ?>">Home </i></a>
        
        </li>
        <!-- <li><a href="">Info <i class="fa fa-chevron-down" style="font-size: .8em;"></i></a>
        <ul> 
        <li><a href="<?php echo BASE_URL . '/termsAndConditions.php' ?>">T&C</a>
        <li><a href="<?php echo BASE_URL . '/privacy.php' ?>">Privacy</a>
        <li><a href="<?php echo BASE_URL . '/advertise.php' ?>">Advertise with us</a>
        </ul>
        </li> -->
        <li>
        <a href="">Categories <i class="fa fa-chevron-down" style="font-size: .8em;"></i></a>                                <!--creating a dropdown Menu-->

        
             <ul>
             <?php foreach ($topics as $key => $topic): ?>
               <li><a href="<?php echo BASE_URL . '/index.php?t_id=' . $topic['id'] . '&name=' . $topic['name']?>"><?php echo $topic['name']; ?></a></li>
             <?php endforeach; ?>  
            </ul>
        
        </li> 


         <?php if (isset($_SESSION['id'])): ?>
                <li>
                    <a href="">
                        <i class="far fa-user"></i> 
                        <?php echo substr($_SESSION['username'], 0, 8) . '...'; ?>
                        <i class="fa fa-chevron-down" style="font-size: .8em;"></i>        <!--creating a dropdown Menu-->
                    </a>

                    <ul>
                    <?php if ($_SESSION['admin']): ?>
                        <li><a href=" <?php echo BASE_URL . '/admin/dashboard.php' ?>">Dashboard</a></li>
                    <?php endif; ?>
                    <li><a href="<?php echo BASE_URL . '/resetPassword.php' ?>">Reset Password</a></li>
                        <li><a href="<?php echo BASE_URL . '/logout.php' ?>" class="logout">Logout</a></li>    
                    </ul>
                </li>
        <?php else: ?> 
            <!-- <li><a href="<?php echo BASE_URL . '/register.php' ?>">Sign Up</a></li> 
            <li><a href="<?php echo BASE_URL . '/login.php' ?>">Login</a></li> -->
        <?php endif; ?>
    </ul>
    
 </header> 

