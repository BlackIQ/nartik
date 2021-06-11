<?php

if (count($tik) > 0) {
    if ($tik[0] == false) {
        echo '<h2>تیکت پیدا نشد</h2>';
    }
    else {
        $company = $tik['company'];

        $get_company = "SELECT * FROM admin WHERE uid = '$company'";
        $result_company = mysqli_query($conn, $get_company);

        if (mysqli_num_rows($result_company) > 0) {
            while ($company_row = mysqli_fetch_assoc($result_company)) {
                $com = $company_row["company"];
            }
        }
        ?>
        <div>
            <h3><b><?php echo $tik[0]['title']; ?></b></h3>
            <h3><?php echo $tik[0]['explane']; ?></h3>
            <br>
            <h4><?php echo $com; ?></h4>
            <br>
            <p><?php echo $tik[0]['dt']; ?> ارسال شده در</p>
            <p><?php echo $tik[0]['tikid']; ?>شماره تیکت </p>
            <hr>
            <h4>پاسخ دادن به این تیکت</h4>
            <div>
                <form method="post" action="index.php">
                    <div>
                        <input class="form-control" name="answer" type="text" placeholder="جواب">
                        <br>
                        <button name="ans" class="btn btn-success">ارسال جواب</button>
                        &nbsp;
                        <button class="btn btn-danger" type="reset"><span style="color: white;">ریست کردن</span></button>
                        &nbsp;
                        <button class="btn btn-defult"><a style="color: black;" href="index.php">خروج</a></button>
                    </div>
                </form>
            </div>
        </div>
        <?php
    }
}
else {
    echo '<h2>یک تیکت را برای نمایش انتخاب کنید</h2>';
}

?>