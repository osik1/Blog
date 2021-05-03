<?php if(isset($_SESSION['message'])):?>
      <div class="msg <?php echo $_SESSION['type'];  ?>">
        <li><?php echo $_SESSION['message']; ?></li>
      </div>

      <?php 
      unset($_SESSION['message']);
      unset($_SESSION['type']);    // making the flash message disappear after the user has seen it
      ?>
      <?php endif; ?>