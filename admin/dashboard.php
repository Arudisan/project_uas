<?php
     include_once ('requestctrl.php');
  ?>
        <?php
        if(!isset($_GET['act'])){
        ?>
        <h3 class="text-center"> Selamat Datang di halaman Admin </h3>
  <?php
        }
        else if (isset($_GET['act']) && ($_GET['act']== "edit")){
        ?>
            <?php
            }