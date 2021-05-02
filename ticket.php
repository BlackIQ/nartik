<?php

if (count($tik) > 0) {
    if ($tik[0] == false) {
        echo '<h2>تیکت پیدا نشد</h2>';
    }
    else {
        ?>
        <div>
            <h2><?php echo $tik[0]['tikid']; ?></h2>
            <hr>
            <h3><b><?php echo $tik[0]['title']; ?></b></h3>
            <h3><?php echo $tik[0]['explane']; ?></h3>
            <br>
            <h4>Company : <?php echo $tik[0]['company']; ?></h4>
            <h4>User : <?php echo $tik[0]['userid']; ?></h4>
            <br>
            <p>Sent in : <?php echo $tik[0]['dt']; ?></p>
            <hr>
        </div>
        <?php
    }
}
else {
    echo '<h2>یک تیکت را انتخاب کنید</h2>';
}

?>