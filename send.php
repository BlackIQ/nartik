<?php

if (count($send) > 0) {
    ?>
    <div class="alert alert-info text-center" role="alert">
        <?php
            foreach ($send as $error) {
                ?>
                    <h4><?php echo $error ?></h4>
                <?php
            }
        ?>
    </div>
    <?php
}

?>