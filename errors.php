<?php
session_start();
if (isset($_SESSION['errors'])) {
    foreach($_SESSION['errors'] as $error){?>
    <div class="alert danger"><?php echo $error ?></div>
    <?php
    }
    unset($_SESSION['errors']);
}