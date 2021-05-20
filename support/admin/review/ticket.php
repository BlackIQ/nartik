<?php

if (count($tik) > 0) {
    if ($tik[0] == false) {
        echo '<h2>تیکت پیدا نشد</h2>';
    }
    else {
        $person = $tik[0]['userid'];
        $getname = "SELECT * FROM people WHERE id = '$person'";
        
        if ($result = mysqli_query($connection, $getname)) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $name = $row['firstname'] . " " . $row["lastname"];
                }
            }
        }
        
        ?>
        <div>
            <h2 dir="rtl" id="exp"></h2>
            <hr>
            <h3><b><?php echo $tik[0]['title']; ?></b></h3>
            <h3><?php echo $tik[0]['explane']; ?></h3>
            <br>
            <h4><?php echo $tik[0]['company']; ?></h4>
            <h4><?php echo $name; ?></h4>
            <br>
            <p><?php echo $tik[0]['dt']; ?> ارسال شده در</p>
            <p><?php echo $tik[0]['dl']; ?> اتمام در</p>
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
            
            <script>
                // Set the date we're counting down to
                var countDownDate = new Date("<?php echo $tik[0]['dl']; ?>").getTime();

                // Update the count down every 1 second
                var x = setInterval(function() {

                  // Get today's date and time
                  var now = new Date().getTime();

                  // Find the distance between now and the count down date
                  var distance = countDownDate - now;

                  // Time calculations for days, hours, minutes and seconds
                  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                  // Display the result in the element with id="demo"
                  document.getElementById("exp").innerHTML = hours + " ساعت " + minutes + " دقیقه " + seconds + " ثانیه ";

                  // If the count down is finished, write some text
                  if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("exp").innerHTML = "تمام شده است";
                  }
                }, 1000);
            </script>
        </div>
        <?php
    }
}
else {
    echo '<h2>یک تیکت را برای نمایش انتخاب کنید</h2>';
}

?>