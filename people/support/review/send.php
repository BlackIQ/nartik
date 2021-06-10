<?php

if (count($send) > 0) {
    ?>
    <div class="alert alert-success text-center" role="alert">
        <?php
        foreach ($send as $error) {
            echo '<h4>' . $error . '</h4>';
        }
        ?>
    </div>
    <?php
}

?>