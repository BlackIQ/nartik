<?php

if (count($profile) > 0) {
    ?>
    <div class="alert alert-info text-center" role="alert">
        <?php
            foreach ($profile as $error) {
                echo '<h4>' . $error . '</h4>';
            }
        ?>
    </div>
    <?php
}

?>