<?php  if (count($send) > 1) : ?>
    <div class="alert alert-danger text-center" role="alert">
        <?php foreach ($send as $error) : ?>
            <h4><?php echo $error ?></h4>
        <?php endforeach ?>
    </div>
    <br>
<?php  endif ?>

<?php  if (count($send) == 1) : ?>
    <?php
        if ($send[0] == true) {
            ?>
            <div class="alert alert-success text-center" role="alert">
                <?php echo 'تیکت شما با موفقیت ارسال شد'; ?>
            </div>
            <?php
        }
        else {
            ?>
            <div class="alert alert-danger text-center" role="alert">
                <?php echo $send[0]; ?>
            </div>
            <?php
        }
    ?>
    <br>
<?php  endif ?>