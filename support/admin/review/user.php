<?php

if (count($prop) > 0) {
    if ($prop[0] == false) {
        echo '<h2>شخص پیدا نشد</h2>';
    }
    else {
        ?>
        <div>
            <h2><?php echo $prop[0]['firstname'] . "&nbsp;" . $prop[0]['lastname'] ?></h2>
            <h5><?php echo $prop[0]['id']; ?> کد ملی</h5>
            <hr>
            <h4><?php echo $prop[0]['company']; ?> شرکت</h4>
            <br>
            <h4><?php echo $prop[0]['phone']; ?> شماره همراه</h4>
            <h4><?php echo $prop[0]['email']; ?> ایمیل</h4>
            <br>
            <p><?php echo $prop[0]['dt']; ?> ارسال شده در</p>
            <br>
            <button class="btn btn-success"><a style="color: white;" href="index.php?confirm=<?php echo $prop[0]['id']; ?>">تایید فرد</a></button>
            &nbsp;
            <button class="btn btn-danger"><a style="color: white;" href="index.php?reject=<?php echo $prop[0]['id']; ?>">رد کردن درخواست</a></button>
            &nbsp;
            <button class="btn btn-defult"><a style="color: black;" href="index.php">خروج</a></button>
        </div>
        <?php
    }
}
else {
    echo '<h2>یک شخص را برای نمایش انتخاب کنید</h2>';
}

?>