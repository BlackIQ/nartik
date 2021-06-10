<?php

if (count($com_tik) > 0) {
    if ($com_tik[0] == false) {
        echo '<h2>تیکت پیدا نشد</h2>';
    }
    else {
        ?>
        <div>
            <b><?php echo $com_tik[0]['tikid']; ?></b>
            <hr>
            <h3><b><?php echo $com_tik[0]['title']; ?></b></h3>
            <h3><?php echo $com_tik[0]['explane']; ?></h3>
            <br>
            <p><?php echo $com_tik[0]['dt'] . "&nbsp;"; ?>ارسال شده در</p>
            <hr>
            <h3>پاسخ</h3>
            <p>
                <?php
                if ($com_tik[0]['answer'] == 'ny') {
                    echo 'هنوز به این تیکت پاسخی داده نشده است.<br>لطفا شکیبا باشید.';
                }
                else {
                    echo $com_tik[0]['answer'];
                }
                ?>
            </p>
            <hr>
            <button class="btn btn-defult"><a style="color: black;" href="index.php">بستن تیکت</a></button>
        </div>
        <?php
    }
}
else {
    echo '<h2>یک تیکت را انتخاب کنید</h2>';
}

?>