<?php
if (!empty($error)) {
    ?>
    <div class="alert alert-danger" role="alert">
    <?php
        echo $error;
    ?>
    </div>
    <?php
} else if (!empty($info)) {
    ?>

    <div class="alert alert-info" role="alert">
        <?php
        echo $info;
        ?>
    </div>
    <?php
}
?>
