<header>
    <div class="logo">
    <a href="<?php echo BASE_URL . '/index.php'?>"><img src="<?php echo BASE_URL . '/assets/images/iblog.png'?>" alt="" class="header-logo"></a>
    </div>
    <i class="fa fa-bars menu-toggle" ></i>
    <Ul class="nav">

    <?php if (isset($_SESSION['username'])): ?>
        <li>
            <a href="">
                <i class="far fa-user"></i>
                <!-- Osik --> <?php echo substr($_SESSION['username'], 0, 8) . '...'; ?>
            <i class="fa fa-chevron-down" style="font-size: .8em;"></i>                    <!--creating a dropdown Menu-->
            </a> 
            <ul>
            <li><a href="<?php echo BASE_URL . '/logout.php' ?>" class="logout">Logout</a></li>   
            </ul>
        </li>
    <?php endif; ?>
        
    </Ul> 
        </header>